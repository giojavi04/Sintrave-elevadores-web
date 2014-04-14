<?php
	session_start ();
	//Archivos requeridos
	require_once 'config/config.php';
	require_once 'config/conexion.php';
	require_once 'usuario/verUser.php';

	$bdCon = conectarbd();
	//Verificamos si el usuario no esta conectado
	if ( !empty( $_SESSION['usuario'] ) && !empty($_SESSION['password']) ) {
		$arrUsuario = verUser( $_SESSION['usuario'], $_SESSION['password'], $bdCon);
	}	
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Bienvenido <?php echo $_SESSION['usuario']; ?></title>
	<!-- Seo -->
	<link rel="shortcut icon" href="/static/img/favicon.ico" />
	<meta name="description" content="Sitio oficial que presenta toda la información sobre la empresa que se dedica a la venta, puesta en marcha y mantenimiento de todas las marcas de ascensores"/>
	<meta property="og:title" content="Sintrave Elevadores" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://sintrave.com/"/>
    <meta property="og:image" content="http://sintrave.com/static/img/logo_sintrave.png" />
    <meta property="og:site_name" content="Sintrave Elevadores" />
    <!-- End Seo -->
    <!-- CSS -->
	<link rel="stylesheet" href="/static/css/normalize.min.css" />
	<link rel="stylesheet" href="/static/css/main.css" />
	<link rel="stylesheet" href="/static/css/bootstrap.min.css">
	<!-- End CSS -->
	<!-- JS -->
	<script src="/static/js/vendor/jquery-2.1.0.min.js"></script>
	<script src="/static/js/vendor/modernizr.custom.js"></script>
	<!-- END JS -->
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Grupo  -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
				<a href="/" class="navbar-brand" target="_blank">Sintrave Elevadores</a>
			</div>
			<div class="navbar-collapse in" id="navbarCollapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="admin.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-file"></span> Nuevo Artículo</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-edit"></span> Editar Artículos</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-list"></span> Categorías</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-left">
					<?php
						if ( $arrUsuario['tipo'] == 'admin') {	?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> Administrar</strong> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="administrator/register.php"><span class="glyphicon glyphicon-plus"></span> Nuevo usuario</a></li>
								<li><a href="administrator/ver.php"><span class="glyphicon glyphicon-eye-open"></span> Ver Usuarios</a></li>
								<li class="divider"></li>
								<li><a href="administrator/delete.php"><span class="glyphicon glyphicon-trash"></span> Eliminar Usuario</a></li>
							</ul>
						</li>
					<?php	}
					?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Logueado como <strong><?php echo $arrUsuario['departamento']; ?></strong> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#"><span class="glyphicon glyphicon-wrench"></span> Configuración</a></li>
							<li class="divider"></li>
							<li><a href="usuario/logout.php"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div> <!-- Fin container-fluit-->
	</nav>
	<div class="container-fluit">
		<div class="row">
			<div class="col-md-12">
				<h1>Bienvenido a la administracion del Blog</h1>

				<p>
				A super admin interface for your projects !
				For more information about usage, visit <a href="http://twitter.github.com/bootstrap/"
				                                       target="_blank">Bootstrap</a><br><br>
				<a class="btn btn-primary btn-large" href="#">Layout Options &raquo;</a>
				</p>
		</div>
	</div>
	<script src="/static/js/vendor/bootstrap.min.js"></script>
</body>
</html>