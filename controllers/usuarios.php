<link rel="stylesheet" href="package/dist/sweetalert2.min.css">
<script src="package/dist/sweetalert2.all.min.js" ></script>
<script src="assets/js/sweetAlert.js"></script>

<?php

	class usuarioscontroller {

		public function __construct(){
			require_once "models/usuariosModel.php";
		}

		public function index(){
			require_once "models/usuariosModel.php";
			$usuarios = new usuarios_model();
			$data["titulo"] = "usuarios";
			$data["Usuarios"] = $usuarios->get_usuarios();
			
			require_once "views/usuarios/usuarios.php";
		}

		public function nuevo(){
			
			$data["titulo"] = "usuarios";
			require_once "views/usuarios/usuarios_nuevo.php";
		}

		public function guarda(){
			
			$nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $identificacion=$_POST['identificacion'];
            $telefono=$_POST['telefono'];
            $correoElectronico=$_POST['correoElectronico'];
            $direccionUsuario=$_POST['direccionUsuario'];
            $contrasena=$_POST['contrasena'];
			
			$usuarios = new usuarios_model();
			$usuarios->insertar($nombre, $apellido, $identificacion, $telefono, $correoElectronico,$direccionUsuario,$contrasena);
			$data["titulo"] = "usuario";
			$this->index();
		}

		public function modificar($id_usuarios){
			
			$usuarios = new usuarios_model();
			
			$data["idUsuario"] = $id_usuarios;
			$data["usuarios"] = $usuarios->get_usuario($id_usuarios);
			$data["titulo"] = "usuario";
			require_once "views/usuarios/usuarios_modifica.php";
		}

		public function actualizar(){

			$id_usuarios = $_POST['idUsuarios'];
			$nombre =$_POST['nombre'];
            $apellido =$_POST['apellido'];
            $identificacion=$_POST['identificacion'];
            $telefono=$_POST['telefono'];
            $correoElectronico=$_POST['correoElectronico'];
            $direccionUsuario=$_POST['direccionUsuario'];
            $contrasena=$_POST['contrasena'];

			$usuarios = new usuarios_model();
			$usuarios -> modificar($id_usuarios,$nombre,$apellido,$identificacion,$telefono,$correoElectronico,$direccionUsuario,$contrasena);
			$data["titulo"] = "usuario";
			$this->index();
		}

		public function eliminar($id_usuarios){
			
			$usuarios = new usuarios_model();
			$usuarios->eliminar($id_usuarios);
			$data["titulo"] = "Usuario";
			$this->index();


	
		}	
		

	}

?>

