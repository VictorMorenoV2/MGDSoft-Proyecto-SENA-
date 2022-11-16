<?php


//require_once "../config/conexion.php";


$conexion= new PDO('mysql:host=localhost;dbname=llantasml','root','');


$data = array();

$query = "SELECT * FROM agendar ORDER BY id";

$estado = $conexion->prepare($query);

$estado-> execute();
//$resuladoSet = $estado->get_result();

$resultado = $estado->fetchAll();

foreach($resultado as $row){

    $data[] = array(

        'id' => $row["id"],
        'title'  => $row["title"],
        'descripcion'  => $row["descripcion"],
        'start'  => $row["start"],
        'end'  => $row["end"],
        'color'  => $row["color"]

    );

   
 

}
echo json_encode($data);

?>