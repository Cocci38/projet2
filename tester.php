<?php include 'add.php';
include 'tools.php';
$path = 'sound';
echo IsDir_or_CreateIt($path);
echo substr('abcdef', -3, 1);
echo pathinfo("/testweb/test.txt", PATHINFO_EXTENSION);
phpinfo();
