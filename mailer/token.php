
<?php

include '../config/conexion.php';

if(isset($_POST['enviar'])){
    
    $token = $_POST['token'];
    $email = $_POST['email']; 
    $contra = $_POST['contrasena'];
    $contras=hash('sha256',$contra);   

    $validar= mysqli_query($conexion, "SELECT * FROM recuperar WHERE email='$email' and token=$token ");

    if(mysqli_num_rows($validar) > 0){
                $query=("UPDATE usuario SET contrasena='$contras' WHERE correoElectronico='$email'");
                $result= mysqli_query($conexion,$query);
                    if($result){
                    echo '
                        <script>
                        alert("Contraseña cambiada con exito");
                        window.location="../index.html";     
                        </script>
                    
                    ';
                    } 
        exit;
    }else{
        echo '
            <script>
                alert("Token incorrecto");
                window.location = "verificarToken.php";
            </script>
        ';
        exit;
    }


}



?>