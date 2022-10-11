<?php 
include('../../config/conexion.php');
$usuarios = "SELECT * FROM producto";
header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=datos-reporteProductos.xls");
?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<table border="1">

	<caption>Datos de los productos</caption>
	<tr>
		<th>Identificador</th>
		<th>Nombre</th>	
		<th>Descripción</th>>	
	</tr>

	<?php $resultado = mysqli_query($conexion, $usuarios);
    while ($dato=mysqli_fetch_assoc($resultado)) { ?>

    	<tr>
    		<td><?php echo $dato["idProducto"];?></td>
    		<td><?php echo $dato["descripcionProducto"];?></td>
    		<td><?php echo $dato["precioProducto"];?></td>
    	</tr>
    <?php } mysqli_free_result($resultado);?>
</table>
