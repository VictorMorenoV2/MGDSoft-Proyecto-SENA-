<?php
    include '../../../config/conexion.php';
        if(isset($_POST['actualizar'])){
            
            $id=$_GET['idProducto'];
            $estado=$_REQUEST['estado'];
            $query=" UPDATE producto SET estado = '$estado' WHERE idProducto=$id";
            mysqli_query($conexion,$query);
            header("location:productos.php");
        }

  ?>