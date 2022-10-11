<?php

 include '../config/conexion.php';

  if(isset($_POST["registrar"])) {
  
   $a=$_POST['nombre'];
   $n=$_POST['apellido'];
   $i=$_POST['identificacion'];
   $c=$_POST['telefono'];
   $d=$_POST['correoElectronico'];
   $t=$_POST['direccionUsuario'];
   $p=$_POST['contraseña'];
   $p=hash('sha256',$p);
  
   
   
   $insertar=("INSERT INTO  usuario (nombre,apellido,identificacion,telefono,correoElectronico,direccionUsuario,contrasena) VALUES ('$a','$n','$i','$c','$d','$t','$p')");

    $ejecutar= mysqli_query($conexion,$insertar);
    
    if($ejecutar){
    echo '
      <script>
         alert("Usuario almacenado exitosamente");
         window.location="../index.html";    
         </script>
    
    ';

   }
   else{
    echo '<script>
          alert("Error");
            window.location="../index.html";     
          </script>
  
  ';
  }
  }

?>