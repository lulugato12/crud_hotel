<?php

	require 'database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( null==$id ) {
		header("Location: clientes.php");
	}

	if ( !empty($_POST)) {
		// keep track validation errors
		$f_idError = null;
		$nombreError = null;
		$rfcError = null;
		$correoError = null;
		$telError = null;


		// keep track post values
		$f_id = $_POST['f_id'];
		$nombre = $_POST['nombre'];
		$rfc = $_POST['rfc'];
		$correo = $_POST['correo'];
		$tel = $_POST['tel'];

		/// validate input
		$valid = true;

		if (empty($nombre)) {
			$nombreError = 'Porfavor escribe un nombre';
			$valid = false;
		}

		if (empty($rfc)) {
			$rfcError = 'Porfavor escribe un rfc';
			$valid = false;
		}

		if (empty($correo)) {
			$correoError = 'Porfavor escribe un correo';
			$valid = false;
		}

		if (empty($tel)) {
			$telError = 'Porfavor escribe un telefono';
			$valid = false;
		}


		// update data
		if ($valid) {

			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "UPDATE Cliente set ID = ?, Nombre = ?, Correo =?, RFC=?, Telefono = ? WHERE ID = ?";

			$q = $pdo->prepare($sql);

			$q->execute(array($f_id,$nombre,$correo,$rfc,$tel,$id));


			Database::disconnect();
			header("Location: clientes.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM Cliente where ID = ?";

		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$f_id = $data['ID'];
		$nombre = $data['Nombre'];
		$rfc = $data['RFC'];
		$correo = $data['Correo'];
		$tel = $data['Telefono'];

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
		    		<h3>Actualizar datos de un cliente</h3>
		    	</div>

	    			<form class="form-horizontal" action="clienteUpdate.php?id=<?php echo $id?>" method="post">

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

					 <div class="control-group <?php echo !empty($correo)?'error':'';?>">

					    <label class="control-label">Correo</label>
					    <div class="controls">
					      	<input name="correo" type="text" placeholder="correo" value="<?php echo !empty($correo)?$correo:'';?>">
					      	<?php if (!empty($correoError)): ?>
					      		<span class="help-inline"><?php echo $correoError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					 <div class="control-group <?php echo !empty($rfc)?'error':'';?>">

					    <label class="control-label">RFC</label>
					    <div class="controls">
					      	<input name="rfc" type="text" placeholder="rfc" value="<?php echo !empty($rfc)?$rfc:'';?>">
					      	<?php if (!empty($rfcError)): ?>
					      		<span class="help-inline"><?php echo $rfcError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					 <div class="control-group <?php echo !empty($tel)?'error':'';?>">

					    <label class="control-label">Telefono</label>
					    <div class="controls">
					      	<input name="tel" type="text" placeholder="tel" value="<?php echo !empty($tel)?$tel:'';?>">
					      	<?php if (!empty($telError)): ?>
					      		<span class="help-inline"><?php echo $telError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>


					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Actualizar</button>
						  <a class="btn" href="clientes.php">Regresar</a>
						</div>
					</form>
				</div>

    </div> <!-- /container -->
  </body>
</html>
