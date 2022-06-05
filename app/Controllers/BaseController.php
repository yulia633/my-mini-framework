<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Views\View;

/**
 * Base Controller
 */
class BaseController
{
    /**
     * Show the index page
     * @param mixed $response  The response object
     *
     * @return void
     */
    public function index($response)
    {
        $response->setBody('Home');

        View::renderTemplate('home');
    }
}
