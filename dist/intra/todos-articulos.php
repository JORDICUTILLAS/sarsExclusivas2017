<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<?php
include "Connections/productos.php";
if (!session_id()) session_start();
if (!$_SESSION['logon']){ 
	header("Location:index.php");
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<meta http-equiv="Content-Language" content="es"/>
	<meta name="description" content="" />
	<meta name="robots"ontent="index, follow">	
	<link href="https://fonts.googleapis.com/css?family=Hind+Madurai:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="css/normalize.css"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styles.css">
	<title>php-GESTION CLIENTES</title>
</head>
<body>
	<div class='opacityPopUp'>
	</div>		
	<div class="headSearch" style="position:inherit">
		<H1 class="title">Todos los Cliente</H1>           
		<form class="searchCli" name="form" ACTION="search.php" method="GET">           
			<input type="text" class="inputsLogin inputsearch" name="nombre_cliente" placeholder="Nombre o Apellidos">
			<input class="btnLogin btnsearch" type="submit" name="enviar" value="BUSCAR CLIENTE">           
		</form>
       <a href="todos-clientes.php" Title="BUSCAR TODOS LOS CLIENTES"><img src="img/icon-all.png" class="imgAll" alt="BUSCAR TODOS LOS CLIENTES"></a>
		<a href="anadir-cliente.php" Title="AÑADIR CLIENTE"><img src="img/add.png" class="imgAll" alt="AÑADIR CLIENTE"></a>
		<a href="reporteexcel.php" Title="DESCARGAR INFORME"><img src="img/excel.png" class="imgAll" alt="DESCARGAR INFORME"></a>
		<a href="clientes.php" Title="IR AL INICIO"><img src="img/home.png" class="imgAll" alt="IR AL INICIO"></a>
	</div>
	<?php 
	 
	 mysql_set_charset('utf8',$conexion);       
	
	$conexion = mysqli_connect($db_server,$db_user,$db_pass,$db_name) or die ("Error: ".mysqli_error($conexion));
	 
	 mysql_query("SET NAMES 'utf8'");
	 mysql_set_charset('utf8',$conexion);

	//$query = "SELECT * FROM clientes";	
	$query = "SELECT * FROM productos";
	mysql_query("SET NAMES 'utf8'");
	$resultado = $conexion->query($query);
	if(mysqli_num_rows($resultado) > 0){
		echo "<div id='third-container' class='cotentTable' style='padding-top:0px;'><table class='table table-bordered table-hover table-striped table-condensed'><tbody>

		<tr>
		<th>ID CATEGORIA</th>
		<th>CATEGORIA</th> 
		<th>DESCRIPCION	</th>
		<th>REFERENCIA</th>            
		<th>FOTO</th>
		<th>editar</th>   
		</tr>

		";         
		while($results = mysqli_fetch_array($resultado)){           
			echo "<tr><td>".$results['id_categoria']."</td><td>".$results['desc_categoria']."</td><td>".$results['descripcion']."</td><td>".$results['referencia']."
			</td><td>".$results['foto']."</td><td style='display: contents;'>
			<div class='popup'>
			<p id='".$results['id']."' class='close'>+</p>
			<p class='nameSea'>".$results['referencia']." ".$results['desc_categoria']."</p>
			<p> <span class='labelPopUp'>descripcion:</span> ".$results['descripcion']."</p>						
			<img src='../../".$results['foto']."'>			        
			</div>

			<form class='searchCli' style='float:none; width:auto;' name='form' action ='' method='GET'>
			<input class='' type='hidden'  value='".$results['id']."' name='id' placeholder='".$results['id']."'>
			<input class='btn btn-default ver btn-Edit-Sea' type='submit' name='ver' value='VER' id='".$results['id']."'>
			</form>

			<form class='searchCli' style='float:none; width:auto;' name='form' ACTION='edit.php' method='GET'>  
			<input class='' type='hidden' value='" .$results['id']."' name='id' placeholder='" .$results['id']."'>
			<input class='btn btn-default btn-Edit-Sea' type='submit' name='enviar' value='EDITAR'>  
			</form>
			</td></tr>";               
		}
		echo "</tbody> </table>";
	}
	else{ 
		echo "No results";
	}
	?>
	<div class="my-navigation">
		<div class="simple-pagination-first navigationItems"></div>
		<div class="simple-pagination-previous navigationItems"></div>
		<div class="simple-pagination-page-numbers navigationItems"></div>
		<div class="simple-pagination-next navigationItems"></div>
		<div class="simple-pagination-last navigationItems"></div>
	</div>
	<div style="margin:0 auto; max-width: 672px;">
		<div class="simple-pagination-page-x-of-x" style="display: inline-block">/</div>
		<div class="simple-pagination-showing-x-of-x" style="display: inline-block">/</div>
		<div style="text-align:center; font-family: 'Open Sans', sans-serif; font-size: 12px; font-weight: bold; display: inline-block">
			&nbsp;&nbsp; / &nbsp;&nbsp; Viendo <select class="simple-pagination-items-per-page"></select> clientes por página.&nbsp;&nbsp; / &nbsp;&nbsp;
		</div>
		<div style="text-align:center; font-family: 'Open Sans', sans-serif; font-size: 12px; font-weight: bold; display: inline-block ">
			Ir directamente a la página <select class="simple-pagination-select-specific-page"></select>
		</div> 
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!–- Importante llamar antes a jQuery para que funcione bootstrap.min.js   -–> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> <!–- Llamamos al JavaScript  a través de CDN -–>
	<script src="jquery-simple-pagination-plugin.js"></script>
	<script>
	(function($){
		$('#first-container').simplePagination();
		$('#second-container').simplePagination({
			items_per_page: 5,
			number_of_visible_page_numbers: 10
		});

		$('#third-container').simplePagination({
			items_per_page: 10
		});

		$('#fourth-container').simplePagination({
			first_content: '&lt;&lt;',
			previous_content: '<',
			next_content: '>',
			last_content: '>>'
		});
		$('#fifth-container').simplePagination({
			use_page_count: true
		});
		$('#sixth-container').simplePagination({
			items_per_page: 11,
			items_per_page_content: {
				'Six': 6,
				'Eleven': 11,
				'Seventeen': 17,
				'Thirty-three': 33,
				'Sixty-seven': 67
			}
		});
	})(jQuery);
	</script>
	<script type="text/javascript">
	$('.ver').click(function(e){ 
		e.preventDefault();       
		var id = $(this).attr('id');
		$('#'+ id).parent(".popup").fadeIn();
		$('.opacityPopUp').fadeIn();
	
	$('#'+ id).click(function(){
			var visivle =  $('#'+ id).parent(".popup").is(":visible");
			if(visivle === true){
				$('#'+ id).parent(".popup").fadeOut();
				$('.opacityPopUp').fadeOut();
			}

		});

	});
	</script>
</body>
</html>