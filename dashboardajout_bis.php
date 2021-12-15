<!DOCTYPE html>
<?php
include('select.php') ?>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="CSS\style.css">
<title>Document</title>
</head>

<body>
   <header>
      <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #40A497;">
         <div class="container-fluid">
            <!-- Brand -->
            <a class="navbar-brand" href="accordeon.php">Dashboard</a>

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
                     <a class="nav-link" href="#">Supprimer</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
   </header>
   <main>
      <?php
      if (select_Max_id() == 0) {
         echo "<div class=\"container py-4\">
         <div class=\"h-100 p-5 bg-light border rounded-3\">
            <div class=\"d-grid gap-2 col-6 mx-auto\">
               <a href=\"inserer.php\"><button type=\"button\" class=\"btn btn-outline-secondary fs-4\"><i class=\"bi bi-music-note\"></i> Ajouter <i class=\"bi bi-music-note\"></i></button></a>
            </div>
         </div>
      </div>";
      } else {
         $liste = select_All();
         echo "<div class=\"container\">";
         foreach ($liste as $ligne) {
            $compteur = $ligne['Id'];
            foreach ($ligne as $key => $value) {
               echo "<div class='accordion' id='accordionExample'>";
               if ($compteur == 1) {
                  $btn_class = "accordion-button";
                  $div_class = "accordion-collapse collapse show";
                  $btn_expended = "arial-expended=\'true\'";
               } else {
                  $btn_class = "accordion-button collapsed";
                  $div_class = "accordion-collapse collapse";
                  $btn_expended = "arial-expended=\'false\'";
               }

               echo "<div class=\'accordion-item\'>
                           <h2 class=\'accordion-header\' id=\'heading$compteur\'>
                              <button class=\'$btn_class\' type=\'button\' data-bs-toggle=\'collapse\' data-bs-target=\'#collapse$compteur\' $btn_expended aria-controls=\'collapse$compteur\'>";
               echo $ligne['Titre'];
               echo "</button>
                           </h2>
                           <div id=\'collapse$compteur\' class=\'$div_class\' aria-labelledby=\'heading$compteur\' data-bs-parent=\'#accordionExample\'>
                              <div class=\'accordion-body\'>
                                 <div class=\'container\'>
                                       <div class=\'row\'>
                                          <div class=\'col\'>
                                             <p>
                                                <strong>" . $ligne['Artiste'] . "</strong>                                                
                                             </p>
                                          </div>
                                          <div class=\'col\'>
                                             <p>
                                                <strong>" . $ligne['Album'] . "</strong>
                                             </p>
                                          </div>
                                          </div>
                                       <div class=\'row\'>
                                          <div class=\'col\'>
                                             <p>
                                                <strong>" . $ligne['Genre'] . "</strong>
                                             </p>
                                          </div>
                                          <div class=\'col\'>
                                             <p>
               <strong><img src='";
               $vide = "img/cover1.png>";
               echo (empty($ligne['Cover'])) ? $vide : $ligne['Cover'];
               echo "</strong>
                                             </p>
                                          </div>
                                       </div>
                                       <div class=\'row\'>
                                          <div class=\'col\'>
                                             <p>
                                                   <strong><audio title=\'titreadefinir\' preload=\'auto\' controls loop><source src=\'sourceadefinir.mp3 type=\'audio/mp3\'></audio>   $compteur</strong>
                                             </p>
                                          </div>
                                       </div>
                                 </div>
                              </div>
                           </div>
                 </div>";
            }
         }
      }
      ?>
      </div>
      </div>
   </main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflagit pullre.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>