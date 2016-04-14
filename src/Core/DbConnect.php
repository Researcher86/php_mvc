<?php

namespace Core;

use Core\Exceptions\DbConnectException;

/**
 * Класс для соединения с БД
 * Class Db
 * @package App\Core
 */
final class DbConnect
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
            throw new DbConnectException($e, 'Create error');
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
     * @throws DbConnectException
     */
    public function query(string $query, array $params, $class)
    {
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(\PDO::FETCH_CLASS, $class);
        } catch (\PDOException $e) {
            throw new DbConnectException($e, 'Method query error');
        }
    }

    /**
     * Нативный метод выборки данных
     * @param string $query - Подготовленный запрос
     * @param array $params - параметры
     * @return array - Возвращает результат в виде ассоциированного массива
     * @throws DbConnectException
     */
    public function nativeQuery(string $query, array $params)
    {
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new DbConnectException($e, 'Method native query error');
        }
    } 

    /**
     * Метод выполняет произвольный запрос
     * @param string $query
     * @param array|NULL $params
     * @return boolean - Статус выполнения
     * @throws DbConnectException
     */
    public function execute(string $query, array $params = NULL)
    {
        try {
            $stmt = $this->pdo->prepare($query);
            return $stmt->execute($params);
        } catch (\PDOException $e) {
            throw new DbConnectException($e, 'Method execute query error');
        }
    }

    public function lastInsertId($name = null)
    {
        $lastInsertId = $this->pdo->lastInsertId($name);
        if (!is_numeric($lastInsertId)) {
            throw new DbConnectException(null, 'Get last insert id incorrect');
        }
        return $lastInsertId;
    }

    public function beginTransaction()
    {
        $beginTransaction = $this->pdo->beginTransaction();
        if ($beginTransaction !== true) {
            throw new DbConnectException('Transaction not started');
        }
        return $beginTransaction;
    }

    public function rollbackTransaction()
    {
        $rollback = $this->pdo->rollback();
        if ($rollback !== true) {
            throw new DbConnectException(null, 'Transaction not rollback');
        }
        return $rollback;
    }

    public function commitTransaction()
    {
        $commit = $this->pdo->commit();
        if ($commit !== true) {
            throw new DbConnectException(null, 'Transaction not commit');
        }
        return $commit;
    }
}
