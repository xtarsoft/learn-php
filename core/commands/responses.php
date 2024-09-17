<?php

$commandSupport = [
    'new:view' => 'Create a new view file',
    'new:model' => 'Create a new model file',
];

function success(string $message): string
{
    return "\e[42mSuccess\e[0m \e[32m : $message\e[39m\n";
}

function info(string $message): string
{
    return "\e[44mInfo\e[0m \e[34m : $message\e[39m\n";
}
function warning(string $message): string
{
    return "\e[43mWarning\e[0m \e[33m : $message\e[39m\n";
}
function error(string $message): string
{
    return "\e[41mError\e[0m \e[31m : $message\e[39m\n";
}

function notFound(): string
{
    global $commandSupport;
    return warning('Command not found') . info('Available commands is..') . implode("\n", array_map(fn($key, $value) => "\e[32m$key\e[39m : $value", array_keys($commandSupport), $commandSupport));
}