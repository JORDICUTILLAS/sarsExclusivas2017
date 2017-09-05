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
  <title>Busqueda Articulos</title>
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
    <H1 class="title">Añadir nuevo articulo</H1>           
    <form class="searchCli" name="form" ACTION="search.php" method="GET">           
      <input type="text" class="inputsLogin inputsearch" name="nombre_cliente" placeholder="Nombre o Apellidos">
      <input class="btnLogin btnsearch" type="submit" name="enviar" value="BUSCAR PRODUCTOS">           
    </form>
    <a href="todos-clientes.php" Title="BUSCAR TODOS LOS CLIENTES"><img src="img/icon-all.png" class="imgAll" alt="BUSCAR TODOS LOS CLIENTES"></a>
    <a href="anadir-cliente.php" Title="AÑADIR CLIENTE"><img src="img/add.png" class="imgAll" alt="AÑADIR CLIENTE"></a>
    <a href="reporteexcel.php" Title="DESCARGAR INFORME"><img src="img/excel.png" class="imgAll" alt="DESCARGAR INFORME"></a>
    <a href="clientes.php" Title="IR AL INICIO"><img src="img/home.png" class="imgAll" alt="IR AL INICIO"></a>
  </div>

  <div class='contentEditForm'>
    <form class='searchCli editwitdh' style='float:none;' name='form' ACTION='add.php' method='POST' enctype="multipart/form-data">

      <label class='labelEdit'>ID Categoria:</label>
      <input class='inputsLogin inputsEdit' type='text' id="id_cat" name='idcategoria' placeholder=''>


      <label class='labelEdit'>Desc. Categoria:</label>
      <select name='descategoria' id="decsCate">
        <option value="Tornillos para cubiertas y fachadas">Tornillos para cubiertas y fachadas</option>
        <option value="Tornillos broca, rosca chapa y PVC">Tornillos broca, rosca chapa y PVC</option>
        <option value="Tornillos para madera">Tornillos para madera</option>
        <option value="Tornillos para tabiquería seca">Tornillos para tabiquería seca</option>
        <option value="Tornillos de rosca métrica">Tornillos de rosca métrica</option>
        <option value="Tapones, puntas y accesorios">Tapones, puntas y accesorios</option>
        <option value="Anclajes químicos">Anclajes químicos</option>
        <option value="Anclajes plásticos">Anclajes plásticos</option>
        <option value="Anclajes metálicos">Anclajes metálicos</option>
        <option value="Fijación">Fijación</option>
        <option value="Abrazaderas">Abrazaderas</option>
        <option value="Accesorios y tornillería">Accesorios y tornillería</option>
        <option value="Soportación">Soportación</option>
        <option value="Conectores para madera">Conectores para madera</option>
        <option value="Puntas y alcayatas">Puntas y alcayatas</option>
        <option value="Remaches">Remaches</option>
        <option value="Herramientas">Herramientas</option>
        <option value="Maquinaria">Maquinaria</option>
      </select>                           


      <label class='labelEdit'>Referencia:</label>
      <input class='inputsLogin inputsEdit' type='text' name='referencia' placeholder=''>

      <label class='labelEdit'>FOTO:</label>
      <input class='inputsLogin inputsEdit' style ="display: inline-block;" name="foto" type="file" id="foto"> 

      <label class='labelEdit'>Oferta:</label>
      <input class='inputsLogin inputsEdit' value="0" type='checkbox' id="checkOfer" name='oferta' placeholder=''>

      <label class='labelEdit'>Novedad:</label>
      <input class='inputsLogin inputsEdit' type='checkbox' id="checkNew" name='novedad' value="0" placeholder=''>           


      <label class='labelEdit'>Descripcion:</label>
      <textarea rows='10' id='date' cols='10' name='descripcion' style='width:100%'></textarea>

      <input class='btnLogin btnEdit' type='submit' name='enviar' value='ARTICULO NUEVO' STYLE='width:48%; margin-right:2%; box-sizing:border-box;'><a href='productos.php' STYLE='width:48%; line-height: 45px; box-sizing:border-box; vertical-align: bottom;' class='btnLogin btnEdit'> CANCELAR </a> 

    </form>
  </div> 


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!–- Importante llamar antes a jQuery para que funcione bootstrap.min.js   -–> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> <!–- Llamamos al JavaScript  a través de CDN -–>

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

    <script type="text/javascript">
    $(document).ready(function(){
     var value = $('#decsCate').find('option:selected').val();
     $('#id_cat').val('1');

     $('#decsCate').change(function(){

      var valueClick = $('#decsCate').find('option:selected').val();

      if ( valueClick == 'Tornillos para cubiertas y fachadas'){
        $('#id_cat').val('1');
      }

      if ( valueClick == 'Tornillos broca, rosca chapa y PVC'){
        $('#id_cat').val('2');
      }

      if ( valueClick == 'Tornillos para madera'){
        $('#id_cat').val('3');
      }

      if ( valueClick == 'Tornillos para tabiquería seca'){
        $('#id_cat').val('4');
      }

      if ( valueClick == 'Tornillos de rosca métrica'){
        $('#id_cat').val('5');
      }

      if ( valueClick == 'Tapones, puntas y accesorios'){
        $('#id_cat').val('6');
      }

      if ( valueClick == 'Anclajes metálicos'){
        $('#id_cat').val('7');
      }

      if ( valueClick == 'Anclajes químicos'){
        $('#id_cat').val('8');
      }

      if ( valueClick == 'Anclajes plásticos'){
        $('#id_cat').val('9');
      }

      if ( valueClick == 'Fijación'){
        $('#id_cat').val('10');
      }

      if ( valueClick == 'Abrazaderas'){
        $('#id_cat').val('11');
      }

      if ( valueClick == 'Accesorios y tornillería'){
        $('#id_cat').val('12');
      }

      if ( valueClick == 'Soportación'){
        $('#id_cat').val('13');
      }

      if ( valueClick == 'Conectores para madera'){
        $('#id_cat').val('14');
      }

      if ( valueClick == 'Puntas y alcayatas'){
        $('#id_cat').val('15');
      }

      if ( valueClick == 'Remaches'){
        $('#id_cat').val('16');
      }

      if ( valueClick == 'Herramientas'){
        $('#id_cat').val('17');
      }

      if ( valueClick == 'Maquinaria'){
        $('#id_cat').val('18');
      }    

      console.log(valueClick);
    });

});
</script> 
</body>
</html>