<?php ob_start(); ?>
<html>
<head>

    <title>Reporte</title>

        <style>
            *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    font-family: "Poppins", sans-serif;
}
table{
    background-color:grey;
    text-align:center;
    width:100%;
    border-collapse: collapse ;
}

td,th{
    border:solid 1px black;
    padding:15px;
}
thead {
    background-color: rgb(74, 74, 74);
    border-bottom: solid 3.5px rgb(0, 0, 0);
    font-size: 20px;
    color:rgb(210, 210, 210);
}

tr:nth-child(even){
    background-color: rgb(193, 193, 193);
}
tr:hover td{
    background-color: rgb(160, 121, 121) ;
}
        </style>
</head>
<body>
<br>
<center><h2>Reporte de Usuarios</h2></center>
  <br>

 <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Identificación</th>
                <th>Telefono</th>
                <th>Correo electronico</th>
                <th>Dirección</th>
                <th>Contraseña</th>
             
            </tr>
        </thead>
        <tbody>
            <?php 
                require_once("../../config/conexion.php");
                require_once ("../../models/usuariosModel.php");
                require_once ("../../controllers/usuarios.php");
                require_once ("../../config/config.php");
                require_once ("../../core/routes.php");
                require_once ("../../config/database.php");
                require_once ("../../controllers/usuarios.php");
                $data["titulo"] = "usuarios";
                $usuarios = new usuarios_model();
                $data["Usuarios"] = $usuarios->get_usuarios();
                foreach($data["Usuarios"] as $dato) {
                echo "<tr>";
                echo "<br>";
                echo "<td>".$dato["nombre"]."</td>";
                echo "<td>".$dato["apellido"]."</td>";
                echo "<td>".$dato["identificacion"]."</td>";
                echo "<td>".$dato["telefono"]."</td>";
                echo "<td>".$dato["correoElectronico"]."</td>";
                echo "<td>".$dato["direccionUsuario"]."</td>";
                echo "<td id='contra'>".$dato["contrasena"]."</td>";
                echo "</tr>";
         
            }
            ?>
        </tbody>
    </table>
<?php
  
   
require_once '../../libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->setPaper('A2','landscape');
$dompdf->render();
$pdf = $dompdf->output();
$filename = "reporte.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename , array("Attachment" => false));
?>
</body>
</html>