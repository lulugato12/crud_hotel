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
			<div class="col-sm-2">
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
			<div class="col-sm-6">
				<!-- mostrar informacion del hotel -->
				<div class="row">
					<h3 class="text-center">Habitaciones</h3>
				</div>
				<div class="row">
					<div class="col-sm-offset-4 col-sm-2">
						<button type="button" class="btn btn-success btn-md">Agregar habitacion</button>
					</div>
				</div>
				<div class="row">
					<?php
						include 'database.php';
						$pdo = Database::connect();
						$num = 0;
						$sql = 'SELECT * FROM Habitacion';
						foreach ($pdo->query($sql) as $row) {
							$num += 1;
							echo $num%6==0?'<div class="row">':'';
							echo '<div class="col-sm-1"><p class="text-center">'.$row['ID'].'</p>';
							echo $row['Limpio'] == 'true'?'':'<p class="text-center">Esta sucio</p>';
							echo $row['Disponible'] == 'true'?'':'<p class="text-center">No esta disponible</p>';
							echo '</div>';
							echo $num%6==0?'</div>':'';
						}
						Database::disconnect();
					?>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="row">
					<h3 class="text-center">Facturas</h3>
				</div>
				<div class="row">
					<div class="col-sm-offset-3 col-sm-1">
						<button type="button" class="btn btn-success btn-md">Agregar factura</button>
					</div>
				</div>
				<div class="row">
					<table class="table">
						<thead>
							<th>Cliente</th>
							<th>Precio</th>
							<th>Opciones</th>
						</thead>
						<tbody>
							<?php
								$count = 0;
								$sql = 'SELECT Factura.ID as ID, Cliente.Nombre as Nombre, Precio FROM Factura JOIN Cliente ON Factura.Cliente = Cliente.ID';
					 			foreach ($pdo->query($sql) as $row) {
									$count += 1;
									echo '<tb>'.$row['Nombre'].'<tb>';
									echo '<tb>'.$row['Precio'].'<tb>';
									echo '<tb><button type="button" class="btn btn-info">Detalles</button><button type="button" class="btn btn-danger">Hecha</button>';
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
