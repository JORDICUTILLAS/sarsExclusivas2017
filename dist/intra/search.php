<?php
include "Connections/productos.php";
if (!session_id()) session_start();
if (!$_SESSION['logon']){ 
    header("Location:index.php");
    die();
}
?>

<?php 

if(isset($_GET['ver']))
{
 call_user_func( rsvpsubmit());
}

function rsvpsubmit() {
    echo 'hola!';
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Busqueda Cliente</title>
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
</head>
<body>
    <div class='opacityPopUp'>
    </div>
    <div class="headSearch" style="position:inherit">
        <H1 class="title">Busqueda Articulo</H1>           
        <form class="searchCli" name="form" ACTION="search.php" method="GET">           
            <input type="text" class="inputsLogin inputsearch" name="nombre_cliente" placeholder="Nombre o Apellidos">
            <input class="btnLogin btnsearch" type="submit" name="enviar" value="BUSCAR PRODUCTOS">           
        </form>
       <a href="todos-articulos.php" Title="BUSCAR TODOS LOS ARTICULOS"><img src="img/icon-all.png" class="imgAll" alt="BUSCAR TODOS LOS ARTICULOS"></a>
        <a href="anadir-articulo.php" Title="AÑADIR ARTICULOS"><img src="img/add.png" class="imgAll" alt="AÑADIR ARTICULOS"></a>
        <a href="reporteexcel.php" Title="DESCARGAR INFORME"><img src="img/excel.png" class="imgAll" alt="DESCARGAR INFORME"></a>
        <a href="productos.php" Title="IR AL INICIO"><img src="img/home.png" class="imgAll" alt="IR AL INICIO"></a>
    </div>

    <p class="searchCriterio">Has buscado por: <span class="searchCustom"><?php echo $_GET['nombre_cliente']?></span></p>

    
    
    <?php
    $nombre_cliente = $_GET['nombre_cliente']; 
    // gets value sent over search form     
    $min_length = 3;
    // you can set minimum length of the query if you want     
    if(strlen($nombre_cliente) >= $min_length){ // if query length is more or equal minimum length then         
       $nombre_cliente = htmlspecialchars($nombre_cliente); 
        // changes characters used in html to their equivalents, for example: < to &gt;         
       $conexion = mysqli_connect($db_server,$db_user,$db_pass,$db_name) or die ("Error: ".mysqli_error($conexion));

       @mysql_query("SET NAMES 'utf8'",$link);
      $conexion->set_charset("utf8");  

       $query = "SELECT * FROM productos WHERE (`descripcion` LIKE '%".$nombre_cliente."%') OR (`referencia` LIKE '%".$nombre_cliente."%') ";
       //$query = "SELECT * , (SELECT SUM( coste ) FROM facturacion WHERE clientes.ID = facturacion.ID_fact ) AS gastado FROM clientes WHERE (`nombre` LIKE '%".$nombre_cliente."%') OR (`apellidos` LIKE '%".$nombre_cliente."%')";

       @mysql_query("SET NAMES 'utf8'",$link);
      $conexion->set_charset("utf8");  

       $resultado = $conexion->query($query); 
       if(mysqli_num_rows($resultado) > 0){
         // if one or more rows are returned do following
        echo "
        <div id='third-container' class='cotentTable cotentTableSearch'>           
        <table class='table table-bordered table-hover table-striped table-condensed'><tbody>

        <tr>
        <th>ID CATEGORIA</th>
        <th>CATEGORIA</th> 
        <th>DESCRIPCION </th>
        <th>REFERENCIA</th>            
        <th>FOTO</th>
        <th>editar</th>   
        </tr>
        ";             
        while($results = mysqli_fetch_array($resultado)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop             
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
            <input class='' type='hidden' value='".$results['id']."' name='id' placeholder='".$results['id']."'>
            <input class='btn btn-default btn-Edit-Sea' type='submit' name='enviar' value='EDITAR'>  
            </form>
            </td></tr>";
        }
        echo "</tbody> </table>";
        $conexion->close();
    }
        else{ // if there is no matching rows do following
            echo "
            <div class='contentNameOk' style='margin: 0 auto; display: block;'> 
            <p style='font-size: 20px;'>Ups!!No se han encotrado resultados.</p>
            <p style='font-size: 20px;'>Anda vuelve a buscar!</p>     
            </div>
            ";
            $conexion->close();
        }

    }
    else{ // if query length is less than minimum
        echo "
        <div class='contentNameOk' style='margin: 0 auto; display: block;'> 
        <p style='font-size: 20px;'>Has de informar mínimo 3 carácteres. </p>
        <p style='font-size: 20px;'>Anda vuelve a buscar!</p> 
        </div>
        ";
    }
    ?> 

    

    <div class="my-navigation">
        <div class="simple-pagination-first navigationItems"></div>
        <div class="simple-pagination-previous navigationItems"></div>
        <div class="simple-pagination-page-numbers navigationItems"></div>
        <div class="simple-pagination-next navigationItems"></div>
        <div class="simple-pagination-last navigationItems"></div>
    </div>
    <div style="margin:0 auto; max-width: 200px;">
        <div class="simple-pagination-page-x-of-x" style="display: inline-block"></div>
        <div class="simple-pagination-showing-x-of-x" style="display: inline-block"></div>
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