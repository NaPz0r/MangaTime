<?php

namespace MangaTime\Controller;
use Silex\Application;


// use \PDO;

class JsonControllerAuthor {

    public function ajoutAuteurs() {

        $jsondata = file_get_contents("http://www.mangaeden.com/api/list/0/");
        $urlImage = "https://cdn.mangaeden.com/mangasimg/";


        $data = json_decode($jsondata, true);

        $dataManga = $data["manga"];

        $db = new \PDO('mysql:host=localhost;dbname=mangatime;charset=utf8', 'root', '');
        $addAuthors = $db->prepare('INSERT INTO authors (Name_Author) VALUES ( :name)');

        foreach ($dataManga as $tableau => $valeur) {

            foreach ($valeur as $manga => $description) {
                
                if ($manga == "i" && $valeur["h"] > 20000000) {
                    // echo $i++;
                    $jsondatamanga = file_get_contents("http://www.mangaeden.com/api/manga/" . $description);
                    $recup = json_decode($jsondatamanga, true);
                    $nouvManga = array($recup["title"], $recup["released"], $recup["description"], $urlImage . $recup["image"], $recup["status"], $recup["author"]);
                    // var_dump($nouvManga);
                    // $auteur = new \MangaTime\DAO\AuthorDAO();
                    // insertAuthor($recup["author"]);
                    // \MangaTime\DAO\AuthorDAO\insertAuthor($recup["author"]);
                    // $nouvManga->getDb()->insert('authors', array("Name_Author" => $recup["author"]));
                    var_dump($recup["author"]);


                    $addAuthors->bindValue(':name', $recup["author"]);

                    $addAuthors->execute();
                } else {
                    echo " ne rentre pas ";
                }
            }
            // echo "<pre>".print_r($value, 1)."</pre>";
            // echo $key;
            // var_dump($value);
        }
        return true;
    }

}
