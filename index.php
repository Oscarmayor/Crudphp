<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
	<h1 style="margin-left: 500px">USUARIOS REGISTRADOS <a href="crear.php "><i class="far fa-address-book"></i></a></h1>
	<div style="width: 1200px; margin: 10px 10px 10px 100px; border: 1px solid black">
		<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">APELLIDO</th>
      <th scope="col">CORREO</th>
      <th scope="col">GENERO</th>
      <th scope="col">ROL</th>
      <th scope="col">FECHA</th>
      <th scope="col">DIRECCION</th>
      <th scope="col">TELEFONO</th>
       <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  	<?php 
  		require_once'conexion.php';
  		$cliente=new conectar();
  		$listado=$cliente->read();

  		while ($row=mysqli_fetch_object($listado)) {
  			$id=$row->id;
  			$nombre=$row->nombre;
  			$apellido=$row->apellido;
  			$correo=$row->correo;
  			$genero=$row->genero;
  			$rol=$row->rol;
  			$fecha=$row->fecha;
  			$direccion=$row->direccion;
  			$telefono=$row->telefono;
  			
  			?>

  	<tr>
     
      <td><?php echo $id; ?></td>
      <td><?php echo $nombre ?></td>
      <td><?php echo $apellido; ?></td>
      <td><?php echo $correo; ?></td>
      <td><?php echo $genero; ?></td>
      <td><?php echo $rol; ?></td>
      <td><?php echo $fecha;?></td>
      <td><?php echo $direccion;?></td>
      <td><?php echo $telefono;?></td>
      
      <td><a href="delete.php?id=<?php echo $id; ?>"><i class="far fa-trash-alt"></i></a></td>
      <td><a href="update.php?id=<?php echo $id ?>"><i class="far fa-edit"></i></a></td>
      <td><a href="update.php?id=<?php echo $id ?>"><i class="far fa-edit"></i></a></td>

<?php } ?>
  		
  	 
   
  </tbody>
</table>
	</div>
</body>
</html>