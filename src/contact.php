<?php
error_reporting(E_ALL ^ E_NOTICE);
?>
<?php 
/* codigo PHP para enviar un email dona@sars-exclusivas.com */ 
$direccion_destino = "dona@sars-exclusivas.com"; 
$titulo_email = "Pedido enviado desde Sars Exclusivas"; 
$mensaje .= "Contacto a través de la web \n"; 
$mensaje .= "Nombre: ".$_POST['Name']."\n";
$mensaje .= "Apellidos: ".$_POST['Apellidos']."\n";
$mensaje .= "Email: ".$_POST['Email']."\n";
$mensaje .= "Direccion: ".$_POST['Telefono']."\n";
$mensaje .= "Pedido: ".$_POST['Pedido']."\n";
$varNombre = $_POST['Name'];

$cabeceras = "From: Mensaje desde sARs Exclusivas "; 
$ok = mail($direccion_destino, $titulo_email, $mensaje, $cabeceras);
?>
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
				
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<img src="img/logo.jpg">
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul>
								<li class="search">
									<form action="buscador.php" method="GET" id="buscaenlaweb" name="buscaenlaweb">
										<input type="text" class="text-input" name="buscatext" placeholder="Buscador" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Buscador'"/>            
										<button name="button" type="submit" class="btn-search" id="enviar" onclick="buscaenlaweb.submit()" >
											<img src="img/search.jpg" class="img-search"/>
										</button>
									</form>
								</li>
								<li><a href="index.php">INICIO</a></li>
								<li><a href="#products">PRODUCTOS</a></li>
								<li><a href="#">DESCARGAS</a></li>
								<li><a href="#map">SITUACION</a></li>
								<li><a href="#contact">CONTACTO</a></li>            
							</ul>     
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
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
		<h1 style="text-align:center;"><?php echo"Gracias por confiar en nosotros " . $varNombre;?> </br> <?php echo"En breve recibirás noticias nuestras, "?></h1>		
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