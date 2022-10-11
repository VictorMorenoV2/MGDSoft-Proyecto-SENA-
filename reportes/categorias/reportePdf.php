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

  <table border="1">

<caption>Datos de las categorias</caption>
<tr>
    <th>Identificador</th>
    <th>Nombre</th>
    <th>Descripción</th>
</tr>

<?php $resultado = mysqli_query($conexion, $usuarios);
include '../../config/conexion.php';
while ($dato=mysqli_fetch_assoc($resultado)) { ?>

    <tr>
        <td><?php echo $dato["idCategoria"];?></td>
        <td><?php echo $dato["nombreCategoria"];?></td>
        <td><?php echo $dato["descripcionCategoria"];?></td>

    </tr>
<?php } mysqli_free_result($resultado);?>
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