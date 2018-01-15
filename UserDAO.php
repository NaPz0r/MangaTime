<?php



namespace MangaTime\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use MangaTime\Domain\User;

class UserDAO extends DAO implements UserProviderInterface
{
    public function loadUserByUsername($username)
    {
        $sql = 'SELECT 	Id_User, Name_User, Nickname_User, Mail_User, Pass_User, Salt_User, Role_User'.
         'FROM users'.
         'WHERE Name_User = ?';
        $row = $his->getDb()->fetchAssoc($sql, array($username));

        if($row)
        {
            return $this->buildDomainObject($row);
        }
        else
        {
            throw new UsernameNotFoundException(sprintif('User "%s" not found', $username));
        }
    }

    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if (!$this->supporClass($class))
        {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported', $class));
        }
        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return 'App\Domain\User' === $class;
    }

    protected function buildDomainObject(array $row)
    {
        
        /*appelle des methodes set()*/
            $user = new User();
            $user->setId($row['Id_User']);
            $user->setUsername($row['Name_User']);
            $user->setPassword($row['Pass_User']);
            $user->setSalt($row['Salt_User']);
            $user->setRole($row['Role_User']);
            return $user;

        
    }
}

// class Mangas{

//     private $idUser;
//     private $mailUser;
//     private $passUser;
//     private $nicknameUser;
//     private $nameUser;
//     private $lastnameUser;

//     public function __construct($nameManga){
//         $this->setNameManga($nameManga);        
//     }

//      /**
//     * Get the value of idUser
//     */ 
//     public function getIdUser()
//     {
//         return $this->$idUser;
//     }

//     /**
//      * Set the value of idUser
//      *
//      * @return  self
//      */ 
//     public function setIdUser($idUser)
//     {
//         $this->idUser = $idUser;

//         return $this;
//     }

//       /**
//     * Get the value of MailUser
//     */ 
//     public function getMailUser()
//     {
//         return $this->$mailUser;
//     }

//     /**
//      * Set the value of MailUser
//      *
//      * @return  self
//      */ 
//     public function setMailUser($mailUser)
//     {
//         $this->mailUser = $mailUser;

//         return $this;
//     }

//       /**
//     * Get the value of PassUser
//     */ 
//     public function getPassUser()
//     {
//         return $this->$passUser;
//     }

//     /**
//      * Set the value of PassUser
//      *
//      * @return  self
//      */ 
//     public function setPassUser($passUser)
//     {
//         $this->passUser = $passUser;

//         return $this;
//     }

//       /**
//     * Get the value of NicknameUser
//     */ 
//     public function getNicknameUser()
//     {
//         return $this->$nicknameUser;
//     }

//     /**
//      * Set the value of NicknameUser
//      *
//      * @return  self
//      */ 
//     public function setNicknameUser($nicknameUser)
//     {
//         $this->nicknameUser = $nicknameUser;

//         return $this;
//     }

//           /**
//     * Get the value of NameUser
//     */ 
//     public function getNameUser()
//     {
//         return $this->$nameUser;
//     }

//     /**
//      * Set the value of NameUser
//      *
//      * @return  self
//      */ 
//     public function setNameUser($nameUser)
//     {
//         $this->nameUser = $nameUser;

//         return $this;
//     }

//           /**
//     * Get the value of LastnameUser
//     */ 
//     public function getLastnameUser()
//     {
//         return $this->$lastnameUser;
//     }

//     /**
//      * Set the value of LastnameUser
//      *
//      * @return  self
//      */ 
//     public function setLastnameUser($lastnameUser)
//     {
//         $this->lastnameUser = $lastnameUser;

//         return $this;
//     }
// }