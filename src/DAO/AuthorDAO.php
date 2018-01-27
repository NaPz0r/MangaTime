<?php

namespace MangaTime\DAO;

use MangaTime\Domain\Author;
use Doctrine\DBAL\Connection;

class AuthorDAO extends DAO 
{
   
    public function insertAuthor($nameAuthor) 
    {
        $this->getDb()->insert('authors', array("Name_Author" => $nameAuthor));
    }

    protected function buildDomainObject($row)
    {
        // ..

    }

}