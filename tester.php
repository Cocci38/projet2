<?php
include 'config.php';
//include 'tools.php';
function IsDir_or_CreateIt($path)
{
    if (is_dir($path)) {
        return true;
    } else {
        if (mkdir($path)) {
            return true;
        } else {
            return false;
        }
    }
}


$path = 'sound';
echo "[SCRIPT_NAME] => " . $file . "<br>";
$WebWay = strstr($file, $file2, true);
$local = $_SERVER['DOCUMENT_ROOT'];
echo $local . $WebWay . $path;
echo " basename de SCRIPT_FILENAME -->" . basename($_SERVER['SCRIPT_FILENAME']) . "<br>";
echo  "strstrf1 f2 true" . $WebWay . "<br>";
echo "stristrf1 f2 true" . stristr($file, $file2, true) . "<br>";
echo "stristrf1 f2 false" . stristr($file, $file2, true) . "<br>";
$rep_sound = "sound/";
$rep_image = "image/";

$local_sound = $local . $WebWay . $rep_sound;
echo $local_sound;
echo IsDir_or_CreateIt($local_sound);
