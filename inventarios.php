<!DOCTYPE html>
<html lang="es">
	<head>
			<meta charset="utf-8">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<!-- cabeza -->
			<div class="row">
				<div class="col-sm-12">
					<!-- cargar informacion del hotel -->
					<h1>Bienvenido al Hotel</h1>
				</div>
		</div>
		<!-- cuerpo -->
		<div class="row">
			<div class="col-sm-2">
				<!-- mostrar opciones -->
				<h3 class="text-center">Menu</h3>
				<div class="row">
					     <a href="index.php"><p class="text-center">Inicio</p></a>
				</div>
				<div class="row">
					     <a href="clientes.php"><p class="text-center">Clientes</p></a>
				</div>
				<div class="row">
          <a href="empleados.php"><p class="text-center">Empleados</p></a>
				</div>
				<div class="row">
          <a href="inventarios.php"><p class="text-center">Inventarios</p></a>
				</div>
			</div>
			<div class="col-sm-10">
				<!-- mostrar informacion del hotel -->
				<div class="row">
					<h3 class="text-center">Inventarios</h3>
				</div>

				<div class="row">
					<div class="col-sm-offset-4 col-sm-2">
						<a class="btn btn-success" href="productoCreate.php">Agregar producto</a>
					</div>
				</div>

				<h4 class="text-center">Lavanderia</h4>
				<table class="table">
				<thead>
 						<tr>
			                	<th>Producto	</th>
						<th>Cantidad	</th>
						<th>Opciones				</th>
			                </tr>
				</thead>
				<tbody>
					<?php
						include 'database.php';
						   	$pdo = Database::connect();
						   	$sql = 'SELECT Producto.ID as ID,Producto.Nombre as Nombre, Producto.Cantidad FROM Inventario join Producto ON Inventario.Producto=Producto.ID WHERE Inventario.Area=1';
		 				   	foreach ($pdo->query($sql) as $row) {
								echo '<tr>';
	    					   	echo '<td>'. $row['Nombre'] . '</td>';
							echo '<td>'. $row['Cantidad'] . '</td>';
	    					  	//echo '<td>';  echo ($row['RFC'])?$row['RFC']:"NO"; echo'</td>';
										echo '<td width=250>';
	    					   	echo '&nbsp;';
	    					  	echo '<a class="btn btn-success btn-sm" href="inventariosUpdate.php?id='.$row['ID'].'">Actualizar</a>';
	    					   	echo '&nbsp;';
	    					   	echo '<a class="btn btn-danger btn-sm" href="inventariosDelete.php?id='.$row['ID'].'">Eliminar</a>';
	    					   	echo '</td>';
							  	echo '</tr>';
						    }
						   	Database::disconnect();
				?>
				</tbody>
			</table>

			<h4 class="text-center">Restaurante</h4>
				<table class="table">
				<thead>
 						<tr>
			                	<th>Producto	</th>
						<th>Cantidad	</th>
						<th>Opciones				</th>
			                </tr>
				</thead>
				<tbody>
					<?php
						//include 'database.php';
						   	$pdo = Database::connect();
						   	$sql = 'SELECT Producto.ID as ID,Producto.Nombre as Nombre, Producto.Cantidad FROM Inventario join Producto ON Inventario.Producto=Producto.ID WHERE Inventario.Area=2';
		 				   	foreach ($pdo->query($sql) as $row) {
								echo '<tr>';
	    					   	echo '<td>'. $row['Nombre'] . '</td>';
							echo '<td>'. $row['Cantidad'] . '</td>';
	    					  	//echo '<td>';  echo ($row['RFC'])?$row['RFC']:"NO"; echo'</td>';
										echo '<td width=250>';
	    					   	echo '&nbsp;';
	    					  	echo '<a class="btn btn-success btn-sm" href="inventariosUpdate.php?id='.$row['ID'].'">Actualizar</a>';
	    					   	echo '&nbsp;';
	    					   	echo '<a class="btn btn-danger btn-sm" href="inventariosDelete.php?id='.$row['ID'].'">Eliminar</a>';
	    					   	echo '</td>';
							  	echo '</tr>';
						    }
						   	Database::disconnect();
				?>
				</tbody>
			</table>

			<h4 class="text-center">Hotel</h4>
				<table class="table">
				<thead>
 						<tr>
			                	<th>Producto	</th>
						<th>Cantidad	</th>
						<th>Opciones				</th>
			                </tr>
				</thead>
				<tbody>
					<?php
						//include 'database.php';
						   	$pdo = Database::connect();
						   	$sql = 'SELECT Producto.ID as ID,Producto.Nombre as Nombre, Producto.Cantidad FROM Inventario join Producto ON Inventario.Producto=Producto.ID WHERE Inventario.Area=3';
		 				   	foreach ($pdo->query($sql) as $row) {
								echo '<tr>';
	    					   	echo '<td>'. $row['Nombre'] . '</td>';
							echo '<td>'. $row['Cantidad'] . '</td>';
	    					  	//echo '<td>';  echo ($row['RFC'])?$row['RFC']:"NO"; echo'</td>';
										echo '<td width=250>';
	    					   	echo '&nbsp;';
	    					  	echo '<a class="btn btn-success btn-sm" href="inventariosUpdate.php?id='.$row['ID'].'">Actualizar</a>';
	    					   	echo '&nbsp;';
	    					   	echo '<a class="btn btn-danger btn-sm" href="inventariosDelete.php?id='.$row['ID'].'">Eliminar</a>';
	    					   	echo '</td>';
							  	echo '</tr>';
						    }
						   	Database::disconnect();
				?>
				</tbody>
			</table>
			</div>

			</div>
			<!-- pie de pagina -->
			<div class="row">
				<div class="col-sm-12">
					<!-- Informacion varia -->
					<p class="text-center">Creado por Jacqui y Lulu | 2019</p>
				</div>
			</div>
		</div>
	</body>
</html>
