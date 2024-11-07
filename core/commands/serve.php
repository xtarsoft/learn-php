<?php
global $arguments;

/**
 * @param int $port
 * @return void
 */
function startServer(int $port): void
{
    $host = 'localhost';
    $server = "php -S $host:$port -t public";
    $descriptor_spec = [
        0 => STDIN,
        1 => STDOUT,
        2 => STDERR
    ];
    $process = proc_open($server, $descriptor_spec, $pipes);
    if (is_resource($process)) {
        echo success("Server is running on http://$host:$port");
        proc_close($process);
    } else {
        echo error("Failed to start server");
    }
}

$port = 8000;

if (isset($arguments[0])) {
    $port = preg_match('/^--(\d+)$/', $arguments[0], $matches) ? (int) $matches[1] : $port;
}

startServer($port);