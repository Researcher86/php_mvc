<?php

namespace App\Validators;

use App\Models\User;
use Core\Validator\AbstractValidator;
use Core\Validator\ValidateErrors;

/**
 * Валидатор для обязательной информации о пользователе
 * Class UserValidator
 * @package App\Validators
 */
class UserValidator extends AbstractValidator
{
    private $user;

    public function __construct(User $user, ValidateErrors $errors)
    {
        parent::__construct($errors);
        $this->user = $user;
    }


    public function validate()
    {
        if (empty($this->user->lastName)) {
            $this->handleError('lastNameEmpty');
        }

        if (empty($this->user->firstName)) {
            $this->handleError('firstNameEmpty');
        }

        if (empty($this->user->patronymic)) {
            $this->handleError('patronymicEmpty');
        }

        list($year, $month, $day) = explode('-', $this->user->yearOfBirth);
        if (!checkdate((int)$month, (int)$day, (int)$year)) {
            $this->handleError('incorrectDate');
        }

        if (!isset($this->user->password) && (!isset($this->user->pass2) || !isset($this->user->pass2) || $this->user->pass1 !== $this->user->pass2)) {
            $this->handleError('pass1NotPass2'); // 'Пароли не совпадают. Пожалуйста, проверьте.'
        }

        if (!filter_var($this->user->email, FILTER_VALIDATE_EMAIL)) {
            $this->handleError('incorrectEmail'); // 'Некорректный e-mail адрес'
        }

        if ($this->user->checkEmail($this->user->email)) {
            $this->handleError('emailExists');
        }
    }
}