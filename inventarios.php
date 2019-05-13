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
					<p class="text-center">Clientes</p>
				</div>
				<div class="row">
					<p class="text-center">Empleados</p>
				</div>
				<div class="row">
					<p class="text-center">Inventarios</p>
				</div>
				<div class="row">
					<p class="text-center">Cerrar sesion</p>
				</div>
			</div>
			<div class="col-sm-9">
				<!-- mostrar informacion del hotel -->
				<h3 class="text-center">Inventarios</h3>
			</div>
        <!-- vista previa inventarios -->
				<?php
						/*include 'database.php';
						   	$pdo = Database::connect();
						   	$sql = 'SELECT * FROM auto2 natural join marca2 ORDER BY idauto';
		 				   	foreach ($pdo->query($sql) as $row) {
								echo '<tr>';
	    					   	echo '<td>'. $row['nombrec'] . '</td>';
	    					  	echo '<td>'. $row['nombrem'] . '</td>';
	                            echo '<td>';    echo ($row['ac'])?"SI":"NO"; echo'</td>';
	                            echo '<td width=250>';
	    					   	echo '<a class="btn" href="read.php?id='.$row['idauto'].'">Detalles</a>';
	    					   	echo '&nbsp;';
	    					  	echo '<a class="btn btn-success" href="update.php?id='.$row['idauto'].'">Actualizar</a>';
	    					   	echo '&nbsp;';
	    					   	echo '<a class="btn btn-danger" href="delete.php?id='.$row['idauto'].'">Eliminar</a>';
	    					   	echo '</td>';
							  	echo '</tr>';
						    }
						   	Database::disconnect();*/
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
