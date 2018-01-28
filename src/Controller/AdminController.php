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

    public function removeManga($id, Application $app){
        // Delete the manga
        $app['dao.manga']->delete($id);
        $app['session']->getFlashBag()->add('success', 'Le manga a bien été supprimé.');
        // Redirect to admin home page
        return $app->redirect($app['url_generator']->generate('admin'));
    }

    public function removeChapter($id, Application $app){
        // Delete the manga
        $app['dao.manga']->deleteChapter($id);
        $app['session']->getFlashBag()->add('success', 'Les chapitres ont bien été supprimés.');
        // Redirect to admin home page
        return $app->redirect($app['url_generator']->generate('admin'));
    }

}