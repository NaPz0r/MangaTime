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


// Routes du controlleur Home
$app->get('/', "MangaTime\Controller\HomeController::indexAction")
    ->bind('home');

$app->get('/login', "MangaTime\Controller\HomeController::loginAction")
    ->bind('login');

$app->get('/register', "MangaTime\Controller\HomeController::registerAction")
    ->bind('register');

$app->get('/allmanga', "MangaTime\Controller\HomeController::mangaAffiche")
    ->bind('allmanga');

$app->get('/manga/{id}', "MangaTime\Controller\HomeController::mangaAction")
    ->bind('manga');


$app->get('/savefollow', "MangaTime\Controller\HomeController::saveFollow")
    ->bind('savefollow');

// Routes de recherche
$app->get('/recherche', "MangaTime\Controller\MangaRecherche::recherche")
    ->bind('recherche');

// Routes d'administration
$app->get('/admin', "MangaTime\Controller\AdminController::indexAction")
    ->bind('admin');

// Remove a manga
$app->get('/admin/manga/{id}/delete', "MangaTime\Controller\AdminController::removeManga") 
    ->bind('admin_manga_delete');

$app->get('/admin/chapter/{id}/delete', "MangaTime\Controller\AdminController::removeChapter") 
    ->bind('admin_chapter_delete');

// Edit an existing manga
$app->match('/admin/manga/{id}/edit', function($id, Request $request) use ($app) {
    $manga = $app['dao.manga']->find($id);
    return $app['twig']->render('manga_form.html.twig',  array('manga' => $manga));    
})->bind('admin_manga_edit');


$app->match('/admin/manga/{id}/edit/done', function($id, Request $request) use ($app) {
    $manga = $app['dao.manga'];
})->bind('admin_manga_edit_done');




// Ajouts d'auteurs / mangas / chapitres grâce à l'API
$app->get('/ajoutAuthors', "MangaTime\Controller\JsonControllerAuthor::ajoutAuteurs")
    ->bind('ajoutAuthors');

$app->get('/ajoutMangas', "MangaTime\Controller\JsonControllerManga::ajoutMangas")
    ->bind('ajoutMangas');

$app->get('/ajoutChapters', "MangaTime\Controller\JsonControllerChapter::ajoutChapters")
    ->bind('ajoutChapters');