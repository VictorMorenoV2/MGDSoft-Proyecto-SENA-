<script src="package/dist/sweetalert2.all.min.js" ></script>
<script src="assets/js/sweetAlert.js"></script>
<link rel="stylesheet" href="package/dist/sweetalert2.min.css">

<?php
	
	require_once "config/config.php";
	require_once "core/routes.php";
	require_once "config/database.php";
	require_once "controllers/usuarios.php";
	
	if(isset($_GET['c'])){
		
		$controlador = cargarControlador($_GET['c']);
		
		if(isset($_GET['a'])){
			if(isset($_GET['idUsuario'])){
				cargarAccion($controlador, $_GET['a'], $_GET['idUsuario']);
				} else {
				cargarAccion($controlador, $_GET['a']);
			}
			} else {
			cargarAccion($controlador, ACCION_PRINCIPAL);
		}
		
		} else {
		
		$controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
		$accionTmp = ACCION_PRINCIPAL;
		$controlador->$accionTmp();
	}
?>