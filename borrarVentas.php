<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/estilos.css">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	

	<title>borrarVentas</title>
</head>
<header >
	<div class="guirnalda"><img src="img/guirnalda.png" class="imagen1"></div>
</header>
<body>
<?php
	$u = "<h2 class= 'titulos' >";
	$o = "</h2>";
	$con =mysqli_connect("localhost","root","","Kiosco")or die("<h2>No se encuentra el servidor</h2>");
	$Transaccion = $_POST['Transaccion'];
	$req =(strlen($Transaccion)) or die("No se han llenado todos los campos");
	$sql1="SELECT * from ventas where Transaccion= '$Transaccion'";
	$resultado= mysqli_query($con,$sql1);
	$filas=mysqli_num_rows($resultado);

	if ($filas > 0) {
			
		$cant=mysqli_query($con,("SELECT Cantidad from ventas where Transaccion= '$Transaccion'"));
		$row1 = $cant->	fetch_assoc();
   		echo $u."La cantidad es ".$row1['Cantidad'].$o;
   		$Q=$row1['Cantidad'];
   					

		$art=mysqli_query($con,("SELECT Articulo from ventas where Transaccion= '$Transaccion'"));
		$row2 = $art->fetch_assoc();
   		echo $u."El articulo es ".$row2['Articulo'].$o;
   		$A= $row2['Articulo'];
					
		mysqli_query($con,("UPDATE stock SET cantidad= cantidad + $Q WHERE Articulo = '$A'")) or die("no se hizo");
		mysqli_query($con,("DELETE FROM ventas WHERE Transaccion ='$Transaccion'"));

		echo $u."Se Elimino Venta correctamente y se agrego producto al stock de nuevo ".$o ; 
		} else
		{echo   $u."La transaccion n° " .$Transaccion.", no existe.".$o;}
	
	
	echo $u.'<a href="borrarVentas.html" class="session"> VOLVER </a> '.$o; 
	echo $u.'<a href="STOCK.php" class="session"> VER STOCK </a> '.$o;
	echo $u.'<a href="index.html" class="session"> INICIO </a> '.$o;
	
?>
</body>
