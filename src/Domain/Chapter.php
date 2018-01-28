<?php

namespace MangaTime\Domain;

class Chapter
{
    private $idChapter;
    private $nameChapter;


    /**
     * Get the value of id
     */ 
    public function getIdChapter()
    {
        return $this->idChapter;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setIdChapter($idChapter)
    {
        $this->idChapter = $idChapter;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getNameChapter()
    {
        return $this->nameChapter;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setNameChapter($nameChapter)
    {
        $this->nameChapter = $nameChapter;

        return $this;
    }
}