<?php

	require 'database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( null==$id ) {
		header("Location: inventarios.php");
	}

	if ( !empty($_POST)) {
		// keep track validation errors
		$f_idError = null;
		$nombreError = null;
		$pagoError = null;
		$cantidadError = null;

		// keep track post values
		$f_id = $_POST['f_id'];
		$nombre = $_POST['nombre'];
		$pago = $_POST['pago'];
		$cantidad = $_POST['cantidad'];

		/// validate input
		$valid = true;

		if (empty($nombre)) {
			$nombreError = 'Porfavor escribe un nombre';
			$valid = false;
		}

		
		if (empty($pago)) {
			$pagoError = 'Porfavor escribe una cifra';
			$valid = false;
		}

		if (empty($cantidad)) {
			$cantidadError = 'Porfavor selecciona una cantidad';
			$valid = false;
		}


		// update data
		if ($valid) {

			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "UPDATE Producto set ID = ?, Nombre = ?, Precio=?, Cantidad = ? WHERE ID = ?";

			$q = $pdo->prepare($sql);

			$q->execute(array($f_id,$nombre,$pago,$cantidad,$id));


			Database::disconnect();
			header("Location: inventarios.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM Producto where ID = ?";

		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$f_id = $data['ID'];
		$nombre = $data['Nombre'];
		
		$pago = $data['Precio'];
		$cantidad = $data['Cantidad'];

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
		    		<h3>Actualizar datos de un producto</h3>
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
					



					 <div class="control-group <?php echo !empty($pago)?'error':'';?>">

					    <label class="control-label">Pago</label>
					    <div class="controls">
					      	<input name="pago" type="text" placeholder="pago" value="<?php echo !empty($pago)?$pago:'';?>">
					      	<?php if (!empty($pagoError)): ?>
					      		<span class="help-inline"><?php echo $pagoError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					 <div class="control-group <?php echo !empty($cantidad)?'error':'';?>">

					    <label class="control-label">Cantidad</label>
					    <div class="controls">
					      	<input name="cantidad" type="text" placeholder="cantidad" value="<?php echo !empty($cantidad)?$cantidad:'';?>">
					      	<?php if (!empty($cantidadError)): ?>
					      		<span class="help-inline"><?php echo $cantidadError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					


					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Actualizar</button>
						  <a class="btn" href="inventarios.php">Regresar</a>
						</div>
					</form>
				</div>

    </div> <!-- /container -->
  </body>
</html>
