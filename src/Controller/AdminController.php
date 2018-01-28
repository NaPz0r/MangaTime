<?php

namespace MangaTime\Controller;
use Silex\Application;

class AdminController{

    public function indexAction(Application $app){
        
    $mangas = $app['dao.manga']->findAll();
    $users = $app['dao.user']->findAll();
    return $app['twig']->render('admin.html.twig', array(
        'mangas' => $mangas,
        'users' => $users));
    }
}