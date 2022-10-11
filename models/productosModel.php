
<?php

require '../config/conexion.php';


if(isset($_POST["registrar"])) { 
  
    
    $n=$_POST['nombre'];
    $d=$_POST['descripcion'];
    $p=$_POST['precio'];
    $i=$_POST['imagen'];
 
 
    $insertar=("INSERT INTO  producto (nombreProducto, descripcionProducto, precioProducto, imagenProducto) VALUES ('$n','$d','$p','$i')");
 
 
     $ejecutar= mysqli_query( $conexion,$insertar);
     
     if($ejecutar){
     echo '
       <script>
          alert("Producto almacenado exitosamente");
         window.location="../views/administrador/producto/productos.php";     
         </script>
     
     ';
 
    }
 
  }



?>