<?php

namespace App\Models;
use Core\Exceptions\DbException;
use Core\Exceptions\ModelException;

/**
 * Модель управляет данными пользователей "Обо мне"
 * @author Tanat
 */
class About extends AbstractBase
{
    public $about;

    public function save()
    {
        try {
            $result = self::getDb()->execute('INSERT INTO ' . self::getTableName() . ' (about, user_id) VALUES(?,?)', [$this->about, $this->user_id]);
            $this->id = self::getDb()->lastInsertId();
        } catch (DbException $e) {
            throw new ModelException('About error save', $e);
        }
        return $result;
    }

    public static function create($txt)
    {
        if (!empty(trim($txt))) {
            $about = new self();
            $about->about = trim($txt);
            return $about;
        }
        return null;
    }

}
