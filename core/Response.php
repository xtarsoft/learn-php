<?php

namespace Core;

use JetBrains\PhpStorm\NoReturn;

class Response
{
    const SUCCESS = 200;
    const NOT_FOUND = 404;
    const FORBIDDEN = 403;
    const INTERNAL_SERVER_ERROR = 500;

    #[NoReturn] public static function abort($code = 404): void
    {
        $title = match ($code) {
            404 => '404 Not Found',
            403 => '403 Forbidden',
            500 => '500 Internal Server Error',
            default => 'Error',
        };
        http_response_code($code);

        require view($code,'errors');

        die();
    }
}