<?php
function addMusique()

{

        include('config.php');
        //        include('select.php');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                // définition de l'espace destiné à recevoir les fichiers
                $repository = $_SERVER["DOCUMENT_ROOT"] . "/p2/projet2/";
                $extensionsAutorisees_image = array(".jpeg", ".jpg", ".gif", ".png");
                //ogg|mp3|mp4|m4a|wav|wma
                $extensionsAutorisees_sound = array(".ogg", ".mp3", ".mp4", ".m4a");


                if (empty($_FILES["Cover"]["name"])) {
                        $chemincover = "";
                } elseif (is_uploaded_file($_FILES["Cover"]["tmp_name"])) {
                        // recupération de l'extension du fichier
                        $next = select_Max_id() + 1;
                        // autrement dit tout ce qu'il y a après le dernier point (inclus)
                        $moncover = $_FILES["Cover"]["name"];
                        $extension = substr($moncover, strrpos($moncover, "."));
                        // echo "||" . $extension . "||" . $moncover . "||</br>";
                        // Contrôle de l'extension du fichier
                        if (!(in_array($extension, $extensionsAutorisees_image))) {
                                die("Le fichier n'a pas l'extension img attendue");
                        } else {
                                $chemincover = "image/image_" . $next . $extension;
                                rename($_FILES["Cover"]["tmp_name"], $repository . $chemincover);
                        }
                } else {
                        $chemincover = "";
                
                if (empty($_FILES["Sound"]["name"])) {
                        $cheminmusique = "";
                } elseif (is_uploaded_file($_FILES["Sound"]["tmp_name"])) {
                        // recupération de l'extension du fichier
                        $next = select_Max_id() + 1;
                        // autrement dit tout ce qu'il y a après le dernier point (inclus)
                        $mamusique = $_FILES["Sound"]["name"];
                        $extension = substr($mamusique, strrpos($mamusique, "."));
                        /*echo "||" . $extension . "||" . $mamusique . "||</br>";*/
                        // Contrôle de l'extension du fichier
                        if (!(in_array($extension, $extensionsAutorisees_sound))) {
                                die("Le fichier n'a pas l'extension audio attendue");
                        } else {
                                $cheminmusique = "sound/musique_" . $next . $extension;
                                rename($_FILES["Sound"]["tmp_name"], $repository . $cheminmusique);
                        }
                } else {
                        $cheminmusique = "";
                }

                /*echo "<h1>ELEMENTS FICHIERS à INSERER la base</h1></br>";
                echo "||Cover{" . $chemincover . "}||<br>";
                echo "||Sound{" . $cheminmusique . "}||<br>";
                echo "<br>";*/

                try {
                        $codb = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
                        $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        //echo 'Connexion réussie<br />';
                        $Cover = $chemincover;
                        $Sound = $cheminmusique;
                        $sql = "INSERT INTO Musique(Titre,Album,Artiste,Genre,Cover,Sound)
                                VALUES('" . addslashes($_POST['Titre']) . "','" . addslashes($_POST['Album']) . "','" . addslashes($_POST['Artiste']) . "','" . addslashes($_POST['Genre']) . "','" . addslashes($Cover) . "','" . addslashes($Sound) . "')";
                        $codb->exec($sql);
                        $codb = null;
                } catch (PDOException $e) {
                        echo "Message d'erreur : " . $e->getMessage() . "<br />";
                }
        }
}


addMusique();
}