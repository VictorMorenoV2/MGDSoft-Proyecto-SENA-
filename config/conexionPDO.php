<?php
    $host="localhost";
    $bd="llantasml";
    $usuario="root";
    $clave="";
    try{
        $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$clave);
            if($conexion){}
         
    }
    catch(Exception $ex){ 
        echo $ex->getMessage();
    }
?>