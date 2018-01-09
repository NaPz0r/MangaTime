<?php

namespace app\model;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface {

    private $idUser;
    private $mailUser;
    private $passUser;
    private $nicknameUser;
    private $nameUser;
    private $lastnameUser;

    public function __construct($mailUser){
        $this->setMailUser($mailUser);        
    }

     /**
    * Get the value of idManga
    */ 
    public function getIdUser()
    {
        return $this->idUser;
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
        return $this->mailUser;
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
        return $this->passUser;
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
        return $this->nicknameUser;
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
        return $this->nameUser;
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
        return $this->lastnameUser;
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

    private $salt;
    private $role;

    public function getSalt(): string
    {
        return $this->salt;
    }

    public function setSalt($salt){
        $this->salt = $salt;

        return $this;
    }

    public function getRoles()
    {
        return array($this->getRole());
    }

    public function setRole($role){
        $this->role = $role;

        return $this;
    }

    public function eraseCredentials()
    {
        // Notging to do here
    }
}