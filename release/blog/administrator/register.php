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
	//Verificamos si el form se ha enviado
	if( !empty($_POST['submit']) ) {
		//Definiendo variables
		$usuario  = mysql_real_escape_string($_POST['usuario']);
		$departamento = $_POST['departamento'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		$email = $_POST['email'];
		$tipo = $_POST['tipo'];
		//Verificar si las contraseñas son correctas
		if ($password != $repassword ) {
			echo '<div class="alert alert-danger">Contraseñas incorrectas</div>';
		} else {
			//Insertamos si no hay errores
			$query  = "INSERT INTO `usuarios` (usuario,password,departamento,email,tipo) VALUES ('$usuario','".sha1($password)."','$departamento','$email','$tipo')";
			$mysql_result = mysql_query($query, $bdCon);

			header('Location: register.php?registro=true');
			die;
		}
	}
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Nuevo Registro</title>
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
					<form action="register.php" class="form-horizontal" method="post">
						<fieldset>

						<!-- Form Name -->
						<legend>Formulario Nuevo Administrador</legend>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="usuario">Usuario *</label>  
						  <div class="col-md-5">
						  <input id="usuario" name="usuario" type="text" placeholder="" class="form-control input-md" required="">
						    
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="departamento">Departamento *</label>  
						  <div class="col-md-5">
						  <input id="departamento" name="departamento" type="text" placeholder="" class="form-control input-md" required="">
						    
						  </div>
						</div>

						<!-- Password input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="password">Password *</label>
						  <div class="col-md-5">
						    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
						    
						  </div>
						</div>

						<!-- Password input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="repassword">Re Password *</label>
						  <div class="col-md-5">
						    <input id="repassword" name="repassword" type="password" placeholder="" class="form-control input-md" required="">
						    
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="email">Email *</label>  
						  <div class="col-md-5">
						  <input id="email" name="email" type="email" placeholder="" class="form-control input-md" required="">
						    
						  </div>
						</div>

						<!-- Select Basic -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="tipo">Tipo</label>
						  <div class="col-md-5">
						    <select id="tipo" name="tipo" class="form-control">
						      <option selected="selected" value="comun">Común</option>
						      <option value="admin">Admin</option>
						    </select>
						  </div>
						</div>

						<!-- Button -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="submit"></label>
						  <div class="col-md-4">
						    <input type="submit" name="submit" class="btn btn-primary" value="Registrar"></input>
						  </div>
						</div>

						</fieldset>
					</form>	
				</div>
			</div>
		</div>
	</div>
	<script src="/static/js/vendor/bootstrap.min.js"></script>
</body>
</html>