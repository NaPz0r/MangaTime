<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/login/', function () {
    return 'Hello world';
});

$app->run();