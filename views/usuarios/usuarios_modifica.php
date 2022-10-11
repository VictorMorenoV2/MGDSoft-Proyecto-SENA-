<?php
	
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?php echo $data["titulo"]; ?></title>

		<link rel="stylesheet" href="assets/css/styleAdmin2.css">
		<link rel="stylesheet" href="package/dist/sweetalert2.min.css">
		<script src="package/dist/sweetalert2.all.min.js" ></script>
		<script src="assets/js/sweetAlert.js"></script>

	</head>
	
	<body>
		<div class="sign-form-container">
			
			<form id="nuevo" name="nuevo" method="POST" action="index.php?c=usuarios&a=actualizar" autocomplete="off">
			<h3>Modificar usuario</h3>
				<input type="hidden" id="idUsuarios" name="idUsuarios" value="<?php echo $data["idUsuario"]; ?>" />
				
			
					<h1 class="h" for="nombre">Nombre</h1>
					<input class="box" type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data["usuarios"]["nombre"]?>" />
			
			
					<h1 class="h" for="apellido">Apellido</h1>
					<input class="box" type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $data["usuarios"]["apellido"]?>" />
			
			
					<h1 class="h" for="identificacion">Identificación</h1>
					<input class="box" type="number" class="form-control" id="identificacion" name="identificacion" value="<?php echo $data["usuarios"]["identificacion"];?>" />
		
				
				
					<h1 class="h" for="telefono">Telefono</h1>
					<input class="box" type="number" class="form-control" id="telefono" name="telefono" value="<?php echo $data["usuarios"]["telefono"];?>" />
			
				
				
					<h1 class="h" for="correoElectronico">Correo Electronico</h1>
					<input class="box" type="email" class="form-control" id="correoElectronico" name="correoElectronico" value="<?php echo $data["usuarios"]["correoElectronico"];?>" />
			
					<h1 class="h" for="direccionUsuario">Dirección Usuario</h1>
					<input class="box" type="text" class="form-control" id="direccionUsuario" name="direccionUsuario" value="<?php echo $data["usuarios"]["direccionUsuario"];?>" />
			
					<h1 class="h" for="contrasena">Contraseña</h1>
					<input class="box" type="password" class="form-control" id="contrasena" name="contrasena" value="<?php echo $data["usuarios"]["contrasena"];?>" />

					<input class="btn" id="guardar" value="Guardar" name="guardar" type="submit" >
					<a class="btn" id="btna" <?php echo "onclick='cancelarPersona(1)'" ?>>Cancelar</a>
					 
			</form>
		<script src="package/dist/sweetalert2.all.min.js" ></script>
		<script src="assets/js/sweetAlert.js"></script>
		</body>
	</html>		