<?php

var_dump($_GET);

$db = new \PDO('mysql:host=localhost;dbname=mangatime;charset=utf8', 'root', '');
        $addFollow = $db->prepare('INSERT INTO authors (Name_Author) VALUES ( :name)');