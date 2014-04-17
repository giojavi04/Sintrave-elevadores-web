<?php
//Iniciamos sesion
session_start ();
//Archivos requeridos
require_once ($_SERVER['DOCUMENT_ROOT'].'/release/blog/usuario/verUser.php');

$usuarioClass = new usuariosClass();

//Verificamos si el usuario no esta conectado
if ( !empty( $_SESSION['usuario'] ) && !empty($_SESSION['password']) ) {
	if ( $usuarioClass->$a_users( $_SESSION['usuario'], $_SESSION['password']) ) {
		header( 'Location: admin.php' );
		die;
	}
}

//Validar Formulario y enviar a administrador
if(!empty($_POST['submit'])) {

	//definimos variables
	$usuario  = mysql_real_escape_string($_POST['usuario']);
	$password = md5($_POST['password']);
	$arrUsuario = array($usuario, $password);

		//Verificamos si el usuario ingresado es correcto
		if( $arrUsuario = verUser($usuario,$password,$bdCon)) {
			//Definimos sesiones
			$_SESSION['usuario'] = $arrUsuario['usuario'];
			$_SESSION['password'] = $arrUsuario['password'];
			header('Location: admin.php?login=true');
			die;
		} else {
			echo '<div class="sign-up-error">Datos ingresados incorrectamente!</div>';
		}
}

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
	<form action="admin-login.php" class="sign-up" method="post">
	    <h2 class="sign-up-title">Login</h2>
	    <input type="text" class="sign-up-input" name="usuario" placeholder="usuario:" autofocus required>
	    <input type="password" class="sign-up-input" name="password" placeholder="Contraseña:" required>
	    <input type="submit" name="submit" value="Ingresar" class="sign-up-button">
  </form>
</body>
</html>