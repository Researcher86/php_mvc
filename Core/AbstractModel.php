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

    final protected static function getDb(): Db
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
        return self::getDb()->query("SELECT * FROM " . self::getTableName() . ' WHERE id = ?', [$id], self::getClassName())[0];
    }
    
    public function delete()
    {
        return self::getDb()->execute("DELETE FROM " . self::getTableName() . ' WHERE id = ?', [$this->id]);
    }

    public static function deleteAll()
    {
        return self::getDb()->execute("DELETE FROM " . self::getTableName(), []);
    }

    public static function getAll()
    {
        return self::getDb()->query("SELECT * FROM " . self::getTableName(), [], self::getClassName());
    }

}
