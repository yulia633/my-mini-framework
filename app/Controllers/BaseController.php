<?php

namespace App\Controllers;

class BaseController
{
    public function index($response)
    {
        return $response->setBody('Home');
    }
}
