<?php

// Home page
$app->get('/', function () use ($app) {
    $mangas = $app['dao.manga']->findAll();
    return $app['twig']->render('index.html.twig', array('mangas' => $mangas));
});