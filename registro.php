<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/estilos.css">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	

	<title>FormularioRegistro</title>
</head>
<header >
	<div class="guirnalda"><img src="img/guirnalda.png" class="imagen1"></div>
</header>
<body>
<?php

	$u = "<h2 class= 'titulos' >";
	$o = "</h2>";
	
	$con =mysqli_connect("localhost","root","","Kiosco")or die("<h2>No se encuentra el servidor</h2>");
	

	
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$Mail = $_POST['Mail'];
	$pass = $_POST['pass'];
	$rpass = $_POST['rpass'];

	
	$req =(strlen($nombre)*strlen($apellido)*strlen($Mail)*strlen($pass)*strlen($rpass)) or die("No se han llenado todos los campos");

	if ($pass != $rpass) {
		die('Las contraseñas no coinciden, Verifique <br /> <a href="index.html">Volver</a>');
		};

echo'<style>a {color: black; font-family: arial; text-decoration: none;border: solid 1px black;background-color: silver;padding:1px;}
		a:hover {color: black; font-family: arial; text-decoration: none;}
		a:visited {color: black; font-family: arial; text-decoration: none;} </style>';

	
	//$contraseñaUser = md5($pass);


		$sql1="SELECT * from usuarios where usuario = '$Mail'";
		$resultado= mysqli_query($con,$sql1);
		$filas=mysqli_num_rows($resultado);

		if ($filas > 0) {
			
			//echo "YA EXISTE ESE MAIL, debe ingresar otro ";
			//echo'<a href="registro.html"> VOLVER </a> ';

			print $u."Ya existe ese mail, debe ingreasar otro".$o;
			print $u.'<a href="registro.html" class="session"> VOLVER </a> '.$o;
		} else	
				{mysqli_query($con,("INSERT INTO usuarios VALUES ( '','$nombre','$apellido','$Mail','$pass')"))or die("<h2>No se encuentra el servidor</h2>");


		//echo "Se registro correctamente "; echo '<br></br>';
		//echo '<h2>Su usuario es : .$Mail </h2>';
		//echo " Su contraseña es : ".$pass;
		//echo " Haga click aqui para " ; echo'<a href="inicio.html"> INICIAR SESION </a> ';

		print $u."Se registro correctamente".$o;
		print $u."Su usuario es: ".$Mail.$o;
		print $u."Su contraseña es: ".$pass.$o;
		print $u."Haga click aqui para".'<br></br>'. '<a href="inicio.html" class="session"> INICIAR SESION </a> '.$o;
		}


?>
</body>
