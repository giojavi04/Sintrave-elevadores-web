<?php require('includes/config.php'); ?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<title>Blog | Sintrave Elevadores</title>
	<!-- Seo -->
	<link rel="shortcut icon" href="/static/img/favicon.ico" />
	<meta name="description" content="Empresa ecuatoriana que se dedica a la venta, puesta en marcha y mantenimiento de todas las marcas de ascensores"/>
	<meta property="og:title" content="Sintrave Elevadores" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://sintrave.com/"/>
    <meta property="og:image" content="http://sintrave.com/static/img/logo_sintrave.png" />
    <meta property="og:site_name" content="Sintrave Elevadores" />
    <!-- End Seo -->
	<link rel="stylesheet" href="/static/css/normalize.min.css" />
	<link rel="stylesheet" href="/static/css/main.min.css" />
	
	<script async src="/static/js/vendor/modernizr.custom.js"></script>
</head>
<body>
	
	<header class="header">
		<div class="header_content">
			<a href="http://sintrave.com" class="logo" title="Sintrave - Soluciones e Ingeniería en Transporte Vertical">
				<img src="/static/img/sintrave_logo.png" alt="Sintrave Elevadores">
			</a>
			<nav class="hn_nav">
				<ul class="ul_nav">
					<li>
						<a href="/">Home</a>
					</li>
					<li>
						<a href="/nosotros/">Compañía</a>
					</li>
					<li>
						<a href="/servicios/">Servicios</a>
					</li>
					<li>
						<a href="/productos/">Productos</a>
					</li>
					<li>
						<a href="/contacto/">Contacto</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>

	<div class="header_page">
		<h2 class="h_title">Blog</h2>
	</div>

	<div id="submenu">
	</div>

	<section class="wrapper_blog">

		<?php
			try {

				$stmt = $db->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
				while($row = $stmt->fetch()){
					
					echo '<article class="article_blog">';
						echo '<h2><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h2>';
						echo '<p>Posteado el '.date('jS M Y', strtotime($row['postDate'])).'</p>';
						echo '<p>'.$row['postDesc'].'</p>';				
						echo '<p><a href="viewpost.php?id='.$row['postID'].'" class="link">Leer más...</a></p>';				
						echo '<hr>';
					echo '</article>';

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		?>

	</section>

	<div class="pre_footer">
		<div class="content_pre">
			<aside class="footer_menu clearfix">
				<h2><span class="ico-h2 ico-foo_menu"></span>Empresa</h2>
				<ul>
					<li><a href="/blog/"><span class="ico_li"></span>Visita Nuestro BLOG</a></li>
					<li><a href="/nosotros/"><span class="ico_li"></span>Aceca de nuestra empresa</a></li>
					<li><a href="/servicios/"><span class="ico_li"></span>Servicios que brindamos</a></li>
					<li><a href="/productos/"><span class="ico_li"></span>Productos que ofresemos</a></li>
					<li><a href="/contacto/"><span class="ico_li"></span>Contacto permanente</a></li>
				</ul>
				<a href="https://www.facebook.com/Sintrave" target="_blank"><span class="ico ico-facebook"></span></a>
				<a href="https://twitter.com/Sintrave" target="_blank"><span class="ico ico-twitter"></span></a>
				<a href="https://plus.google.com/+SintraveElevadoresEc/posts" target="_blank"><span class="ico ico-google"></span></a>
			</aside>
			<div class="noticias">
				<h2><span class="ico-h2 ico-noticia"></span>Ultimas Noticias</h2>
				<?php
					try {

						$stmt = $db->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC LIMIT 2');
						while($row = $stmt->fetch()){

							$limit = $row['postDesc'];
							$substr = substr($limit, 0,110);

							echo '<article class="noti_arti">';
								echo '<time datetime="2014-03-13">';
									echo '<span class="dia">'.date('j', strtotime($row['postDate'])).'</span>';
									echo '<span class="mes">'.date('M', strtotime($row['postDate'])).'</span>';
								echo '</time>';
								echo '<div class="entry_cont">';
									echo '<a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a>';
									echo '<p>'.$substr.' ...'.'</p>';
								echo '</div>';
							echo '</article>';

						}

					} catch(PDOException $e) {
					    echo $e->getMessage();
					}
				?>
			</div>
			<div class="timeline">
				<a class="twitter-timeline" href="https://twitter.com/Sintrave" data-widget-id="444133597075607552">Tweets por @Sintrave</a>
			</div>
		</div>
	</div>

	<footer>
		<div class="f_left">
			<a href="#" alt="Feed" title="Feed"><span></span></a> -
			<a href="/sitemap.xml" alt="Mapa del sitio" title="Mapa del sitio">Site Map</a>
		</div>
		<div class="f_right">
			<p>Copyright © 2014 Sintrave Reserved. Design by <a href="https://twitter.com/giojavi04" target="_blank">@giojavi04</a></p>
		</div>
	</footer>
	
	<div id='IrArriba'>
		<a href='#Arriba'>
			<span></span>
		</a>
	</div>

	<script src="/static/js/vendor/jquery-2.1.0.min.js"></script>
	<script src="https://platform.twitter.com/widgets.js"></script>
	<script src="/static/js/main.min.js"></script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-49858600-1', 'auto');
	  ga('send', 'pageview');

	</script>
</body>
</html>