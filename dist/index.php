<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">    
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<meta http-equiv="Content-Language" content="es"/>	
	<link rel="stylesheet" href="css/normalize.css">  
	<link rel="stylesheet" href="css/styles.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title>sars exclusivas</title>
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-3 col-sm-12 content-logo">
					<img src="img/logo.jpg">
				</div>
				<div class="search">
					<form action="buscador.php" method="GET" id="buscaenlaweb" name="buscaenlaweb">
						<input type="text" class="text-input" name="buscatext" placeholder="Buscador" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Buscador'"/>						
						<button name="button" type="submit" class="btn-search" id="enviar" onclick="buscaenlaweb.submit()" >
							<img src="img/search.jpg" class="img-search"/>
						</button>
					</form>
				</div>
				<nav class="col-lg-8 col-md-9 col-sm-12">
					<ul>
						<li><a href="index.php">INICIO</a></li>
						<li><a href="#products">PRODUCTOS</a></li>
						<li><a href="#">DESCARGAS</a></li>
						<li><a href="#map">SITUACION</a></li>
						<li><a href="#contact">CONTACTO</a></li>
					</ul>
				</nav>
			</div>

		</div>
	</header>
	<section class="intro">
		<div class="content-intro">
			<h2>
				TORNILLERÍA Y PRODUCTOS DE INSTALACIÓN.
			</h2>
			<h3> Buen precio a distribuidores , contactar para información.</h3>
		</div>
	</section>
	<section class="content-sections">
		<h2> CONSULTA NUESTRAS OFERTAS Y NOVEDADES</h2>
		<hr class="line-title">
		<div class="container">
			<div class="row content-btn-ofers">
				<div class="col-lg-3 col-lg-offset-3 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-10 col-xs-offset-1">
					<a href="#" class="link-ofers-news">OFERTAS</a>
				</div>
				<div class="col-lg-3 col-lg-offset-0 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
					<a href="#" class="link-ofers-news link-ofers-news-margin">NOVEDADES</a>
				</div>
			</div>
		</div>
	</section>
	<section class="content-sections section-bg-products" id="products">
		<h2> EN QUE TE PODEMOS AYUDAR?</h2>
		<hr class="line-title">
		<div class="container-fluid">
			<div class="row content-products">
				
				<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-10 col-xs-offset-1 card-products">
					<img class="products-img" src="img/tornilleria.jpg"/>
					<div style="margin-top:10px"> 
						<h3 class="title-products"> TORNILLOS  </h3>
						<hr class="line-separator line-separator-color-1"/>
					</div>
					<div class="products-category">
						<a href="#" class="link-products-category"> - para cubiertas y fachadas  </a>
						<a href="#" class="link-products-category"> - broca, rosca chapa y PVC  </a>
						<a href="#" class="link-products-category"> - para madera  </a>
						<a href="#" class="link-products-category"> - para tabiquería seca  </a>
						<a href="#" class="link-products-category"> - rosca métrica  </a>
						<a href="#" class="link-products-category"> - Tapones, puntas y accesorios  </a>
					</div>
				</div>

				<div class="col-lg-2 col-lg-offset-0 col-md-3 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1 card-products">
					<img class="products-img" src="img/anclajes.jpg"/>
					<div style="margin-top:10px:"> 
						<h3 class="title-products"> ANCLAJES  </h3>
						<hr class="line-separator line-separator-color-2"/>
					</div>
					<div class="products-category">
						<a href="#" class="link-products-category"> - metálicos  </a>
						<a href="#" class="link-products-category"> - químicos </a>
						<a href="#" class="link-products-category"> - plásticos </a>
						<a href="#" class="link-products-category"> - Fijaciones para materiales huecos </a>						
					</div>
				</div>

				<div class="col-lg-2 col-lg-offset-0 col-md-3 col-md-offset-0 col-sm-4 col-sm-offset-2 col-xs-10 col-xs-offset-1 card-products">
					<img class="products-img" src="img/sistemas.jpg"/>
					<div style="margin-top:10px"> 
						<h3 class="title-products"> SISTEMAS DE INSTALACIÓN  </h3>
						<hr class="line-separator line-separator-color-3"/>
					</div>
					<div class="products-category">
						<a href="#" class="link-products-category"> - abrazaderas </a>
						<a href="#" class="link-products-category"> - accesorios para tornillería </a>
						<a href="#" class="link-products-category"> - soportación </a>
						<a href="#" class="link-products-category"> - conectores para madera </a>
						<a href="#" class="link-products-category"> - puntas y alcayatas </a>
						<a href="#" class="link-products-category"> - remaches </a>
					</div>
				</div>

				<div class="col-lg-2 col-lg-offset-0 col-md-3 col-md-offset-3 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1 card-products">
					<img class="products-img" src="img/herramientas.jpg"/>
					<div style="margin-top:10px"> 
						<h3 class="title-products"> HERRAMIENTAS  </h3>
						<hr class="line-separator line-separator-color-4"/>
					</div>
					<div class="products-category">
						<a href="#" class="link-products-category"> - click para ver todas las herramientas  </a>						
					</div>
				</div>


				<div class="col-lg-2 col-lg-offset-0 col-md-3 col-md-offset-0 col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1 card-products">
					<img class="products-img" src="img/maquinaria.jpg"/>
					<div style="margin-top:10px"> 
						<h3 class="title-products"> MAQUINARIA  </h3>
						<hr class="line-separator line-separator-color-5"/>
					</div>
					<div class="products-category">
						<a href="#" class="link-products-category"> - click para ver toda la maquinaria  </a>
					</div>
				</div>

			</div>
		</div>
	</section>

	<section class="content-sections section-noPadding">
		<div class="container-fluid">
			<div class="row">
				<div class=" col-md-6 bg-contactUs">
					<h2>CONTACTA CON NOSOTROS</h2>
					<p style="font-size:14px; margin-top:10px; margin-bottom:20px;">¿Alguna duda? Estaremos encantados de ayudarte.</p>

					<p>Pol. Ind. les Guixeres c\ energia nº 25 </p>
					<p>Badalona (Barcelona-Spain) 08915 </p>
					<p>Telf. (+34) 93 383 53 04 </p>
					<p>Fax. (+34) 93 460 11 13 </p>

				</div>

				<div class=" col-md-6 bg-contactForm" id="contact">

					<form class="contact-form" action="contact.php" method="post">				
						<div class="col-md-6">
							<input type="text" id="name" name="Name" class="input-textContact" placeholder="Nombre" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nombre'"/>
						</div>
						<div class="col-md-6">
							<input type="text" id="apellidos" name="Apellidos" class="input-textContact" placeholder="Apellidos" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Apellidos'"/>
						</div>

						<div class="col-md-6">
							<input type="text" id="email" name="Email" class="input-textContact" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'"/>
						</div>
						<div class="col-md-6">
							<input type="text" class="input-textContact" id="telefono" name="Telefono" placeholder="Telefono" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Telefono'"/>
						</div>
						

						<div class="col-md-12">
							<textarea style="height:100px;" class="input-textContact" id="pedido" name="Pedido" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'"></textarea> 
						</div>

						<button class="btn-contact">CONTACTAR</button>
					</form>
				</div>
			</div>
		</div>
	</section>

	<section class="content-sections section-noPadding" id="map">		
		<div class="container-fluid " onClick="style.pointerEvents='none'" style="padding: 0px;">
			<div class="overlay" onClick="style.pointerEvents='none'"></div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2990.0107724844293!2d2.2503099158312683!3d41.46068167925751!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4bba7c25c9333%3A0xbce410d23ee2a41a!2sCarrer+de+l&#39;Energia%2C+25%2C+08915+Badalona%2C+Barcelona!5e0!3m2!1ses!2ses!4v1498471123151" scrolling="no" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen>
			</iframe>
		</div>
	</section>	

	<footer class="content-sections">
		<h2>Envíos en todo el mundo. Contacte sin compromiso.</h2>
		<p>Copyright 2014 sARs Exclusivas | Telf. (+34) 93 383 53 04 | Fax. (+34) 93 460 11 13  | Sars EXclusivas | S.L. Pol. Ind. les Guixeres c\ energia nº 25 Badalona | (Barcelona-Spain) 08915</p>
	</footer>
	<a href="#" class="scrollToTop"></a>
	<script src="js/scrollToTop.js" type="text/javascript"></script>
	<script src="js/scrollTo.js" type="text/javascript"></script>

	<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-10457634-6']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>