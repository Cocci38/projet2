<?php
include "config.php";
include "select.php";


function del_coverby($chemincover)
{
    if (!empty($chemincover)) {
        unlink($chemincover);
    }
}
function del_soundby($cheminsound)
{
    if (!empty($cheminimage)) {
        unlink($cheminimage);
    }
}

// fonction global
function deletemusiqueby($id)
{
    include "config.php";
    //suppression des images et du son via l'id
    selectsoundby($id);
    selectimageby($id);
    del_soundby($id);
    del_coverby($id);

    //supprimer l'element de la BD via son id
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
}
