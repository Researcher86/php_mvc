<?php

namespace App\Models;

/**
 * Модель управляет фотографиями пользователей
 * @author Tanat
 */
class Photo extends AbstractBase
{
    public $path;
    public $type;
    public $size;

    public function save()
    {
        $result = self::getDb()->execute('INSERT INTO ' . self::getTableName() . ' (path, type, size, user_id) VALUES(?,?,?,?)',
            [$this->path, $this->type, $this->size, $this->user_id]);
        $this->id = self::getDb()->lastInsertId();
        return $result;
    }
}
