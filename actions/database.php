<?php

try {
    session_start();

    $servername = "localhost";
    $dbname = "forum";
    $username = "root";
    $password = "";
    $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8;";
    $bdd = new PDO($dsn, $username, $password);


    echo "Connexion base de donnée reussie";
} catch (PDOException $e) {
    echo "Connexion base de donnée  echouée" . $e->getMessage();
}