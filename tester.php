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
echo "[SCRIPT_NAME] => " . $file . "<br>";
$WebWay = strstr($file, $file2, true);
$local = $_SERVER['DOCUMENT_ROOT'];
echo $local . $WebWay . $path;
echo " basename de SCRIPT_FILENAME -->" . basename($_SERVER['SCRIPT_FILENAME']) . "<br>";
echo  "strstrf1 f2 true" . $WebWay . "<br>";
echo "stristrf1 f2 true" . stristr($file, $file2, true) . "<br>";
echo "stristrf1 f2 false" . stristr($file, $file2, true) . "<br>";




$baserelive = strstr($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_NAME']), true);
echo IsDir_or_CreateIt($path);
phpinfo();