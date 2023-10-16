<?php

function connexion()
{
    $host = "db";
    $user = "root";
    $pass = "root";
    $dbName = "php_mvc";

    try {
        $connexion = new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $user, $pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        dd('Echec de connexion' . $e->getMessage());
    }

    return $connexion;
}

// Example:
// $pdo = connexion();
// $ins = $pdo->prepare("select * from test order by id");
// $ins->setFetchMode(PDO::FETCH_ASSOC);
// $ins->execute();
// $tab = $ins->fetchAll();

// dd($tab);
