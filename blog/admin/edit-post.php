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
	<title>Editar Post</title>
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
	<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
	<!-- END JS -->
	<script>
	      tinymce.init({
	          selector: "textarea",
	          plugins: [
	              "advlist autolink lists link image charmap print preview anchor",
	              "searchreplace visualblocks code fullscreen",
	              "insertdatetime media table contextmenu paste"
	          ],
	          toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	      });
	</script>
</head>
<body>
	<?php include('menu.php');?>
	
	<div class="container-fluit">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-3 col-md-offset-3">
					<p><a href="./"><span class="glyphicon glyphicon-chevron-left"></span> Blog Administrador Index</a></p>
				</div>
				<div class="col-md-6 col-md-offset-3 well">
					<?php

					//if form has been submitted process it
					if(isset($_POST['submit'])){

						$_POST = array_map( 'stripslashes', $_POST );

						//collect form data
						extract($_POST);

						//very basic validation
						if($postID ==''){
							$error[] = 'This post is missing a valid id!.';
						}

						if($postTitle ==''){
							$error[] = 'Please enter the title.';
						}

						if($postDesc ==''){
							$error[] = 'Please enter the description.';
						}

						if($postCont ==''){
							$error[] = 'Please enter the content.';
						}

						if(!isset($error)){

							try {

								//insert into database
								$stmt = $db->prepare('UPDATE blog_posts SET postTitle = :postTitle, postDesc = :postDesc, postCont = :postCont WHERE postID = :postID') ;
								$stmt->execute(array(
									':postTitle' => $postTitle,
									':postDesc' => $postDesc,
									':postCont' => $postCont,
									':postID' => $postID
								));

								//redirect to index page
								header('Location: index.php?action=updated');
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

							$stmt = $db->prepare('SELECT postID, postTitle, postDesc, postCont FROM blog_posts WHERE postID = :postID') ;
							$stmt->execute(array(':postID' => $_GET['id']));
							$row = $stmt->fetch(); 

						} catch(PDOException $e) {
						    echo $e->getMessage();
						}

					?>

					<form action="" class="form-horizontal" method="post">
						<fieldset>

						<!-- Form Name -->
						<legend>Edición del Post</legend>
						
						<!-- Text input hidden-->
						<div class="form-group">  
						  <div class="col-md-12">
							<input type='hidden' name='postID' value='<?php echo $row['postID'];?>'>
						  </div>
						</div>
							
						<!-- titulo input-->
						<div class="form-group">
						  <label class="col-md-1 control-label" for="titulo">Título</label>  
						  <div class="col-md-12">
						  <input type='text' name='postTitle' class="form-control" value='<?php echo $row['postTitle'];?>'>
						    
						  </div>
						</div>

						<!-- Descripcion input-->
						<div class="form-group">
						  <label class="col-md-1 control-label" for="descripcion">Descripción</label>  
						  <div class="col-md-12">
						  <textarea name='postDesc' class="form-control"  cols='60' rows='10'><?php echo $row['postDesc'];?></textarea>
						  </div>
						</div>

						<!-- Contenido input-->
						<div class="form-group">
						  <label class="col-md-1 control-label" for="contenido">Contenido</label>
						  <div class="col-md-12">
					   		<textarea name='postCont' class="form-control"  cols='60' rows='10'><?php echo $row['postCont'];?></textarea>
						    
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
