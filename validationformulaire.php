<?php

function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

    $serveur = "localhost";
    $dbname = "validationformulaire";
    $namedb = "inscription";
    $user = "root";
    $pass = "";
    $name = valid_donnees($_POST["nom"]);
    $mail = valid_donnees($_POST["mail"]);
    $password = valid_donnees($_POST["password"]);

    if (!empty($nom)
        &&strlen($nom) <=20
        && preg_match("^[A-Za-z '-]+$",$nom)
        &&!empty($mail)
        &&filter_var($mail, FILTER_VALIDATE_EMAIL)){

    try {
        $dbco = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $dbco->prepare("
        INSERT INTO form(nom, mail, password)
        VALUES(:nom, :mail, :password)");
        $sth->bindParam(':nom',$nom);
        $sth->bindParam(':mail',$mail);
        $sth->bindParam(':password',$password);
        $sth->execute();

       // header("Location:dashboard.php");

    } catch (PDOException $e){
        echo 'Erreur : '.$e->getMessage();
    }
}else{
    //header("Location:inscription.php");
}
































?>