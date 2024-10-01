<?php
spl_autoload_register(function ($class) {
    $file = str_replace('\\',DIRECTORY_SEPARATOR,$class).'.php';
    if (file_exists(base_path($file))) {
        require base_path($file);
    }
});