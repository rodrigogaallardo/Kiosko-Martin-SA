<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/estilos.css">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<title>BorrarCompras</title>
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

	$sql1="SELECT * from compras where Transaccion= '$Transaccion'";
	$resultado= mysqli_query($con,$sql1);
	$filas=mysqli_num_rows($resultado);

		if ($filas > 0) {
			
			$cant=mysqli_query($con,("SELECT Cantidad from compras where Transaccion= '$Transaccion'"));
			$row1 = $cant->	fetch_assoc();
   			//echo "La cantidad es ".$row1['Cantidad'];
   			$Q=$row1['Cantidad'];
   			$art=mysqli_query($con,("SELECT Articulo from compras where Transaccion= '$Transaccion'"));
			$row2 = $art->fetch_assoc();
   			//echo "El articulo es ".$row2['Articulo'];
   			$A= $row2['Articulo'];
			mysqli_query($con,("UPDATE stock SET cantidad= cantidad - $Q WHERE Articulo = '$A'")) or die("no se hizo");
			mysqli_query($con,("DELETE FROM compras WHERE Transaccion ='$Transaccion'"));
			echo $u."Se Elimino Compra correctamente y se quito del stock ".$o  ;

		} else	
		{echo  $u."La transaccion n° " .$Transaccion.",no existe";}

	
	echo $u.'<a href="borrarCompras.html" class="session"> VOLVER </a> '.$o ; 
	echo $u.'<a href="STOCK.php" class="session"> VER STOCK </a> '.$o ;
	echo $u.'<a href="index.html" class="session"> INICIO </a> '.$o ;
	

?>
</body>
