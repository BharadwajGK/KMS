<?php
	if(isset($_SESSION['login']))
	{
		$_SESSION=array();
		if(isset($_COOKIE[sesson_name()]))
		{
			setcookie(session_name(),' ',time()-3600);
		}
		session_destroy();
	}
	setcookie('username', ' ',time()-3600);
	header('Location: http://localhost/xampp/KMS/Login.html');
?>