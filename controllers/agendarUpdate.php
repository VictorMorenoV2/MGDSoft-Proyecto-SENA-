<?php
session_start();


/*$conexion= new PDO("mysql:dbname=llantasml;host=127.0.0.1","root","");

if(isset($_POST["id"])){

    $query="UPDATE agendar set start=:start, end=:end WHERE id=:id";
    $estado=$conexion->prepare($query);
    $estado->execute(

        array(
            ':start'  => $_POST['start'],
            ':end'  => $_POST['end']
        ),

    );

}*/


include ('../config/conexion.php');
/*
if(isset($_POST["id"])){
    
    $start = $_POST['title'];
    $end = $_POST['end'];
    $id = $_POST['id'];   

    $sql="UPDATE agendar SET title='$title', start='$end', WHERE id=$id";
    $conexion->query($sql);
}*/

//session_start();

//include_once '../config/conexion.php';
//$conexion= new PDO("mysql:dbname=llantasml;host=127.0.0.1","root","");

/*$dados= filter_input_array(INPUT_POST, FILTER_DEFAULT);


$data_start=str_replace('/','-',$dados['start']);
$data_start_conv=date("Y-m-d H:i:s",strtotime($data_start));


$data_end=str_replace('/','-',$dados['end']);
$data_end_conv=date("Y-m-d H:i:s",strtotime($data_end));

$queryEvent="UPDATE agendar SET title=:title, descripcion=:descripcion, color=:txtColor2, textColor=:txtColor, start=:start, end=:end, time=:txtTime WHERE id=:idEvento";

$updateEvent = $conexion->prepare($queryEvent);
$updateEvent->bindParam(':title',$dados['title']);
$updateEvent->bindParam(':descripcion',$dados['txtDescripcion']);
$updateEvent->bindParam(':color',$dados['txtColor2']);
$updateEvent->bindParam(':textColor',$dados['txtColor']);
$updateEvent->bindParam(':start',$data_start_conv);
$updateEvent->bindParam(':end',$data_end_conv);
$updateEvent->bindParam(':time',$dados['txtTime']);
$updateEvent->bindParam(':id',$dados['idEvento']);


if($updateEvent->execute()){

    header("location: ../views/cliente/cliente.php");
}

*/


if(isset($_POST['Editar'])){

     $id=$_GET ['id'];
     $title=$_POST['txtTitulo'];
     $desc=$_POST['txtDescripcion'];
     $color=$_POST['txtColor2'];
     $colort=$_POST['txtColor'];
     $start=$_POST['start'];
     $end=$_POST['end'];
     $time=$_POST['txtTime'];
     
     $query=" UPDATE agendar SET  title = '$title', descripcion = '$desc', color = '$color', textColor = '$colort', start = '$start', end = '$end', time = '$time' WHERE id=$id  ";

     mysqli_query($conexion,$query);
    header("location: ../views/cliente/cliente.php");
  }








 

?>