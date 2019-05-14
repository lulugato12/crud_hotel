<?php

	require 'database.php';

		$precioError = null;
		$capError = null;
    $numError = null;
		//$perError = null;

	if ( !empty($_POST)) {

		// keep track post values
    $num = $_POST['num'];
		$precio = $_POST['precio'];
		$cap = $_POST['cap'];

		// validate input
		$valid = true;

    if (empty($num)) {
      $numError = 'Porfavor escribe el precio';
      $valid = false;
    }
    if (empty($precio)) {
			$precioError = 'Porfavor escribe el precio';
			$valid = false;
		}
		if (empty($cap)) {
			$capError = 'Porfavor escribe la capacidad';
			$valid = false;
		}

		// insert data
		if ($valid) {
			var_dump($_POST);
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO Habitacion (ID, Precio,Capacidad) VALUES(?, ?, ?)";
			$q = $pdo->prepare($sql);

			$q->execute(array($num, $precio,$cap));
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
		   			<h3>Agregar una habitacion</h3>
		   		</div>

				<form class="form-horizontal" action="habitacionCreate.php" method="post">

          <div class="control-group <?php echo !empty($numError)?'error':'';?>">
						<label class="control-label">Num habitacion</label>
					    <div class="controls">
					      	<input name="num" type="text"  placeholder="precio" value="<?php echo !empty($num)?$num:'';?>">
					      	<?php if (($numError != null)) ?>
					      		<span class="help-inline"><?php echo $numError;?></span>
					    </div>
					</div>

          <div class="control-group <?php echo !empty($precioError)?'error':'';?>">
						<label class="control-label">Precio</label>
					    <div class="controls">
					      	<input name="precio" type="text"  placeholder="precio" value="<?php echo !empty($precio)?$precio:'';?>">
					      	<?php if (($precioError != null)) ?>
					      		<span class="help-inline"><?php echo $precioError;?></span>
					    </div>
					</div>

          <div class="control-group <?php echo !empty($capError)?'error':'';?>">
						<label class="control-label">Capacidad</label>
					    <div class="controls">
					      	<input name="cap" type="text"  placeholder="cap" value="<?php echo !empty($cap)?$cap:'';?>">
					      	<?php if (($capError != null)) ?>
					      		<span class="help-inline"><?php echo $capError;?></span>
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
