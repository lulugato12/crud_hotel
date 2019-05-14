<?php

	require 'database.php';

		$nombreError = null;
		//$perError = null;

	if ( !empty($_POST)) {

		// keep track post values
		$nombre = $_POST['nombre'];
		$rfc = $_POST['rfc'];
		$correo = $_POST['correo'];
		$tel = $_POST['tel'];

		// validate input
		$valid = true;

		if (empty($nombre)) {
			$nombreError = 'Porfavor escribe un nombre';
			$valid = false;
		}
		if (empty($rfc)) {
			$rfc = 'null';
		}
		if (empty($correo)) {
			$correo = 'null';
		}
		if (empty($tel)) {
			$tel = 'null';
		}

		// insert data
		if ($valid) {
			var_dump($_POST);
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO Cliente (ID, Nombre, Correo, RFC, Telefono) values(null, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);

			$q->execute(array($nombre, $correo, $rfc, $telefono));
			Database::disconnect();
			header("Location: clientes.php");
		}
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
		   			<h3>Agregar un cliente nuevo</h3>
		   		</div>

				<form class="form-horizontal" action="clienteCreate.php" method="post">

					<div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
						<label class="control-label">Nombre</label>
					    <div class="controls">
					      	<input name="nombre" type="text"  placeholder="nombre" value="<?php echo !empty(nombre)?nombre:'';?>">
					      	<?php if (($nombreError != null)) ?>
					      		<span class="help-inline"><?php echo $nombreError;?></span>
					    </div>
					</div>

					<div class="control-group">
						<label class="control-label">RFC</label>
					    <div class="controls">
					      	<input name="rfc" type="text"  placeholder="rfc">
					    </div>
					</div>

					<div class="control-group">
						<label class="control-label">Correo</label>
					    <div class="controls">
					      	<input name="correo" type="email"  placeholder="correo">
					    </div>
					</div>

					<div class="control-group">
						<label class="control-label">Telefono</label>
					    <div class="controls">
					      	<input name="tel" type="text"  placeholder="tel">
					    </div>
					</div>

					<div class="form-actions">
						<button type="submit" class="btn btn-success">Agregar</button>
						<a class="btn" href="index.php">Regresar</a>
					</div>

				</form>
			</div>
	    </div> <!-- /container -->
	</body>
</html>
