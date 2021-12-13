<?php
$servername = "localhost";
$username = "root";
$password = "";
$namedb = "maMusique";

try {
        $codb = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
        $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connexion réussie<br />';
        $codb->beginTransaction();

        $Titre = $_POST['Titre'];
        $Album = $_POST['Album'];
        /* tester la validite des format rentrer--> a faire*/
        $Cover_image = $_FILES['Cover_image'];
        $File_sound = $_FILES['File_sound'];
        $sql3 = "INSERT INTO Musique(Titre,Album,Genre,Cover_image,File_sound)
                 VALUES($Titre,$Album,$Cover_image,$File_sound)";
        $codb->exec($sql3);
        $codb = null;
} catch (PDOException $e) {
        echo "Message d'erreur : " . $e->getMessage() . "<br />";
}
