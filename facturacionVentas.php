<?php
	$conexion =mysqli_connect("localhost","root","","kiosco")or die("<h2>No se encuentra el servidor</h2>");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<script type="text/javascript" src="JS/jquery-1.11.3.min.js" ></script>
		<title>Facturacion</title>
		<link rel="stylesheet" href="css/estilos.css">
	</head>
	<style type="text/css">

		body{width: 90%;height: 0 auto;text-align: center; margin-left: 30%;margin-top: 5%;background-color:;}
		
		
		table{width: 40%;height: 0 auto; border: solid 1px #FF6B6B;
			border-collapse:collapse;
			caption-side: top;
		}
		caption{
			margin-bottom: 1rem;
			color:white;
			background-color:orangered;
			font-weight:bold;

		}

		th{
			background-color:orangered;
			color:white;
		}

		tr:nth-child(even){
			background-color: #E1FCFB;
		}
		tr:nth-child(odd){
			background-color: #f6f6f6;
		}
		
		* {outline: none !important;}
		textarea:focus, input:focus {outline: none !important;}
		a {width:10%;height: 0 auto;color: black; font-family: arial; text-decoration: none;font-size: 15px;border: solid 1px black;background-color: silver;padding:2%;margin-right: 65%;}
		a:hover {color: black; font-family: arial; text-decoration: none;}
		a:visited {color: black; font-family: arial; text-decoration: none;	}
		.session{
			border-radius: 5rem;
		}

		div{
			margin-right: 60%;
			margin-top: 1rem;
			text-align: center;
			
			background-color:orangered;
			color:white;
			align-items: center center;
		}

	</style>

	<body>

		<table border="1px">
			<caption>Facturación de ventas</caption>
			<tr>
				
				<th>Transaccion</th>
				<th>Articulo</th>
				<th>Cantidad</th>
				<th>Precio de Venta</th>
				<th>Fecha</th>

			</tr>

			<?php

			$sql="SELECT * from ventas";
			$result= mysqli_query ($conexion,$sql);
			while ($mostrar= mysqli_fetch_array($result)) {
			?>

			<tr>
			
				<td><?php echo $mostrar ['Transaccion']?></td>
				<td><?php echo $mostrar ['Articulo']?></td>
				<td><?php echo $mostrar ['Cantidad']?></td>	
				<td><?php echo $mostrar ['PrecioDeVenta']?></td>
				<td><?php echo $mostrar ['Fecha']?></td>
			</tr>

			<?php
			}
			?>
		</table>

		<?php

		$Total= mysqli_query($conexion,("SELECT sum(PrecioDeVenta) from ventas"));

		
		
		while ($mostrar= mysqli_fetch_array($Total)) {
			?>

			
				<div>
				La suma total de ventas es : <?php echo $mostrar ['sum(PrecioDeVenta)']?>
				</div>
				
			

			<?php
			}
			$fecha= date("Y-m-d");
			
	
		$dia= mysqli_query($conexion,("SELECT sum(PrecioDeVenta) from ventas where Fecha = '$fecha'"));
		//'MONTH(CURDATE()'

		while ($mostra= mysqli_fetch_array($dia)) {
			?>
			<div>
			La suma total de ventas del dia : <?php echo $mostra ['sum(PrecioDeVenta)']?>
			</div><br>
			<?php
			}
		?>

		<a href="index.html" target:"_blank" class="session" > VOLVER </a> <br><br>
		<a href="BorrarVentas.html" target:"_blank" class="session" > BORRAR </a> 

		



	</body>
</html>