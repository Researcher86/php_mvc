<?php

namespace Core\Exceptions;
use Exception;

/**
 * Ошибка валидности данных
 * @author Tanat
 */
class ValidateException extends AppException
{
    public function __construct($message)
    {
        // 417 Expectation Failed («ожидаемое неприемлемо»)
        parent::__construct($message, null, 417);
    }

}
