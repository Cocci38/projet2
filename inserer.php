<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
                 <a class="nav-link" href="#">Insérer</a>
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
    </header>
    <main>
      <div class="container">
         <h4>Formulaire d'insertion de musique</h4>
         <form method="POST" enctype="multipart/form-data" action="">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="titre">Titre</label>
                            <input type="text" class="form-control" id="titre" placeholder="">   
                        </div>
                        <div class="col">
                            <label for="artiste">Artiste</label>
                            <input type="text" class="form-control" id="artiste" placeholder="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="album">Album</label>
                            <input type="text" class="form-control" id="album" placeholder="">
                        </div>
                        <div class="col">
                            <label for="genre">Genre</label>
                            <input type="text" class="form-control" id="genre" placehorder="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <img src="chemindaccesdelimage" id="image1">
                            <label for="cover_image">Cover</label>
                            <input type="file" name="cover_image" class="form-control-file" id="cover_image" placeholder="">
                        </div>
                        <div class="col">
                            <label for="file_sound">Fichier</label>
                            <input type="file" name="file_sound" class="form-control-file" id="file_sound" placeholder="">
                        </div>
                    </div>                 
                    </div>
                </form>
    </div>
    <div class="container">
                <form method="POST" enctype="multipart/form-data" action="">                
                        <button type="submit" class="btn" style="background-color: #40A497;">Valider</button>
                        <button type="cancel" class="btn" style="background-color: #40A497;">Annuler</button>
                </form>
      </div>
    </main>
    <footer>

    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>