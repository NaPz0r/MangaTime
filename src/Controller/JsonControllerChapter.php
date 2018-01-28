<?php

namespace MangaTime\Controller;

class JsonControllerChapter {
    
        public function ajoutChapters()
        {
            $jsondata = file_get_contents("http://www.mangaeden.com/api/list/0/");

            $data = json_decode($jsondata, true);
            
            $dataManga = $data["manga"];

            $db = new \PDO('mysql:host=localhost;dbname=mangatime;charset=utf8', 'root', '');
            $addChapters = $db->prepare('INSERT INTO chapters (Name_Chapter, NameChapter_NameMangas, Number_Chapter, DateRelease_Chapter, Mangas_Id_Manga
            ) VALUES ( :name, :namechaptermanga, :number, :date, :mangaid)');
            $requeteManga = $db->prepare('SELECT * FROM mangas WHERE Name_Manga=(:name)');

            foreach ($dataManga as $tableau => $valeur) {
                
                foreach ($valeur as $manga => $description) {
                
                
                
                    if ($manga == "i" && $valeur["h"] > 20000000) {
                        $jsondatamanga = file_get_contents("http://www.mangaeden.com/api/manga/".$description);
                        // var_dump($valeur["h"]);
                        // var_dump($valeur["a"]);
                            $recup = json_decode($jsondatamanga, true);
                            // $recup1 = json_decode($jsondatamanga, true);
                            $nouvManga = array($recup["title"], $recup["chapters_len"]);
                            // var_dump($recup["title"]);
                            // var_dump($recup["chapters_len"]);
                            // var_dump($recup["chapters"]);
                            $k = 0;
                            for($i = 0; $i < $recup["chapters_len"]; $i++)
                            {
                                $requeteManga->bindvalue(':name', $recup["title"]);$requeteManga->execute();
                                $result = $requeteManga->fetch(\PDO::FETCH_ASSOC);
                                $idMangas = $result["Id_Manga"];
                                echo $idMangas;
                            
                                // $titleChapter = $recup["chapters"][$k][2];
                                // echo $titleChapter;
                                // var_dump($titleChapter);
                                // echo $idMangas;      
                                // var_dump($recup["chapters"][$k]);
                                $addChapters->bindvalue(':name', $recup["chapters"][$k][2]);
                                $addChapters->bindvalue(':namechaptermanga', $recup["chapters"][$k][0].$recup["title"]);                                
                                $addChapters->bindvalue(':number', $recup["chapters"][$k][0]);
                                $addChapters->bindvalue(':date', $recup["chapters"][$k][1]);
                                $addChapters->bindvalue(':mangaid', $idMangas);
                                $addChapters->execute();
                                
                                // $infoChapitre = array($recup1["chapters"][$k][0],$recup1["chapters"][$k][1],$recup1["chapters"][$k][2]);
                                // var_dump($recup["chapters"][$k][0]);
                                // var_dump($recup["chapters"][$k][1]);
                                // var_dump($recup["chapters"][$k][2]);
                                // $addChapters->bindvalue(':title', $recup1["chapters"][$k][2]);
                                // $addChapters->bindvalue(':number', $recup1["chapters"][$k][0]);
                                // $addChapters->bindvalue(':date', $recup1["chapters"][$k][1]);
                                // $addChapters->bindvalue(':mangaid', $idMangas);
                                $k++;
                            }

                            
                            // var_dump($nouvManga);
                            // echo "<br/>";

                                                

                            // var_dump($result);
                                               
                            // var_dump($result["Id_Manga"]);
                            // var_dump($recup["author"]);
                                                                                                                
                                                                
                    }
                    else
                    {
                        // echo " ne rentre pas ";
                    }

                }

            }
            return true;
        }

    }