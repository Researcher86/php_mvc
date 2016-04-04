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

    final protected static function getConn(): Db
    {
        return Db::getInstance();
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

    public static function getById(int $id)
    {
        return self::getConn()->query("SELECT * FROM " . self::getTableName() . ' WHERE id = ?', [$id], self::getClassName())[0];
    }
    
    public function delete()
    {
        return self::getConn()->execute("DELETE FROM " . self::getTableName() . ' WHERE id = ?', [$this->id], self::getClassName());
    }

    public static function getAll()
    {
        return self::getConn()->query("SELECT * FROM " . self::getTableName(), [], self::getClassName());
    }

}
