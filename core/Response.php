<?php

namespace Core;

use JetBrains\PhpStorm\NoReturn;

class Response
{
    public const SUCCESS = 200;
    public const NOT_FOUND = 404;
    public const FORBIDDEN = 403;
    public const INTERNAL_SERVER_ERROR = 500;

    #[NoReturn] public static function abort($code = 404): void
    {
        $allowedCodes = [404, 403, 500];
        $code = basename($code);

        $title = match ($code) {
            '404' => '404 Not Found',
            '403' => '403 Forbidden',
            '500' => '500 Internal Server Error',
            default => 'Error',
        };

        if (in_array($code, $allowedCodes)) {
            http_response_code($code);
            require view($code, 'errors');
            die();
        }
        http_response_code(500);
        require view('500', 'errors');
        die();
    }
}