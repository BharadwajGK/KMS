<?php
session_start();
session_destroy();
$_SESSION = array();
sleep(3);
echo 'You\'ll be redirected in about 5 secs';
header('Location: http://localhost/xampp/KMS/logout.html');	
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>