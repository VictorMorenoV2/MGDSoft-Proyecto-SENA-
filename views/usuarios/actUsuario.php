<?php
    include '../../config/conexion.php';
        if(isset($_POST['actualizar'])){
            
            $id=$_GET['idUsuario'];
            $estado=$_REQUEST['estado'];
            $query=" UPDATE usuario SET actividad = '$estado' WHERE idUsuario=$id";
            mysqli_query($conexion,$query);
            header("location:../../index.php");
        }

  ?>