<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>

	<?php 
		require_once'conexion.php';
		$cliente=new conectar();

		if (isset($_POST) && !empty($_POST)) {
			$nombre=$cliente->sanitize($_POST['nombre']);
			$apellido=$cliente->sanitize($_POST['apellido']);
			$correo=$cliente->sanitize($_POST['correo']);
			$contrasenia=$cliente->sanitize($_POST['contrasenia']);
			$direccion=$cliente->sanitize($_POST['direccion']);
			$genero=$cliente->sanitize($_POST['genero']);
			$rol=$cliente->sanitize($_POST['rol']);
			$telefono=$cliente->sanitize($_POST['telefono']);

			$res=$cliente->create($nombre,$apellido,$correo,$contrasenia,$genero,$rol,$direccion,$telefono);

			if ($res) {
				$mesa='Se creo el usuario';
				$clase='alert alert-info';
			}else{
				$mesa='No se creo el usuario';
				$clase='alert alert-info';
			}?>
			<div class="<?php echo $clase; ?>">
				<?php echo $mesa; ?>
			</div>
			<?php 
				}
			 ?>
		
	 	<h1 style="text-align: center; text-transform: uppercase;"><a href="index.php"><i class="fas fa-arrow-circle-left"></i></a>
		AGREGAR NUEVO USUARIO</h1>
		<div style="width: 500px; margin: 10px 10px 10px 30%">
		<form method="post">
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputEmail4">NOMBRE</label>
		      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputPassword4">APELLIDO</label>
		      <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputAddress">EMAIL:</label>
		    <input type="email" class="form-control" name="correo" id="correo" placeholder="@...">
		  </div>
		  <div class="form-group">
		    <label for="inputAddress2">DIRECCION:</label>
		    <textarea type="text" class="form-control" id="direccion" name="direccion" placeholder="Apartment, studio, or floor"></textarea>
		  </div>
		   <div class="form-group">
		    <label for="contrasenia">CONTRASEÑA</label>
		    <input type="password" class="form-control" name="contrasenia" id="contrasenia" placeholder="..." required>
		  </div>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputCity">TELEFONO</label>
		      <input type="number" class="form-control" id="telefono" name="telefono">
		    </div>
		    <div class="form-group col-md-4">
		      <label for="inputState">GENERO</label>
		      <select id="genero"name="genero" class="form-control">
		        <option selected>Choose...</option>
		        <option  value="masculino">MASCULINO</option>
		         <option  value="femenino">FEMENINO</option>
		      </select>
		    </div>
		  
		  </div>
		  <div class="form-group">
		    <div class="form-check">
		      <input class="form-check-input" type="checkbox" id="rol" name="rol" value="empleado">
		      <label class="form-check-label" for="gridCheck">
		        Empleado
		      </label> <br>
		      <input class="form-check-input" type="checkbox" id="rol" name="rol" value="visitante">
		      <label class="form-check-label" for="gridCheck">
		        Visitante
		      </label>
		    </div>
		  </div>
		  <button type="submit" class="btn btn-primary">Crear</button>
		</form>
		</div>
</body>
</html>