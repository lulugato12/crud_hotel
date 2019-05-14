<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <!-- header -->
      <div class="row">
        <h2 class="text-center">Bienvenido a tu administrador</h3>
        <h3 class="text-center">Inicia sesion</h3>
      </div>
      <div class="row">
        <form class="form-horizontal" action="ingresar.php" method="post">
          <div class="form-group">
            <label class="control-label col-sm-offset-1 col-sm-2" for="usuario">Usuario:</label>
            <div class="col-sm-6">
              <input class="form-control" type="text" name="usuario">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-offset-1 col-sm-2" for="password">Contraseña:</label>
            <div class="col-sm-6">
              <input class="form-control" type="password" name="password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-default">Submit</button>
            </div>
          </div>
        </form>
      </div>
      <div class="row">
				<div class="col-sm-12">
					<!-- Informacion varia -->
					<p class="text-center">Creado por Jacqui y Lulu | 2019</p>
				</div>
			</div>
    </div>
  </body>
</html>
