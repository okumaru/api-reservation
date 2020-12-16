<?php

namespace MyApp\Controllers;

use MyApp\Helpers\Client\GetClient;

class ClientController extends ControllerBase
{

    public function indexAction() : array
    {
        return [__METHOD__];
    }

    public function getAction() : array
    {
    	try {

            $isPaging = $this->post['isPaging'] ?? null;
            $page = $this->post['page'] ?? null;
            $limit = $this->post['limit'] ?? null;

            if ($isPaging && !($page) || $isPaging && !($limit)) 
                throw new \Exception("For using paging must be use page and limit");

            $GetClient = new GetClient();
            $GetClient->id = $this->post['id'] ?? null;
            $GetClient->name = $this->post['name'] ?? null;
            $GetClient->email = $this->post['email'] ?? null;
            $GetClient->phone = $this->post['phone'] ?? null;

            if ($isPaging) 
                $GetClient->withPaging($page, $limit);

            return $GetClient->fetch();
    		
    	} catch ( \Exception $e ) {
    		return [
    			"status" => 0,
    			"message" => $e->getMessage()
    		];
    	}
    }

    public function addAction() : array
    {
    	try {
    		
    	} catch ( \Exception $e ) {
    		return [
    			"status" => 0,
    			"message" => $e->getMessage()
    		];
    	}
    }

    public function editAction() : array
    {
    	try {
    		
    	} catch ( \Exception $e ) {
    		return [
    			"status" => 0,
    			"message" => $e->getMessage()
    		];
    	}
    }

    public function deleteAction() : array
    {
    	try {
    		
    	} catch ( \Exception $e ) {
    		return [
    			"status" => 0,
    			"message" => $e->getMessage()
    		];
    	}
    }
}
