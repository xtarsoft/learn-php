<?php

namespace Core\Middleware;

class Auth
{
    /**
     * @return void
     */
    public function handle(): void
    {
        if (!$_SESSION['user'] ?? false) {
            header('Location: /');
            exit;
        }
    }
}