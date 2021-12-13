<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'MaMusique';
$uploaddir = "www/uploads/";
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

try {
    $codb = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connexion réussie<br />';


    if (isset($_POST['Titre'])) {
        /**modification sur le titre */
        $sql = "UPDATE Musique SET Titre=:Titre WHERE id=:$id_to_change";
        $prepare = $codb->prepare($sql);
        $parametres = [':Titre' => $t_POST['Titre'], ':id' => $id_to_change];
        $prepare->execute($parametres);
        echo $count . ' entrée(s) modifiée(s) dans la Musiquer<br />';
    }

    /*modification de l'album*/
    if (isset($_POST['Album'])) {
        /**modification sur le  Album*/
        $sql = "UPDATE Musique SET Album=:Album WHERE id=:$id_to_change";
        $prepare = $codb->prepare($sql);
        $parametres = [':Album' => $_POST['Album'], ':id' => $id_to_change];
        $prepare->execute($parametres);
    }
    /*modifcation du Artiste*/
    if (isset($_POST['Artiste'])) {
        /**modification sur le  Album*/
        $sql = "UPDATE Musique SET Artiste=:Artiste WHERE id=:$id_to_change";
        $prepare = $codb->prepare($sql);
        $parametres = [':Artiste' => $_POST['Artiste'], ':id' => $id_to_change];
        $prepare->execute($parametres);
    }
    /*modifcation du Genre*/
    if (isset($_POST['Genre'])) {
        /**modification sur le  Album*/
        $sql = "UPDATE Musique SET Genre=:Genre WHERE id=:$id_to_change";
        $prepare = $codb->prepare($sql);
        $parametres = [':Genre' => $_POST['Genre'], ':id' => $id_to_change];
        $prepare->execute($parametres);
    }



    /**modification sur le cover */

    /** condition destruction du fichier si le fichier n'est pas un jpg ou gif ou png*/
    /* if(preg_match('/\.(jpg|gif|png)$/',$_FILES['Coverimage']['name'])) unset($_FILES['Cover_image']) ;*/

    if (isset($_FILES['cover']) && (preg_match('/\.(jpg|gif|png)$/', $_FILES['cover']['name']))) {
        $sql = "UPDATE Musique SET cover=:cover WHERE id=:$id_to_change";
        $prepare = $codb->prepare($sql);
        $parametres =   [':cover' => $_FILES['cover'], ':id' => $id_to_change];
        $prepare->execute($parametres);
    } else {
        unset($_FILES['Cover_image']);
    }

    /**modification sur le sound*/

    /** condition destruction du fichier si le fichier n'est pas un format audio*/
    /* if (isset($_FILES['sound']) && (preg_match('/\.(ogg|mp3|mp4|m4a|wav|wma)$/', $_FILES['File_sound']['name'])))*/
    if (isset($_FILES['sound']) && (preg_match('/\.(ogg|mp3|mp4|m4a|wav|wma)$/', $_FILES['sound']['name']))) {
        /**modification sur le fichier */
        $sql = "UPDATE Musique SET sound=:sound WHERE id=:$id_to_change";
        $prepare = $codb->prepare($sql);
        $parametres = [':sound' => $_FILES['sound'], ':id' => $id_to_change];
        $prepare->execute($parametres);
    } else {
        unset($_FILES['sound']);
    }


    $codb = null;
} catch (PDOException $e) {
    echo "Message d'erreur : " . $e->getMessage() . "<br />";
}
