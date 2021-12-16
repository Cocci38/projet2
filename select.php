<?php
//select id Max
function select_Max_id()
{
    include 'config.php';
    try {

        $codb = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        /*//version base sur l'auto_increment
        $sql2 = "SELECT AUTO_INCREMENT AS  nb 
                    FROM information_schema.tables
                    WHERE table_name = 'musique'
                    AND table_schema = DATABASE( )";
        $prepare2 = $codb->prepare($sql2);
        $prepare2->execute();

        $resultat2 = $prepare2->fetch(PDO::FETCH_ASSOC);
        if ($resultat2['nb'] > 1) {
        } else {
        }*/
        //version mbase sur le max
        $sql = "SELECT max(id) as id FROM Musique";
        $prepare = $codb->prepare($sql);
        $prepare->execute();
        $resultat = $prepare->fetch(PDO::FETCH_ASSOC);
        if ($resultat['id'] != NULL) {
            return $resultat['id'];
        } else {
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
    include "config.php";
    try {
        $codb = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
    include "config.php";
    try {
        $codb = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM Musique WHERE id=$id";
        $prepare = $codb->prepare($sql);
        $prepare->execute();
        $resultat = $prepare->fetch(PDO::FETCH_ASSOC);

        return $resultat;
        $codb = null;
    } catch (PDOException $e) {
        return "Message d'erreur : " . $e->getMessage() . "<br />";
    }
}

function selectsoundby($id)
{
    include "config.php";
    try {
        $codb = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT Sound FROM Musique WHERE id=$id";
        $prepare = $codb->prepare($sql);
        $prepare->execute();
        $resultat = $prepare->fetch(PDO::FETCH_ASSOC);
        $resultat['Sound'];
        return $resultat['Sound'];
        $codb = null;
    } catch (PDOException $e) {
        return "Message d'erreur : " . $e->getMessage() . "<br />";
    }
}

function selectimageby($id)
{
    include "config.php";
    try {
        $codb = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT Cover FROM Musique WHERE id=$id";
        $prepare = $codb->prepare($sql);
        $prepare->execute();
        $resultat = $prepare->fetch(PDO::FETCH_ASSOC);
        echo  $resultat['Cover'];
        return $resultat['Cover'];
        $codb = null;
    } catch (PDOException $e) {
        return "Message d'erreur : " . $e->getMessage() . "<br />";
    }
}
