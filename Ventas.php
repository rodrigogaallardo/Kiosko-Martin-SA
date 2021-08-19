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
	$con =mysqli_connect("localhost","root","","kiosco")or die("<h2>No se encuentra el servidor</h2>");
	$articulo=$_POST['articulo'];
	$cantidad = $_POST['cantidad'];
	$PreciodeVenta = $_POST['PreciodeVenta'];
	$fecha= date("Y-m-d");;
	$req =(strlen($articulo)*strlen($cantidad)*strlen($PreciodeVenta)) or die("No se han llenado todos los campos");
	
	$sql2= "SELECT * from stock where articulo = '$articulo' and cantidad >= $cantidad";
			$resultado2= mysqli_query($con,$sql2);
			$filas=mysqli_num_rows($resultado2);

		if ($filas>0) {

			$fact=mysqli_query($con,("INSERT INTO ventas VALUES ('','$articulo','$cantidad','$PreciodeVenta','$fecha')"));
			//echo "se registro venta";
			print $u."Se registro venta".$o;

		} else {
		//echo "No es posible registrar venta";
		print $u."No es posible registrar venta".$o;
		}

		

		$sql1="SELECT * from stock where articulo = '$articulo'";
		$resultado= mysqli_query($con,$sql1);
		$filas=mysqli_num_rows($resultado);


		if ($filas>0) {
			
			$sql2= "SELECT * from stock where articulo = '$articulo' and cantidad > 0";
			$resultado2= mysqli_query($con,$sql2);
			$filas=mysqli_num_rows($resultado2);

			if ($filas>0) {
				
				$stock=mysqli_query($con,("UPDATE stock SET cantidad= cantidad - $cantidad WHERE articulo = '$articulo'"));
				//mysqli_query($con,("INSERT INTO Facturacion (Total,Fecha) VALUES ('$resultado','$fecha')"));
				$var= 1;
				//echo " Se registro correctamente en stock";
				print $u."Se registro correctamente en stock".$o;

			} else {
				//echo " No hay cantidad en STOCK"; 
				//echo " ud indico en cantidad : ".$cantidad;
				print $u."No hay cantidad en STOCK".$o;
				print $u."Ud indico en cantidad : ".$cantidad.$o;
			}




		} else {
			//echo " Producto no existe en STOCK"; 
			//echo " ud indico en articulo : ".$articulo;
			print $u."Producto no existe en STOCK".$o;
			print $u."Ud indico en cantidad : ".$cantidad.$o;

		}

	
		echo $u.'<a href="index.html" target:"_blank" class="session"> INICIO </a> </div>'.$o ;

		echo $u.'<a href="Ventas.html" target:"_blank" class="session"> Cargar mas ventas </a> </div>'.$o;


?>

</body>