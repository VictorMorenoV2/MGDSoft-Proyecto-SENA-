<?php
include '../config/conexion.php';

if(isset($_POST['enviar'])){
    
    $email = $_POST ['email'];
    $contra = $_POST ['contrasena'];
   
    $query=("UPDATE usuario SET contrasena='$contra' WHERE correoElectronico='$email'");
    $result= mysqli_query($conexion,$query);
        if($result){
        echo '
            <script>
            alert("Contraseña cambiada con exito");
            window.location="../index.html";     
            </script>
        
        ';
        
        
        } 

}



?>