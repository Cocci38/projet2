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
//$file2 = basename($_SERVER['SCRIPT_FILENAME']);

$path = 'sound';
echo "[SCRIPT_NAME] => " . $file . "<br>";
$baserelive = strstr($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_NAME'], true));

echo "base relative: " . $baserelative;

//$valeur = substr($file, $file2);
//echo "SCRIPT_NAME" . $file . "<Br>";
echo " Script_file_name-->" . basename($_SERVER['SCRIPT_FILENAME']) . "<Br>";
echo " Document_name-->" . $_SERVER['DOCUMENT_ROOT'] . "<Br>";
echo " Server_name-->" . $_SERVER['SERVER_NAME'] . "<Br>";
//echo "Substring->" . $valeur;


echo "<br>";


echo IsDir_or_CreateIt($path);
echo pathinfo("/testweb/test.txt", PATHINFO_EXTENSION);
print_r($_SERVER);