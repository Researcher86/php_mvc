<?php

namespace App\Models;

use Core\Config;
use PHPUnit_Extensions_Database_DataSet_IDataSet;

abstract class BaseTest extends \PHPUnit_Extensions_Database_TestCase
{
    // only instantiate pdo once for test clean-up/fixture load
    static private $pdo = null;

    // only instantiate PHPUnit_Extensions_Database_DB_IDatabaseConnection once per test
    private $conn = null;

    final public function getConnection()
    {
        if ($this->conn === null) {
            if (self::$pdo == null) {

                $dbConfig = Config::getDbSettings();
                $driver = $dbConfig['driver'];
                $host = $dbConfig['host'];
                $dbName = $dbConfig['dbName'];
                $user = $dbConfig['user'];
                $password = $dbConfig['password'];

                $connectStr = $driver . ':host=' . $host . ';dbname=' . $dbName;
                self::$pdo = new \PDO($connectStr, $user, $password);
                self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, FALSE);
                self::$pdo->exec("set names utf8");
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo);
        }

        return $this->conn;
    }

    /**
     * Returns the test dataset.
     *
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    protected function getDataSet()
    {
        return $this->createFlatXmlDataSet(__DIR__ . '/../../resources/db/data.xml');
    }
}
