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
						<h3 class="text-center">Lista de empleados</h3>
				</div>
				<table class="table">
				<thead>
 						<tr>
			                	<th>Nombre	</th>
			                	<th>Area		</th>
						<th>Opciones				</th>
			                </tr>
				</thead>
				<tbody>
					<?php
						include 'database.php';
						   	$pdo = Database::connect();
						   	$sql = 'SELECT Trabajador.ID as ID, Trabajador.Nombre, Area.Nombre as Area FROM Trabajador join Area on Trabajador.Area = Area.ID ORDER BY ID';
		 				   	foreach ($pdo->query($sql) as $row) {
								echo '<tr>';
	    					   	echo '<td>'. $row['Nombre'] . '</td>';
							echo '<td>'. $row['Area'] . '</td>';
	    					  	//echo '<td>';  echo ($row['RFC'])?$row['RFC']:"NO"; echo'</td>';
										echo '<td width=250>';
	    					   	echo '<a class="btn btn-sm" href="empleadosRead.php?id='.$row['ID'].'">Detalles</a>';
	    					   	echo '&nbsp;';
	    					  	echo '<a class="btn btn-success btn-sm" href="empleadosUpdate.php?id='.$row['ID'].'">Actualizar</a>';
	    					   	echo '&nbsp;';
	    					   	echo '<a class="btn btn-danger btn-sm" href="empleadosDelete.php?id='.$row['ID'].'">Eliminar</a>';
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
