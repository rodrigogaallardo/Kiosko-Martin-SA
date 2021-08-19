<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/estilos.css">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<title>Borrar Stock</title>
</head>
<header >
	<div class="guirnalda"><img src="img/guirnalda.png" class="imagen1"></div>
</header>

<body>
<?php
	$u = "<h2 class= 'titulos' >";
	$o = "</h2>";
	$con =mysqli_connect("localhost","root","","Kiosco")or die("<h2>No se encuentra el servidor</h2>");
	$ID_art = $_POST['ID_art'];
	$req =(strlen($ID_art)) or die("No se han llenado todos los campos");

		$sql1="SELECT * from stock where ID_art= '$ID_art'";
		$resultado= mysqli_query($con,$sql1);
		$filas=mysqli_num_rows($resultado);

		if ($filas > 0) {
			mysqli_query($con,("DELETE FROM stock WHERE ID_art ='$ID_art'"));

			echo $u."Se elimino articulo correctamente.".$o ; 
			
		} else{
			echo  $u."Numero de articulo n° ".$ID_art." no existe".$o ; 
			
		}

		
	echo $u.'<a href="borrarStock.html" class="session"> VOLVER </a>'.$o ; 
	echo $u.'<a href="STOCK.php" class="session"> VER STOCK </a>'.$o ;
	echo $u.'<a href="index.html" class="session"> INICIO </a>'.$o ;

?>
</body>