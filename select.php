<?php
//select id Max
function select_Max_id()
{
    include "config.php";
    try {

        $codb = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        //version base sur l'auto_increment
        $sql2 = "SELECT AUTO_INCREMENT AS  nb 
                    FROM information_schema.tables
                    WHERE table_name = 'musique'
                    AND table_schema = DATABASE( )";
        $prepare2 = $codb->prepare($sql2);
        $prepare2->execute();

        echo "<h1>LA VERSION AUTO INCREMENT RENVOIE:</h1> <br>";
        $resultat2 = $prepare2->fetch(PDO::FETCH_ASSOC);
        if ($resultat2['nb'] > 1) {

            echo "Auto_increment ->" . $resultat2['nb'] . "<br>";
            echo "et les fichiers se nommeront xxx_" . $resultat2['nb'] . "<br";
        } else {
            echo "AUTO_INCREMENT = 0<br>";
        }
        echo "<h1>LA VERSION MAX ID RENVOIE:</h1><br>";
        //version mbase sur le max
        $sql = "SELECT max(id) as id FROM Musique";
        $prepare = $codb->prepare($sql);
        $prepare->execute();
        $resultat = $prepare->fetch(PDO::FETCH_ASSOC);
        if ($resultat['id'] != NULL) {
            echo "||DERNIER id Musique TROUVER dans la liste||-->" . $resultat['id'] . "<br";
            echo "et les fichiers se nommeront xxx_" . $resultat['id'] . "<br";
            return $resultat['id'];
        } else {
            echo "||MAX(id) non defini ->il n'y a pas de musique||--> 0<br>";
            echo "et les fichiers se nommeront xxx_0.ext<br";
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
    include "config.php";
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

function selectsoundby($id)
{
    include "config.php";
    try {
        $codb = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $codb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connexion réussie<br />';
        echo 'Sélection des roles ordonnés par ordre alphabétique <br />';
        $sql = "SELECT cover file FROM Musique WHERE id=$id";
        $prepare = $codb->prepare($sql);
        $prepare->execute();
        $resultat = $prepare->fetch(PDO::FETCH_ASSOC);
        return $resultat['sound'];
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
        echo 'Connexion réussie<br />';

        $sql = "SELECT cover file FROM Musique WHERE id=$id";
        $prepare = $codb->prepare($sql);
        $prepare->execute();
        $resultat = $prepare->fetch(PDO::FETCH_ASSOC);
        return $resultat['image'];
        $codb = null;
    } catch (PDOException $e) {
        return "Message d'erreur : " . $e->getMessage() . "<br />";
    }
}



