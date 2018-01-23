<?php

namespace app\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class HomeController{

    public function indexAction (Application $app) {
        $mangas = $app['dao.manga']->findAll();
        return $app['twig']->render('index.html.twig', array('mangas' => $mangas));

    }
    
    public function loginAction(Request $request, Application $app)
    {
        return $app['twig']->render('login.html.twig', array(
            'error'         => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username'),
        ));
    }
}