<?php

// Home page
$app->get('/', function () use ($app) {
    $mangas = $app['dao.manga']->findAll();

    ob_start();             // start buffering HTML output
    require '../views/view.php';
    $view = ob_get_clean(); // assign HTML output to $view
    return $view;
});