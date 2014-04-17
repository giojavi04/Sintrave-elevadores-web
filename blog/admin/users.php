<?php
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//show message from add / edit page
if(isset($_GET['deluser'])){ 

	//if user id is 1 ignore
	if($_GET['deluser'] !='1'){

		$stmt = $db->prepare('DELETE FROM blog_members WHERE memberID = :memberID') ;
		$stmt->execute(array(':memberID' => $_GET['deluser']));

		header('Location: users.php?action=deleted');
		exit;

	}
} 

?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Usuarios administradores</title>
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
	  <script language="JavaScript" type="text/javascript">
	  function deluser(id, title)
	  {
		  if (confirm("Are you sure you want to delete '" + title + "'"))
		  {
		  	window.location.href = 'users.php?deluser=' + id;
		  }
	  }
	  </script>
</head>
<body>

	<?php include('menu.php');?>

	<?php 
	//show message from add / edit page
	if(isset($_GET['action'])){ 
		echo '<h3>User '.$_GET['action'].'.</h3>'; 
	} 
	?>

	<div class="container-fluit">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-6 col-md-offset-3 well">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Username</th>
								<th>Email</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody class="text-left">
							<?php
								try {

									$stmt = $db->query('SELECT memberID, username, email FROM blog_members ORDER BY username');
									while($row = $stmt->fetch()){
										
										echo '<tr>';
										echo '<td>'.$row['username'].'</td>';
										echo '<td>'.$row['email'].'</td>';
										?>

										<td>
											<a href="edit-user.php?id=<?php echo $row['memberID'];?>">Edit</a> 
											<?php if($row['memberID'] != 1){?>
												| <a href="javascript:deluser('<?php echo $row['memberID'];?>','<?php echo $row['username'];?>')">Delete</a>
											<?php } ?>
										</td>
										
										<?php 
										echo '</tr>';

									}

								} catch(PDOException $e) {
								    echo $e->getMessage();
								}
							?>
						</tbody>
					</table>
					<p><a type="button" class="btn btn-primary btn-lg" href='add-user.php'><span class="glyphicon glyphicon-edit"></span> Nuevo Usuario</a></p>
				</div>
			</div>
		</div>
	</div>

	<script src="/static/js/vendor/bootstrap.min.js"></script>
</body>
</html>
