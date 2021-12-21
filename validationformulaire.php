<?php

function valid_donnees($donnees)
{
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

$serveur = "localhost";
$dbname = "validationformulaire";
$namedb = "mamusique";
$user = "root";
$pass = "";
$nom = valid_donnees($_POST["nom"]);
$mail = valid_donnees($_POST["mail"]);
$password = hash('sha256', valid_donnees($_POST["password"]));

if (
    !empty($nom)
    && strlen($nom) <= 20
    && preg_match("/^[A-Za-z '-]+$/", $nom)
    && !empty($mail)
    && filter_var($mail, FILTER_VALIDATE_EMAIL)
) {

    try {
        $dbco = new PDO("mysql:host=$serveur;dbname=$namedb", $user, $pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $dbco->prepare("
        INSERT INTO inscription (name, mail, password)
        VALUES(:nom, :mail, :password)");
        $sth->bindParam(':nom', $nom);
        $sth->bindParam(':mail', $mail);
        $sth->bindParam(':password', $password);
        $sth->execute();

        header("Location:inscription.php");

    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
} else {
    header("Location:enregistrement.php");
    
}
