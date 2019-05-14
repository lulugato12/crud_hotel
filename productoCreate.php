<?php

	require 'database.php';

		$nombreError = null;
    $precioError = null;
    $cantError = null;
    $areaError = null;
		//$perError = null;

	if ( !empty($_POST)) {

		// keep track post values
		$nombre = $_POST['nombre'];
		$precio= $_POST['precio'];
		$cant = $_POST['cant'];
    $area = $_POST['area'];

		// validate input
		$valid = true;

		if (empty($nombre)) {
			$nombreError = 'Porfavor escribe un nombre';
			$valid = false;
		}
		if (empty($precio)) {
      $nombreError = 'Porfavor escribe el precio';
			$valid = false;
		}
		if (empty($cant)) {
      $cantError = 'Porfavor escribe la cantidad';
			$valid = false;
		}
    if (empty($area)) {
      $areaError = 'Porfavor selecciona el area';
			$valid = false;
		}

		// insert data
		if ($valid) {
			var_dump($_POST);
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO Producto (ID, Nombre, Precio, Cantidad) values(null, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($nombre, $precio, $cantidad));

      $sql = "SELECT ID FROM Producto WHERE Nombre = ?";
      $q = $pdo->prepare($sql);
      $id = $q->fetch(PDO::FETCH_ASSOC);

      $sql = "INSERT INTO Inventario (Producto, Area) values(?, ?)";
      $q = $pdo->prepare($sql);
      $q->execute(array($id, $area));

			Database::disconnect();
			header('Location: inventarios.php');
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
					      	<input name="nombre" type="text"  placeholder="nombre" >
					      	<?php if (($nombreError != null)) ?>
					      		<span class="help-inline"><?php echo $nombreError;?></span>
					    </div>
					</div>

          <div class="control-group <?php echo !empty($precioError)?'error':'';?>">
						<label class="control-label">Precio</label>
					    <div class="controls">
					      	<input name="precio" type="text"  placeholder="precio" >
					      	<?php if (($precioError != null)) ?>
					      		<span class="help-inline"><?php echo $precioError;?></span>
					    </div>
					</div>

          <div class="control-group <?php echo !empty($cantError)?'error':'';?>">
						<label class="control-label">Cantidad</label>
					    <div class="controls">
					      	<input name="cant" type="text"  placeholder="cant" >
					      	<?php if (($cantError != null)) ?>
					      		<span class="help-inline"><?php echo $cantError;?></span>
					    </div>
					</div>

          <div class="control-group <?php echo !empty($areaError)?'error':'';?>">
				    	<label class="control-label">Area</label>
				    	<div class="controls">
	                       	<select name ="area">
		                        <option value="">Selecciona un area</option>
		                        <?php
							   		$pdo = Database::connect();
							   		$query = 'SELECT * FROM area';
			 				   		foreach ($pdo->query($query) as $row) {
		                        		if ($row['ID']==$marc)
		                        			echo "<option selected value='" . $row['ID'] . "'>" . $row['Nombre'] . "</option>";
		                        		else
		                        			echo "<option value='" . $row['ID'] . "'>" . $row['Nombre'] . "</option>";
			   						}
			   						Database::disconnect();
			  					?>
                            </select>
					      	<?php if (($areaError) != null) ?>
					      		<span class="help-inline"><?php echo $areaError;?></span>
						</div>
					</div>

					<div class="form-actions">
						<button type="submit" class="btn btn-success">Agregar</button>
						<a class="btn" href="inventarios.php">Regresar</a>
					</div>

				</form>
			</div>
	    </div> <!-- /container -->
	</body>
</html>
