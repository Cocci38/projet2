<form action='' method='post' enctype='multipart/form-data'>

    <div>

        <label>Cover_image</label>
        <input type='file' name='cover_image' />
        <label>File_Sound</label>
        <input type='file' name='file_Sound' />

    </div>
    <div>
        <label>Enregistrer</label>
        <input type='submit' value='cliquez pour enregistrer' />
    </div>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo $_FILES['cover_image']['name'] . "<br>"; /* nom du cover_image */
    echo $_FILES['cover_image']['type'] . "<br>"; /* type du cover_image */
    echo $_FILES['cover_image']['size'] . "<br>"; /* taille en octets */
    echo $_FILES['cover_image']['tmp_name'] . "<br>"; /* emplacement du cover_image temporaire sur le serveur */
    echo $_FILES['cover_image']['error'] . "<br>";/* code erreur du téléchargement */
    echo "---------------------------------------------";
    echo $_FILES['file_sound']['name'] . "<br>"; /* nom du file_sound */
    echo $_FILES['file_sound']['type'] . "<br>"; /* type du file_sound */
    echo $_FILES['file_sound']['size'] . "<br>"; /* taille en octets */
    echo $_FILES['file_sound']['tmp_name'] . "<br>"; /* emplacement du file_sound temporaire sur le serveur */
    echo $_FILES['file_sound']['error'] . "<br>";/* code erreur du téléchargement */
}
$origine_cover = $_FILES['cover_image']['tmp_name'];
$destination_cover = 'cover_image/' . $_FILES['cover_image']['name'];
echo $origine_cover . '||' . $destination_cover;
$move_uploaded_file($origine_cover, $destination_cover);

$origine_sound = $_FILES['file_sound']['tmp_name'];
$destination_sound = 'sound/' . $_FILES['file_sound']['name'];
echo $origine_cover . '||' . $destination_sound;
$move_uploaded_file($origine_sound, $destination_sound);
?>