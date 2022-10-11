<?php

    include "../config/conexion.php";

    $name=$_POST['name'];
    $email=$_POST['email'];
    $suggestion=$_POST['suggestion'];

    $sql="INSERT INTO pqr (nombreUsuario, correo, descripcionPQR) VALUES ('$name','$email','$suggestion')";

    $ejecutar=mysqli_query($conexion,$sql);

    if(!$ejecutar){
        echo "error";
    }else{
        header('Location: ../index.html');    
    }

?>