<?php

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
    'twig.options' => array('debug' => true)
));


$app->get('/hello/',function() use ($app){
    return $app['twig']->render('hello.twig',array(
    'name'=>'t',));
});


$app->get('/', function () {
    return 'Hello world';
});

$app->get('/login/', function () {
    return 'Hello world';
});

$app->run();
