<?php

namespace App\Models;
use Core\Exceptions\DbException;
use Core\Exceptions\ModelException;

/**
 * Модель управляет телефонами пользователей
 * @author Tanat
 */
class Phone extends AbstractBase
{
    public $phone;

    public function save()
    {
        try {
            $result = self::getDb()->execute('INSERT INTO ' . self::getTableName() . ' (phone, user_id) VALUES(?,?)', [
                $this->phone,
                $this->user_id
            ]);

            $this->id = self::getDb()->lastInsertId();
        } catch (DbException $e) {
            throw new ModelException('Phone error save', $e);
        }
        return $result;
    }

    public static function create($txt)
    {
        if (!empty(trim($txt))) {
            $phone = new self();
            $phone->phone = trim($txt);
            return $phone;
        }
        return null;
    }
}
