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
    ?>
    <main>
        <div class='container'>
            <h4>Formulaire d'insertion de musique</h4>
            <!--formulaire debut-->
            <form method='POST' enctype='multipart/form-data' action='dashboard.php'>
                <!-- 2 premiers champs artiste et  titre-->
                <div class='row mb-3'>
                    <div class='col'>
                        <label for='Titre'>Titre</label>
                        <input name='Titre' type='text' class='form-control' id='Titre' required>
                    </div>
                    <div class='col'>
                        <label for='Artiste'>Artiste</label>
                        <input name='Artiste' type='text' class='form-control' id='Artiste'>
                    </div>
                </div>
                <!--nom de l'album et genre-->
                <div class='row mb-3'>
                    <div class='col'>
                        <label for='Album'>Album</label>
                        <input name='Album' type='text' class='form-control' id='Album'>
                    </div>
                    <div class='col'>
                        <label for='Genre'>Genre</label>
                        <input name='Genre' type='text' class='form-control' id='Genre'>
                    </div>
                </div>
                <!--fichier sound-->
                <div class='row mb-3'>
                    <div class='col'>
                        <div class='image-upload'>
                            <label for='Cover'>
                                <img src=img\cover1.png width='100px' />
                            </label>
                            <input name='Cover' id='Cover' type='file' />
                        </div>
                    </div>
                    <div class='col'>
                        <div class='image-upload'>
                            <label for='Sound'>
                                <img src=img\sound2.png width='100px' />
                            </label>
                            <input name='Sound' id='Sound' type='file' required />
                        </div>
                    </div>
                </div>
        </div>
        <div class='container'>
            <button type='submit' class='btn text-white' style='background-color: #16ade1;'>Valider</button>
            <button type='cancel' class='btn text-white' style='background-color: #1b3954;'>Annuler</button>
            <input id='Etat' name='Etat' type='hidden' value='add'>
        </div>
        </form>
        </div>
    </main>
    <footer>
    </footer>
</body>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>

</html>