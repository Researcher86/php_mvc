<?php

namespace App\Models;

/**
 * Модель управляет данными "Опыт работы"
 * @author Tanat
 */
class Work extends AbstractBase
{
    public $organization;
    public $post;
    public $jobStartMonth;
    public $jobStartYear;
    public $forNow;
    public $jobStopMonth;
    public $jobStopYear;
    public $duties;

    public function save()
    {
        $result = self::getDb()->execute('INSERT INTO ' . self::getTableName() .
            '(organization, post, jobStartMonth, jobStartYear, forNow, jobStopMonth, jobStopYear, duties, user_id) VALUES(?,?,?,?,?,?,?,?,?)', [
            $this->organization,
            $this->post,
            $this->jobStartMonth,
            $this->jobStartYear,
            $this->forNow,
            $this->jobStopMonth,
            $this->jobStopYear,
            $this->duties,
            $this->user_id
        ]);
        $this->id = self::getDb()->lastInsertId();
        return $result;
    }
}
