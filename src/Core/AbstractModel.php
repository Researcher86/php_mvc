<?php

namespace Core;

/**
 * Базовый класс модели
 * Class AbstractModel
 * @package App\Core
 */
abstract class AbstractModel
{
    public $id;
    private static $db;

    final public static function getDb(): DbConnect
    {
        if (self::$db == null) {
            self::$db = new DbConnect(Config::getDbSettings());
        }
        return self::$db;
    }

    public function delete()
    {
        return self::getDb()->execute("DELETE FROM " . self::getTableName() . ' WHERE id = ?', [$this->id]);
    }

    public static function getById(int $id)
    {
        return self::getBy('id', $id)[0];
    }

    public static function deleteAll()
    {
        return self::getDb()->execute("DELETE FROM " . self::getTableName(), []);
    }

    public static function getAll()
    {
        return self::getDb()->query("SELECT * FROM " . self::getTableName(), [], self::getClassName());
    }

    public static function getCount()
    {
        return self::getDb()->nativeQuery('SELECT count(*) AS cnt FROM ' . self::getTableName(), [])[0]['cnt'];
    }

    protected static function getTableName()
    {
        $class = array_pop(explode('\\', static::class));
        return strtolower($class);
    }

    protected static function getClassName()
    {
        return static::class;
    }

    protected static function getBy($column, $value)
    {
        return self::getDb()->query('SELECT * FROM ' . self::getTableName() . ' WHERE ' . $column . ' = ?', [$value], self::getClassName());
    }
}
