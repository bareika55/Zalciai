<?php

define('ROOT', __DIR__);

define('STORAGE_FILE', ROOT . '/data/text.txt');

define('PLAYER_COOKIE', 'player');

$nav = [
    [
        'url' => '/',
        'title' => 'Home'
    ],
//    [
//        'url' => '/create.php',
//        'title' => 'Create'
//    ],
//    [
//        'url' => '/join.php',
//        'title' => 'Join Team'
//    ],
//    [
//        'url' => '/play.php',
//        'title' => 'Play'
//    ],
//    [
//        'url' => '/scoreboard.php',
//        'title' => 'Scoreboard'
//    ],
    [
        'url' => '/login.php',
        'title' => 'Login'
    ],
    [
        'url' => '/register.php',
        'title' => 'Registration'
    ],
];
