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
    
    public static function getViewSettings()
    {
        $view = self::getSettings('view');
        if (!isset($view)) {
            throw new \Exception('View settings is null');
        }
        return $view;
    }    
    
    public static function getCookieSettings()
    {
        $cookie = self::getSettings('cookie');
        if (!isset($cookie)) {
            throw new \Exception('Cookie settings is null');
        }
        return $cookie;
    }    
    
    public static function getDbSettings()
    {
        $db = self::getSettings('db');
        if (!isset($db)) {
            throw new \Exception('Db settings is null');
        }
        return $db;
    }    
    
    public static function getMessages()
    {
        $messages = self::getSettings('messages');
        if (!isset($messages)) {
            throw new \Exception('Messages settings is null');
        }
        return $messages;
    }
    
    
}




