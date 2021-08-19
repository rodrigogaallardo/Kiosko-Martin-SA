<?php

	$conexion =mysqli_connect("localhost","root","","kiosco")or die("<h2>No se encuentra el servidor</h2>");
	
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<script type="text/javascript" src="JS/jquery-1.11.3.min.js" ></script>
	
		<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
		<title>Stock</title>
		<link rel="stylesheet" href="css/estilos.css">
	</head>
	
	<style type="text/css">
		
		body{width: 90%;height: 0 auto;text-align: center; margin-left: 30%;margin-top: 5%;}
		.session{
   		 background-color: aliceblue;
    	border-radius: 5rem;
    	align-items: center;
    	margin-left: 3.5rem;
    	padding: 3px 10px;
     	border: PowderBlue 0.2rem solid;
    	text-align: center;
		}
		a{
    	outline: none;
  		text-decoration: none;
  		padding: 2px 1px 0;
		}
		
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

		
		
		a {margin-right: 65%;width:10%;height: 0 auto;color: black; font-family: arial; text-decoration: none;font-size: 15px;border: solid 1px black;background-color: silver;padding:2%;}
		a:hover {color: black; font-family: arial; text-decoration: none;}
		a:visited {color: black; font-family: arial; text-decoration: none;}
	</style>
	<body>
		

		<table border="1">
			<caption>Control de Stock</caption>
			<tr>
				<th>ID_art</th>
				<th>Articulo</th>
				<th>Cantidad</th>
			</tr>

			<?php

			$sql="SELECT * from STOCK";
			$result= mysqli_query ($conexion,$sql);
			while ($mostrar= mysqli_fetch_array($result)) {
			?>

			<tr>
			
				<td><?php echo $mostrar ['ID_art']?></td>
				<td><?php echo $mostrar ['Articulo']?></td>
				<td><?php echo $mostrar ['Cantidad']?></td>	
			</tr>

			<?php
			}
			?>
		</table><br><br>
	
		<a href="index.html" target:"_blank" class="session" > VOLVER </a><br><br>	
	
		<a href="borrarStock.html" target:"_blank" class="session" > BORRAR STOCK </a> 

	</body>
</html>