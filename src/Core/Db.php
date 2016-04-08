<?php

namespace Core;

use Core\Exceptions\DbException;

/**
 * Класс для соединения с БД
 * Class Db
 * @package App\Core
 */
final class Db
{
    private $pdo;

    public function __construct(array $config)
    {
        try {
            $this->pdo = new \PDO($config['driver'] . ':host=' . $config['host'] . ';dbname=' . $config['dbName'], $config['user'], $config['password']);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, FALSE);
            $this->pdo->exec("set names utf8");
        } catch (\PDOException $e) {
            throw new DbException($e);
        }
    }

    /**
     * @return \PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * Метод выборки данных
     * @param string $query - Подготовленный запрос
     * @param array $params - параметры
     * @param Object $class - Класс сущности
     * @return array - Возвращает результат в виде массива переданного класса сущности
     * @throws DbException
     */
    public function query(string $query, array $params, $class)
    {
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(\PDO::FETCH_CLASS, $class);
        } catch (\PDOException $e) {
            throw new DbException($e);
        }
    }

    /**
     * Нативный метод выборки данных
     * @param string $query - Подготовленный запрос
     * @param array $params - параметры
     * @return array - Возвращает результат в виде ассоциированного массива
     * @throws DbException
     */
    public function nativeQuery(string $query, array $params)
    {
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new DbException($e);
        }
    } 

    /**
     * Метод выполняет произвольный запрос
     * @param string $query
     * @param array|NULL $params
     * @return boolean - Статус выполнения
     * @throws DbException
     */
    public function execute(string $query, array $params = NULL)
    {
        try {
            $stmt = $this->pdo->prepare($query);
            return $stmt->execute($params);
        } catch (\PDOException $e) {
            throw new DbException($e);
        }
    }

    /**
     * @param string $name [optional] Name of the sequence object from which the ID should be returned.
     * @return string
     */
    public function lastInsertId($name = null)
    {
        return $this->pdo->lastInsertId($name);
    }

    /**
     * @return array
     */
    public function getErrorInfo()
    {
        return $this->pdo->errorInfo();
    }

    public function beginTransaction()
    {
        return $this->pdo->beginTransaction();
    }

    public function rollbackTransaction()
    {
        return $this->pdo->rollback();
    }

    public function commitTransaction()
    {
        return $this->pdo->commit();
    }
}
