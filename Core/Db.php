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
    private $db;
    private static $instance;

    private function __construct()
    {
        $dbConfig = Config::getDbSettings();
        $driver = $dbConfig['driver'];
        $host = $dbConfig['host'];
        $dbName = $dbConfig['dbName'];
        $user = $dbConfig['user'];
        $password = $dbConfig['password'];

        try {
            $connectStr = $driver . ':host=' . $host . ';dbname=' . $dbName;
            $this->db = new \PDO($connectStr, $user, $password);
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, FALSE);
            $this->db->exec("set names utf8");
        } catch (\PDOException $e) {
            throw new DbException();
        }
    }

    public static function getInstance()
    {
        if (self::$instance == NULL) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Метод выборки данных
     * @param string $query - Подготовленный запрос
     * @param array $params - параметры
     * @return array - Возвращает результат в виде ассоциированного массива
     * @throws DbException
     */
    public function query(string $query, array $params, $class)
    {
        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(\PDO::FETCH_CLASS, $class);
        } catch (\PDOException $e) {
            throw new DbException();
        }
    }

    /**
     * Метод выполняет произвольный запрос
     * @param string $query
     * @param array|NULL $params
     * @return mixed - Статус выполнения
     * @throws DbException
     */
    public function execute(string $query, array $params = NULL)
    {
        try {
            $stmt = $this->db->prepare($query);
            return $stmt->execute($params);
        } catch (\PDOException $e) {
            throw new DbException();
        }
    }

    /**
     * Метод возвращает id добавленной записи
     * @return int
     * @throws DbException
     */
    public function lastInsertId()
    {
        try {
            return $this->db->lastInsertId();
        } catch (\PDOException $e) {
            throw new DbException();
        }
    }

    public function beginTransaction()
    {
        try {
            $this->db->beginTransaction();
        } catch (\PDOException $e) {
            throw new DbException();
        }
    }

    public function commitTransaction()
    {
        try {
            $this->db->commit();
        } catch (\PDOException $e) {
            throw new DbException();
        }
    }

    public function rollBackTransaction()
    {
        try {
            $this->db->rollBack();
        } catch (\PDOException $e) {
            throw new DbException();
        }
    }

}
