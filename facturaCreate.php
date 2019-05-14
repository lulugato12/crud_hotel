<?php

	require 'database.php';

		$clienteError = null;
		$tipoError = null;
		$pagoError = null;
		$precioError   = null;
		//$perError = null;

	if ( !empty($_POST)) {

		// keep track post values
		$cliente = $_POST['cliente'];
		$tipo= $_POST['tipo'];
		$pago = $_POST['pago'];
		$precio   = $_POST['precio'];

		// validate input
		$valid = true;

		if (empty($cliente)) {
			$clienteError = 'Porfavor selecciona el cliente';
			$valid = false;
		}
		if (empty($tipo)) {
			$tipoError = 'Porfavor selecciona un tipo de factura';
			$valid = false;
		}
		if (empty($pago)) {
			$pagoError = 'Porfavor selecciona un metodo de pago';
			$valid = false;
		}
    if (empty($precio)) {
			$precioError = 'Porfavor escribe el precio';
			$valid = false;
		}

		// insert data
		if ($valid) {
			var_dump($_POST);
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO Factura (ID, Cliente, Precio, Tipo, Fecha_Generacion, Hecha, Metodo_pago) values(null, ?, ?, ?, CURRENT_DATE, false, ?)";
			$q = $pdo->prepare($sql);

			$q->execute(array($cliente, $precio, $tipo, $pago));
			Database::disconnect();
			header("Location: index.php");
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
		   			<h3>Agregar una factura</h3>
		   		</div>

				<form class="form-horizontal" action="facturaCreate.php" method="post">

          <div class="control-group <?php echo !empty($clienteError)?'error':'';?>">
				    	<label class="control-label">Cliente</label>
				    	<div class="controls">
	                       	<select name ="cliente">
		                        <option value="">Selecciona un cliente</option>
		                        <?php
							   		$pdo = Database::connect();
							   		$query = 'SELECT * FROM Cliente';
			 				   		foreach ($pdo->query($query) as $row) {
		                        		if ($row['ID']==$cliente)
		                        			echo "<option selected value='" . $row['ID'] . "'>" . $row['Nombre'] . "</option>";
		                        		else
		                        			echo "<option value='" . $row['ID'] . "'>" . $row['Nombre'] . "</option>";
			   						}
			   						Database::disconnect();
			  					?>
                            </select>
					      	<?php if (($clienteError) != null) ?>
					      		<span class="help-inline"><?php echo $clienteError;?></span>
						</div>
					</div>

					<div class="control-group <?php echo !empty($precioError)?'error':'';?>">
						<label class="control-label">Cantidad a facturar</label>
					    <div class="controls">
					      	<input name="precio" type="text"  placeholder="precio" value="<?php echo !empty($precio)?$precio:'';?>">
					      	<?php if (($precioError != null)) ?>
					      		<span class="help-inline"><?php echo $precioError;?></span>
					    </div>
					</div>

					<div class="control-group <?php echo !empty($tipoError)?'error':'';?>">
				    	<label class="control-label">Tipo de factura</label>
				    	<div class="controls">
	                       	<select name ="tipo">
		                        <option value="">Selecciona el tipo</option>
		                        <?php
							   		$pdo = Database::connect();
							   		$query = 'SELECT * FROM tipo_factura';
			 				   		foreach ($pdo->query($query) as $row) {
		                        		if ($row['ID']==$tipo)
		                        			echo "<option selected value='" . $row['ID'] . "'>" . $row['Nombre'] . "</option>";
		                        		else
		                        			echo "<option value='" . $row['ID'] . "'>" . $row['Nombre'] . "</option>";
			   						}
			   						Database::disconnect();
			  					?>
                            </select>
					      	<?php if (($tipoError) != null) ?>
					      		<span class="help-inline"><?php echo $tipoError;?></span>
						</div>
					</div>

          <div class="control-group <?php echo !empty($pagoError)?'error':'';?>">
				    	<label class="control-label">Metodo de pago</label>
				    	<div class="controls">
	                       	<select name ="pago">
		                        <option value="">Selecciona un metodo de pago</option>
		                        <?php
							   		$pdo = Database::connect();
							   		$query = 'SELECT * FROM Metodo_pago';
			 				   		foreach ($pdo->query($query) as $row) {
		                        		if ($row['// IDEA: ']==$pago)
		                        			echo "<option selected value='" . $row['ID'] . "'>" . $row['Nombre'] . "</option>";
		                        		else
		                        			echo "<option value='" . $row['ID'] . "'>" . $row['Nombre'] . "</option>";
			   						}
			   						Database::disconnect();
			  					?>
                            </select>
					      	<?php if (($pagoError) != null) ?>
					      		<span class="help-inline"><?php echo $pagoError;?></span>
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
