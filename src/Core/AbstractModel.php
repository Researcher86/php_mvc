<?php

namespace Core;
use Core\Exceptions\DbException;
use Core\Exceptions\ModelException;

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
            try {
                self::$db = new DbConnect(Config::getDbSettings());
            } catch (DbException $e) {
                throw new ModelException('Error db connect', $e);
            }
        }
        return self::$db;
    }

    public function delete()
    {
        try {
            return self::getDb()->execute("DELETE FROM " . self::getTableName() . ' WHERE id = ?', [$this->id]);
        } catch (DbException $e) {
            throw new ModelException(sprintf('Error delete from %s, by id=%d', self::getTableName(), $this->id), $e);
        }
    }

    public static function getById(int $id)
    {
        return self::getBy('id', $id)[0];
    }

    public static function deleteAll()
    {
        try {
            return self::getDb()->execute("DELETE FROM " . self::getTableName(), []);
        } catch (DbException $e) {
            throw new ModelException(sprintf('Error delete all from %s', self::getTableName()), $e);
        }
    }

    public static function getAll()
    {
        try {
            return self::getDb()->query("SELECT * FROM " . self::getTableName(), [], self::getClassName());
        } catch (DbException $e) {
            throw new ModelException(sprintf('Error get all from %s', self::getTableName()), $e);
        }
    }

    public static function getCount()
    {
        try {
            return self::getDb()->nativeQuery('SELECT count(*) AS cnt FROM ' . self::getTableName(), [])[0]['cnt'];
        } catch (DbException $e) {
            throw new ModelException(sprintf('Error get count from %s', self::getTableName()), $e);
        }
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
        try {
            return self::getDb()->query('SELECT * FROM ' . self::getTableName() . ' WHERE ' . $column . ' = ?', [$value], self::getClassName());
        } catch (DbException $e) {
            throw new ModelException(sprintf('Error get by from %s, %s=%s', self::getTableName(), $column, $value), $e);
        }
    }
}
