<?php
$serveur = "localhost";
$dbname = "validationformulaire";
$namedb = "mamusique";
$user = "root";
$pass = "";
try {
    $dbco = new PDO("mysql:host=$serveur;dbname=$namedb", $user, $pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch 
    (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
}
if(!empty($POST['mail']) && !empty($_POST['password']))
{
    $mail = htmlspecialchars($_POST['mail']);
    $password = hash('sha256', htmlspecialchars($_POST['password']));

    $mail = strtolower($mail);

    $check = $bdd->prepare('SELECT name, mail, password FROM inscription WHERE mail = ?');
    $check->execute(array($mail));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row > 0)
        {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL))
            {
                if(password_verify($password, $data['password']))
                {
                    $_SESSION['user'] = $data['mail'];
                    header('Location: index.php');
                    die();
                }else{ header('Location: enregistrement.php?login_err=password'); die(); }
            }else{ header('Location: enregistrement.php?login_err=email'); die(); }
        }else{ header('Location: enregistrement.php?login_err=already'); die(); }
    }else{ header('Location: enregistrement.php'); die();
}

?>