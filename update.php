<?php

if (!(empty($_POST['Id']))) {
    include "config.php";

    $idTochange = $_POST['Id'];
    $repository = $_SERVER["DOCUMENT_ROOT"] . "/" . $baserelative;

    /**modification sur le titre */
    if ((isset($_POST['Titre'])) && (!(empty($_POST['Titre'])))) {
        try {
            $codb = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
            $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE Musique SET Titre=:Titre WHERE Id=:Id";
            $prepare = $codb->prepare($sql);
            $prepare->bindParam(':Titre', $_POST['Titre']);
            $prepare->bindParam(':Id', $idTochange);
            $prepare->execute();
        } catch (PDOException $e) {
            echo "Message d'erreur : " . $e->getMessage() . "<br />";
        }
    }

    /*modification de l'album*/
    if ((isset($_POST['Album'])) && (!(empty($_POST['Album'])))) {
        /**modification sur le  Album*/
        try {
            $codb = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
            $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE Musique SET Album=:Album WHERE Id=:Id";
            $prepare = $codb->prepare($sql);
            $prepare->bindParam(':Album', $_POST['Album']);
            $prepare->bindParam(':Id', $idTochange);
            $prepare->execute();
        } catch (PDOException $e) {
            echo "Message d'erreur : " . $e->getMessage() . ":Titre<br />";
        }
    }
    /*modifcation du Artiste*/
    if ((isset($_POST['Artiste'])) && (!(empty($_POST['Artiste'])))) {
            /**modification sur le  Album*/
        try {
            $codb = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
            $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE Musique SET Artiste=:Artiste WHERE Id=:Id";
            $prepare = $codb->prepare($sql);
            $prepare->bindParam(':Artiste', $_POST['Artiste']);
            $prepare->bindParam(':Id', $idTochange);
            $prepare->execute();
        } catch (PDOException $e) {
            echo "Message d'erreur : " . $e->getMessage() . ":Artiste<br />";
        }
    }

    /*modifcation du Genre*/
    if ((isset($_POST['Genre'])) && (!(empty($_POST['Genre'])))) {
        
        try {
            $codb = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
            $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE Musique SET Genre=:Genre WHERE Id=:Id";
            $prepare = $codb->prepare($sql);
            $prepare->bindParam(':Genre', $_POST['Genre']);
            $prepare->bindParam(':Id', $idTochange);
            $prepare->execute();
        } catch (PDOException $e) {
            echo "Message d'erreur : " . $e->getMessage() . ":Genre<br />";
        }
    }

    // modification du Cover
    //--> pb si on change l'extension parmis celle autorisé 
    // difference
    $extensionsAutorisees_image = array("jpg", "gif", "png");  
    if ((isset($_FILES['Cover']['name']))
        && (!(empty($_FILES['Cover']['name'])))
        && (is_uploaded_file($_FILES['Cover']['tmp_name']))
    ) {
        $extension = pathinfo($_FILES['Cover']['name'], PATHINFO_EXTENSION);
        if (!(in_array($extension, $extensionsAutorisees_image))) {
            die(MSG_PROBLEM_UP_IMAGE_ELEMENT);
        } else {
            //on est rentree et le fichier est au bon format --> on ecrase le fichier existant
            //tester si les extensions sont identiques sinon renommé le fichier enregistré dans la bd avant 
            // a faire
            if (strcmp(pathinfo((selectElmentby('Cover', $idTochange)), PATHINFO_EXTENSION), pathinfo($_FILES['Cover']['name'], PATHINFO_EXTENSION))) {
                rename($_FILES['Cover']['tmp_name'], selectElmentby('Cover', $idTochange));
            } else {
                // on modifie le nom dans la base de donnee pui on renommme le fichier
                $objet = "image/image_" . $idTochange . "." . $extension;
                try {
                    $codb = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
                    $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE Musique SET Cover=:Cover WHERE Id=:Id";
                    $prepare = $codb->prepare($sql);
                    $prepare->bindParam(':Cover', $objet);
                    $prepare->bindParam(':Id', $idTochange);
                    $prepare->execute();
                } catch (PDOException $e) {
                    echo 'cas de la BD image';
                    die(MSG_PROBLEM_UP_IMAGE);
                }
                rename($_FILES['Cover']['tmp_name'], $objet);
            }
        }
    } else {
        die(MSG_PROBLEM_UP_IMAGE);
    }

    //modfication sur le son
    $extensionsAutorisees_sound = array("ogg", "mp3");
    if ((isset($_FILES['Sound']['name']))
        && (!(empty($_FILES['Sound']['name'])))
        && (is_uploaded_file($_FILES['Sound']['tmp_name']))
    ) {
        echo pathinfo(selectElmentby('Sound', $idTochange), PATHINFO_EXTENSION) . "||" . pathinfo($_FILES['Sound']['name'], PATHINFO_EXTENSION);
        $extension = pathinfo($_FILES['Sound']['name'], PATHINFO_EXTENSION);
        if (!(in_array($extension, $extensionsAutorisees_sound))) {
            echo "pb";
        } else {
            //on est rentree et le fichier est au bon format --> on ecrase le fichier existant
            //tester si les extensions sont identiques sinon renommé le fichier enregistré dans la bd avant 
            // a faire


            if (strcmp(pathinfo((selectElmentby('Sound', $idTochange)), PATHINFO_EXTENSION), pathinfo($_FILES['Sound']['name'], PATHINFO_EXTENSION))) {
                //l'extension est la meme
                // on recris sur le fichier
                rename($_FILES['Sound']['tmp_name'], selectElmentby('Sound', $idTochange));
        
            } else {
                // on modifie le nom dans la base de donnee pui on renommme le fichier
                $objet = "sound/sound_" . $idTochange . "." . $extension;
                try {
                    $codb = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
                    $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE Musique SET Sound=:Sound WHERE Id=:Id";
                    $prepare = $codb->prepare($sql);
                    $prepare->bindParam(':Sound', $objet);
                    $prepare->bindParam(':Id', $idTochange);
                    $prepare->execute();
                } catch (PDOException $e) {
                    echo 'cas IMAGE DB';
                    die(MSG_PROBLEM_UP_IMAGE);
                }
                echo "{" . selectElmentby('Sound', $_idTochange) . "}";
                rename($_FILES['Sound']['tmp_name'], $objet);
            }
        }
    } else {

        echo 'PAS de changement->Sound';
        die(MSG_PROBLEM_UP_SOUND);
    }
     
    /*//    modification sur le sound
    if ((isset($_FILES['Sound']['name']))
        && (!(empty($_FILES['Sound']['name'])))
        && (is_uploaded_file($_FILES['Sound']['tmp_name']))
    ) {
        echo pathinfo(selectElmentby('Sound', $idTochange), PATHINFO_EXTENSION) . "||" . pathinfo($_FILES['Sound']['name'], PATHINFO_EXTENSION);
        $extension = pathinfo($_FILES['Sound']['name'], PATHINFO_EXTENSION);
        if (!(in_array($extension, $extensionsAutorisees_sound))) {
            die(MSG_PROBLEM_UP_SOUND_ELEMENT);
        } else {
            //on est rentree et le fichier est au bon format --> on ecrase le fichier existant
            //tester si les extensions sont identiques sinon renommé le fichier enregistré dans la bd avant 
            // a faire

            if (strcmp(pathinfo((selectElmentby('Sound', $idTochange)), PATHINFO_EXTENSION), pathinfo($_FILES['Sound']['name'], PATHINFO_EXTENSION))) {
                # code...
                rename($_FILES['Sound']['tmp_name'], selectElmentby('Sound', $_idTochange));
            } else {
                // on modifie le nom dans la base de donnee puis on renommme
                try {
                    $codb = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
                    $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE Musique SET Sound=:Sound WHERE Id=:Id";
                    $prepare = $codb->prepare($sql);
                    $prepare->bindParam(':Sound', $_POST['Sound']);
                    $prepare->bindParam(':Id', $idTochange);
                    $prepare->execute();
                } catch (PDOException $e) {
                    echo "cas sound DB";
                    die(MSG_PROBLEM_UP_SOUND);
                }
                rename($_FILES['Sound']['tmp_name'], selectElmentby('Sound', $_idTochange));
            }
        }
    } else {
        echo 'PAS de Changement--';
        die(MSG__UP_SOUND);
    }*/
    

        $codb = null;
 
} else {
    echo "erreur de routage";
}