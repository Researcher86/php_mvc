<?php

//  Включить строгий режим для PHP 7
declare(strict_types = 1);

require_once __DIR__ . '/../Core/Loader/autoload.php';

// Засекаем время начала обработки запроса.
$start_time = microtime(true);
$mem = memory_get_usage();

try {
    new \Core\Config(__DIR__ . '/../App/config.php');
    (new \Core\Router($_SERVER['REQUEST_URI']))->run();
} catch (\Core\Exceptions\E404Exception $e) {
    //TODO: Logging error page not found 404
    throw $e;
} catch (\Core\Exceptions\ModelException $e) {
    //TODO: Logging error business logic 500
    throw $e;
} catch (\Core\Exceptions\DbException $e) {
    //TODO: Logging error db 500
    throw $e;
} catch (\Exception $e) {
    //TODO: Logging... 500
    throw $e;
}

// Время обработки запроса.
$time = microtime(true) - $start_time;
echo "<!--\nВремя генерации страницы: $time сек.\n";

echo 'Размер выделенной памяти: ', memory_get_usage() - $mem, " Byte, ";
echo round((memory_get_usage() - $mem) / 1024), " Kb\n-->";