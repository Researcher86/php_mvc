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
        'en' => require __DIR__ . '/l18n/messages_en.php',
        'ru' => require __DIR__ . '/l18n/messages_ru.php'
    ],
    'user_files_dir' => 'public/userfiles/',
    'time_life_cookie' => time() + 60 * 60 * 24 * 15,
    'time_die_cookie' => time() - 1
];