<?php
include 'config.php';
$liste = select_All();
foreach ($liste as $ligne) {
   echo "<div class='container'>";
   $compteur = $ligne['Id'];
   $Cover_vide = "<img src='img/cover1.png' width='100'>";
   // a faire test sur le nombre de ligne du tableau pour affecte le compteur
   echo "<div class='accordion' id='accordionExample'>";
   if ($compteur == select_Max_id()) {
      $btn_class = "accordion-button";
      $div_class = "accordion-collapse collapse show";
      $btn_expended = "arial-expended='true'";
   } else {
      $btn_class = "accordion-button collapsed";
      $div_class = "accordion-collapse collapse";
      $btn_expended = "arial-expended='false'";
   }

   echo "<div class='accordion-item'>
         <h2 class='accordion-header' id='heading$compteur'>
            <button class='$btn_class' type='button' data-bs-toggle='collapse' data-bs-target='#collapse$compteur' $btn_expended aria-controls='collapse$compteur'>" . $ligne['Titre'] . "</button>
         </h2>
         <div id='collapse$compteur' class='$div_class' aria-labelledby='heading$compteur' data-bs-parent='#accordionExample'>
            <div class='accordion-body'>
               <div class='container'>
                  <div class='row'>
                     <div class='col'>
                        <p>
                           <strong>" . $ligne['Artiste'] . "</strong>
                        </p>
                     </div>
                     <div class='col'>
                        <p>
                           <strong>" . $ligne['Album'] . "</strong>
                        </p>
                     </div>
                  </div>
                  <div class='row'>
                     <div class='col'>
                        <p>
                           <strong>" . $ligne['Genre'] . "</strong>
                        </p>
                     </div>
                     <div class='col'>
                        <p>";
   echo ($ligne['Cover'] == "") ? $Cover_vide : "<img src='" . $basenameWeb . $ligne['Cover'] . "'>";

   echo "              </p>
                        </div>
                     </div>
                     <div class='row'>
                        <div class='col'>
                           <p>
                              <audio title='" . $ligne['Titre'] . "' preload='auto' controls loop>
                                 <source src='" . $ligne['Sound'] . "' type='audio/mp3'>
                              </audio>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
</div>";
}
