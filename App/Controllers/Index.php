<?php

namespace App\Controllers;

use App\Models\Education;
use App\Models\Language;
use App\Models\User;

/**
 * Контроллер главной страницы
 * Class Index
 * @package App\Controllers
 */
class Index extends Base
{

    protected function indexAction($params)
    {
        $this->view->title = $this->lang->findByKey('webappTitle');
        $this->view->display('index/index', [
            'content' => 'index/content'
        ]);

//        $user = User::getById(1);
//
//        var_dump($user);
//        var_dump($user->about);
//        var_dump($user->education);
//        var_dump($user->location);
//        var_dump($user->maritalStatus);
//        var_dump($user->phone);
//        var_dump($user->photo);
//        var_dump($user->work);

//        $user->location->delete();
//        var_dump($user->location);
//        $education = Education::getById(2);
//        var_dump($education);
//        var_dump(Education::getAll());

    }

//    public function indexAction()
//    {
//        $this->title = $this->getString('webappTitle');
//        $this->icon = "main.png";
//
//        $userInfo = (new M_Users())->getUserInfo($this->getParamSession('userId'));
//        if (isset($userInfo)) {
//            foreach ($userInfo as $key => $value) {
//                $this->addPageData($key, $this->correctData($key, $value));
//            }
//        }
//
//        $this->addPageData('photo', $this->getUserPhotoPatch($userInfo['photoId']));
//
//        // Генерируем контент страницы
//        $this->_content = $this->render(self::VIEWS_PATCH . "content.php");
//    }
//
//    /**
//     * Метод заменяет все пустые значения данными по умолчанию
//     * @param string $key - ключ
//     * @param string $value - значение
//     * @return string
//     */
//    private function correctData($key, $value)
//    {
//        switch ($key) {
//            case 'forNow':
//                return $value;
//            case 'sex':
//                switch ($value) {
//                    case 1:
//                        return $this->getString('man');
//                    case 2:
//                        return $this->getString('women');
//                    default:
//                        return '-';
//                }
//            default:
//                return empty($value) ? '-' : $value;
//        }
//    }
//
//    /**
//     * Метод возвращает путь к фото пользователя
//     * @param int $photoId - Id фотки в таблице
//     * @return string
//     */
//    private function getUserPhotoPatch($photoId)
//    {
//        $result = (new M_Photos())->getById($photoId)['patch'];
//        return isset($result) ? $result : 'images/noPhoto.png';
//    }
}
