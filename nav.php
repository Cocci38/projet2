<header>
   <?php $page = basename($_SERVER["SCRIPT_FILENAME"]); ?>
   <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #1b3954;">
      <div class="container-fluid">
         <!-- Brand -->
         <a class="navbar-brand " href="index.php">Dashboard</a>

         <!-- Toggler/collapsibe Button -->
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
         </button>

         <!-- Navbar links -->
         <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link <?php if ($page == 'inserer.php') {
                                          echo 'active';
                                       } ?>" href="inserer.php">Insérer</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link <?php if ($page == 'modifier.php') {
                                          echo 'active';
                                       } ?>" href="modifier.php">Modifier</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link <?php if ($page == 'supprimer.php') {
                                          echo 'active';
                                       } ?>" href="supprimer.php">Supprimer</a>
               </li>
               <li class="nav-item">
<<<<<<< HEAD
<<<<<<< HEAD
                  <a class="nav-link <?php if ($page == 'logout.php') {
                                          echo 'active';
                                       } ?>" href="logout.php"><button type='button' class='btn clipboard'><i class='bi bi-box-arrow-right'></i></button></a>
               </li>
=======
                  <a class="nav-link" href="inscription.php">S'inscrire
                  </a>

               </li>
                  <li class="nav-item">
                     <a class="nav-link" href="login.php">Se connecter
                     </a>
                  </li>
>>>>>>> e8a2602dd2b5a7af1aca0a37d2715c0331e0d687
=======
                  <a class="nav-link" <?php if ($page == 'inscription.php') {
                                             echo 'active';
                                       } ?> href="inscription.php">S'inscrire</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" <?php if ($page == 'login.php') {
                                             echo 'active';
                                       } ?>href="login.php">Se déconnecter</a>
               </li>             
>>>>>>> db0b5be68daaf41f24943bbea88361a2f46c676f
            </ul>
         </div>

   </nav>
   <!--<div class=img-fluid><img src="img\fond.png"  width="100%" height="auto" class="img-fluid">-->
</header>