<?php




// fonction global

include 'config.php';
include 'message.php';

$id = $_GET['Id'];
function del_chemin($chemin, $str)
{
    include 'config.php';
    if (!empty($chemin)) {
        if (strstr($chemin, $str)) {
            unlink($basenameWeb . $chemin);
        }
    }
}
echo "avant effacement";
del_chemin(selectElmentby('Sound', $id), 'sound');
del_chemin(selectElmentby('Cover', $id), 'image');
echo "apres effacement";

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

// deletemusiqueby($_GET['Id'], $_GET['Etat']);









