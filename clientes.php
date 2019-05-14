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
				<div class="col-sm-8">
					<!-- cargar informacion del hotel -->
					<h1>Bienvenido al Hotel</h1>
				</div>
				<div class="col-sm-4">
					<!-- cargar informacion del usuario -->
					<h3>Datos del usuario</h3>
				</div>
		</div>
		<!-- cuerpo -->
		<div class="row">
			<div class="col-sm-3">
				<!-- mostrar opciones -->
				<h3 class="text-center">Menu</h3>
				<div class="row">
					     <a href="dashboard.php"><p class="text-center">Inicio</p></a>
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
			<div class="col-sm-9">
				<!-- mostrar informacion del hotel -->
				<h3 class="text-center">Lista de clientes</h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						Nombre
					</tr>
					<tr>
						RFC
					</tr>
					<tr>
						Correo
					</tr>
					<tr>
						Telefono
					</tr>
					<tr>
						Opciones
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
				<?php
						include 'database.php';
						   	$pdo = Database::connect();
						   	$sql = 'SELECT * FROM Cliente';
		 				   	foreach ($pdo->query($sql) as $row) {
								echo '<tr>';
	    					   	echo '<td>'. $row['Nombre'] . '</td>';
	    					  	echo ($row['RFC'])?$row['RFC']:"NO"; echo'</td>';
										echo ($row['Correo'])?$row['Correo']:"NO"; echo'</td>';
										echo ($row['Telefono'])?$row['Telefono']:"NO"; echo'</td>';
										echo '<td width=250>';
	    					   	echo '<a class="btn" href="read.php?id='.$row['ID'].'">Detalles</a>';
	    					   	echo '&nbsp;';
	    					  	echo '<a class="btn btn-success" href="update.php?id='.$row['ID'].'">Actualizar</a>';
	    					   	echo '&nbsp;';
	    					   	echo '<a class="btn btn-danger" href="delete.php?id='.$row['ID'].'">Eliminar</a>';
	    					   	echo '</td>';
							  	echo '</tr>';
						    }
						   	Database::disconnect();
				?>
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
