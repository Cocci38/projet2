<?php

//test si un repertoire existe sinon il le crée
function IsDir_or_CreateIt($path)
{
        if (is_dir($path)) {
                return true;
        } else {
                if (mkdir($path)) {
                        return true;
                } else {
                        return false;
                }
        }
}
include 'config.php';
require 'tools.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $repository = $_SERVER["DOCUMENT_ROOT"] . "/" . $baserelative;


        if (empty($_POST['Titre'])) {
                $form['Titre'] =  "Titre à definir";
        } else {
                $form['Titre'] = htmlspecialchars($_POST['Titre']);
        }

        if (empty($_POST['Album'])) {
                $form['Album'] = "";
        } else {
                $form['Album'] = htmlspecialchars($_POST['Album']);
        }

        if (empty($_POST['Artiste'])) {
                $form['Artiste'] = "";
        } else {
                $form['Artiste'] = htmlspecialchars($_POST['Artiste']);
        }

        if (empty($_POST['Genre'])) {
                $form['Genre'] = "";
        } else {
                $form['Genre'] = htmlspecialchars($_POST['Genre']);
        }

        $form['User'] = $_SESSION['user'];

        $extensionsAutorisees_image = array(".jpeg", ".jpg", ".gif", ".png");
        if (empty($_FILES['Cover']['name'])) {
                $form['Cover'] = "";
        } elseif (is_uploaded_file($_FILES['Cover']['tmp_name'])) {
                // test si le repertoire de destination exist sinon il le crée
                IsDir_or_CreateIt('image');
                // recupération de l'extension du fichier
                $next = select_Max_id() + 1;
                // autrement dit tout ce qu'il y a après le dernier point (inclus)
                $moncover = $_FILES['Cover']['name'];
                $extension = substr($moncover, strrpos($moncover, '.'));
                //$extension1 = pathinfo($_FILES['Cover']['name'], PATHINFO_EXTENSION);
                //echo '||' . $extension1 . '||' . $extension . '||</br>';
                // Contrôle de l'extension du fichier
                if (!(in_array($extension, $extensionsAutorisees_image))) {
                        die(MSG_PROBLEM_ADD_IMAGE);
                } else {
                        $form['Cover'] = 'image/' . $form['User'] . 'image_' . $next . $extension;
                        rename($_FILES['Cover']['tmp_name'], $repository . $form['Cover']);
                }
        } else {
                $form['Cover'] = "";
        }

        $extensionsAutorisees_sound = array(".ogg", ".mp3", ".mp4", ".m4a");
        if (empty($_FILES['Sound']['name'])) {
                $form['Sound'] = '';
        } elseif (is_uploaded_file($_FILES['Sound']['tmp_name'])) {
                //test si le repertoire existe
                IsDir_or_CreateIt('sound');
                // recupération de l'extension du fichier
                $next = select_Max_id() + 1;
                // autrement dit tout ce qu'il y a après le dernier point (inclus)
                $mamusique = $_FILES['Sound']['name'];
                $extension = substr($mamusique, strrpos($mamusique, '.'));
                //$extension1 = pathinfo($_FILES['Sound']['name'],PATHINFO_EXTENSION);
                /*echo "||" . $extension . "||" . $mamusique . "||</br>";*/
                // Contrôle de l'extension du fichier
                if (!(in_array($extension, $extensionsAutorisees_sound))) {
                        die(MSG_PROBLEM_ADD_SOUND);
                } else {
                        $form['Sound'] = 'sound/' . $form['User'] . 'musique_' . $next . $extension;
                        rename($_FILES['Sound']['tmp_name'], $repository . $form['Sound']);
                }
        } else {
                $form['Sound'] = "";
        }
        try {
                $codb = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
                $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql =
                "INSERT INTO Musique(Titre,Album,Artiste,Genre,Cover,Sound)
                         VALUES(:Titre, :Album, :Artiste, :Genre, :Cover, :Sound, :User)";
                $prepare = $codb->prepare($sql);
                $prepare->bindParam(':Titre', $form['Titre']);
                $prepare->bindParam(':Album', $form['Album']);
                $prepare->bindParam(':Artiste', $form['Artiste']);
                $prepare->bindParam(':Genre', $form['Genre']);
                $prepare->bindParam(':Cover', $form['Cover']);
                $prepare->bindParam(':Sound', $form['Sound']);
                $prepare->bindParam(':User', $form['User']);
                $prepare->execute();
        } catch (PDOException $e) {
                echo "Message d'erreur : " . $e->getMessage() . "<br />";
        }
}