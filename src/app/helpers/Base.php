<?php

namespace MyApp\Helpers;

use Phalcon\Di;

/**
 * 
 */
class Base
{
	
	protected function getConfig($key = null)
	{

		$config = Di::getDefault()
			->getConfig();
			
        return ($key) ? $config->$key : $config;

	}

}