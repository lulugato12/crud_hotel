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
			<div class="col-sm-6">
				<!-- mostrar informacion del hotel -->
				<div class="row">
					<h3 class="text-center">Habitaciones</h3>
				</div>
				<div class="row">
					<div class="col-sm-offset-4 col-sm-2">
						<a class="btn btn-success btn-md" href="habitacionCreate.php">Agregar habitacion</a>
					</div>
				</div>
				<div class="row">
					<table class="table">
						<thead>
							<tr>
								<th>Habitacion</th>
								<th>Disponible</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
								include 'database.php';
								$pdo = Database::connect();
								$sql = 'SELECT * FROM Habitacion';
					 			foreach ($pdo->query($sql) as $row) {
									echo '<tr><td>'.$row['ID'].'</td><td>';
									echo '</td><td><button type="button" class="btn btn-primary">Check-in</button><button type="button" class="btn btn-success">Check-out</button><button type="button" class="btn btn-info">Detalles</button>';
									echo '</td></tr>';
								}
								Database::disconnect();
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="row">
					<h3 class="text-center">Facturas</h3>
				</div>
				<div class="row">
					<div class="col-sm-offset-3 col-sm-1">
						<a type="button" class="btn btn-success btn-md" href="facturaCreate.php">Agregar factura</a>
					</div>
				</div>
				<div class="row">
					<table class="table">
						<thead>
							<tr>
								<th>Cliente</th>
								<th>Precio</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$count = 0;
								$sql = 'SELECT Factura.ID as ID, Cliente.Nombre as Nombre, Precio FROM Factura JOIN Cliente ON Factura.Cliente = Cliente.ID WHERE Hecha = false';
					 			foreach ($pdo->query($sql) as $row) {
									$count += 1;
									echo '<tr><td>'.$row['Nombre'].'</td>';
									echo '<td>'.$row['Precio'].'</td>';
									echo '<td><a class="btn btn-danger" href="hecha.php?id='.$row['ID'].'">Hecho</a></td></tr>';
								}
								Database::disconnect();
							?>
						</tbody>
					</table>
					<?php
						if($count == 0){
							echo '<p class="text-center">No hay facturas pendientes</p>';
						}
					?>
				</div>
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
