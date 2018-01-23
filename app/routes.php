<?php

use Silex\Provider\FormServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;
use MangaTime\Domain\Manga;
use MangaTime\Form\Type\AddManga;
use app\Controller\HomeController;
// use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
// use Symfony\Component\Form\Extension\Core\Type\FormType;
// use Symfony\Component\Form\Extension\Core\Type\SubmitType;
// use Symfony\Component\Form\Extension\Core\Type\TextType;


// Home page
$app->get('/', function () use ($app) {
    $mangas = $app['dao.manga']->findAll();
    return $app['twig']->render('index.html.twig', array('mangas' => $mangas));
})->bind('home');

// Login form
$app->get('/login', function(Request $request) use ($app) {
    return $app['twig']->render('login.html.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
})->bind('login');

$app->get('/test', function () use ($app) {
    return $app['twig']->render('test.html.twig');
})->bind('test');

$app->get('/manga/{id}', function ($id) use ($app) {
    $manga = $app['dao.manga']->find($id);
    return $app['twig']->render('manga.html.twig', array('manga' => $manga));
})->bind('manga');



$app->get('/admin', function() use ($app) {
    $mangas = $app['dao.manga']->findAll();
    $users = $app['dao.user']->findAll();
    return $app['twig']->render('admin.html.twig', array(
        'mangas' => $mangas,
        'users' => $users));
})->bind('admin');

$app->match('/admin/manga/add', function(Request $request) use ($app) {
    $manga = new Manga();
    $mangaForm = $app['form.factory']->create(MangaType::class, $manga);
    $mangaForm->handleRequest($request);
    if ($mangaForm->isSubmitted() && $mangaForm->isValid()) {
        $app['dao.manga']->save($manga);
        $app['session']->getFlashBag()->add('success', 'The manga was successfully created.');
    }
    return $app['twig']->render('manga_form.html.twig', array(
        'title' => 'New manga',
        'mangaForm' => $mangaForm->createView()));
})->bind('admin_manga_add');

// Edit an existing manga
$app->match('/admin/manga/{id}/edit', function($id, Request $request) use ($app) {
    $manga = $app['dao.manga']->find($id);
    $mangaForm = $app['form.factory']->create(MangaType::class, $manga);
    $mangaForm->handleRequest($request);
    if ($mangaForm->isSubmitted() && $mangaForm->isValid()) {
        $app['dao.manga']->save($manga);
        $app['session']->getFlashBag()->add('success', 'The manga was successfully updated.');
    }
    return $app['twig']->render('manga_form.html.twig', array(
        'title' => 'Edit manga',
        'mangaForm' => $mangaForm->createView()));
})->bind('admin_manga_edit');

// Remove an manga
$app->get('/admin/manga/{id}/delete', function($id, Request $request) use ($app) {
    // Delete the manga
    $app['dao.manga']->delete($id);
    $app['session']->getFlashBag()->add('success', 'The manga was successfully removed.');
    // Redirect to admin home page
    return $app->redirect($app['url_generator']->generate('admin'));
})->bind('admin_manga_delete');



// // Home page
// $app->get('/', "app\Controller\HomeController::indexAction")
//     ->bind('home');

// // Login form
// $app->get('/login', "app\Controller\HomeController::loginAction")
//     ->bind('login');
