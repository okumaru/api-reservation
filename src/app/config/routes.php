<?php

$router = new Phalcon\Mvc\Router(false);

$router->add('/', [
    'namespace'  => 'MyApp\Controllers',
    'controller' => 'Index',
    'action'     => 'index',
]);

$router->add('/:controller/:action/:params', [
    'namespace'  => 'MyApp\Controllers',
    'controller' => 1,
    'action'     => 2,
    'params'     => 3,
]);

$router->add('/:controller', [
    'namespace'  => 'MyApp\Controllers',
    'controller' => 1
]);

return $router;
