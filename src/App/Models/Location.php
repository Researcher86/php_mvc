<?php

namespace App\Models;

/**
 * Модель управляет данными "Место проживания"
 * @author Tanat
 */
class Location extends AbstractBase
{
    public $name;

    public function save()
    {
        $result = self::getDb()->execute('INSERT INTO ' . self::getTableName() . '(name, user_id) VALUES(?, ?)', [
            $this->name,
            $this->user_id
        ]);

        $this->id = self::getDb()->lastInsertId();
        return $result;
    }

    public static function create($name)
    {
        if (!empty(trim($name))) {
            $location = new self();
            $location->name = trim($name);
            return $location;
        }
        return null;
    }
}
