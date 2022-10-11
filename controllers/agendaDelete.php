<?php

session_start();

//include '../config/conexion.php';
$conexion= new PDO("mysql:dbname=llantasml;host=127.0.0.1","root","");
$id=filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);


if(!empty($id)){
    $query="DELETE FROM agendar WHERE id=:id";
    $delete=$conexion->prepare($query);
    $delete->bindParam('id',$id);

    if($delete->execute()){

        header("location: ../views/cliente/cliente.php");
    }

}



?>