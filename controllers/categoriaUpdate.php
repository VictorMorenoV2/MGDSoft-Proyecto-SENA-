<?php
	include '../config/conexion.php';

    if(isset($_GET['idCategoria'])){

        $id=$_GET['idCategoria'];
        $query="SELECT * FROM categoria WHERE idCategoria=$id";
    
        $resultado=mysqli_query($conexion,$query);
         
        if(mysqli_num_rows($resultado)==1){
    
           $row=mysqli_fetch_array($resultado);
           $nombre= $row['nombreCategoria'];
           $descripcion= $row['descripcionCategoria'];    
           $imagen= $row['imagenCategoria'];
           
        }
    }
      
      if(isset($_POST['guardar'])){
    
         $id=$_GET ['idCategoria'];
         $nom=$_POST['nombre'];
         $des=$_POST['descripcion'];
         $img=$_POST['imagen'];
         
         $query=" UPDATE categoria SET nombreCategoria = '$nom', descripcionCategoria = '$des',  imagenCategoria = '$img' WHERE idCategoria=$id  ";
    
         mysqli_query($conexion,$query);
         header("location:../views/administrador/categoria/categorias.php");
      }
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Editar categoría</title>

		<link rel="stylesheet" href="../assets/css/styleAdmin2.css">
		<link rel="stylesheet" href="../package/dist/sweetalert2.min.css">
		<script src="../package/dist/sweetalert2.all.min.js" ></script>
		<script src="../assets/js/sweetAlert.js"></script>

	</head>
	
	<body>
		<div class="sign-form-container">
			
			<form id="nuevo" name="nuevo" method="POST" action="categoriaUpdate.php?idCategoria=<?php echo $id?>" >
			<h3>Modificar categoría</h3>
					<h1 class="h" for="nombre">Nombre</h1>
					<input class="box" type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre ?>" />
			
			
					<h1 class="h" for="apellido">Descripción</h1>
					<input class="box" type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $descripcion ?>" />
			
				
				
					<h1 class="h" for="telefono">Imagen</h1>
					<input class="box" type="text" class="form-control" id="imagen" name="imagen" value="<?php echo $imagen ?> " />
			
				
		
					<input class="btn" id="guardar" value="Guardar" name="guardar" type="submit" >
					<a class="btn" id="btna" <?php echo "onclick='cancelarPersona(1)'" ?>>Cancelar</a>
					 
			</form>
		<script src="../package/dist/sweetalert2.all.min.js" ></script>
		<script src="../assets/js/sweetAlert.js"></script>
		</body>
	</html>	

