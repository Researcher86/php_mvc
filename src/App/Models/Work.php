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
            (int)$this->forNow,
            $this->jobStopMonth,
            $this->jobStopYear,
            $this->duties,
            $this->user_id
        ]);
        $this->id = self::getDb()->lastInsertId();
        return $result;
    }

    public static function create($data)
    {
        $organization = trim($data['organization']);
        $post = trim($data['post']);
        $jobStartMonth = (int)$data['workMonth1'];
        $jobStartYear = (int)$data['workYear1'];
        $forNow = $data['forNow'] == 'on';
        $jobStopMonth = (int)$data['workMonth2'];
        $jobStopYear = (int)$data['workYear2'];
        $duties = trim($data['duties']);

        if (!empty($organization) || !empty($post) || $jobStartMonth ||
            $jobStartYear || $forNow || $jobStopMonth || $jobStopYear || !empty($duties)) {

            $work = new self();
            $work->organization = $organization;
            $work->post = $post;
            $work->jobStartMonth = $jobStartMonth;
            $work->jobStartYear = $jobStartYear;
            $work->forNow = $forNow;
            $work->jobStopMonth = $jobStopMonth;
            $work->jobStopYear = $jobStopYear;
            $work->duties = $duties;

            return $work;
        }
        return null;
    }
}
