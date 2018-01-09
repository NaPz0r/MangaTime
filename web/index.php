<?php

// declare(strict_types=1);

// require_once __DIR__.'/../vendor/autoload.php';

// $app = new Silex\Application();

// require __DIR__.'/../app/app.php';
// require __DIR__.'/../app/routes.php';

// // ini_set('display_errors', 1);

// // enable the debug mode
// $app['debug'] = true;

// $app->run();


require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

// enable the debug mode
$app['debug'] = true;

require __DIR__.'/../app/routes.php';

$app->run();