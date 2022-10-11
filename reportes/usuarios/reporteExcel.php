<?php 
include('../../config/conexion.php');
$usuarios = "SELECT * FROM usuario";
header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=datos-reporteUsuarios.xls");
?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<table border="1">

	<caption>Datos de los usuarios</caption>
	<tr>
		<th>nombre</th>
		<th>Apellido</th>
		<th>Identificación</th>
		<th>Telefono</th>
		<th>Correo electronico</th>
		<th>Dirección</th>
		<th>Contraseña</th>	
	</tr>

	<?php $resultado = mysqli_query($conexion, $usuarios);
    while ($dato=mysqli_fetch_assoc($resultado)) { ?>

    	<tr>
    		<td><?php echo $dato["nombre"];?></td>
    		<td><?php echo $dato["apellido"];?></td>
    		<td><?php echo $dato["identificacion"];?></td>
    		<td><?php echo $dato["telefono"];?></td>
    		<td><?php echo $dato["correoElectronico"];?></td>
    		<td><?php echo $dato["direccionUsuario"];?></td>
    		<td><?php echo $dato["contrasena"];?></td>
    	</tr>
    <?php } mysqli_free_result($resultado);?>
</table>
