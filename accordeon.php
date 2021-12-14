<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Accueil</title>
</head>

<body>
<header>
      <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #40A497;">
        <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand" href="#">Dashboard</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
           <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
           <ul class="navbar-nav">
              <li class="nav-item">
                 <a class="nav-link" href="inserer.php">Insérer</a>
              </li>
              <li class="nav-item">
                 <a class="nav-link" href="modifier.php">Modifier</a>
              </li>
              <li class="nav-item">
                 <a class="nav-link" href="supprimer.php">Supprimer</a>
              </li>
           </ul>
        </div>
      </div>
     </nav>
    </div>
    </header>
    <!--cas page d'acceuil-->

    <!--connection a la BD Musique-->
    <!--REQUETE si la base contient des morceaux de musique-->
    <!--bloc liste vide + un gros bouton inserer des morceaux-->
    <!---SINON liste non vide-->
    <!--Afficher toutes les morceaux de musique-->
    <div class="container">
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
                        <p>
                            <strong>Nom de l'Artiste  $compteur</strong>
                        </p>
                        </div>
                    </div>
                </div>
            ";
    }
    echo "</div>";

    ?>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>