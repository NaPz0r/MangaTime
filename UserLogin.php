<?php

namespace MangaTime\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class UserLogin
{
    public function indexAction(Application $app)
    {
        return $app['twig']->render('index.twig');
    }
    public function loginAction(Request $request, Application $app)
    {
        return $app['twig']->render('login.twig', array(
            'error' => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username')

        ));
    }
}