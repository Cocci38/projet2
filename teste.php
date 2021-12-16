<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="CSS\style.css">
    <title>Document</title>
</head>
<body>
 <?php 
    include 'nav.php';
 ?>
    <main>
    <div class="container">
        <div class="h-100 p-5 bg-light border rounded-3">
            <div class="position-relative">
            <a href="inserer.php"><button type="button" class="btn btn-light btn-lg border"><img src="img\sound2.png" class="img-fluid" alt="Bouton Ajouter"> Ajouter</button></a>
            </div>
    <?php
    $nbmorceau = 12;
    echo "<div class='accordion' id='accordionExample'>";
    for ($compteur = 1; $compteur <= $nbmorceau; $compteur++) {
        if ($compteur == 1) {
            $btn_class = "accordion-button";
            $div_class = "accordion-collapse collapse show";
            $btn_expended = "arial-expended='true'";
        } else {
            $btn_class = "accordion-button collapsed";
            $div_class = "accordion-collapse collapse";
            $btn_expended = "arial-expended='false'";
        }

        echo "
        <div class='accordion-item'>
                    <h2 class='accordion-header' id='heading$compteur'>
                            <button class='$btn_class' type='button' data-bs-toggle='collapse' data-bs-target='#collapse$compteur' $btn_expended aria-controls='collapse$compteur'>
                            Titre de la Musique$compteur
                            </button>
                    </h2>
        <div id='collapse$compteur' class='$div_class' aria-labelledby='heading$compteur' data-bs-parent='#accordionExample'>
            <div class='accordion-body'>
                <div class='container'>
                    <div class='row'>
                        <div class='col'>
                            <p>
                                <strong>Nom de l'Artiste  $compteur</strong>
                            </p>
                        </div>
                        <div class='col'>
                            <p>
                                <strong>Album  $compteur</strong>
                            </p>
                        </div>
                        </div>
                    <div class='row'>
                        <div class='col'>
                            <p>
                                <strong>Genre  $compteur</strong>
                            </p>
                        </div>
                        <div class='col'>
                            <p>
                                <strong><img src='img\cover1.png' width='100px'>  $compteur</strong>
                            </p>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col'>
                            <p>
                                <strong><audio title='titreadefinir' preload='auto' controls loop><source src='sourceadefinir.mp3 type='audio/mp3'></audio>   $compteur</strong>
                            </p>
                        </div>
                        <div class='col'>
                            <p>
                            <a href='delete.php?id=^$><button type='button' class='btn btn-outline-secondary float-end btn-lg'><i class='bi bi-trash'></i></button></a>
                            <a href='modifier'modifier.php?id=><button type='button' class='btn btn-outline-warning me-md-2 float-end btn-lg'><i class='bi bi-pencil'></i></button></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>         
            ";
    }
    echo "</div>";

    ?>
        </div>
    </div>
    </main>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>