<? php;
include 'tools.php';
$path = 'sound';
echo IsDir_or_CreateIt($path);
echo basename($_SERVER["FILENAME_SCRIPT"]);
echo pathinfo("/testweb/test.txt", PATHINFO_EXTENSION);
phpinfo();