<?php

namespace MyApp\Helpers\Client;

use MyApp\Models\Client as mClient;

/**
 * 
 */
class GetClient extends base
{

	public $id;
	public $name;
	public $email;
	public $phone;

	private $isPaging = 0;
	private $offset = 0;
	private $limit = 10;

	public function __construct()
	{
		
	}

	public function withPaging($page = 1, $limit = 10)
	{
		$this->isPaging = 1;
		$this->offset = (--$page) * $limit;
		$this->limit = $limit;
	}

	public function fetch()
	{
		try {

			$mClient = new mClient();

			# id isset
			if ($this->id) 
				$mClient = $mClient->where('id', '=', $this->id);

			# name isset
			if ($this->name) 
				$mClient = $mClient->where('name', '=', $this->name);

			# email isset
			if ($this->email) 
				$mClient = $mClient->where('email', '=', $this->email);

			# phone isset
			if ($this->phone) 
				$mClient = $mClient->where('phone', '=', $this->phone);

			# with paging
			if ($this->isPaging) 
				$mClient = $mClient->skip($this->offset)->take($this->limit);

			$fetchClient = $mClient->get();

			if ($fetchClient->isEmpty()) 
				throw new \Exception("Failed get client, return empty data");
				
			return [
				'status' => 1,
				'data' => $fetchClient,
			];
			
		} catch ( \Exception $e ) {
			return [
				'status' => 0,
				'message' => $e->getMessage()
			];
		}
	}
}