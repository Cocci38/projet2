<?php
//select id Max
function select_Max_id()
{
    include "config.php";
    try {

        $codb = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT max(id) as id FROM Musique";
        $prepare = $codb->prepare($sql);
        $prepare->execute();
        $resultat = $prepare->fetch(PDO::FETCH_ASSOC);
        //$resultat = $prepare->fetchAll(PDO::FETCH_ASSOC);
        if ($resultat['id'] > 0) {
            echo "||valeur retourner TROUVER ||-->" . $resultat['id'];
            return $resultat['id'];
        } else {
            echo "||valeur retourner NON TROUVER||--> 0";
            return 0;
        }
        $codb = null;
    } catch (PDOException $e) {

        return "Message d'erreur : " . $e->getMessage() . "<br />";
    }
}
// select ALL
function select_All()
{
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'MaMusique';
    try {
        $codb = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connexion réussie<br />';

        echo '<br />';
        $sql = "SELECT * FROM Musique ORDER BY Id ASC";
        $prepare = $codb->prepare($sql);
        $prepare->execute();
        $resultat = $prepare->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
        $codb = null;
    } catch (PDOException $e) {

        return "Message d'erreur : " . $e->getMessage() . "<br />";
    }
}

//select by id
function select_by_Id($id)
{
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'MaMusique';


    try {
        $codb = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connexion réussie<br />';

        echo 'Sélection des roles ordonnés par ordre alphabétique <br />';
        $sql = "SELECT * FROM Musique WHERE id=$id";
        $prepare = $codb->prepare($sql);
        $prepare->execute();
        $resultat = $prepare->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
        $codb = null;
    } catch (PDOException $e) {
        return "Message d'erreur : " . $e->getMessage() . "<br />";
    }
}
