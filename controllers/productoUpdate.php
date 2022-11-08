<?php

session_start();

if(!isset($_SESSION['idUsuario'])){

   
    echo'<script>alert("POR FAVOR INICIE SESIÓN CON SUS CREDENCIALES") </script>';
    echo'<script> window.location="../../../unirse.html"</script>';

  
     session_destroy();
     die();
  }


	include '../config/conexion.php';

    if(isset($_GET['idProducto'])){

        $id=$_GET['idProducto'];
        $query="SELECT * FROM producto WHERE idProducto=$id";
    
        $resultado=mysqli_query($conexion,$query);
         
        if(mysqli_num_rows($resultado)==1){
    
           $row=mysqli_fetch_array($resultado);
           $nombre= $row['nombreProducto'];
           $descripcion= $row['descripcionProducto'];
           $precio= $row['precioProducto'];    
           $imagen= $row['imagenProducto'];
           
        }
    }
      
      if(isset($_POST['guardar'])){
    
         $id=$_GET ['idProducto'];
         $nom=$_POST['nombre'];
         $des=$_POST['descripcion'];
         $pre=$_POST['precio'];
         $img=$_POST['imagen'];
         
         $query=" UPDATE producto SET nombreProducto = '$nom', descripcionProducto = '$des', precioProducto = '$pre',  imagenProducto = '$img' WHERE idProducto=$id  ";
    
         mysqli_query($conexion,$query);
         header("location:../views/administrador/producto/productos.php");
      }
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Editar producto</title>

		<link rel="stylesheet" href="../assets/css/styleAdmin2.css">
		<link rel="stylesheet" href="../package/dist/sweetalert2.min.css">
		<script src="../package/dist/sweetalert2.all.min.js" ></script>
		<script src="../assets/js/sweetAlert.js"></script>

	</head>
	
	<body>
		<div class="sign-form-container">
			
			<form id="nuevo" name="nuevo" method="POST" action="productoUpdate.php?idProducto=<?php echo $id?>" >
			<h3>Modificar producto</h3>
					<h1 class="h" for="nombre">Nombre</h1>
					<input class="box" type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre ?>" />
			
			
					<h1 class="h" for="apellido">Descripción</h1>
					<input class="box" type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $descripcion ?>" />
			
			
					<h1 class="h" for="identificacion">Precio</h1>
					<input class="box" type="number" class="form-control" id="precio" name="precio" value="<?php echo $precio ?>" />
		
				
				
					<h1 class="h" for="telefono">Imagen</h1>
					<input class="box" type="text" class="form-control" id="imagen" name="imagen" value="<?php echo $imagen ?> " />
			
				
		
					<input class="btn" id="guardar"   value="Guardar" name="guardar" type="submit" >
					<a class="btn" id="btna" <?php echo "onclick='modificarProducto(1)'" ?>>Cancelar</a>
					 
			</form>
		<script src="../package/dist/sweetalert2.all.min.js" ></script>
		<script src="../assets/js/sweetAlert.js"></script>
		</body>
	</html>	





