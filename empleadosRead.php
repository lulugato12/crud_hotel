<?php
	require 'database.php';
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	if ( $id==null) {
		header("Location: empleados.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM Trabajador";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta 	charset="utf-8">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	</head>

	<body>
    	<div class="container">

    		<div class="span10 offset1">
    			<div class="row">
		    		<h3>Detalles del Empleado</h3>
		    	</div>

	    		<div class="form-horizontal" >

					<div class="control-group">
						<label class="control-label">id</label>
					    <div class="controls">
							<label class="checkbox">
								<?php echo $data['ID'];?>
							</label>
					    </div>
					</div>

					<div class="control-group">
					    <label class="control-label">Nombre</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['Nombre'];?>
						    </label>
					    </div>
					</div>

					<div class="control-group">
					    <label class="control-label">Area</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['Area'];?>
						    </label>
					    </div>
					</div>

					<div class="control-group">
					    <label class="control-label">Pago por dia</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['Pago_dia'];?>
						    </label>
					    </div>
					</div>

					<div class="control-group">
					    <label class="control-label">Cumple</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['Cumple'];?>
						    </label>
					    </div>
					</div>


				    <div class="form-actions">
						<a class="btn" href="empleados.php">Regresar</a>
					</div>

				</div>
			</div>
		</div> <!-- /container -->
  	</body>
</html>
