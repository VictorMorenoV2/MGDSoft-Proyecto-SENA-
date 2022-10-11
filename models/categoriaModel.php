<?php

require '../config/conexion.php';

if(isset($_POST["registrar"])) { 
  
    
    $n=$_POST['nombre'];
    $d=$_POST['descripcion'];
    $i=$_POST['imagen'];
 
 
    $insertar=("INSERT INTO  categoria (nombreCategoria, descripcionCategoria, imagenCategoria) VALUES ('$n','$d','$i')");
 
 
     $ejecutar= mysqli_query( $conexion,$insertar);
     
     if($ejecutar){
     echo '
       <script>
          alert("Categoría almacenada exitosamente");
         window.location="../views/administrador/categoria/categorias.php";     
         </script>
     
     ';
 
    }
 
  }



?>