<?php

namespace App\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of HomeController
 *
 * @author JFG
 */
class HomeController
{
    /**
     * Home page controller.
     *
     * @param Application $app Silex application
     */
    public function indexAction(Application $app)
    {
        return $app['twig']->render('index.twig');
    }

    /**
     * User login controller.
     *
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function loginAction(Request $request, Application $app)
    {
        return $app['twig']->render('login.twig', array(
              'error'         => $app['security.last_error']($request),
              'last_username' => $app['session']->get('_security.last_username'),
        ));
    }
}