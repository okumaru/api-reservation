<?php

namespace MyApp\Controllers;

class IndexController extends ControllerBase
{

    public function indexAction() : array
    {
        return ['welcome to API Reservation'];
    }

}