<?php

namespace Core;

/**
 * Класс для управления локализацией приложения
 * Class Locale
 * @package App\Core
 */
class Locale
{
    private $lang;
    private $cache;

    public function __construct(string $lang)
    {
        $this->lang = $lang;
        $this->cache = require Config::getSettings('messages')[$lang];
    }

    /**
     * Метод поиска значения по ключу
     * @param string $key - ключ
     * @return string - Значение
     */
    public function findByKey(string $key)
    {
        return $this->cache[$key];
    }

    public function getLang()
    {
        return $this->lang;
    }

}
