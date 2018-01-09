<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers
$app->register(new Silex\Provider\DoctrineServiceProvider());

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path' => __DIR__ . '/../views',
  'twig.options' => array('debug' => true)
));

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
	'db.options' => array(
		'driver' => 'pdo_mysql',
		'host' => 'localhost',
		'dbname' => 'mangatime',
		'user' => 'root',
		'password' => ''
	)
));

$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\SecurityServiceProvider(), array(
  'security.firewalls' => array(
    'secured' => array(
      'pattern'   => '^/',
      'anonymous' => true,
      'logout'    => true,
      'form'      => array('login_path' => '/login', 'check_path' => '/login_check'),
      'users'     => function () use ($app) {
          return new UserDAO($app['db']);
      },
    ),
  ),
));
