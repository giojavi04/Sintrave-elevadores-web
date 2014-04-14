<?php
	session_start();
	session_unset();
	//borramos sesion
	session_destroy();
	header('Location: ../admin-login.php?logout=true');
	die;
?>