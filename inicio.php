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
	$Mail = $_POST['Mail'];
	$Pass = $_POST['Pass'];
	$con = mysqli_connect("localhost","root","","kiosco") or die("<h2>No se encuentra el servidor</h2>");
	$sql1="SELECT * from usuarios  where usuario = '$Mail' and pass= '$Pass'" or die("<h2>No se encuentra ");
	$resultado= mysqli_query($con,$sql1);
	$filas=mysqli_num_rows($resultado);
	if ($filas>0) {
		header ("location:index.html"); 
	}
	else {
	echo $u."Error de autenticacion".$o;
	echo $u.'<a href="inicio.html" target:"_blank" class="session"> Volver </a>'.$o;
	}
?>
</body>