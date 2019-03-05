<?php 
	if (isset($_GET['id'])) {
		$id=intval($_GET['id']);
	}else{
		header('location:index.php');
	}
	
 ?>

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
 		$cliente = new conectar();

 		if (isset($_POST) && !empty($_POST)) {
 			$nombre=$cliente->sanitize($_POST['nombre']);
			$apellido=$cliente->sanitize($_POST['apellido']);
			$correo=$cliente->sanitize($_POST['correo']);
			$direccion=$cliente->sanitize($_POST['direccion']);
			$telefono=$cliente->sanitize($_POST['telefono']);
			$genero=$cliente->sanitize($_POST['genero']);
			$rol=$cliente->sanitize($_POST['rol']);
			$contrasenia=$cliente->sanitize($_POST['contrasenia']);
			$id_clie=intval($_POST['id_clie']);

			$rese=$cliente->update($nombre,$apellido,$correo,$contrasenia,$genero,$rol,$direccion,$telefono,$id);

			if ($rese) {
				$mesa='Se modifico el usuario';
				$clase='alert alert-info';
			}else{
				$mesa='No se modifico el usuario';
				$clase='alert alert-info';
			}
			?>
			<div class="<?php echo $clase; ?>">
				<?php echo $mesa; ?>
			</div>
			<?php  
 		}

 		$res=$cliente->single_record($id);

 	 ?>
 		<h1 style="text-align: center;"><a href="index.php"><i class="fas fa-arrow-circle-left"></i></a>
		MODIFICAR USUARIOS</h1>
		<div style="width: 500px; margin: 10px 10px 10px 30%">
		<form method="post">
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputEmail4">NOMBRE</label>
		      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $res->nombre; ?>">
		       <input type="hidden" class="form-control" name="id_clie" id="id_clie" placeholder="Nombre" value="<?php echo $res->id; ?>">
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputPassword4">APELLIDO</label>
		      <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo $res->apellido; ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputAddress">EMAIL:</label>
		    <input type="email" class="form-control" name="correo" id="correo" placeholder="@..." value="<?php echo $res->correo; ?>">
		  </div>
		  <div class="form-group">
		    <label for="inputAddress2">DIRECCION</label>
		    <textarea type="text" class="form-control" id="direccion" name="direccion"><?php echo $res->direccion;?></textarea>
		  </div>
		   <div class="form-group">
		    <label for="contrasenia">CONTRASEÑA</label>
		    <input type="password" class="form-control" name="contrasenia" id="contrasenia" placeholder="..." required  value="<?php echo $res->contrasenia; ?>">
		  </div>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputCity">TELEFONO</label>
		      <input type="number" class="form-control" id="telefono" name="telefono"  value="<?php echo $res->telefono; ?>">
		    </div>
		    <div class="form-group col-md-4">
		      <label for="inputState">GENERO</label>
		      <select id="genero" name="genero" class="form-control">
		        <option selected>Choose...</option>
		        <option id="masculino" value="masculino">MASCULINO</option>
		         <option id="femenino" value="femenino">FEMENINO</option>
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
		  <button type="submit" class="btn btn-primary">Modificar</button>
		</form>
		</div>
 </body>
 </html>