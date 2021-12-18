<!DOCTYPE html>
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
<title>Dashboard</title>
</head>

<body>
   <?php
   include 'nav.php';
   include 'tools.php';
   include 'select.php';
   include 'message.php';
   ?>
   <main>
      <?php

      if (isset($_GET['Etat'])) {
         switch ($_GET(['Etat'])) {
            case 'DEL':
               echo 'ETAT GET ->DEL';
               include 'delete.php';
               if (select_Max_id() == 0) {
                  echo 'ETAT GET ->DEL MAX_ID null';
                  include 'container_dashboard_list_vide.php';
                  break;
               } else {
                  echo 'ETAT GET ->DEL MAX_ID non null';
                  include 'container_dashboard_list.php';
                  echo MSG_SUCCESS_DEL_MUSIC;
                  break;
               }
            case 'UP':
               echo 'ETAT GET ->UP';
               include 'modif_form.php';
               echo MSG_SUCCESS_DEL_MUSIC;
               break;
            default:
               if (select_Max_id() == 0) {
                  echo MSG_WARNING_LISTE_MUSIQUE_EMPTY;
                  include 'container_dashboard_list_vide.php';
               } else {
                  //echo MSG_WARNING_MUSIC_NOT_SELECTIONNED;
                  include 'container_dashboard_list.php';
               }
         }
      }
      if (isset($_POST['Etat'])) {
         switch ($_POST['Etat']) {
            case 'ADD':
               echo 'ETAT POST ->ADD';
               include 'add.php';
               echo MSG_SUCCESS_ADD_MUSIC;
               include 'container_dashboard_list.php';
               // include 'container_dashboard_list.php';
               break;
            case 'UP':
               echo 'ETAT POST ->UP';
               include 'update.php';
               echo MSG_SUCCESS_UP_MUSIC;
               // include 'container_dashboard_list.php';
               break;
            case 'DEL':
               echo 'ETAT POST ->DEL';
               break;
            default:
               echo 'ETAT POST ->DASH';
               include 'container_dashboard_list.php';
               break;
         }
      
      } else {
         echo 'ETAT GET ET GET -> non defini';
         echo select_Max_id();
         if (select_Max_id() == 0) {
            echo "ETAT GET ET POST Non defini et id_max= 0";
            echo MSG_WARNING_LISTE_MUSIQUE_EMPTY;
            include 'container_dashboard_list_vide.php';
         } else {
            echo "ETAT GET ET POST Non defini et id_max= une valeur";
            //echo MSG_WARNING_MUSIC_NOT_SELECTIONNED;
            include 'container_dashboard_list.php';
         }
      } ?>
   </main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>