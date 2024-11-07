<?php

namespace Core\Middleware;

use Core\Response;

class Auth
{
    /**
     * @return void
     */
    public function handle(): void
    {
        if (!$_SESSION['user'] ?? false) {
            Response::redirect('/');
            exit;
        }
    }
}