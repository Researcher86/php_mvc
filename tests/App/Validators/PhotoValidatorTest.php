<?php

namespace App\Validators;

use App\Models\Photo;
use Core\Validator\ValidateErrors;

class PhotoValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function testValid()
    {
        $photo = new Photo();
        $photo->path = "test.png";

        $errors = new ValidateErrors();
        $validator = new PhotoValidator($photo, $errors);

        $validator->validate();

        $this->assertEquals(false, $errors->hasError());
    }

    public function testInvalid()
    {
        $photo = new Photo();
        $photo->path = "test.png3";

        $errors = new ValidateErrors();
        $validator = new PhotoValidator($photo, $errors);

        $validator->validate();

        $this->assertEquals(true, $errors->hasError());
    }
}
