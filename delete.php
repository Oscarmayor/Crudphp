<?php 
	if (isset($_GET['id'])) {
		require_once'conexion.php';
		$cliente=new conectar();
		$id=intval($_GET['id']);
		$list=$cliente->delete($id);

		if ($list) {
			header('location:index.php');
		}else{
			echo "error al eliminar";
		}
	}

 ?>