<?php

if (!(empty($_POST['Id']))) {
    include "config.php";

    $id_to_change = $_POST['Id'];
    $repository = $_SERVER["DOCUMENT_ROOT"] . "/p2/projet2/";
    $extensionsAutorisees_image = array(".jpeg", ".jpg", ".gif", ".png");
    $extensionsAutorisees_sound = array(".ogg", ".mp3", ".mp4", ".m4a");
        
        
        /**modification sur le titre */
    if ((isset($_POST['Titre'])) && (!(empty($_POST['Titre'])))) {
        try {
            $codb = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
            $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE Musique SET Titre=:Titre WHERE Id=:$id_to_change";
            $prepare = $codb->prepare($sql);
            $prepare->bindParam(':Titre', $_POST['Titre']);
            $prepare->bindParam(':Id', $id_to_change);
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
            $sql = "UPDATE Musique SET Album=:Album WHERE id=:$id_to_change";
            $prepare = $codb->prepare($sql);
            $prepare->bindParam(':Album', $_POST['Album']);
            $prepare->bindParam(':Id', $id_to_change);
            $prepare->execute();
        } catch (PDOException $e) {
            echo "Message d'erreur : " . $e->getMessage() . "<br />";
        }
    }
    /*modifcation du Artiste*/
    if ((isset($_POST['Artiste'])) && (!(empty($_POST['Artiste'])))) {
            /**modification sur le  Album*/
        try {
            $codb = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
            $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE Musique SET Artiste=:Artiste WHERE id=:$id_to_change";
            $prepare = $codb->prepare($sql);
            $prepare->bindParam(':Artiste', $_POST['Artiste']);
            $prepare->bindParam(':Id', $id_to_change);
            $prepare->execute();
        } catch (PDOException $e) {
            echo "Message d'erreur : " . $e->getMessage() . "<br />";
        }
    }

    /*modifcation du Genre*/
    if ((isset($_POST['Genre'])) && (!(empty($_POST['Genre'])))) {
        /**modification sur le  Album*/
        try {
            $codb = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
            $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE Musique SET Genre=:Genre WHERE id=:$id_to_change";
            $prepare = $codb->prepare($sql);
            $prepare->bindParam(':Genre', $_POST['Genre']);
            $prepare->bindParam(':Id', $id_to_change);
            $prepare->execute();
        } catch (PDOException $e) {
            echo "Message d'erreur : " . $e->getMessage() . "<br />";
        }
    }
    // modification du Cover
    //--> pb si on change l'extension parmis celle autorisé 
    // difference

    if ((isset($_FILES['Cover']['name']))
        && (!(empty($_FILES['Cover']['name'])))
        && (is_uploaded_file($_FILES['Cover']['tmp_name']))
    ) {
        if (!(in_array($extension, $extensionsAutorisees_image))) {
            die(MSG_PROBLEM_ADD_IMAGE);
        } else {
            //on est rentree et le fichier est au bon format --> on ecrase le fichier existant
            //tester si les extensions sont identiques sinon renommé le fichier enregistré dans la bd avant 
            // a faire

            if (strcmp(pathinfo((selectElmentby('Cover', $id_to_change)), PATHINFO_EXTENSION), pathinfo($_FILES['Cover']['tmp_name'], PATHINFO_EXTENSION))) {
                # code...
                rename($_FILES['Cover']['tmp_name'], selectElmentby('Cover', $_id_to_change));
            } else {
                // on modifie le nom dans la base de donnee pui on renommme
                try {
                    $codb = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
                    $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE Musique SET Cover=:Genre WHERE id=:$id_to_change";
                    $prepare = $codb->prepare($sql);
                    $prepare->bindParam(':Cover', $_POST['Cover']);
                    $prepare->bindParam(':Id', $id_to_change);
                    $prepare->execute();
                } catch (PDOException $e) {
                    echo "Message d'erreur : " . $e->getMessage() . "<br />";
                }
                rename($_FILES['Cover']['tmp_name'], selectElmentby('Cover', $_id_to_change));
            }
        }
    } else {
        echo 'cas non repertorié';
    }
            
        /**modification sur le sound*/
    if ((isset($_FILES['Sound']['name']))
        && (!(empty($_FILES['Sound']['name'])))
        && (is_uploaded_file($_FILES['Sound']['tmp_name']))
    ) {
        if (!(in_array($extension, $extensionsAutorisees_image))) {
            die(MSG_PROBLEM_UP_SOUND);
        } else {
            //on est rentree et le fichier est au bon format --> on ecrase le fichier existant
            //tester si les extensions sont identiques sinon renommé le fichier enregistré dans la bd avant 
            // a faire

            if (strcmp(pathinfo((selectElmentby('Sound', $id_to_change)), PATHINFO_EXTENSION), pathinfo($_FILES['Sound']['tmp_name'], PATHINFO_EXTENSION))) {
                # code...
                rename($_FILES['Sound']['tmp_name'], selectElmentby('Sound', $_id_to_change));
            } else {
                // on modifie le nom dans la base de donnee pui on renommme
                try {
                    $codb = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
                    $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE Musique SET Sound=:Sound WHERE id=:$id_to_change";
                    $prepare = $codb->prepare($sql);
                    $prepare->bindParam(':Sound', $_POST['Sound']);
                    $prepare->bindParam(':Id', $id_to_change);
                    $prepare->execute();
                } catch (PDOException $e) {
                    echo "Message d'erreur : " . $e->getMessage() . "<br />";
                }
                rename($_FILES['Sound']['tmp_name'], selectElmentby('Sound', $_id_to_change));
            }
        }
    } else {
        echo 'cas non repertorié';
    }

        $codb = null;
 
} else {
    echo "erreur de routage";
}