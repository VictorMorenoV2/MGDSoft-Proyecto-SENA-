<?php
include '../config/conexion.php';

if(isset($_GET['idCategoria'])){

   $id=$_GET['idCategoria'];
   $query="DELETE FROM categoria WHERE idCategoria=$id";
   $result= mysqli_query($conexion,$query);

   if($result){
    echo '
      <script>
         alert("Categoría eliminada correctamente");
        window.location="../views/administrador/categoria/categorias.php";     
        </script>
    
    ';

   }
}



?>