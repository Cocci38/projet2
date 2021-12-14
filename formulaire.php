<?php
include "config.php";
include "select.php"; ?>

<form action='' method='post' enctype='multipart/form-data'>

    <div>
        <lable>Titre</label>
            <input type=text name='titre' />
            <label>Album</label>
            <input type=text name='album' />
            <label>Genre</label>
            <input type=text name='artiste' />
            <label>Artiste</label>
            <input type=text name='genre' />
            <label>Cover_image</label>
            <input type='file' name='cover' />
            <label>File_Sound</label>
            <input type='file' name='sound' />
    </div>
    <div>
        <label>Enregistrer</label>
        <input type='submit' value='cliquez pour enregistrer' />
    </div>
</form>
<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // définition de l'espace destiné à recevoir les fichiers
    $repository = $_SERVER["DOCUMENT_ROOT"];
    $extensionsAutorisees_image = array(".jpeg", ".jpg", ".gif", ".png");
    //ogg|mp3|mp4|m4a|wav|wma
    $extensionsAutorisees_sound = array(".ogg", ".mp3", ".mp4", ".m4a");
    // si un fichier macover a bien été transféré
    if (is_uploaded_file($_FILES["cover"]["tmp_name"])) {
        $next = select_Max_id() + 1;
        // recupération de l'extension du fichier
        // autrement dit tout ce qu'il y a après le dernier point (inclus)
        $nomcover = $_FILES["cover"]["name"];
        $extension = substr($nomcover, strrpos($nomcover, "."));
        echo "||" . $extension . "||" . $nomcover . "</br>";
        // Contrôle de l'extension du fichier
        if (!(in_array($extension, $extensionsAutorisees_image))) {
            die("Le fichier n'a pas l'extension image attendue");
        } else {
            $chemincover = "/p2/projet2/cover/photo_" . $next . $extension;
            rename($_FILES["cover"]["tmp_name"], $repository . $chemincover);
        }
    }

    if (is_uploaded_file($_FILES["sound"]["tmp_name"])) {
        // recupération de l'extension du fichier
        $next = select_Max_id() + 1;
        // autrement dit tout ce qu'il y a après le dernier point (inclus)
        $mamusique = $_FILES["sound"]["name"];
        $extension = substr($mamusique, strrpos($mamusique, "."));
        echo "||" . $extension . "||" . $mamusique . "||</br";
        // Contrôle de l'extension du fichier
        if (!(in_array($extension, $extensionsAutorisees_sound))) {
            die("Le fichier n'a pas l'extension audio attendue");
        } else {
            $cheminmusique = "/p2/projet2/sound/musique_" . $next . $extension;
            rename($_FILES["sound"]["tmp_name"], $repository . $cheminmusique);
        }
    }

    try {
        $codb = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
        $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connexion réussie<br />';

        // $codb->beginTransaction();

        $Titre = $_POST['titre'];
        $Album = $_POST['album'];
        $Artiste = $_POST['artiste'];
        $Genre = $_POST['genre'];
        $Cover = $chemincover;
        $Sound = $cheminmusique;

        $sql =
            "INSERT INTO Musique(titre,album,artiste,genre,cover,sound)
                        VALUES('" . addslashes($Titre) . "','" . addslashes($Album) . "','" . addslashes($Artiste) . "','" . addslashes($Genre) . "','" . addslashes($Cover) . "','" . addslashes($Sound) . "')";
        $codb->exec($sql);
        $codb = null;
    } catch (PDOException $e) {
        echo "Message d'erreur : " . $e->getMessage() . "<br />";
    }
}
?>