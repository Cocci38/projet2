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
$file = $_SERVER['SCRIPT_NAME'];
$file2 = basename($_SERVER['SCRIPT_FILENAME']);
$path = 'sound';
echo $file;
echo "//" . $file2;
$valeur = substr($file, $file2);
echo " Script_file_name-->" . basename($_SERVER['SCRIPT_FILENAME']);
echo " Document_name-->" . $_SERVER['DOCUMENT_ROOT'];
echo " Server_name-->" . $_SERVER['SERVER_NAME'];
echo "Substring->" . $valeur;


echo "<br>";


echo IsDir_or_CreateIt($path);
echo pathinfo("/testweb/test.txt", PATHINFO_EXTENSION);
phpinfo();