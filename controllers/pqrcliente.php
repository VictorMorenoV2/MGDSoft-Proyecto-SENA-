<?php

    include "../config/conexion.php";

    $name=$_POST['nameUser'];
    $apellido=$_POST['lastName'];
    $telefono=$_POST['phonenumber'];
    $email=$_POST['Email'];
    $suggestion=$_POST['Suggestion'];

    $sql="INSERT INTO pqr (nombreUsuario, apellidoUsuario, telefonoUsuario, correo, descripcionPQR) VALUES ('$name', '$apellido', '$telefono','$email','$suggestion')";

    $ejecutar=mysqli_query($conexion,$sql);

    if(!$ejecutar){
        echo "error";
    }else{
        echo '
            <script>
                alert("PQR registrada correctamente, gracias por escribirnos");
                window.location = "../index.html";
            </script>
        ';   
    }

?>