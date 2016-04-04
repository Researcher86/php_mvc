<?php

spl_autoload_register(function (string $className) {
    $fileName = __DIR__ . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    if (file_exists($fileName)) {
        if (is_readable($fileName)) {
            require $fileName;
            return true;
        } else {
            return false;
        }
    }
});