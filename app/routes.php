<?php

use Silex\Provider\FormServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;
use MangaTime\Domain\Manga;
use MangaTime\Form\Type\AddManga;
// use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
// use Symfony\Component\Form\Extension\Core\Type\FormType;
// use Symfony\Component\Form\Extension\Core\Type\SubmitType;
// use Symfony\Component\Form\Extension\Core\Type\TextType;


// Home page
$app->get('/', function () use ($app) {
    $mangas = $app['dao.manga']->findAll();
    return $app['twig']->render('index.html.twig', array('mangas' => $mangas));
});

// $app->register(new FormServiceProvider());

$app->match('/addmanga', function (Request $request) use ($app){
    $sent = false;
    $dataManga = array(
        'manganame' => '',
        'mangadatepublish' => '',
        'mangadescription' => '',
        'mangastatus' => ''
    );

    $form = $app['form.factory']->createBuilder('form', $dataManga)
        ->add('manganame', 'text', array(
            'constraints' => array(new Assert\NotBlank(), new Assert\Length(array('min' => 3))),
			'attr' => array('class' => 'form-control', 'placeholder' => 'Nom du manga')
        ))
        ->add('mangadatepublish', 'text', array(
            'constraints' => array(new Assert\DateTime()),
			'attr' => array('class' => 'form-control', 'placeholder' => 'Date de publication')
        ))
        ->add('mangadescription', 'text', array(
            'constraints' => array(new Assert\NotBlank(), new Assert\Length(array('min' => 10))),
			'attr' => array('class' => 'form-control', 'placeholder' => 'Description du manga')
        ))
        ->add('mangastatus', 'choice', array(
            'choices' => array('Terminé' => 0 , 'En cours' => 1),
            'expanded' => true
        ))
        ->add('send', 'submit', array(
			'attr' => array('class' => 'btn btn-default')
        ))
        ->getForm();

        $form->handleRequest($request);

	if($form->isValid()) {
		$data = $form->getData();

	}
 
	return $app['twig']->render('addmanga.html.twig', array('form' => $form->createView()));

});