<?php

require_once './config/init.php';

function getDb()
{
    try {
        // on va essayer de se connecter à la BDD

        return new PDO('mysql:host='.CONFIG['db']['HOST'].';dbname='.CONFIG['db']['DBNAME'].';port='.CONFIG['db']['PORT']."'", CONFIG['db']['USER'], CONFIG['db']['PWD'], CONFIG['options']);
    } catch (\PDOException $error) {
        // si erreur de connexion on la capte ici

        exit($error->getMessage());
    }
}

// new PDO('mysql:host=localhost;dbname=wanted;port=3306', 'root', '');
