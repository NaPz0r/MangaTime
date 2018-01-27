<?php

namespace MangaTime\Controller;
use Silex\Application;


// use \PDO;

class JsonControllerManga {

public function ajoutMangas()
    {
        $jsondata = file_get_contents("http://www.mangaeden.com/api/list/0/");
        $urlImage = "https://cdn.mangaeden.com/mangasimg/";

        
        $data = json_decode($jsondata, true);
        
        $dataManga = $data["manga"];

        $db = new \PDO('mysql:host=localhost;dbname=mangatime;charset=utf8', 'root', '');
        $requeteManga = $db->prepare('SELECT * FROM authors WHERE Name_Author=(:name)');

        
        foreach ($dataManga as $tableau => $valeur) {
            
            foreach ($valeur as $manga => $description) {
                // var_dump($manga);
                if ($manga == "i" && $valeur["h"] > 20000000) {
                    $jsondatamanga = file_get_contents("http://www.mangaeden.com/api/manga/".$description);

                    $recup = json_decode($jsondatamanga, true);
                    $nouvManga = array($recup["title"], $recup["released"], $recup["description"], $recup["status"], $recup["alias"], $recup["author"]);
                    // $urlImage . $recup["image"];
                    var_dump($nouvManga);
                    echo "<br/>";

                    $requeteManga->bindvalue(':name', $recup["author"]);                                    
                    $requeteManga->execute();
                    $result = $requeteManga->fetch(\PDO::FETCH_ASSOC);

                    // var_dump($result);
                    $idAuthor = $result["Id_Author"];
                    echo $idAuthor;
                    // var_dump($result["Name_Author"]);
                    // var_dump($recup["author"]);
                    
                    $addMangas = $db->prepare('INSERT INTO mangas (Name_Manga, DatePublication_Manga, Description_Manga, Status_Manga, Slug_Manga, Authors_Id_Author) VALUES (:title, :date, :description, :status, :slug, :authorid)');
                    $addMangas->bindvalue(':title', $recup["title"]);
                    $addMangas->bindvalue(':date', $recup["released"]);
                    $addMangas->bindvalue(':description', $recup["description"]);
                    $addMangas->bindvalue(':status', $recup["status"]);
                    $addMangas->bindvalue(':slug', $recup["alias"]);
                    $addMangas->bindvalue(':authorid', $idAuthor);
                    $addMangas->execute();
                    echo "Manga : ". $recup["title"] ." ajouté";
                }else {
                    // echo " ne rentre pas ";
                }

            }

        }
        return true;
    }
}