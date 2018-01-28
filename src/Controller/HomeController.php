<?php

namespace MangaTime\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class HomeController{


    public function indexAction (Application $app) {
        if(count($app['session'])>0){
            $mangas = $app['dao.manga']->findAllFromUser($app['user']->getId());
            return $app['twig']->render('index.html.twig', array('mangas' => $mangas));
        }
        else{
            return $app->redirect('/login');
        }
    }
    
    public function loginAction(Request $request, Application $app)
    {       
        return $app['twig']->render('login.html.twig', array(
            'error'         => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username'),
        ));
    }

    public function registerAction(Application $app) // Renvoie vers la pages d'enregistrement d'un adminidtrateur
    {
        return $app['twig']->render('register.html.twig');
    }

    public function mangaAffiche(Application $app){
        $mangas = $app['dao.manga']->findAll();
        return $app['twig']->render('allmanga.html.twig', array('mangas' => $mangas));
    }

    public function mangaAction($id, Application $app){
        $manga = $app['dao.manga']->find($id);
        $chapters = $app['dao.chapter']->findChapters($id);
        // var_dump($app['user']->getId());
        $retour = $app['dao.manga']->follow($id, $app['user']->getId());
        // $follow = $app['dao.manga']->follow($id);
        return $app['twig']->render('manga.html.twig', array('manga' => $manga, 'chapters' => $chapters, 'retour' => $retour));
    }

    public function saveFollow(Request $request, Application $app){
        // var_dump($request);
        // $userid = $_GET['userid'];
        // $mangaid = $_GET['mangaid'];
        // var_dump($userid);
        $result = $app['dao.manga']->followManga($request);
    }
    
}