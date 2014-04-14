<?php
	session_start ();
	//Archivos requeridos
	require_once '../config/config.php';
	require_once '../config/conexion.php';
	require_once '../usuario/verUser.php';

	$bdCon = conectarbd();
	//Verificamos si el usuario no esta conectado
	if ( !empty( $_SESSION['usuario'] ) && !empty($_SESSION['password']) ) {
		$arrUsuario = verUser( $_SESSION['usuario'], $_SESSION['password'], $bdCon);
	}
	//Definimos consulta de todos los usuarios
	$query = "SELECT idUsuario, usuario, departamento, email, tipo FROM `usuarios`";
	$arrUsers = mysql_query($query,$bdCon);

?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Ver Usuarios</title>
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
					<li><a href="../admin.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-file"></span> Nuevo Artículo</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-edit"></span> Editar Artículos</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-list"></span> Categorías</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-left">
					<?php
						if ( $arrUsuario['tipo'] == 'admin') {	?>
						<li class="dropdown active">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> Administrar</strong> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="register.php"><span class="glyphicon glyphicon-plus"></span> Nuevo usuario</a></li>
								<li><a href="ver.php"><span class="glyphicon glyphicon-eye-open"></span> Ver Usuarios</a></li>
								<li class="divider"></li>
								<li><a href="delete.php"><span class="glyphicon glyphicon-trash"></span> Eliminar Usuario</a></li>
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
							<li><a href="../usuario/logout.php"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div> <!-- Fin container-fluit-->
	</nav>
	<div class="container-fluit">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-6 col-md-offset-3 well">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Id</th>
								<th>Usuario</th>
								<th>Departamento</th>
								<th>Email</th>
								<th>Tipo</th>
							</tr>
						</thead>
						<tbody class="text-left">
							<?php while ( $row = mysql_fetch_array($arrUsers)) { ?>
							<tr>
								<td><?php echo $row['idUsuario']; ?></td>
								<td><?php echo $row['usuario']; ?></td>
								<td><?php echo $row['departamento']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['tipo']; ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script src="/static/js/vendor/bootstrap.min.js"></script>
</body>
</html>