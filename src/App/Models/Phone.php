<?php

namespace App\Models;

/**
 * Модель управляет телефонами пользователей
 * @author Tanat
 */
class Phone extends AbstractBase
{
    public $phone;

    public function save()
    {
        $result = self::getDb()->execute('INSERT INTO ' . self::getTableName() . ' (phone, user_id) VALUES(?,?)', [
            $this->phone,
            $this->user_id
        ]);

        $this->id = self::getDb()->lastInsertId();
        return $result;
    }
}
