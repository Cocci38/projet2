<?php
include "config.php";
$id_to_delete = 2;/*id recuperer du lien ou on a clique*/

try {
    $codb = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
    $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connexion réussie<br />';

    $sql = "DELETE FROM Musique WHERE id=$id_to_delete";
    $prepare = $codb->prepare($sql);
    $prepare->execute();
    $count = $prepare->rowCount();
    echo $count . ' entrée(s) supprimée(s) dans la table<br />';

    $sql2 = " DROP TABLE Nombres";
    $codb->exec($sql2);
    echo 'La table Nombres a été supprimée !<br />';
} catch (PDOException $e) {
    echo "Message d'erreur : " . $e->getMessage() . "<br />";
}
