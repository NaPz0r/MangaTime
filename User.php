<?php

namespace MangaTime\Domain;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{

        private $idUser;
        private $mailUser;
        private $passUser;
        private $nameUser;
        private $nickName;
        private $salt;
        private $role;

        public function getIdUser()
            {
                return $this->$idUser;
            }

            /**
             * Set the value of idUser
             *
             * @return  self
             */ 
            public function setIdUser($idUser)
            {
                $this->idUser = $idUser;

                return $this;
            }

            /**
            * Get the value of MailUser
            */ 
            public function getMailUser()
            {
                return $this->$mailUser;
            }

            /**
             * Set the value of MailUser
             *
             * @return  self
             */ 
            public function setMailUser($mailUser)
            {
                $this->mailUser = $mailUser;

                return $this;
            }

            /**
            * Get the value of PassUser
            */ 
            public function getPassUser()
            {
                return $this->$passUser;
            }

            /**
             * Set the value of PassUser
             *
             * @return  self
             */ 
            public function setPassUser($passUser)
            {
                $this->passUser = $passUser;

                return $this;
            }

            /**
            * Get the value of nameUser
            */ 
            public function getnameUser()
            {
                return $this->$nameUser;
            }

            /**
             * Set the value of nameUser
             *
             * @return  self
             */ 
            public function setnameUser($nameUser)
            {
                $this->nameUser = $nameUser;

                return $this;
            }

                /**
            * Get the value of nickName
            */ 
            public function getnickName()
            {
                return $this->$nickName;
            }

            /**
             * Set the value of nickName
             *
             * @return  self
             */ 
            public function setnickName($nickName)
            {
                $this->nickName = $nickName;

                return $this;
            }

            

        /**
         * Get the value of salt
         */ 
        public function getSalt()
        {
                return $this->salt;
        }

        /**
         * Set the value of salt
         *
         * @return  self
         */ 
        public function setSalt($salt)
        {
                $this->salt = $salt;

                return $this;
        }

        /**
         * Get the value of role
         */ 
        public function getRole()
        {
                return $this->role;
        }

        /**
         * Set the value of role
         *
         * @return  self
         */ 
        public function setRole($role)
        {
                $this->role = $role;

                return $this;
        }
}