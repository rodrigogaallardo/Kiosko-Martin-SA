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
	$db=mysqli_connect("localhost","root","","kiosco")or die("<h2>No se encuentra el servidor</h2>");
	$articulo=$_POST['articulo'];
	$cantidad = $_POST['cantidad'];
	$PrecioCosto=$_POST['PrecioCosto'];
	$fecha= date("Y-m-d");;
	$req =(strlen($articulo)*strlen($cantidad)*strlen($PrecioCosto)) or die("No se han llenado todos los campos");

	if ($cantidad >0 ) {

			$consulta= "SELECT * FROM stock where articulo = '$articulo'";
			$resul=mysqli_query($db,$consulta);
			$dato= mysqli_num_rows($resul);

	    if ($dato>0) {
		
			{mysqli_query($db,("UPDATE stock SET cantidad= cantidad + $cantidad WHERE articulo = '$articulo'"));
			mysqli_query($db,("INSERT INTO compras VALUES ('','$articulo','$cantidad','$PrecioCosto','$fecha')"));
				
			//echo "Se registro correctamente";
			//echo '<br></br>';
			//echo '<a href="index.html" target:"_blank"> INICIO </a> </div>' ;
			//echo '<br></br>';
			//echo '<a href="compras.html" target:"_blank"> VOLVER</a> </div>';

			print $u."Se registro correctamente".$o;
			print $u.'<a href="index.html" target:"_blank" class="session"> INICIO </a> </div>'.$o ;
			print $u.'<a href="compras.html" target:"_blank" class="session"> VOLVER </a> </div>'.$o ;


			}

	      } else {
			
			//echo "se registro Compra y se agrego nuevo producto al STOCK";
			print $u."Se registro Compra y se agrego nuevo producto al STOCK".$o;
			mysqli_query($db,("INSERT INTO stock  VALUES ('','$articulo','$cantidad')"));
			mysqli_query($db,("INSERT INTO compras VALUES ('','$articulo','$cantidad','$PrecioCosto','$fecha')"));
			
			echo $u.'<a href="index.html" target:"_blank" class="session"> INICIO </a> </div>'.$o ;
			echo $u.'<a href="compras.html" target:"_blank" class="session"> Agregar otro producto </a> </div>'.$o ;}
	
	} else{
		//echo " no se puede agregar cantidad negativa, en la CANTIDAD indico: ".$cantidad;
		//echo '<br></br>';
		//echo '<a href="index.html" target:"_blank"> INICIO </a> </div>' ;
		//echo '<br></br>';
		//echo '<a href="compras.html" target:"_blank"> VOLVER</a> </div>';

		print $u."No se puede agregar cantidad negativa, en la CANTIDAD indico:".$o;
		echo $u.'<a href="index.html" target:"_blank" class="session"> INICIO </a> </div>'.$o ;
		echo $u.'<a href="compras.html" target:"_blank" class="session"> Agregar otro producto </a> </div>'.$o ;
	}

	
?>
</body>