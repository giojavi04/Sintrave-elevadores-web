<?php 
require('../blog/includes/config.php');
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Contacto | Sintrave Elevadores</title>
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
						<a href="/contacto/" class="selected">Contacto</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>

	<div class="header_page">
		<h2 class="h_title">Contáctanos</h2>
	</div>
	
	<div id="submenu"></div>

	<section class="wrapper_c">
		<div class="w_title">
			<p>¿Tienes algún proyecto o idea? ¿Quieres saber más sobre nuestros productos?</p>
			<p class="italic">Siempre estamos disponibles!</p>
		</div>
		<div class="w_email">
			<div class="we_mail">
				<h3>Gerencia</h3>
				<p>Gerencia General, planificación de proyectos y fiscalizaciones</p>
				<a href="mailto:gerencia@sintrave.com" class="a_mail">gerencia@sintrave.com <span class="ir_svg"></span></a>
			</div>
			<div class="we_mail">
				<h3>Departamento Técnico</h3>
				<p>Inspecciones, proyectos, montajes y mantenimientos</p>
				<a href="mailto:operaciones@sintrave.com" class="a_mail">operaciones@sintrave.com <span class="ir_svg"></span></a>
			</div>
			<div class="we_mail">
				<h3>Ventas</h3>
				<p>Ventas de ascensores, escaleras, repuestos y cotizaciones</p>
				<a href="mailto:ventas@sintrave.com" class="a_mail">ventas@sintrave.com <span class="ir_svg"></span></a>
			</div>
			<div class="we_mail">
				<h3>Coordinación General</h3>
				<p>Coordinación de trabajos, talento humano y reporte de averías</p>
				<a href="mailto:coordinacion@sintrave.com" class="a_mail">coordinacion@sintrave.com <span class="ir_svg"></span></a>
			</div>
			<div class="we_mail">
				<h3>Financiero</h3>
				<p>Facturaciones, pagos proveedores y sistemas contables</p>
				<a href="mailto:financiero@sintrave.com" class="a_mail">financiero@sintrave.com <span class="ir_svg"></span></a>
			</div>
		</div>
		<div class="w_dirform">
			<article class="wd_form">
				<div id="note"></div>
				<form id="ajax-contact-form" action="javascript:alert('success!');" method="post">
					<div class="wdf_contacto">
						<p>* Nombres Completos:</p>
						<div class="wdf_campo_contacto">
							<span class="contac_img name"></span>
							<input type="text" name="name" id="name" class="campo_text" placeholder="Nombre y Apellido" required>
						</div>
					</div>
					<div class="wdf_contacto">
						<p>* Email:</p>
						<div class="wdf_campo_contacto">
							<span class="contac_img email"></span>
							<input type="email" name="email" id="email" class="campo_text" placeholder="E-mail" required>
						</div>
					</div>
					<div class="wdf_contacto">
						<p>Empresa:</p>
						<div class="wdf_campo_contacto">
							<span class="contac_img empresa"></span>
							<input type="text" class="campo_text" id="company" name="company" placeholder="Empresa o Lugar">
						</div>
					</div>
					<div class="wdf_comentario">
						<p>* Comentario:</p>
						<textarea name="message" id="" placeholder="Deje su comentario..." cols="30" rows="6" required></textarea>
					</div>
					<div class="wdf_contacto">
						<p>* Captcha:</p>
						<div class="wdf_campo_contacto">
							<input type="text" name="answer" id="answer" class="campo_text_capcha" placeholder="7 + 3 =" required>
						</div>
					</div>
					<div class="wdf_btn">
						<label id="load" style="display:none"></label>
						<button id="submit-button" type="submit" class="wdf_btn" name="submit">Enviar</button>
					</div>
				</form>
			</article>
			<article class="datos">
				<h2>Nuestra Oficina</h2>
				<h3>Dirección:</h3>
				<p>Av. 10 de Agosto N26-52 y Ascázubi Edificio Proaño 2 Piso, Oficina 2</p>
				<h3>Teléfonos:</h3>
				<p><span class="pf pf_tel"></span>(593) 02 2 229 531 </p>
				<p><span class="pf pf_tel"></span>(593) 02 2 964 661 </p>
				<p><span class="pf pf_cel"></span> 0992860418</p>
				<aside class="clearfix">
					<div class="social">
						<h3>Siguenos en:</h3>
						<div class="btn_twitter">
	                        <a href="https://twitter.com/share" class="twitter-share-button" data-via="Sintrave" data-count="vertical" data-lang="es" data-dnt="true">Twittear</a>
	                    </div>
	                    <div id="fb-root" class="btn_facebook">
	                    	<fb:like href="https://www.facebook.com/Sintrave" send="false" layout="box_count" show_faces="false" ></fb:like>
	                    </div>
		                <div class="btn_googlemas">
		                    <g:plusone size="tall" rel="publisher" href="http://sintrave.com"></g:plusone>   
		                </div>
					</div>
				</aside>
				<h2>Nuestro Formulario</h2>
				<p>Ingresa todos los datos requeridos, para poder responderte a la brevedad posible, te garantizamos:</p>
				<ul>
					<li><span class="visto"></span>Respuesta a la brevedad</li>
					<li><span class="visto"></span>Privacidad en tus datos</li>
					<li><span class="visto"></span>Información concisa</li>
				</ul>
			</article>
		</div>
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
									echo '<a href="../blog/viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a>';
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
	<script src="https://connect.facebook.net/en_US/all.js#xfbml=1"></script>
    <script src="https://apis.google.com/js/plusone.js"></script>
    <script src="https://platform.twitter.com/widgets.js"></script>
	<script src="/static/js/main.min.js"></script>	
</body>
</html>