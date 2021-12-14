<?php
include "config.php";

/*creation de la BD*/
try {

    $connexiondb = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
    $connexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $connexiondb->beginTransaction();
    /*creation des champs*/
    $sql1 = "CREATE TABLE Musique(
            Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            Titre VarCHAR(100) NOT NULL,
            Album VarCHAR(100) NOT NULL,
            Artiste VarCHAR(100) NOT NULL,
            Genre VarCHAR(30) NOT NULL,
            Cover VarCHAR(255) NOT NULL,
            Sound Varchar(255) NOT NULL )";
    $connexiondb->exec($sql1);
    echo 'Table Musique bien créée !<br />';
    $connexiondb->commit();
    $connexiondb = null;
} catch (PDOException $e) {
    echo "Message d'erreur : [" . $e->getMessage() . "]<br>:";
}
