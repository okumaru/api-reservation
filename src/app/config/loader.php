<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader
    ->registerNamespaces(
        [
            'MyApp\Controllers' => __DIR__ . '/../controllers/',
            'MyApp\Helpers' => __DIR__ . '/../helpers/',
            'MyApp\Models' => __DIR__ . '/../models/',
        ]
    )->register();
