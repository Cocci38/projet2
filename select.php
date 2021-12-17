<?php
//select id Max
function select_Max_id()
{
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'MaMusique';

    try {

        $codb = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT MAX(id) FROM Musique";
        $prepare = $codb->prepare($sql);
        $prepare->execute();
        $resultat = $prepare->fetchAll(PDO::FETCH_ASSOC);
        //test si le tableau est vide
        if (isset($resultat['max(id)'])) {
            return $resultat['max(id)'];
        } else {
            return 0;
        }
        $codb = null;
    } catch (PDOException $e) {

        return "Message d'erreur : " . $e->getMessage() . "<br />";
    }
}

function select_Ele()
{
    include 'config.php';


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
// select ALL
function select_All()
{
    include 'config.php';


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
