<?php
    include '../../../config/conexion.php';
        if(isset($_POST['actualizar'])){
            
            $id=$_GET['idCategoria'];
            $estado=$_REQUEST['estado'];
            $query=" UPDATE categoria SET estado = '$estado' WHERE idCategoria=$id";
            mysqli_query($conexion,$query);
            header("location:categorias.php");
        }

  ?>