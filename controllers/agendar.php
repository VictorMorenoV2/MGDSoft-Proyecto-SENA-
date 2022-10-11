<?php
if(isset($_POST["Enviar"])) { 
$titulo=$_POST["txtTitulo"];
$descripcion=$_POST["txtDescripcion"];
$inicio=$_POST["start"];
$fin=$_POST["end"];
$color=$_POST["txtColor"];
$colorT=$_POST["txtColor2"];
$hora=$_POST["txtTime"];
}
$datos=array(

    'title'=>$titulo,
    'descripcion'=>$descripcion,
    'color'=>$color,
    'txtColor'=>$colorT,
    'start'=>$inicio,
    'end'=>$fin,
    'time'=>$hora



);


try{ 

    $conexion= new PDO('mysql:host=localhost;dbname=llantasml','root','');
    $query="INSERT INTO agendar(title,descripcion,color,textColor,start,end,time) VALUES (:title, :descripcion, :color, :txtColor, :start, :end, :time)";
    $consulta=$conexion->prepare($query);
    $consulta->execute($datos);
    if($consulta){
        echo '
          <script>
             alert("Cita registrada en el sistema");
            window.location="../views/cliente/cliente.php";     
             </script>
        
        ';
    
       }
   
   // echo "Conectado";
}catch(PDOException $e){
    //echo "No conectado";
    //echo $e;
}









    /*if(isset($_POST["title"])){
        $query="INSERT INTO agendar (title,start,end) VALUES (:title,:start,:end)";
        $estado=$conexion->prepare($query);
        $estado->execute(
            array(
                ':title' => $_POST['title'],
                ':start' => $_POST['start'],
                ':end' => $_POST['end']

            )
            
        );

    }*/




?>