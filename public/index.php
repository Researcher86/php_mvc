<?php

//  Включить строгий режим для PHP 7
declare(strict_types = 1);

error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', '1');

require_once __DIR__ . '/../src/Core/Loader/autoload.php';

// Засекаем время начала обработки запроса.
$start_time = microtime(true);
$mem = memory_get_usage();

try {
    new \Core\Config(__DIR__ . '/../src/App/config.php');
    (new \Core\Route($_SERVER['REQUEST_URI']))->run();
} catch (\Core\Exceptions\E404Exception $e) {
    //TODO: Logging error page not found 404
    echo $e->getMessage();
    throw $e;
} catch (\Core\Exceptions\ModelException $e) {
    //TODO: Logging error business logic 500
    echo $e->getMessage();
    throw $e;
} catch (\Core\Exceptions\DbException $e) {
    //TODO: Logging error db 500
    echo $e->getMessage();
    throw $e;
} catch (\Exception $e) {
    //TODO: Logging... 500
    echo $e->getMessage();
    throw $e;
}

// Время обработки запроса.
$time = microtime(true) - $start_time;
echo "<!--\nВремя генерации страницы: $time сек.\n";

echo 'Размер выделенной памяти: ', memory_get_usage() - $mem, " Byte, ";
echo round((memory_get_usage() - $mem) / 1024), " Kb\n-->";