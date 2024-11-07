<?php

namespace Core\Middleware;

class Middleware
{
    public const MAP = [
        'auth' => Auth::class,
        'guest' => Guest::class
    ];

    /**
     * @param $key
     * @return void
     */
    public static function resolve($key): void
    {
        if (!$key) {
            return;
        }
        $middleware = static::MAP[$key] ?? false;

        if(!$middleware) {
            echo json_encode(['error' => "Middleware '$key' is not defined."]);
            exit;
        }

        (new $middleware)->handle();
    }
}