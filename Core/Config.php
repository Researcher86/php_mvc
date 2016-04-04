<?php

namespace Core;

/**
 * Класс для работы с настройками приложения
 * Class Config
 * @package App\Core
 */
class Config
{
    private static $settings;
    
    public function __construct(string $path)
    {
        if (!is_readable($path)) {
            throw new \Exception('Config file ' . $path . ' is not found or is not readable');
        }
        
        self::$settings = require $path;
    }

    public static function getSettings(string $key)
    {
        return self::$settings[$key];
    }
}




