<?php

    $servidor="localhost"; //siempre es localhost, se trabaja a traves de xampp
    $Usuario="root"; //el usuario es root
    $password=""; //no hay clave en este proyecto
    $base="llantasml";// nombre de la base de datos

    $conexion= mysqli_connect($servidor,$Usuario,$password, $base); //con la funcion connect se ejecutan todas las variables para conectar a una base de datos
 
  if($conexion){
      //*  echo 'conectado exitosamente';
  }else{
        echo 'error al conectar';
  }

?>