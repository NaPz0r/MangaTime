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
    private function buildDomainObject(array $row) {
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

        /**
     * Returns an article matching the supplied id.
     *
     * @param integer $id
     *
     * @return \MicroCMS\Domain\Article|throws an exception if no matching article is found
     */
    public function find($id) {
        $sql = "select * from mangas where Id_Manga=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No manga matching id " . $id);
    }

    public function save(Manga $manga) {
        $mangaData = array(
            'Name_Manga' => $manga->getNameManga(),
            'Description_Manga' => $manga->getDescriptionManga(),
            );

        if ($manga->getIdManga()) {
            // The article has already been saved : update it
            $this->getDb()->update('mangas', $mangaData, array('Id_Manga' => $manga->getIdManga()));
        } else {
            // The article has never been saved : insert it
            $this->getDb()->insert('mangas', $mangaData);
            // Get the id of the newly created article and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $manga->setIdManga($id);
        }
    }

    /**
     * Removes an article from the database.
     *
     * @param integer $id The article id.
     */
    public function delete($id) {
        // Delete the article
        $this->getDb()->delete('mangas', array('Id_Manga' => $id));
    }
}