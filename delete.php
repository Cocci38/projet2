<?php
include 'config.php';






// fonction global
function deletemusiqueby($id, $value)
{


    include 'config.php';
    include 'message.php';
    switch ($value) {
        case 'DEL':
            function del_chemin($chemin, $str)
            {
                include 'config.php';
                if (!empty($chemin)) {
                    if (strstr($chemin, $str)) {
                        unlink($basenameWeb . $chemin);
                    }
                }
            }
            try {
                del_chemin(selectElmentby('Sound', $id), 'sound');
            } catch (\Throwable $th) {
                echo MSG_PROBLEM_DEL_MUSIC . "Music";
            }

            try {
                del_chemin(selectElmentby('Cover', $id), 'image');
            } catch (\Throwable $th) {
                echo MSG_PROBLEM_DEL_MUSIC . "cover";
            }
            try {
                $codb = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
                $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "DELETE FROM Musique WHERE id=$id";
                $prepare = $codb->prepare($sql);
                $prepare->execute();
                echo  'Musique effacé';
            } catch (PDOException $e) {
                echo "Message d'erreur : " . $e->getMessage() . "<br />";
            }

            break;

        default:
            die("erreur!!!!->pb");
            break;
    }
}

//suppression des images et du son via l'id




//supprimer l'element de la BD via son id

deletemusiqueby($_GET['Id'], $_GET['Etat']);
