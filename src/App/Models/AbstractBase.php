<?php

namespace App\Models;

use Core\AbstractModel;

abstract class AbstractBase extends AbstractModel
{
    public $user_id;
    
    public static function getByUserId(int $id)
    {
        return self::getBy('user_id', $id)[0];
    }
}