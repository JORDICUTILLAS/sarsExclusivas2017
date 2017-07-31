<?php require_once('Connections/productos.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
	{
		if (PHP_VERSION < 6) {
			$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
		}

		$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

		switch ($theType) {
			case "text":
			$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
			break;    
			case "long":
			case "int":
			$theValue = ($theValue != "") ? intval($theValue) : "NULL";
			break;
			case "double":
			$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
			break;
			case "date":
			$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
			break;
			case "defined":
			$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
			break;
		}
		return $theValue;
	}
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_productos = 60;
$pageNum_productos = 0;
if (isset($_GET['pageNum_productos'])) {
	$pageNum_productos = $_GET['pageNum_productos'];
}
$startRow_productos = $pageNum_productos * $maxRows_productos;

$colname_productos = "-1";
if (isset($_GET['buscatext'])) {
	$colname_productos = $_GET['buscatext'];
}
mysql_select_db($database_productos, $productos);
$query_productos = sprintf("SELECT * FROM productos WHERE desc_categoria LIKE %s", GetSQLValueString("%" . $colname_productos . "%", "text"));
$colname_productos = explode(" ",$colname_productos); 
while(list($key,$val)=each($colname_productos)){ if($val<>" " and strlen($val) > 0){$query_productos .= " OR descripcion LIKE '%" . $val . "%'  OR desc_categoria LIKE '%" . $val . "%' OR referencia LIKE '%" . $val . "%' ";}}


$query_limit_productos = sprintf("%s LIMIT %d, %d", $query_productos, $startRow_productos, $maxRows_productos);
$productos = mysql_query($query_limit_productos, $productos) or die(mysql_error());
$row_productos = mysql_fetch_assoc($productos);

if (isset($_GET['totalRows_productos'])) {
	$totalRows_productos = $_GET['totalRows_productos'];
} else {
	$all_productos = mysql_query($query_productos);
	$totalRows_productos = mysql_num_rows($all_productos);
}
$totalPages_productos = ceil($totalRows_productos/$maxRows_productos)-1;

$queryString_productos = "";
if (!empty($_SERVER['QUERY_STRING'])) {
	$params = explode("&", $_SERVER['QUERY_STRING']);
	$newParams = array();
	foreach ($params as $param) {
		if (stristr($param, "pageNum_productos") == false && 
			stristr($param, "totalRows_productos") == false) {
			array_push($newParams, $param);
	}
}
if (count($newParams) != 0) {
	$queryString_productos = "&" . htmlentities(implode("&", $newParams));
}
}
$queryString_productos = sprintf("&totalRows_productos=%d%s", $totalRows_productos, $queryString_productos);
?>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tipsy/1.0.3/jquery.tipsy.js"></script>
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
						<li><a href="index.php#products">PRODUCTOS</a></li>
						<li><a href="#">DESCARGAS</a></li>
						<li><a href="index.php#map">SITUACION</a></li>
						<li><a href="index.php#contact">CONTACTO</a></li>
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
		Resultado: <?php echo $totalRows_productos; ?> articulo/s en total 

		

		<div style="text-align:center; width:700px;">
			<?php if ($pageNum_productos > 0) { // Show if not first page ?>
			<a href="<?php printf("%s?pageNum_productos=%d%s", $currentPage, 0, $queryString_productos); ?>"><img src="./First.gif" /></a>
			<?php } // Show if not first page ?>
			<?php if ($pageNum_productos > 0) { // Show if not first page ?>
			<a href="<?php printf("%s?pageNum_productos=%d%s", $currentPage, max(0, $pageNum_productos - 1), $queryString_productos); ?>"><img src="./Previous.gif" /></a>
			<?php } // Show if not first page ?>
			<?php if ($pageNum_productos < $totalPages_productos) { // Show if not last page ?>
			<a href="<?php printf("%s?pageNum_productos=%d%s", $currentPage, min($totalPages_productos, $pageNum_productos + 1), $queryString_productos); ?>"><img src="./Next.gif" /></a>
			<?php } // Show if not last page ?>
			<?php if ($pageNum_productos < $totalPages_productos) { // Show if not last page ?>
			<a href="<?php printf("%s?pageNum_productos=%d%s", $currentPage, $totalPages_productos, $queryString_productos); ?>"><img src="./Last.gif" /></a>
			<?php } // Show if not last page ?>
		</div>

		<div class="container">
			<div class="row center-block content-products" id="card-products">
				

				<?php if ($totalRows_productos > 0) { // Show if recordset not empty ?>
				<?php do { ?>

				<div class="col-lg-3 col-lg-offset-0 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
					<div class="card-products col-md-12">
					<img src="../<?php echo $row_productos['foto']; ?>" style="width:100%;" class="img-products" />
					<div style="margin-top:10px">							
						<h3 class="title-products"><?php echo $row_productos['referencia']; ?>  </h3>
						<span class="categori-products"><?php echo $row_productos['desc_categoria']; ?></span>
						<hr class="line-separator line-separator-color-3"/>
					</div>
					<div class="products-category">
						<button type="button" class="btn btn-default" data-container="body" title="<?php echo $row_productos['referencia']; ?>" data-toggle="popover" data-placement="top" data-content="<?php echo $row_productos['descripcion']; ?>">
							Descripción
						</button>
						<!--<p class="description-pruducts"><?php echo $row_productos['descripcion']; ?></p>
						<img src="<?php echo $row_productos['foto_info']; ?>"/> -->
					</div>
					</div>
				</div>

				<?php } while ($row_productos = mysql_fetch_assoc($productos)); ?>
				<?php } // Show if recordset not empty ?>

				
			</div>
		</div>


		<div style="text-align:center; width:700px;">
			<?php if ($pageNum_productos > 0) { // Show if not first page ?>
			<a href="<?php printf("%s?pageNum_productos=%d%s", $currentPage, 0, $queryString_productos); ?>"><img src="./First.gif" /></a>
			<?php } // Show if not first page ?>
			<?php if ($pageNum_productos > 0) { // Show if not first page ?>
			<a href="<?php printf("%s?pageNum_productos=%d%s", $currentPage, max(0, $pageNum_productos - 1), $queryString_productos); ?>"><img src="./Previous.gif" /></a>
			<?php } // Show if not first page ?>
			<?php if ($pageNum_productos < $totalPages_productos) { // Show if not last page ?>
			<a href="<?php printf("%s?pageNum_productos=%d%s", $currentPage, min($totalPages_productos, $pageNum_productos + 1), $queryString_productos); ?>"><img src="./Next.gif" /></a>
			<?php } // Show if not last page ?>
			<?php if ($pageNum_productos < $totalPages_productos) { // Show if not last page ?>
			<a href="<?php printf("%s?pageNum_productos=%d%s", $currentPage, $totalPages_productos, $queryString_productos); ?>"><img src="./Last.gif" /></a>
			<?php } // Show if not last page ?>
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
	<script>
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover();   
	});
	</script>

</body>
</html>


