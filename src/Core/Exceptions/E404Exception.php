<?php

namespace Core\Exceptions;
use Exception;

/**
 * Ошибка страница не найдена
 * @author Tanat
 */
class E404Exception extends AppException
{
    public function __construct($message)
    {
        parent::__construct($message, null, 404);
    }

}
