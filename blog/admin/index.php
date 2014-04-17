<?php
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//show message from add / edit page
if(isset($_GET['delpost'])){ 

	$stmt = $db->prepare('DELETE FROM blog_posts WHERE postID = :postID') ;
	$stmt->execute(array(':postID' => $_GET['delpost']));

	header('Location: index.php?action=deleted');
	exit;
} 

?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Bienvenido Administrador</title>
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
	  function delpost(id, title)
	  {
		  if (confirm("Estas seguro que desea eliminar? '" + title + "'"))
		  {
		  	window.location.href = 'index.php?delpost=' + id;
		  }
	  }
	  </script>
</head>
<body>

	<?php include('menu.php');?>

	<?php 
	//show message from add / edit page
	if(isset($_GET['action'])){ 
		echo '<h3>Post '.$_GET['action'].'.</h3>'; 
	} 
	?>

	<div class="container-fluit">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-6 col-md-offset-3 well">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Título</th>
								<th>Fecha</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody class="text-left">
							<?php
								try {

									$stmt = $db->query('SELECT postID, postTitle, postDate FROM blog_posts ORDER BY postID DESC');
									while($row = $stmt->fetch()){
										
										echo '<tr>';
										echo '<td>'.$row['postTitle'].'</td>';
										echo '<td>'.date('jS M Y', strtotime($row['postDate'])).'</td>';
										?>

										<td>
											<a href="edit-post.php?id=<?php echo $row['postID'];?>">Edit</a> | 
											<a href="javascript:delpost('<?php echo $row['postID'];?>','<?php echo $row['postTitle'];?>')">Delete</a>
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
					<p><a type="button" class="btn btn-primary btn-lg" href='add-post.php'><span class="glyphicon glyphicon-edit"></span> Nuevo Post</a></p>
				</div>
			</div>
		</div>
	</div>

	<script src="/static/js/vendor/bootstrap.min.js"></script>
</body>
</html>