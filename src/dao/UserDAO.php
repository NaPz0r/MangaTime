<?php

namespace app\dao;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use App\Domain\User;

class UserDAO extends DAO implements UserProviderInterface{

/**
     * {@inheritDoc}
     */
    public function loadUserByUsername($username)
    {
        $sql = 'SELECT user_id, user_name, user_password, user_salt, user_role '
            . 'FROM user '
            . 'WHERE user_name = ?';
        $row = $this->getDb()->fetchAssoc($sql, array($username));

        if ($row) {
            return $this->buildDomainObject($row);
        } else {
            throw new UsernameNotFoundException(sprintf('User "%s" not found.', $username));
        }
    }
    
    /**
     * {@inheritDoc}
     */
    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $class));
        }
        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * {@inheritDoc}
     */
    public function supportsClass($class)
    {
        return 'App\Domain\User' === $class;
    }    

     /**
     * Creates a User object based on a DB row.
     *
     * @param array $row The DB row containing User data.
     * @return \App\Domain\User
     */
    protected function buildDomainObject(array $row)
    {
        $user = new User();
        $user->setId($row['user_id']);
        $user->setUsername($row['user_name']);
        $user->setPassword($row['user_password']);
        $user->setSalt($row['user_salt']);
        $user->setRole($row['user_role']);
        return $user;
    }    

}