<?php //select id Max
function select_Max_id()
{
    include 'config.php';

    try {

        $codb = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*$sql = "SELECT AUTO_INCREMENT as Id FROM Musique";
        $prepare = $codb->prepare($sql);
        $prepare->execute();
        $auto = $prepare->fetch(PDO::FETCH_ASSOC);*/
        $sql2 = "SELECT max(id) as Id FROM Musique";
        $prepare2 = $codb->prepare($sql2);
        $prepare2->execute();
        $max = $prepare2->fetch(PDO::FETCH_ASSOC);
        if ($max['Id'] == NULL) {
            return 0;
        } else {
            return $max['Id'];
        }
        $codb = null;
    } catch (PDOException $e) {

        return "Message d'erreur : " . $e->getMessage() . "<br />";
    }
}

function selectElmentby($element, $id)
{
    include 'config.php';
    try {
        $codb = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT $element FROM $table Where Id=$id";
        $prepare = $codb->prepare($sql);
        $prepare->execute();
        $resultat = $prepare->fetch(PDO::FETCH_ASSOC);
        $codb = null;
    } catch (PDOException $e) {
        return "Message d'erreur : " . $e->getMessage() . "<br />";
    }
    return $resultat[$element];
}

function select_All()
{
    include 'config.php';
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
function select_by_Id($id)
{
    include 'config.php';


    try {
        $codb = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
