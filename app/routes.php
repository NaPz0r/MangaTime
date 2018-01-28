<?php

use Silex\Provider\FormServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;
use MangaTime\Domain\Manga;
use app\Controller\HomeController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


// Home page
$app->get('/', "MangaTime\Controller\HomeController::indexAction")
    ->bind('home');

// Route de login
$app->get('/login', "MangaTime\Controller\HomeController::loginAction")
    ->bind('login');

$app->get('/register', "MangaTime\Controller\HomeController::registerAction")
    ->bind('register');

$app->get('/allmanga', "MangaTime\Controller\HomeController::mangaAffiche")
    ->bind('allmanga');


$app->get('/manga/{id}', "MangaTime\Controller\HomeController::mangaAction")
    ->bind('manga');

$app->get('/recherche', "MangaTime\Controller\MangaRecherche::recherche")
    ->bind('recherche');

$app->get('/savefollow', "MangaTime\Controller\HomeController::saveFollow")
    ->bind('savefollow');


// Routes d'administration
$app->get('/admin', "MangaTime\Controller\AdminController::indexAction")
    ->bind('admin');

// Edit an existing manga
$app->match('/admin/manga/{id}/edit', function($id, Request $request) use ($app) {
    $manga = $app['dao.manga']->find($id);
    return $app['twig']->render('manga_form.html.twig',  array('manga' => $manga));    
})->bind('admin_manga_edit');


$app->match('/admin/manga/{id}/edit/done', function($id, Request $request) use ($app) {
    $manga = $app['dao.manga'];
})->bind('admin_manga_edit_done');

// Remove a manga
$app->get('/admin/manga/{id}/delete', function($id, Request $request) use ($app) {
    // Delete the manga
    $app['dao.manga']->delete($id);
    $app['session']->getFlashBag()->add('success', 'Le manga a bien été supprimé.');
    // Redirect to admin home page
    return $app->redirect($app['url_generator']->generate('admin'));
})->bind('admin_manga_delete');


// Ajouts d'auteurs / mangas / chapitres grâce à l'API
$app->get('/ajoutAuthors', "MangaTime\Controller\JsonControllerAuthor::ajoutAuteurs")
    ->bind('ajoutAuthors');

$app->get('/ajoutMangas', "MangaTime\Controller\JsonControllerManga::ajoutMangas")
    ->bind('ajoutMangas');

$app->get('/ajoutChapters', "MangaTime\Controller\JsonControllerChapter::ajoutChapters")
    ->bind('ajoutChapters');