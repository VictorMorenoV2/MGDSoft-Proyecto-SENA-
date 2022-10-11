<?php
include '../config/conexion.php';

if(isset($_GET['idProducto'])){

   $id=$_GET['idProducto'];
   $query="DELETE FROM producto WHERE idProducto=$id";
   $result= mysqli_query($conexion,$query);

   if($result){
    echo '
      <script>
         alert("Producto eliminado correctamente");
        window.location="../views/administrador/producto/productos.php";     
        </script>
    
    ';

   }
}



?>