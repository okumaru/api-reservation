<?php

namespace MyApp\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Http\Response;

class ControllerBase extends Controller
{

	protected $post;

	public function beforeExecuteRoute(Dispatcher $dispatcher)
	{
		$this->post = $this->request->getPost();
	}

	public function afterExecuteRoute(Dispatcher $dispatcher)
	{
		$content = $dispatcher->getReturnedValue();

        $this->response->setContentType('application/json', 'UTF-8');
        $this->response->setJsonContent($content);
        return $this->response->send();
	}

}
