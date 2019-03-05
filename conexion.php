<?php 

	class conectar{
		private $servidor="localhost";
		private $usuario="root";
		private $contra="";
		private $db="login";
		private $con;

		function __construct(){
			$this->conexion();
		}

		public function conexion(){
			$this->con=mysqli_connect($this->servidor,$this->usuario,$this->contra,$this->db);
			if (mysqli_connect_error()) {
				die('no se conecto' . mysqli_connect_error() . mysql_connect_errno());
			}
		}

		public function sanitize($var){
			$retu=mysqli_real_escape_string($this->con,$var);

			return $retu;
		}

		public function read(){
			$sql="SELECT * FROM datos";
			$res=mysqli_query($this->con,$sql);

			return $res;
		}

		public function create($nombre,$apellido,$correo,$contrasenia,$genero,$rol,$direccion,$telefono){
			$sql="INSERT INTO datos (nombre,apellido,correo,contrasenia,genero,rol,direccion,telefono) VALUES ('$nombre','$apellido','$correo','$contrasenia','$genero','$rol','$direccion','$telefono')";
			$res=mysqli_query($this->con,$sql);
			if ($res) {
				return true;
			}else{
				return false;
			}
		}

		public function delete($id){
			$sql="DELETE FROM datos WHERE id='$id'";
			$res=mysqli_query($this->con,$sql);
			if ($res) {
				return true;
			}else{
				return false;
			}
		}

		public function single_record($id){
			$sql="SELECT * FROM datos WHERE id = '$id'";
			$res=mysqli_query($this->con,$sql);
			$ret=mysqli_fetch_object($res);

			return $ret;
		}

		public function update($nombre,$apellido,$correo,$contrasenia,$genero,$rol,$direccion,$telefono,$id){
			$sql="UPDATE datos SET nombre ='$nombre', apellido = '$apellido',correo = '$correo', contrasenia='$contrasenia', genero = '$genero', rol = '$rol' , direccion = '$direccion', telefono = '$telefono' WHERE id = '$id'";
			$res=mysqli_query($this->con,$sql);
		
		if ($res) {
				return true;
			}else{
				return false;
			}
	}
}
 ?>