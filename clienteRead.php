<?php
	require 'database.php';
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	if ( $id==null) {
		header("Location: clientes.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM Cliente";
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
			<link   href=	"css/bootstrap.min.css" rel="stylesheet">
	    <script src=	"js/bootstrap.min.js"></script>
	</head>

	<body>
    	<div class="container">

    		<div class="span10 offset1">
    			<div class="row">
		    		<h3>Detalles del Cliente</h3>
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
					    <label class="control-label">RFC</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['RFC']?$data['RFC']: 'NO';?>
						    </label>
					    </div>
					</div>

					<div class="control-group">
					    <label class="control-label">Correo</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['Correo']?$data['Correo']:'NO';?>
						    </label>
					    </div>
					</div>


					<div class="control-group">
					    <label class="control-label">Telefono</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['Telefono']?$data['Telefono']:'NO';?>
						    </label>
					    </div>
					</div>

<!--
					<div class="control-group">
						<label class="control-label">aire acondicionado</label>
					    <div class="controls">
					      	<label class="checkbox">
						    	<?php echo ($data['ac'])?"SI":"NO";?>
						    </label>
					    </div>
					</div>
					-->

				    <div class="form-actions">
						<a class="btn" href="clientes.php">Regresar</a>
					</div>

				</div>
			</div>
		</div> <!-- /container -->
  	</body>
</html>
