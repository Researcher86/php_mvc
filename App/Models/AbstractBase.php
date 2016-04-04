<?php

namespace App\Models;

use App\Core\AbstractModel;

abstract class AbstractBase extends AbstractModel
{
    public $user_id;
    
    public static function getByUserId(int $id)
    {
        return self::getConn()->query('SELECT * FROM ' . self::getTableName() . ' WHERE user_id = ?', [$id], self::getClassName())[0];
    }
}