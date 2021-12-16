<!DOCTYPE html>
<html lang='fr'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='CSS\style.css'>
    <title>Document</title>
</head>

<body>
    <?php
    include 'nav.php';
    include 'select.php';
    if ($_GET['Id']) {
        echo "||" . $_GET['Id'] . "||";
    }
    $musicmodif = select_by_Id($_GET['Id']);

    ?>
    <div class='container'>
        <h4>Formulaire de modification de musique</h4>
        <form method='POST' enctype='multipart/form-data' action=''>
            <div class='row mb-3'>
                <div class='col'>
                    <label for='Titre'>Titre</label>
                    <input name='Titre' type='text' class='form-control' id='Titre' required value=<?= $musicmodif['Titre'] ?>'>
                </div>
                <div class='col'>
                    <label for='Artiste'>Artiste</label>
                    <input name='Artiste' type='text' class='form-control' id='Artiste' value='<?= $musicmodif['Artiste'] ?>'>
                </div>
            </div>
            <div class='row mb-3'>
                <div class='col'>
                    <label for='Album'>Album</label>
                    <input name='Album' type='text' class='form-control' id='album' value='<?= $musicmodif['Album'] ?>'>
                </div>
                <div class='col'>
                    <label for='genre'>Genre</label>
                    <input name='Genre' type='text' class='form-control' id='Genre' value='<?= $musicmodif['Genre'] ?>'>
                </div>
            </div>
            <div class='row mb-3'>

                <div class='col'>
                    <div class='image-upload'>
                        <label for='Sound'>
                            <img src='img\cover1.png' width='100px' />
                        </label>
                        <?= empty($musicmodif['Sound']) ? "<input name='Sound' id='Sound' type='file' required />" : "  
                                                        <p>
                                                            <input name='Sound' id='Sound' type='file' required />
                                                            <audio title='" . $musicmodif['Titre'] . "' preload='auto' controls loop>
                                                                <source src='" . $musicmodif['Sound'] . "' type='audio/mp3'>
                                                            </audio>
                                                        </p>"
                        ?>
                    </div>
                </div>
                <div class='col'>
                    <div class='image-upload'>
                        <label for='Cover'>
                            <?= empty($musicmodif['Cover']) ? "<img src='img\sound2.png' width='100px' />" : "<img src='" . $musicmodif['Cover'] . "'>" ?>
                        </label>
                        <input name='Cover' id='Sound' type='file' required />
                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>
    <div class='container'>
        <form method='POST' enctype='multipart/form-data' action=''>
            <button type='submit' class='btn text-white' style='background-color: #16ade1;'>Valider</button>
            <button type='cancel' class='btn text-white' style='background-color: #1b3954;'>Annuler</button>
        </form>

    </div>
</body>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>

</html>