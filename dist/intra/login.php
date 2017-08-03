<?php
	//conexion
	include "Connections/productos.php";
	
	//iniciar la session
	
	session_start();
	
	//recoger la infromacion enviada

	 $MM_redirectLoginSuccess = "productos.php";
     $MM_redirectLoginFailed = "index.php";
	
	$usuario = $_POST ['usuario'];
	$contrasena = $_POST['contrasena'];
	
	//Realizar conexión con la base de datos
	
	$conexion = mysqli_connect($db_server,$db_user,$db_pass,$db_name) or die ("Error: ".mysqli_error($conexion));
	
	//consulta a realizar
	
	$query = "SELECT * FROM usuario WHERE nombre = '$usuario' AND contrasena = '$contrasena'";
	
	
	//lanzamos la consulta
	
	$resultado = $conexion->query($query);
	
	//Comprobamos el resultado
	
	if( mysqli_num_rows($resultado) > 0)
	
	{
		//login correcto
		//crear las variables de sesión
		$_SESSION['usuario'] = $usuaio;
		$_SESSION['contrasena'] = $contrasena;
		echo true;
		echo('OK');

		if (!session_id())
              session_start();
          $_SESSION['logon'] = true;
		header("Location: " . $MM_redirectLoginSuccess );
	}
	else
	{
	 // El usuario o contraseña no existe	
	 	echo false;
	 	echo('mierda');
	 	header("Location: ". $MM_redirectLoginFailed );
	}
	
	mysqli_close($conexion);
?>
