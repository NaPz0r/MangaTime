<?php

namespace MangaTime\Controller;



// use \PDO;

class JsonControllerAuthor {

    public function ajoutAuteurs() {

        $jsondata = file_get_contents("http://www.mangaeden.com/api/list/0/");
        $urlImage = "https://cdn.mangaeden.com/mangasimg/";

        $data = json_decode($jsondata, true);
        // var_dump($data);
        $dataManga = $data["manga"];
        var_dump($dataManga);
        $db = new \PDO('mysql:host=localhost;dbname=mangatime;charset=utf8', 'root', '');
        $addAuthors = $db->prepare('INSERT INTO authors (Name_Author) VALUES ( :name)');

        foreach($dataManga as $tab){

            if($tab["h"]>20000000){
                $jsondatamanga = file_get_contents("http://www.mangaeden.com/api/manga/".$tab["i"]);
                $recup = json_decode($jsondatamanga, true);
                $nouvAuthor = array($recup["author"]);
                var_dump($nouvAuthor);
                // $auteur = new \MangaTime\DAO\AuthorDAO();
                // insertAuthor($recup["author"]);
                // \MangaTime\DAO\AuthorDAO\insertAuthor($recup["author"]);
                // $nouvManga->getDb()->insert('authors', array("Name_Author" => $recup["author"]));
                $addAuthors->bindValue(':name', $recup["author"]);                
               

                $addAuthors->execute();
                                   
            } else {
                // echo " ne rentre pas ";
            }
        }
            // echo "<pre>".print_r($value, 1)."</pre>";
            // echo $key;
            // var_dump($value);
        return true;
    }

}
