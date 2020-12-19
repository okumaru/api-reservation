<?php

namespace MyApp\Controllers;

use MyApp\Helpers\Client\GetClient;

use MyApp\Models\Client as mClient;

class ClientController extends ControllerBase
{

    public function indexAction(): array
    {
        return [__METHOD__];
    }

    public function getAction(): array
    {
    	try {

            $isPaging = $this->post['isPaging'] ?? null;
            $page = $this->post['page'] ?? null;
            $limit = $this->post['limit'] ?? null;

            if (($isPaging && !$page) || ($isPaging && !$limit)) 
                throw new \Exception("For using paging, you must be use page and limit");

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

    public function addAction(): array
    {
    	try {

            $name = $this->post['name'] ?? null;
            $email = $this->post['email'] ?? null;
            $phone = $this->post['phone'] ?? null;

            if (!$name) 
                throw new \Exception("Name cannot be null");

            if (!$email) 
                throw new \Exception("Email cannot be null");

            if (!$phone) 
                throw new \Exception("Phone cannot be null");

            $addClient = mClient::create([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
            ]);

            if (!$addClient) 
                throw new \Exception("Failed to add client");
                
            return [
                'status' => 1,
                'data' => $addClient,
            ];
    		
    	} catch ( \Exception $e ) {
    		return [
    			"status" => 0,
    			"message" => $e->getMessage(),
    		];
    	}
    }

    public function deleteAction(): array
    {
        try {

            $id = $this->post['id'] ?? null;
            
            if (!$id) 
                throw new \Exception("Require clientid to delete data client");

            $deleteClient = mClient::destroy($id);

            if (!$deleteClient) 
                throw new \Exception("Failed delete data client with id : " . $id);

            return [
                'status' => 1,
                'data' => 'Success delete data client with id : ' . $id,
            ];
            
        } catch ( \Exception $e ) {
            return [
                "status" => 0,
                "message" => $e->getMessage()
            ];
        }
    }

    public function editAction(): array
    {
    	try {

            $id = $this->post['id'] ?? null;
            $params = $this->post['params'] ?? null;
            
            if (!$id) 
                throw new \Exception("Require clientid to update data client");

            if (!$params || (!isset($params['name']) && !isset($params['email']) && !isset($params['phone']))) 
                throw new \Exception("Require data to update for data client");

            $mClient = new mClient();

            # name isset
            if (isset($params['name'])) 
                $updateData['name'] = $params['name'];

            # email isset
            if (isset($params['email'])) 
                $updateData['email'] = $params['email'];

            # phone isset
            if (isset($params['phone'])) 
                $updateData['phone'] = $params['phone'];

            $updateClient = $mClient::where('id', '=', $id)
                            ->update($updateData);

            if (!$updateClient)
                throw new \Exception("Failed update data client with id : " . $id);

            return [
                'status' => 1,
                'message' => 'Success update data client with id : ' . $id,
                'data' => $updateData,
            ];
    		
    	} catch ( \Exception $e ) {
    		return [
    			"status" => 0,
    			"message" => $e->getMessage()
    		];
    	}
    }

}
