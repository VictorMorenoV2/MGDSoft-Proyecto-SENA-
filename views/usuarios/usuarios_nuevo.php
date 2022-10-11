<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?php echo $data["titulo"]; ?></title>
		<link rel="stylesheet" href="assets/css/styleAdmin2.css">
	</head>
	
	<body>
		<div class="sign-form-container">
		
			
			<form id="nuevo" name="nuevo" method="POST" action="index.php?c=usuarios&a=guarda" autocomplete="off">

				
				<h3>Agregar usuario</h3>
				<input type="hidden" id="idUsuarios" name="idUsuarios"  />
				
			
					<h1 class="h" for="nombre">Nombre</h1>
					<input class="box" type="text" class="form-control" id="nombre" name="nombre"  />
			
			
					<h1 class="h" for="apellido">Apellido</h1>
					<input class="box" type="text" class="form-control" id="apellido" name="apellido"  />
			
			
					<h1 class="h" for="identificacion">Identificación</h1>
					<input class="box" type="number" class="form-control" id="identificacion" name="identificacion"/>
		
				
				
					<h1 class="h" for="telefono">Telefono</h1>
					<input class="box" type="number" class="form-control" id="telefono" name="telefono"  />
			
				
				
					<h1 class="h" for="correoElectronico">Correo Electronico</h1>
					<input class="box" type="email" class="form-control" id="correoElectronico" name="correoElectronico"  />
			
					<h1 class="h" for="direccionUsuario">Dirección Usuario</h1>
					<input class="box" type="text" class="form-control" id="direccionUsuario" name="direccionUsuario" />
			
					<h1 class="h" for="contrasena">Contraseña</h1>
					<input class="box" type="password" class="form-control" id="contrasena" name="contrasena"  />

					<input class="btn" id="guardar" value="Guardar" name="guardar" type="submit" >
					<a class="btn" id="btna" href="index.php">Cancelar</a>
				
			</form>
		</div>
	</body>
</html>