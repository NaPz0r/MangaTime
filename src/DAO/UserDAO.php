<?php

class Mangas{

    private $idUser;
    private $mailUser;
    private $passUser;
    private $nicknameUser;
    private $nameUser;
    private $lastnameUser;

    public function __construct($nameManga){
        $this->setNameManga($nameManga);        
    }

     /**
    * Get the value of idManga
    */ 
    public function getIdUser()
    {
        return $this->$idUser;
    }

    /**
     * Set the value of idManga
     *
     * @return  self
     */ 
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

      /**
    * Get the value of idManga
    */ 
    public function getMailUser()
    {
        return $this->$mailUser;
    }

    /**
     * Set the value of idManga
     *
     * @return  self
     */ 
    public function setMailUser($mailUser)
    {
        $this->mailUser = $mailUser;

        return $this;
    }

      /**
    * Get the value of idManga
    */ 
    public function getPassUser()
    {
        return $this->$passUser;
    }

    /**
     * Set the value of idManga
     *
     * @return  self
     */ 
    public function setPassUser($passUser)
    {
        $this->passUser = $passUser;

        return $this;
    }

      /**
    * Get the value of idManga
    */ 
    public function getNicknameUser()
    {
        return $this->$nicknameUser;
    }

    /**
     * Set the value of idManga
     *
     * @return  self
     */ 
    public function setNicknameUser($nicknameUser)
    {
        $this->nicknameUser = $nicknameUser;

        return $this;
    }

          /**
    * Get the value of idManga
    */ 
    public function getNameUser()
    {
        return $this->$nameUser;
    }

    /**
     * Set the value of idManga
     *
     * @return  self
     */ 
    public function setNameUser($nameUser)
    {
        $this->nameUser = $nameUser;

        return $this;
    }

          /**
    * Get the value of idManga
    */ 
    public function getLastnameUser()
    {
        return $this->$lastnameUser;
    }

    /**
     * Set the value of idManga
     *
     * @return  self
     */ 
    public function setLastnameUser($lastnameUser)
    {
        $this->lastnameUser = $lastnameUser;

        return $this;
    }
}