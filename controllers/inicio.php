<?php

include '../config/conexion.php';
$c=$_POST['correoElectronico'];
$p=$_POST['contrasena'];



$consulta1=mysqli_query($conexion,"SELECT * FROM usuario WHERE correoElectronico='$c'");

if($rol1=mysqli_fetch_assoc($consulta1)){
   if($p==$rol1['admin']){
      $_SESSION['idUsuario']=$rol1['idUsuario'];
      $_SESSION['nombre']=$rol1['correoElectronico'];
      echo'<script>alert("BIENVENIDO ADMINISTRADOR") </script>';
      echo'<script> window.location="../index.php" </script>';
   }
}

$p=hash('sha256',$p);

$consulta2=mysqli_query($conexion,"SELECT * FROM usuario WHERE correoElectronico='$c'");

if($rol2=mysqli_fetch_assoc($consulta2)){

  if($p==$rol2['contrasena']){
    $_SESSION['idUsuario']=$rol2['idUsuario'];
    $_SESSION['nombre']=$rol2['correoElectronico'];
    echo'<script>alert("BIENVENIDO CLIENTE ") </script>';
    echo'<script> window.location="../views/cliente/cliente.php" </script>';
  }else{

    echo'
    <script> 
    alert("Usuario no existe");
    window.location="../index.html";
    </script>';

    exit;
  }

}

$consulta=mysqli_query($conexion,"SELECT * FROM usuario WHERE correoElectronico ='$c'");
$info=mysqli_fetch_array($consulta);    
session_start();
$_SESSION['idUsuario'] = $info['idUsuario'];

$validar_login = mysqli_query($conexion, "SELECT * FROM usuario WHERE correoElectronico='$c' and contrasena='$p'");

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['nombre'] = $c;
        echo'<script>alert("BIENVENIDO CLIENTE") </script>';
        echo'<script> window.location="../views/cliente/cliente.php" </script>';
        exit;
    }else{
        echo '
            <script>
                alert("Usuario no existe");
                window.location = "../index.html";
            </script>
        ';
        exit;
    }



?>
