<?php

namespace MangaTime\Controller;
use Silex\Application;

class MangaRecherche
{
    public function recherche(Application $app)
    {

            if (isset($_GET['term']))
            {
                $return_arr = array();

                try{
                    $conn = new \PDO('mysql:host=localhost;dbname=mangatime;charset=utf8', 'root', '');
                    $conn->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $stmt = $conn->prepare('SELECT Name_Manga FROM mangas WHERE Name_Manga LIKE :term');
                    $stmt->execute(array('term' => $_GET['term'].'%'));
                            
                    while($row = $stmt->fetch()) 
                    {
                    $return_arr[] =  $row['Name_Manga'];
                    }
                }catch(PDOException $e) 
                    {
                        echo 'ERROR: ' . $e->getMessage();
                    }
                
                
                    /* Toss back results as json encoded array. */
                    echo json_encode($return_arr);

            }
            return $app['twig']->render('recherche.html.twig');
    }

}



    