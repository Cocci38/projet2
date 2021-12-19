<!DOCTYPE html>
<html lang="fr">

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

    <body>
        <?php
        include 'nav.php';
        include 'message.php';
            require 'tools.php';
        ?>
        <main>
            <?php
            if (isset($_GET['Id'])) {
                include 'delete.php';
                echo MSG_SUCCESS_DEL_MUSIC;
            }
            if (select_Max_id() == 0) {
                echo MSG_WARNING_LISTE_MUSIQUE_EMPTY;
                include 'container_dashboard_list_vide.php';
            } else {

                echo MSG_WARNING_MUSIC_NOT_SELECTIONNED;
                include 'container_dashboard_list.php';
            } ?>
        </main>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>