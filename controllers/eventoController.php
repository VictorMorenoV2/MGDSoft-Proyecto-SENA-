<?php
header('Content-Type: application/json');
$pdo=new PDO("mysql:dbname=llantasml;host=127.0.0.1","root","");

$sentenciasSQL=$pdo->prepare("SELECT * FROM agendar");
$sentenciasSQL->execute();

$resultado= $sentenciasSQL-> fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);



?>