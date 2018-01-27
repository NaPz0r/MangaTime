<?php

namespace MangaTime\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class HomeController{

    public function indexAction (Application $app) {
        $mangas = $app['dao.manga']->findAll();

        var_dump($app['user']->getId());
        echo "<pre>".print_r($app['session'],1)."</pre>";
        
        return $app['twig']->render('index.html.twig', array('mangas' => $mangas));

    }
    
    public function loginAction(Request $request, Application $app)
    {
        return $app['twig']->render('login.html.twig', array(
            'error'         => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username'),
        ));
    }

    public function homePage(Application $app){
        $mangas = $app['dao.manga']->find();
        return $app['twig']->render('index.html.twig', array(
            'mangas' => $mangas,
            'last_username' => $app['session']->get('_security.last_username'),
        ));
    }
}