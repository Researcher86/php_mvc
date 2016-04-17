<?php

namespace App\Models;

/**
 * Модель управляет данными "Семейное положение"
 * @author Tanat
 */
class MaritalStatus extends AbstractBase
{
    public $name;

    public function save()
    {
        $result = self::getDb()->execute('INSERT INTO ' . self::getTableName() . ' (name, user_id) VALUES(?,?)', [
            $this->name,
            $this->user_id
        ]);

        $this->id = self::getDb()->lastInsertId();
        return $result;
    }

    public static function create($name)
    {
        if (!empty(trim($name))) {
            $maritalStatus = new self();
            $maritalStatus->name = trim($name);
            return $maritalStatus;
        }
        return null;
    }
}
