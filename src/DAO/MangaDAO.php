<?php

namespace MangaTime\DAO;

use Doctrine\DBAL\Connection;
use MangaTime\Domain\Manga;

class MangaDAO extends DAO
{
    
    /**
     * Return a list of all mangas, sorted by date (most recent first).
     *
     * @return array A list of all mangas.
     */
    public function findAll() {
        $sql = "select * from mangas order by Id_Manga desc";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $mangas = array();
        foreach ($result as $row) {
            $mangasId = $row['Id_Manga'];
            $mangas[$mangasId] = $this->buildManga($row);
        }
        return $mangas;
    }
    //test
    /**
     * Creates an Article object based on a DB row.
     *
     * @param array $row The DB row containing Article data.
     * @return \MicroCMS\Domain\Article
     */
    private function buildManga(array $row) {
        $manga = new Manga();
        $manga->setIdManga($row['Id_Manga']);
        $manga->setNameManga($row['Name_Manga']);
        $manga->setDatePublicationManga($row['DatePublication_Manga']);
        $manga->setDescriptionManga($row['Description_Manga']);
        $manga->setStatusManga($row['Status_Manga']);
        $manga->setAuthor($row['Authors_Id_Author']);
        return $manga;
    }

    public function addManga(Manga $manga){
        $mangaData = array(
            'manga_name' => $manga->getNameManga(),
            'manga_datepublication' => $manga->getDatePublicationManga(),
            'manga_descriptionmanga' => $manga->getDescriptionManga(),
            'manga_statusmanga' => $manga->getStatusManga()
        );

        $this->getDb()->insert('mangas', $mangaData);
        $id = $this->getDb()->lastInsertId();
        $manga->setIdManga($id);
    
    }
}