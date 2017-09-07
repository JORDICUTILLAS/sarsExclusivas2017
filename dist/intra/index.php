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
	<title>php-GESTION CLIENTES</title>
</head>
<body>
	<div class="back_full_screen">
		<div class="container alignVerticalHorizontal bgLogin">
			<div class="container col-center" style="max-width: 400px">
				<form class="form-horizontal center-element" name="form" ACTION="login.php" method="POST">
					<div class="contentLogo"><img style="margin-top: 25px; width: 90px; margin-bottom: 25px;" src="img/logo.png"></div>
					<p style="color:#9f9b9b; font-size:12px;"> GGESTION DE PRODUCTOS</p>
					<div class="form-group">					
						<div class="col-xs-12">
							<input type="text" class="inputsLogin" name="usuario" placeholder="Usuario">
						</div>
					</div>
					<div class="form-group">						
						<div class="col-xs-12">
							<input type="password" class="inputsLogin" name="contrasena" placeholder="Contraseña">
						</div>
					</div>
					<div class="col-center center-element">
						<input class="btnLogin" type="submit" name="enviar" value="ENTRAR">						
					</div>					
				</form>
			</div>
		</div>
	</div>		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!–- Importante llamar antes a jQuery para que funcione bootstrap.min.js   -–> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> <!–- Llamamos al JavaScript  a través de CDN -–>	
</body>
</html>