<?php

return [
    'db' => [
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'dbName' => 'job',
        'user' => 'root',
        'password' => '',
    ],
    'messages' => [
        'en' => __DIR__ . '/messages_en.php',
        'ru' => __DIR__ . '/messages_ru.php'
    ],
    'view' => [
        'prefix' => __DIR__ . '/Views/',
        'suffix' => '.php'
    ],
    'user_files_dir' => 'public/userfiles/',
    'cookie' => [
        'time_life_cookie' => time() + 60 * 60 * 24 * 15,
        'time_die_cookie' => time() - 1
    ]
];