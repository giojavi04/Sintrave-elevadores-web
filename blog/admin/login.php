<?php
//include config
require_once('../includes/config.php');


//check if already logged in
if( $user->is_logged_in() ){ header('Location: index.php'); } 
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Administrador Blog | Sintrave Elevadores</title>
	<!-- Seo -->
	<link rel="shortcut icon" href="/static/img/favicon.ico" />
	<meta name="description" content="Sitio oficial que presenta toda la información sobre la empresa que se dedica a la venta, puesta en marcha y mantenimiento de todas las marcas de ascensores"/>
	<meta property="og:title" content="Sintrave Elevadores" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://sintrave.com/"/>
    <meta property="og:image" content="http://sintrave.com/static/img/logo_sintrave.png" />
    <meta property="og:site_name" content="Sintrave Elevadores" />
    <!-- End Seo -->
	<link rel="stylesheet" href="/static/css/normalize.min.css" />
	<link rel="stylesheet" href="/static/css/main.css" />
	<script src="/static/js/vendor/jquery-2.1.0.min.js"></script>
	<script src="/static/js/vendor/modernizr.custom.js"></script>
</head>
<body>
		<?php

		//process login form if submitted
		if(isset($_POST['submit'])){

			$username = trim($_POST['username']);
			$password = trim($_POST['password']);
			
			if($user->login($username,$password)){ 

				//logged in return to index page
				header('Location: index.php');
				exit;
			

			} else {
				$message = '<div class="sign-up-error">Datos ingresados incorrectamente!</div>';
			}

		}//end if submit

		if(isset($message)){ echo $message; }
		?>
		
		<form action="" class="sign-up" method="post">
	    <h2 class="sign-up-title">Login</h2>
		    <input type="text" class="sign-up-input" name="username" placeholder="Usuario:" autofocus required>
		    <input type="password" class="sign-up-input" name="password" placeholder="Contraseña:" required>
		    <input type="submit" name="submit" value="Ingresar" class="sign-up-button">
  		</form>
</body>
</html>