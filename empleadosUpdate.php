<?php

	require 'database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( null==$id ) {
		header("Location: empleados.php");
	}

	if ( !empty($_POST)) {
		// keep track validation errors
		$f_idError = null;
		$nombreError = null;
		$areaError = null;
		$pagoError = null;
		$cumpleError = null;


		// keep track post values
		$f_id = $_POST['f_id'];
		$nombre = $_POST['nombre'];
		$area = $_POST['area'];
		$pago = $_POST['pago'];
		$cumple = $_POST['cumple'];

		/// validate input
		$valid = true;

		if (empty($nombre)) {
			$nombreError = 'Porfavor escribe un nombre';
			$valid = false;
		}

		if (empty($area)) {
			$areaError = 'Porfavor selecciona un area';
			$valid = false;
		}

		if (empty($pago)) {
			$pagoError = 'Porfavor escribe una cifra';
			$valid = false;
		}

		if (empty($cumple)) {
			$cumpleError = 'Porfavor selecciona una fecha';
			$valid = false;
		}


		// update data
		if ($valid) {

			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "UPDATE Trabajador set ID = ?, Nombre = ?, Area =?, Pago_dia=?, Cumple = ? WHERE ID = ?";

			$q = $pdo->prepare($sql);

			$q->execute(array($f_id,$nombre,$area,$pago,$cumple,$id));


			Database::disconnect();
			header("Location: empleados.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM Trabajador where ID = ?";

		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$f_id = $data['ID'];
		$nombre = $data['Nombre'];
		$area = $data['Area'];
		$pago = $data['Pago_dia'];
		$cumple = $data['Cumple'];

		Database::disconnect();
	}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta 	charset="utf-8">
			<link   href=	"css/bootstrap.min.css" rel="stylesheet">
	    <script src=	"js/bootstrap.min.js"></script>
	</head>

	<body>
    	<div class="container">
    		<div class="span10 offset1">
    			<div class="row">
		    		<h3>Actualizar datos de un empleado</h3>
		    	</div>

	    			<form class="form-horizontal" action="empleadosUpdate.php?id=<?php echo $id?>" method="post">

					  <div class="control-group <?php echo !empty($f_idError)?'error':'';?>">

					    <label class="control-label">ID</label>
					    <div class="controls">
					      	<input name="f_id" type="text" readonly placeholder="id" value="<?php echo !empty($id)?$id:''; ?>">
					      	<?php if (!empty($f_idError)): ?>
					      		<span class="help-inline"><?php echo $f_idError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>

					  <div class="control-group <?php echo !empty($nombre)?'error':'';?>">

					    <label class="control-label">Nombre</label>
					    <div class="controls">
					      	<input name="nombre" type="text" placeholder="nombre" value="<?php echo !empty($nombre)?$nombre:'';?>">
					      	<?php if (!empty($nombreError)): ?>
					      		<span class="help-inline"><?php echo $nombreError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					
					<div class="control-group <?php echo !empty($areaError)?'error':'';?>">
					    	<label class="control-label">Area</label>
					    	<div class="controls">
                            	<select name ="area">
                                    <option value="">Selecciona una area</option>
                                        <?php
					   						$pdo = Database::connect();
					   						$query = 'SELECT * FROM Area';
	 				   						foreach ($pdo->query($query) as $row) {
	 				   							if ($row['ID']==$area)
                        	   						echo "<option selected value='" . $row['ID'] . "'>" . $row['Nombre'] . "</option>";
                        	   					else
                        	   						echo "<option value='" . $row['ID'] . "'>" . $row['Nombre'] . "</option>";
					   						}
					   						Database::disconnect();
					  					?>
					 </select>
					      	<?php if (!empty($areaError)): ?>
					      		<span class="help-inline"><?php echo $areaError;?></span>
					      	<?php endif;?>
					    	</div>
					  	</div>



					 <div class="control-group <?php echo !empty($pago)?'error':'';?>">

					    <label class="control-label">Pago</label>
					    <div class="controls">
					      	<input name="pago" type="text" placeholder="pago" value="<?php echo !empty($pago)?$pago:'';?>">
					      	<?php if (!empty($pagoError)): ?>
					      		<span class="help-inline"><?php echo $pagoError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					 <div class="control-group <?php echo !empty($cumple)?'error':'';?>">

					    <label class="control-label">Cumpleaños</label>
					    <div class="controls">
					      	<input name="cumple" type="text" placeholder="cumple" value="<?php echo !empty($cumple)?$cumple:'';?>">
					      	<?php if (!empty($cumpleError)): ?>
					      		<span class="help-inline"><?php echo $cumpleError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					


					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Actualizar</button>
						  <a class="btn" href="empleados.php">Regresar</a>
						</div>
					</form>
				</div>

    </div> <!-- /container -->
  </body>
</html>
