<?php
include "Connections/registro_user.php";
if (!session_id()) session_start();
if (!$_SESSION['logon']){ 
    header("Location:index.php");
    die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">    
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<meta http-equiv="Content-Language" content="es"/>
	<meta name="description" content="" />
	<meta name="robots"ontent="index, follow">	
	<link href="https://fonts.googleapis.com/css?family=Hind+Madurai:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="css/normalize.css"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styles.css">
	<title>SARS-GESTION PRODUCTOS</title>
</head>
<body>
<div class="back_full_screen_intro">		
	<div class="headSearch">
		<H1 class="title">RESUMEN</H1>		
		<form class="searchCli" name="form" ACTION="search.php" method="GET">			
				<input type="text" class="inputsLogin inputsearch" name="nombre_cliente" placeholder="Nombre o Apellidos">
				<input class="btnLogin btnsearch" type="submit" name="enviar" value="BUSCAR PRODUCTOS">			
		</form>
		<a href="todos-articulos.php" Title="BUSCAR TODOS LOS ARTICULOS"><img src="img/icon-all.png" class="imgAll" alt="BUSCAR TODOS LOS ARTICULOS"></a>
		<a href="anadir-articulo.php" Title="AÑADIR ARTICULOS"><img src="img/add.png" class="imgAll" alt="AÑADIR ARTICULOS"></a>
		<a href="reporteexcel.php" Title="DESCARGAR INFORME"><img src="img/excel.png" class="imgAll" alt="DESCARGAR INFORME"></a>
		<a href="productos.php" Title="IR AL INICIO"><img src="img/home.png" class="imgAll" alt="IR AL INICIO"></a>


	</div>

<!--CODIGO PELU
	<?php        
	$conexion = mysqli_connect($db_server,$db_user,$db_pass,$db_name) or die ("Error: ".mysqli_error($conexion)); 
	$query = "SELECT * FROM clientes";
	$query2 = "SELECT * FROM clientes WHERE timeact > DATE_SUB( NOW( ) , INTERVAL 1 WEEK ) ";
	$query3 = "SELECT * FROM clientes WHERE YEAR(fecha_alta) = YEAR(NOW())";
	$query4 = "SELECT sum(coste) FROM facturacion WHERE fecha > DATE_SUB( NOW( ) , INTERVAL 1 WEEK ) ";

	$resultado = $conexion->query($query);
	$resultado2 = $conexion->query($query2);
	$resultado3 = $conexion->query($query3);
	$resultado4 = $conexion->query($query4);
	mysqli_num_rows($resultado);
	mysqli_num_rows($resultado2); 				         
			$todos  = (mysqli_num_rows($resultado));
			$todos2 = (mysqli_num_rows($resultado2));
			$todos3 = (mysqli_num_rows($resultado3));
			$todos4 = (mysqli_fetch_array($resultado4));
				$suma =  $todos4[0];

			echo "<div id='first-container' class='cotentTable contentInfo'>
						<div style='text-align: center; padding-top: 50px;'>
							<div class='contentNameOk' style='margin-right:20px;'>
							<p class='totalClientes'>".$todos."</br><span style='font-size:20px; top: -141px; position: relative;'>clientes<span></p>
							</div>
							<div class='contentNameOk' style='margin-right:20px;'>
							<p class='totalClientes'>".$todos2."</br><span style='font-size:12px; top: -141px; position: relative;'>clientes última semana<span></p>
							</div>
							<div class='contentNameOk' style='margin-right:20px;'>
							<p class='totalClientes'>".$todos3."</br><span style='font-size:12px; top: -141px; position: relative;'>Nuevos clientes año<span></p>
							</div>
							<div class='contentNameOk' id='plus'>
							<p class='totalClientes'><span id='texto'>+</span></br><span style='font-size:12px; top: -141px; position: relative;' id='textomas'>ver mas<span></p>
							</div>
							<div class='contentNameOk' id='ingresos'>
							<p class='totalClientes'>".$suma."€</br><span style='font-size:12px; top: -141px; position: relative;'>Ingresos/semana<span></p>
							</div>
						</div>
					</<div>";				
				$conexion->close(); 
	?>
-->
	</div>			
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!–- Importante llamar antes a jQuery para que funcione bootstrap.min.js   -–> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> <!–- Llamamos al JavaScript  a través de CDN -–>
	<script type="text/javascript">

	$('#plus').click(function (){
		var ingresosDiv =$('#ingresos');
		var texto = $('#texto');
		var textomas = $('#textomas');
		


		if (ingresosDiv.is(':visible')){
			ingresosDiv.fadeOut();
			texto.replaceWith("<span id='texto'>+</span>");
			textomas.replaceWith("<span style='font-size:12px; top: -141px; position: relative;' id='textomas'>ver mas<span></p>");
		} 
		else{
			ingresosDiv.fadeIn();
			texto.replaceWith("<span id='texto'>-</span>");
			textomas.replaceWith("<span style='font-size:12px; top: -141px; position: relative;' id='textomas'>ver menos<span></p>");
		}				
	});	
	</script>
	
</body>
</html>