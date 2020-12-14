<?php

namespace MyApp\Controllers;

class IndexController extends ControllerBase
{

    public function indexAction() : array
    {
        return ['welcome to API Reservation'];
    }

    public function sentryAction() : array
    {
    	try {
    		
    		throw new \Exception("My first Sentry error!");

    	} catch ( \Exception $e ) {
    		
    		return [
    			'status' => 0,
    			'message' => $e->getMessage()
    		];

    	}
    	
    }

}