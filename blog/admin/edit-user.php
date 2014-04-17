<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Edición de Usuarios</title>
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

	<?php include('menu.php');?>

	<div class="container-fluit">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-3 col-md-offset-3">
					<p><a href="users.php"><span class="glyphicon glyphicon-chevron-left"></span> Usuarios Index</a></p>
				</div>
				<div class="col-md-6 col-md-offset-3 well">
					<?php

					//if form has been submitted process it
					if(isset($_POST['submit'])){

						//collect form data
						extract($_POST);

						//very basic validation
						if($username ==''){
							$error[] = 'Please enter the username.';
						}

						if( strlen($password) > 0){

							if($password ==''){
								$error[] = 'Please enter the password.';
							}

							if($passwordConfirm ==''){
								$error[] = 'Please confirm the password.';
							}

							if($password != $passwordConfirm){
								$error[] = 'Passwords do not match.';
							}

						}
						

						if($email ==''){
							$error[] = 'Please enter the email address.';
						}

						if(!isset($error)){

							try {

								if(isset($password)){

									$hashedpassword = $user->password_hash($password, PASSWORD_BCRYPT);

									//update into database
									$stmt = $db->prepare('UPDATE blog_members SET username = :username, password = :password, email = :email WHERE memberID = :memberID') ;
									$stmt->execute(array(
										':username' => $username,
										':password' => $hashedpassword,
										':email' => $email,
										':memberID' => $memberID
									));


								} else {

									//update database
									$stmt = $db->prepare('UPDATE blog_members SET username = :username, email = :email WHERE memberID = :memberID') ;
									$stmt->execute(array(
										':username' => $username,
										':email' => $email,
										':memberID' => $memberID
									));

								}
								

								//redirect to index page
								header('Location: users.php?action=updated');
								exit;

							} catch(PDOException $e) {
							    echo $e->getMessage();
							}

						}

					}

					?>


					<?php
					//check for any errors
					if(isset($error)){
						foreach($error as $error){
							echo $error.'<br />';
						}
					}

						try {

							$stmt = $db->prepare('SELECT memberID, username, email FROM blog_members WHERE memberID = :memberID') ;
							$stmt->execute(array(':memberID' => $_GET['id']));
							$row = $stmt->fetch(); 

						} catch(PDOException $e) {
						    echo $e->getMessage();
						}

					?>
				<form action="" class="form-horizontal" method="post">
						<fieldset>

						<!-- Form Name -->
						<legend>Edición Users</legend>
						
						<!-- Text input hidden-->
						<div class="form-group">  
						  <div class="col-md-6">
							<input type='hidden' name='memberID' value='<?php echo $row['memberID'];?>'>
						  </div>
						</div>
							
						<!-- username input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="username">Username</label>  
						  <div class="col-md-6">
						  <input type='text' name='username' class="form-control" value='<?php echo $row['username'];?>'>
						  </div>
						</div>

						<!-- Password Change input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="password">Password (Change Only)</label>  
						  <div class="col-md-6">
						  <input type='password' name='password' class="form-control" value=''>
						  </div>
						</div>

						<!-- Password Change Confirm input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="password">Re Password</label>  
						  <div class="col-md-6">
						  <input type='password' name='passwordConfirm' class="form-control" value=''>
						  </div>
						</div>

						<!-- Email input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="emaiul">Email</label>  
						  <div class="col-md-6">
						  <input type='email' name='email' class="form-control" value='<?php echo $row['email'];?>'>
						  </div>
						</div>

						<!-- Button -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="submit"></label>
						  <div class="col-md-4">
						    <input type="submit" name="submit" class="btn btn-success btn-lg" value="Actualizar"></input>
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
