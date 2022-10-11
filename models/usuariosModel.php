<?php
	
	class usuarios_model  {
		
		private $db;
		private $usuarios;
		
		public function __construct(){
			$this->db = Conectar::conexion();
			$this->usuarios = array();
		}
		
		public function get_usuarios()
		{
			$sql = "SELECT * FROM usuario";
			$resultado = $this->db->query($sql);

			while($row=$resultado->fetch_assoc())
			{
				$this->usuarios[] = $row;
			}
			return $this->usuarios;
		}
		
		public function insertar($nombre,$apellido,$identificacion,$telefono,$correoElectronico,$direccionUsuario,$contrasena){
			$contrasena=hash('sha256',$contrasena);
			$resultado = $this->db->query("INSERT INTO usuario (nombre,apellido,identificacion,telefono,correoElectronico,direccionUsuario,contrasena ) VALUES ('$nombre', '$apellido', '$identificacion', '$telefono', '$correoElectronico','$direccionUsuario','$contrasena')");
			
		}
		
		public function modificar($id_usuarios,$nombre, $apellido, $identificacion, $telefono, $correoElectronico,$direccionUsuario,$contrasena){
			
			$resultado = $this->db->query("UPDATE usuario SET nombre='$nombre', apellido='$apellido', identificacion='$identificacion', telefono='$telefono', correoElectronico='$correoElectronico', direccionUsuario='$direccionUsuario', contrasena='$contrasena' WHERE idUsuario = '$id_usuarios'");
		}
		
		public function eliminar($id_usuarios){
			$resultado = $this->db->query("DELETE FROM usuario WHERE idUsuario='$id_usuarios'");
		}
		
		public function get_usuario($id_usuarios)
		{
			$sql = "SELECT * FROM usuario WHERE idUsuario='$id_usuarios' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
		}
	} 
?>