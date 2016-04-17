<?php

namespace App\Validators;

use App\Models\Photo;
use Core\Validator\AbstractValidator;

class PhotoValidator extends AbstractValidator
{

    private $photo;

    public function __construct(Photo $photo, ValidateErrors $errors)
    {
        parent::__construct($errors);
        $this->photo = $photo;
    }


    public function validate()
    {

    }
}