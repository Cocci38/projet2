<?php
include "config.php";

/*creation de la BD*/
/*creation de la base de donnee DBname*/
try {
    $connectdb = new PDO(
        "mysql:host=$servername",
        $username,
        $password
    );
    $connectdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    $connectdb->exec($sql);
} catch (PDOException $e) {
    echo "Message d'erreur : [" . $e->getMessage() . "]<br>:";
}

try {
    $connectdb = new PDO('mysql:host=' . $servername . ';dbname=' . $namedb, $username, $password);
    $connectdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    
   /* $connectdb->beginTransaction();*/
    /*creation de la table Musique*/
    $sql1 = "CREATE TABLE Musique(
            Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            Titre VarCHAR(100) NOT NULL,
            Album VarCHAR(100) NOT NULL,
            Artiste VarCHAR(100) NOT NULL,
            Genre VarCHAR(30) NOT NULL,
            Cover VarCHAR(255) NOT NULL,
            Sound Varchar(255) NOT NULL )";
    $connectdb->exec($sql1);
    echo 'Table Musique bien créée !<br />';
    //$connectdb->commit();
    //$connectdb = null;
} catch (PDOException $e) {
    echo "Message d'erreur : [" . $e->getMessage() . "]<br>:";
}

try {
    /**Creation de la table Inscription */
    $connectdb = new PDO('mysql:host=' . $servername . ';dbname=' . $namedb, $username, $password);
    $connectdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql2 = "CREATE TABLE Inscription(
            Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(20) NOT NULL,
            mail VARCHAR (50) NOT NULL UNIQUE,
            `password` VARCHAR (30) NOT NULL)";
    $connectdb->exec($sql2);
    echo 'Table Inscription bien créée !<br>';

} catch (PDOException $e){
    echo 'Erreur : '.$e->getMessage();
}