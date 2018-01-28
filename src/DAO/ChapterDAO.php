<?php

namespace MangaTime\DAO;

use Doctrine\DBAL\Connection;
use MangaTime\Domain\Chapter;

class ChapterDAO extends DAO
{
    
    /**
     * Return a list of all mangas, sorted by date (most recent first).
     *
     * @return array A list of all mangas.
     */
    public function findChapters($id) {
        $sql = "select Name_Chapter, Number_Chapter from chapters where Mangas_Id_Manga = $id";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $chapters = array();
        foreach ($result as $row) {
            $chaptersId = $row['Number_Chapter'];
            $chapters[$chaptersId] = $this->buildDomainObject($row);
        }
        return $chapters;
    }

    private function buildDomainObject(array $row) {
        $chapter = new Chapter();
        $chapter->setIdChapter($row['Number_Chapter']);
        $chapter->setNameChapter($row['Name_Chapter']);
        return $chapter;
    }
}

