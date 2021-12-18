<?php
$musicmodif = select_by_Id($_GET['Id']); ?>
<div class='container'>
    <h4>Formulaire de modification de musique</h4>
    <form method='POST' enctype='multipart/form-data' action='dashboard.php'>
        <div class='row mb-3'>
            <div class='col'>
                <label for='Titre'>Titre</label>
                <input name='Titre' type='text' class='form-control' id='Titre' required value=<?= $musicmodif['Titre'] ?>'>
            </div>
            <div class='col'>
                <label for='Artiste'>Artiste</label>
                <input name='Artiste' type='text' class='form-control' id='Artiste' value='<?= $musicmodif['Artiste'] ?>'>
            </div>
        </div>
        <div class='row mb-3'>
            <div class='col'>
                <label for='Album'>Album</label>
                <input name='Album' type='text' class='form-control' id='album' value='<?= $musicmodif['Album'] ?>'>
            </div>
            <div class='col'>
                <label for='genre'>Genre</label>
                <input name='Genre' type='text' class='form-control' id='Genre' value='<?= $musicmodif['Genre'] ?>'>
            </div>
        </div>
        <div class='row mb-3'>

            <div class='col'>
                <div class='image-upload'>
                    <label for='Sound'>
                        <img src='img\cover1.png' width='100px' />
                    </label>
                    <!-- ?= empty($musicmodif['Sound']) ? "<input name='Sound' id='Sound' type='file' value='".$musicmodif['Sound']." />" : "  -->
                    <p>
                        <input name='Sound' id='Sound' type='file' value='<?= $musicmodif['Sound'] ?>'>
                        <audio title='<?= $musicmodif['Titre'] ?>' preload='auto' controls loop>
                            <source src=<?= $musicmodif['Sound'] ?>' type='audio/mp3'>
                            <source src=<?= $musicmodif['Sound'] ?>' type='audio/ogg'>
                        </audio>
                    </p>"
                    ?>
                </div>
            </div>
            <div class='col'>
                <div class='image-upload'>
                    <label for='Cover'>
                        <?= empty($musicmodif['Cover']) ? "<img src='img\sound2.png' width='100px' />" : "<img src='" . $musicmodif['Cover'] . "'>" ?>
                    </label>
                    <input name='Cover' id='Sound' type='file' required />
                </div>
            </div>
        </div>

</div>
<div class='container'>
    <button type='submit' class='btn text-white' style='background-color: #16ade1;'>Valider</button>
    <button type='cancel' class='btn text-white' style='background-color: #1b3954;'>Annuler</button>
    <input id='Etat' name='Etat' type='hidden' value='UP'>
</div>
</form>
</div>