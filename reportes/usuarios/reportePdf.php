<?php
require('../../libreria/fpdf/fpdf.php');




class PDF extends FPDF
{

// Cabecera de página
Function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',30);
    // Movernos a la derecha
    //$this->Cell(10);
    // Título
    $this->Cell(110,10,'Llantas Moreno Lopez',0,0,'C');
    $this->Ln(12);
    $this->Cell(85,10,'Reporte de usuarios',0,0,'C');
    // Salto de línea
    $this->Ln(20);

   /* $this->Cell(20, 16, 'Nombre', 1, 0, 'C', 0);
    $this->Cell(20, 16, 'Apellido', 1, 0, 'C', 0);
    $this->Cell(15, 16, utf8_decode ('Identi') , 1, 0, 'C', 0);
    $this->Cell(17, 16, 'Telefono', 1, 0, 'C', 0);
    $this->Cell(35, 16, 'Correo', 1, 0, 'C', 0);
    $this->Cell(19, 16, utf8_decode('Dirección'), 1, 0, 'C', 0);
    $this->Cell(75, 16, utf8_decode('contraseña'), 1, 1, 'C', 0);
*/


   
}

// Pie de página
/*function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');

}*/
var $widths;
var $aligns;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row($data,$SetX)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}
}



require '../../config/conexion.php';
$consulta ="SELECT * FROM usuario";
$resultado= $conexion->query($consulta);
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',5);
$pdf->Image('../../assets/img/hino3.png',130,0,80);
$pdf->Image('../../assets/img/onda.png',0,195,350);

$pdf->Cell(20, 16, 'Nombre', 1, 0, 'C', 0);
$pdf->Cell(20, 16, 'Apellido', 1, 0, 'C', 0);
$pdf->Cell(18, 16, utf8_decode ('Identicación') , 1, 0, 'C', 0);
$pdf->Cell(17, 16, 'Telefono', 1, 0, 'C', 0);
$pdf->Cell(35, 16, 'Correo', 1, 0, 'C', 0);
$pdf->Cell(19, 16, utf8_decode('Dirección'), 1, 0, 'C', 0);
$pdf->Cell(65, 16, utf8_decode('contraseña'), 1, 1, 'C', 0);


while ($dato = $resultado->fetch_assoc()) {
  
    
    $pdf->Cell(20, 11, $dato['nombre'],1, 0, 'B', 0);
	$pdf->Cell(20, 11, $dato['apellido'], 1, 0, 'B', 0);
	$pdf->Cell(18, 11, $dato['identificacion'], 1, 0, 'B', 0);
	$pdf->Cell(17, 11, $dato['telefono'], 1, 0, 'B', 0);
	$pdf->Cell(35, 11, $dato['correoElectronico'], 1, 0, 'B', 0);
	$pdf->Cell(19, 11, $dato['direccionUsuario'], 1, 0, 'B', 0);
	$pdf->MultiCell(65, 11, $dato['contrasena'],1,'L',0);

  

   
}
$pdf->Output();
?>


