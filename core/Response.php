<?php

namespace Core;

class Response
{
    public const SUCCESS = 200;
    public const NOT_FOUND = 404;
    public const FORBIDDEN = 403;
    public const INTERNAL_SERVER_ERROR = 500;

    /**
     * @param int $code
     * @return int
     */
    public static function abort(int $code = 404): int
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
            return view("errors.$code",[ 'title' => $title]);
        }
        http_response_code(500);
        return view("errors.$code",[ 'title' => $title]);
    }
}