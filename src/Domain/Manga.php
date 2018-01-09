<?php

// // Return all articles
// function getMangas() {
//     $bdd = new PDO('mysql:host=localhost;dbname=mangatime;charset=utf8', 'root', '');
//     $mangas = $bdd->query('select * from mangas order by Id_Manga desc');
//     return $mangas;
// }

namespace MangaTime\Domain;

class Manga{

    private $idManga;
    private $nameManga;
    private $datePublicationManga;
    private $descriptionManga;
    private $statusManga;
    private $author;

    public function __construct($nameManga){
        $this->setNameManga($nameManga);        
    }

    /**
    * Get the value of idManga
    */ 
    public function getIdManga()
    {
        return $this->idManga;
    }

    /**
     * Set the value of idManga
     *
     * @return  self
     */ 
    public function setIdManga($idManga)
    {
        $this->idManga = $idManga;

        return $this;
    }

    /**
     * Set the value of nameManga
     *
     * @return  self
     */ 
    public function setNameManga($nameManga)
    {
            $this->nameManga = $nameManga;

            return $this;
    }

    /**
     * Get the value of nameManga
     */ 
    public function getNameManga()
    {
            return $this->nameManga;
    }

    /**
     * Get the value of datePublicationManga
     */ 
    public function getDatePublicationManga()
    {
        return $this->datePublicationManga;
    }

    /**
     * Set the value of datePublicationManga
     *
     * @return  self
     */ 
    public function setDatePublicationManga($datePublicationManga)
    {
        $this->datePublicationManga = $datePublicationManga;

        return $this;
    }

    /**
     * Get the value of descriptionManga
     */ 
    public function getDescriptionManga()
    {
        return $this->descriptionManga;
    }

    /**
     * Set the value of descriptionManga
     *
     * @return  self
     */ 
    public function setDescriptionManga($descriptionManga)
    {
        $this->descriptionManga = $descriptionManga;

        return $this;
    }

 

    /**
     * Get the value of statusManga
     */ 
    public function getStatusManga()
    {
        return $this->statusManga;
    }

    /**
     * Set the value of statusManga
     *
     * @return  self
     */ 
    public function setStatusManga($statusManga)
    {
        $this->statusManga = $statusManga;

        return $this;
    }

    /**
     * Get the value of author
     */ 
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */ 
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }
}