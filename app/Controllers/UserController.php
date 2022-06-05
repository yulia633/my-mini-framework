<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use App\Views\View;

/**
 * User Controller
 */
class UserController
{
    /**
     * Show the index page
     * @param mixed $response  The response object
     *
     * @return void
     */
    public function index($response)
    {
        $response->setBody('User');

        $users = User::getAll();

        View::renderTemplate('users', [
            'users' => $users
        ]);
    }
}
