<?php
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
    <div class="headSearch" style="position:inherit">
        <H1 class="title">Editar Articulo</H1>           
        <form class="searchCli" name="form" ACTION="search.php" method="GET">           
            <input type="text" class="inputsLogin inputsearch" name="nombre_cliente" placeholder="Nombre o Apellidos">
            <input class="btnLogin btnsearch" type="submit" name="enviar" value="BUSCAR PRODUCTOS">           
        </form>
        <a href="todos-articulos.php" Title="BUSCAR TODOS LOS ARTICULOS"><img src="img/icon-all.png" class="imgAll" alt="BUSCAR TODOS LOS ARTICULOS"></a>
        <a href="anadir-articulo.php" Title="AÑADIR ARTICULOS"><img src="img/add.png" class="imgAll" alt="AÑADIR ARTICULOS"></a>
        <a href="reporteexcel.php" Title="DESCARGAR INFORME"><img src="img/excel.png" class="imgAll" alt="DESCARGAR INFORME"></a>
        <a href="productos.php" Title="IR AL INICIO"><img src="img/home.png" class="imgAll" alt="IR AL INICIO"></a>
    </div>
    <?php
    $id = $_GET['id']; 
    // gets value sent over search form     
    $min_length = 1;
    // you can set minimum length of the query if you want     
    if(strlen($id) >= $min_length){ // if query length is more or equal minimum length then         
      $id = htmlspecialchars($id); 
        // changes characters used in html to their equivalents, for example: < to &gt;         
      $conexion = mysqli_connect($db_server,$db_user,$db_pass,$db_name) or die ("Error: ".mysqli_error($conexion));        
      $query = "SELECT * FROM productos WHERE (`id` LIKE ".$id.")";
      @mysql_query("SET NAMES 'utf8'",$link);
      $conexion->set_charset("utf8");  

      $resultado = $conexion->query($query); 
        if(mysqli_num_rows($resultado) > 0){ // if one or more rows are returned do following

            while($results = mysqli_fetch_array($resultado)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop             
                echo "
                <div class='contentEditForm'>
                <form class='searchCli editwitdh' style='float:none;' name='form' ACTION='update.php' method='GET'>               
                <input class='inputsLogin inputsEdit' type='hidden' value='".$results['id']."' name='id' placeholder='".$results['id']."'>
                
                <label class='labelEdit'>ID CATEGORIA:</label>
                <input class='inputsLogin inputsEdit' type='text' value='".$results['id_categoria']."' name='idcategoria' placeholder='".$results['id_categoria']."'>

                
                <label class='labelEdit'>Desc CATEGORIA:</label>
                <input class='inputsLogin inputsEdit' type='text' value='".$results['desc_categoria']."' name='descategoria' placeholder='".$results['desc_categoria']."'>

                <label class='labelEdit'>DESCRIPCIÓN:</label>
                <input class='inputsLogin inputsEdit' type='text' value='".$results['descripcion']."' name='descripcion' placeholder='".$results['descripcion']."'>
                
                <label class='labelEdit'>REFERENCIA:</label>
                <input class='inputsLogin inputsEdit' type='text' value='".$results['referencia']."' name='referencia' placeholder='".$results['referencia']."'>
                
                <label class='labelEdit'>FOTO:</label>
                <input class='inputsLogin inputsEdit' type='text' value='".$results['foto']."' name='foto' placeholder='".$results['foto']."'>
                
                <label class='labelEdit'>FOTO INFO:</label>
                <input class='inputsLogin inputsEdit' type='text' value='".$results['foto_info']."' name='foto_info' placeholder='".$results['foto_info']."'>
                
                <label class='labelEdit'>OFERTA:</label>
                <input class='inputsLogin inputsEdit' type='checkbox' id='checkOfer' value='".$results['oferta']."' name='oferta' placeholder='".$results['oferta']."'>


                <label class='labelEdit'>NOVEDAD:</label>
                <input class='inputsLogin inputsEdit' type='checkbox' id='checkNew' value='".$results['novedad']."' name='novedad' placeholder='".$results['novedad']."'>


                <input class='btnLogin btnEdit' type='submit' name='enviar' value='EDITAR' STYLE='width:48%; margin-right:2%; box-sizing:border-box;'><a href='productos.php' STYLE='width:48%; line-height: 45px; box-sizing:border-box; vertical-align: bottom;' class='btnLogin btnEdit'> CANCELAR </a> 

                </form>
                </div>
                ";

                $conexion->close();
            }

        }
        else{ // if there is no matching rows do following
            echo "No results";
            $conexion->close();
        }

    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }
    
    ?>




    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!–- Importante llamar antes a jQuery para que funcione bootstrap.min.js   -–> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> <!–- Llamamos al JavaScript  a través de CDN -–>  

    <script type="text/javascript">
    $(document).ready(function(){
        var atributo = $("#checkOfer").val();
        console.log (atributo);      
          if (atributo == "1")  {
            $("#checkOfer").prop('checked', true);
            console.log ('si');
        } else {
            $("#checkOfer").prop('checked', false); 
            console.log ('no');       
        }      
    
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
        var atributo = $("#checkNew").val();
        console.log (atributo);      
          if (atributo == "1")  {
            $("#checkNew").prop('checked', true);
        } else {
            $("#checkNew").prop('checked', false);        
        }      
    
    });
    </script>
    

    <script type="text/javascript">
    $(document).ready(function(){
        $("#checkOfer").on('change', function() {
          if ($(this).is(':checked')) {
            $(this).attr('value', '1');
        } else {
            $(this).attr('value', '0');
        }      
    });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
        $("#checkNew").on('change', function() {
          if ($(this).is(':checked')) {
            $(this).attr('value', '1');
        } else {
            $(this).attr('value', '0');
        }      
    });
    });
    </script>  

</body>
</html>