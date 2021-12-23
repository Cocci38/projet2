<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang='fr'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'>
    </script>
    <link rel='stylesheet' href='CSS\style.css'>
    <title>Modifier</title>
</head>

<body>
    <?php
    include 'nav.php';
    require 'tools.php'; ?>
    <!-- si la provenance du fichier vient de get ok-> -->
    <?php
    if (isset($_GET['Id'])) {
        $musicmodif = select_by_Id($_GET['Id']);
        echo
        "<main>
        <div class='container'>
            <h4>Formulaire de modification de musique</h4>
            <!--formulaire debut MODIF-->
            <form method='POST' enctype='multipart/form-data' action='modifier.php'>
                <!-- 2 premiers champs artiste et  titre-->
                <div class='row mb-3'>
                    <div class='col'>
                        <label for='Titre'>Titre</label>
                        <input name='Titre' type='text' class='form-control' id='Titre' required value='" . $musicmodif['Titre'] . "'>
                   </div>
                    <div class='col'>
                        <label for='Artiste'>Artiste</label>
                            <input name='Artiste' type='text' class='form-control' id='Artiste' value='" . $musicmodif['Artiste'] . "'>
                    </div>
                </div>
                <!--nom de l'album et genre-->
                <div class='row mb-3'>
                    <div class='col'>
                        <label for='Album'>Album</label>
                        <input name='Album' type='text' class='form-control' id='album' value='" . $musicmodif['Album'] .
            "'>
                    </div>
                    <div class='col'>
                        <label for='genre'>Genre</label>
                        <input name='Genre' type='text' class='form-control' id='Genre' value='" . $musicmodif['Genre'] .
            "'>
                    </div>
                </div>
                <!--fichier Cover&Sound-->
                <div class='row mb-3'>
                    <!--fichier Sound-->
                    <div class='col'>
                        <div class='image-upload'>
                            <label for='Sound'>
                                <img src='img\sound2.png' width='100px' />
                            </label>
                            <p>
                             <input name='Sound' id='Sound' type='file' value=''>
                                <audio title='" . $musicmodif['Titre'] . "' preload='auto' controls loop>";
        if (strstr($musicmodif['Sound'], 'mp3')) {
            echo "<source src='sound" . $musicmodif['Sound'] . "' type='audio/mp3'>";
        }
        if (strstr($musicmodif['Sound'], 'ogg')) {
            echo "<source src='sound" . $musicmodif['Sound'] . "' type='audio/ogg'>";
        }
        echo
        " 
                                </audio>
                            </p>
                        </div>
                    </div>
                    <!--fichier Cover -->
                    <div class='col'>
                        <div class='image-upload'>
                            <label for='Cover'>";
        if (empty($musicmodif['Cover'])) {
            echo "<img src='img/sound2.png' width='100px' />";
        } else {
            echo "<img src='image/" . $musicmodif['Cover'] . "' width='100px'>";
        }

        echo "              </label>
                            <input name='Cover' id='Cover' type='file' />
                        </div>
                    </div>
                </div>
                <!-- bouton -->
                <div class='container'>
                    <button type='submit' class='btn text-white' style='background-color: #16ade1;'>Valider</button>
                    <button type='reset' class='btn text-white' style='background-color: #1b3954;'>Annuler</button>
                    <input id='Etat' name='Etat' type='hidden' value='UP'>
                    <input id='Id' name='Id' type='hidden' value='" . $musicmodif['Id'] . "'>
                </div>
            </form>
        </div>
    </main>";
        //unset($_GET['id']);
    }
    ?>
    <footer>
    </footer>
</body>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>

</html>