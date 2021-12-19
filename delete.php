<?php




// fonction global

include 'config.php';

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

