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
    <title>Document</title>
</head>
<body>
<header>
      <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #1b3954;">
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
       <div class="container py-4">
         <div class="h-100 p-5 bg-light border rounded-3">
               <p class="text-center fs-3">La suppression de(s) musique(s) est effectuée(s)</p>
         </div>
       </div>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>