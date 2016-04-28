<?php

declare(strict_types = 1); //  Включить строгий режим для PHP 7

error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', '1');

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

$start_time = microtime(true);
$mem = memory_get_usage();

try {
    new \Core\Config(__DIR__ . '/../src/App/config.php');
    (new \Core\Route($_SERVER['REQUEST_URI']))->run();
} catch (\Core\Exceptions\E404Exception $e) {
    //TODO: Logging error page not found 404
    (new \Core\Route('/base/E404'))->run();
//    echo $e->getMessage();
//    throw $e;
} catch (\Exception $e) {
    //TODO: Logging... 500
    (new \Core\Route('/base/E500'))->run();
//    echo $e->getMessage();
//    throw $e;
}

$time = microtime(true) - $start_time;
echo "<!--\nВремя генерации страницы: $time сек.\n";
echo 'Размер выделенной памяти: ', memory_get_usage() - $mem, " Byte, ";
echo round((memory_get_usage() - $mem) / 1024), " Kb\n-->";