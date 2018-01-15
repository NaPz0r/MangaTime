<?php

namespace MangaTime\DAO;

use Doctrine\DBAL\Connection;

abstract class DAO
{
    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    protected function getDb()
    {
        return $this->db;
    }

    abstract protected function buildDomainObject(array $row);
}