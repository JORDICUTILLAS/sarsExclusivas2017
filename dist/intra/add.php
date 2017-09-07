
<?php
header("Content-Type: text/html;charset=utf-8");
include "Connections/productos.php";
if (!session_id()) session_start();
if (!$_SESSION['logon']){ 
    header("Location:index.php");
    die();
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Busqueda Productos</title>
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
<body><div class="headSearch" style="position:inherit">
    <H1 class="title">Añadir Articulo OK!</H1>           
    <form class="searchCli" name="form" ACTION="search.php" method="GET">           
        <input type="text" class="inputsLogin inputsearch" name="nombre_cliente" placeholder="Nombre o Apellidos">
        <input class="btnLogin btnsearch" type="submit" name="enviar" value="BUSCAR PRODUCTO">           
    </form>
   <a href="todos-articulos.php" Title="BUSCAR TODOS LOS ARTICULOS"><img src="img/icon-all.png" class="imgAll" alt="BUSCAR TODOS LOS ARTICULOS"></a>
        <a href="anadir-articulo.php" Title="AÑADIR ARTICULOS"><img src="img/add.png" class="imgAll" alt="AÑADIR ARTICULOS"></a>
        <a href="reporteexcel.php" Title="DESCARGAR INFORME"><img src="img/excel.png" class="imgAll" alt="DESCARGAR INFORME"></a>
        <a href="productos.php" Title="IR AL INICIO"><img src="img/home.png" class="imgAll" alt="IR AL INICIO"></a>
</div>    



<?php  

$target = "img/" . basename($_FILES['foto']['name']);

$idcategoria =  $_POST['idcategoria'];
$descategoria = $_POST['descategoria'];
$referencia = $_POST['referencia'];
$foto = $target;
$oferta = $_POST['oferta'];
$novedad = $_POST['novedad'];
$descripcion = $_POST['descripcion'];





    // gets value sent over search form     
$min_length = 3;
    // you can set minimum length of the query if you want     
    if(strlen($referencia) >= $min_length){ // if query length is more or equal minimum length then
       move_uploaded_file($_FILES['foto']['tmp_name'], $target);          
       $idcategoria = htmlspecialchars($idcategoria); 
        // changes characters used in html to their equivalents, for example: < to &gt;         
       $conexion = mysqli_connect($db_server,$db_user,$db_pass,$db_name) or die ("Error: ".mysqli_error($conexion)); 
       
       @mysql_query("SET NAMES 'utf8'",$link);
       $conexion->set_charset("utf8");
      

       $query = "INSERT into productos(
        id_categoria, 
        desc_categoria, 
        descripcion, 
        referencia, 
        foto, 
        oferta, 
        novedad 
        
    )
values
(
    '".$idcategoria."',
    '".$descategoria."',
    '".$descripcion."',
    '".$referencia."',
    '".$foto."',
    '".$oferta."',
    '".$novedad."'

    )";

    
    @mysql_query("SET NAMES 'utf8'",$link);
    $conexion->set_charset("utf8");  


if ($conexion->query($query) === TRUE) {
        //echo "ACTUALIZADO CORRECTAMENTE ROSALIA TONTA!!!";
    $conexion->close(); 

    } else {
        echo "Error updating record: " . $conexion->error;
        $conexion->close();
    }

}
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }
    ?>  


    <div class="contentNameOk" style="margin: 0 auto; display: block;">
        <p> <?php echo $referencia ?> </p>        
        <p style="font-size: 20px;"> Actualizado correctamente!</p>
        <a href="productos.php">volver</a>
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
</body>
</html>