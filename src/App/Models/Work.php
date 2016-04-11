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

//    /**
//     * Метод возвращает информацию
//     * @param int $userId - id пользователя
//     * @return array
//     */
//    public function getByUser($userId)
//    {
//        $result = $this->dbConnect->select("SELECT * FROM works WHERE users_id=?", array($userId));
//        return isset($result) ? $result[0] : NULL;
//    }
//
//    /**
//     * Метод сохраняет информацию
//     * @param int $userId - id пользователя
//     * @param UserData $userInfo - Пользовательские данные
//     * @throws ExceptionModel
//     */
//    public function addRecord($userId, UserData $userInfo)
//    {
//        try {
//            $this->dbConnect->insert("INSERT INTO works
//                (organization,
//                 post,
//                 jobStartMonth,
//                 jobStartYear,
//                 forNow,
//                 jobStopMonth,
//                 jobStopYear,
//                 duties,
//                 users_id)
//                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)",
//                array($userInfo->organization,
//                    $userInfo->post,
//                    $userInfo->workMonth1,
//                    $userInfo->workYear1,
//                    $userInfo->forNow == 'on' ? TRUE : FALSE,
//                    $userInfo->workMonth2,
//                    $userInfo->workYear2,
//                    $userInfo->function,
//                    $userId));
//        } catch (Exception $exc) {
//            throw new ExceptionModel(Lang::getInstance()->get('worksAddError')); // 'Произошла ошибка при сохранении информации "Опыт работы"'
//        }
//    }

}
