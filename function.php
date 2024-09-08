<?php
function dd($value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

function uriIs($uri): bool
{
    return $_SERVER['REQUEST_URI'] === $uri;
}