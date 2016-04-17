<?php

namespace App\Validators;

use App\Models\MaritalStatus;
use Core\Validator\AbstractValidator;
use Core\Validator\ValidateErrors;

/**
 * Валидатор для информации семейное положение
 * Class MaritalStatusValidator
 * @package App\Validators
 */
class MaritalStatusValidator extends AbstractValidator
{

    private $maritalStatus;

    public function __construct(MaritalStatus $maritalStatus, ValidateErrors $errors)
    {
        parent::__construct($errors);
        $this->maritalStatus = $maritalStatus;
    }


    public function validate()
    {

    }
}