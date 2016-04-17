<?php

namespace App\Validators;

use App\Models\Phone;
use Core\Validator\AbstractValidator;
use Core\Validator\ValidateErrors;

/**
 * Валидатор для информации номер телефона
 * Class PhoneValidator
 * @package App\Validators
 */
class PhoneValidator extends AbstractValidator
{

    private $phone;

    public function __construct(Phone $phone, ValidateErrors $errors)
    {
        parent::__construct($errors);
        $this->phone = $phone;
    }


    public function validate()
    {

    }
}