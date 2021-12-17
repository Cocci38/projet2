<?php
include 'config.php';


// fonction global
function deletemusiqueby($id)
{
    include 'config.php';
    include 'select.php';
    //suppression des images et du son via l'id



    function del_coverby($chemincover)
    {
        include 'config.php';
        if (!empty($chemincover)) {
            unlink($basenameWeb . $chemincover);
        }
    }
    function del_soundby($cheminsound)
    {
        include 'config.php';
        if (!empty($cheminimage)) {
            unlink($basenameWeb . $cheminimage);
        }
    }


    del_soundby(selectElmentby('Sound', $id));
    del_soundby(selectElmentby('Cover', $id));
    //  suppression des fichiers ok alors on supprime les entrees en BD
    //supprimer l'element de la BD via son id
    try {

        $codb = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
        $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM $table WHERE id=$id";
        $prepare = $codb->prepare($sql);
        $prepare->execute();
    } catch (PDOException $e) {
        echo "Message d'erreur : " . $e->getMessage() . "<br />";
    }
}
deletemusiqueby($_GET['Id']);
