<div class='container'>
    <h4>Formulaire d'insertion de musique</h4>
    <!--formulaire debut-->
    <form method='POST' enctype='multipart/form-data' action='inserer.php'>
        <!-- 2 premiers champs artiste et  titre-->
        <div class='row mb-3'>
            <div class='col'>
                <label for='Titre'>Titre</label>
                <textarea name='Titre' type='text' class='form-control' id='Titre' required></textarea>
            </div>
            <div class='col'>
                <label for='Artiste'>Artiste</label>
                <textarea name='Artiste' type='text' class='form-control' id='Artiste'></textarea>
            </div>
        </div>
        <!--nom de l'album et genre-->
        <div class='row mb-3'>
            <div class='col'>
                <label for='Album'>Album</label>
                <textarea name='Album' type='text' class='form-control' id='Album'></textarea>
            </div>
            <div class='col'>
                <label for='Genre'>Genre</label>
                <textarea name='Genre' type='text' class='form-control' id='Genre'></textarea>
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
    <input id='Etat' name='Etat' type='hidden' value='ADD'>
</div>
</form>
</div>