<!DOCTYPE html>
<html lang="en">
	<head>
			<meta 	charset="utf-8">
			<link   href="css/bootstrap.min.css" rel="stylesheet">
			<script src="js/bootstrap.min.js"></script>
	</head>

	<body>
		<div class="container">
			<div class="row">
				<!-- cargar informacion del hotel -->
				<h3>Bienvenido al Hotel</h3>
		</div>
		<div class="row">
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
		</div>
	</body>
</html>
