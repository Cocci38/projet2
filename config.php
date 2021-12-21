<?php
$servername = $_SERVER["SERVER_NAME"];
$username = "root";
$password = "";
$table = "musique";
//define('DBname','mamusique');
$dbname = "mamusique";
$namedb = "mamusique";
$rep_sound = "sound/";
$rep_image = "image/";
//$baserelative = 'p2/projet2/';
$baserelative = strstr($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_NAME'], true));