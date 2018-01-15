<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use MangaTime\DAO\UserDAO;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app->register(new Silex\Provider\AssetServiceProvider(), array(
    'assets.version' => 'v1'
));




$app['debug'] = true; // tool pour nous aider à trouver nos erreurs

$app['db.options'] = array(
		'driver' => 'pdo_mysql',
		'host' => 'localhost',
		'dbname' => 'mangatime',
		'user' => 'root',
		'password' => '',
        'charset'  => 'utf8',
        'port' => '3306',
	
);

$app->register(new Silex\Provider\SessionServiceProvider());

$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'secured' => array(
            'pattern' =>'^/',
            'anonymous' => true,
            'logout' => true,
            'form' => array('login.path' => '/login', 'check_path' => '/login_check'),
            'users' => function() use ($app)
            {
                return new UserDAO($app['db']);
            },
        ),
    ),
));

$app['dao.user'] = function ($app)
{
    return new UserDAO($app['db']);
};


// Register services
$app['dao.manga'] = function ($app) {
    return new MangaTime\DAO\mangaDAO($app['db']);
};