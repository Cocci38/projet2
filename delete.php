<?php
include 'config.php';
include 'select.php';


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


// fonction global
function deletemusiqueby($id)
{
    include 'config.php';
    //suppression des images et du son via l'id

    del_soundby(selectsoundby($id));
    del_coverby(selectimageby($id));

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
deletemusiqueby($_GET['Id']);
