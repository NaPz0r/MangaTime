<?php

use Symfony\Component\HttpFoundation\Request;
use Application\Silex;

//Home page
$app->get('/', "MangaTime\Controllers\HomeController::indexAction")
    ->bind('home');

// Home page
// $app->get('/', function () use ($app) {
//     $mangas = $app['dao.manga']->findAll();
//     return $app['twig']->render('index.html.twig', array('mangas' => $mangas));
// });

//Login form
$app->get('/login', "MangaTime\Controllers\UserLogin::loginAction")
    ->bind('login');


