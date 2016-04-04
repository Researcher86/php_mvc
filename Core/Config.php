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
    
    public function __construct(string $configFile)
    {
        if (!is_readable($configFile)) {
            throw new \Exception('Config file ' . $configFile . ' is not found or is not readable');
        }
        
        self::$settings = require $configFile;
    }

    public static function getSettings(string $key)
    {
        return self::$settings[$key];
    }
}




