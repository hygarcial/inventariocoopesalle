<?php
require('../fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
   // $this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',16);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(70,10,'Reporte de ventas',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(70,10,'Producto',1,0,'c',0);
    $this->Cell(40,10,'Fecha',1,0,'c',0);
    $this->Cell(30,10,'Unidad',1,0,'c',0);
    $this->Cell(20,10,'Precio',1,0,'c',0);
    $this->Cell(30,10,'Total',1,1,'c',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
require('../conexion.php');
$query = "SELECT * FROM public.ventas";
$resultado = pg_query($conn, $query);

$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

$sumador_vendido = 0;

while ($row = pg_fetch_array($resultado)) { 
    $pdf->Cell(70,10,$row['nombre'],1,0,'c',0);
    $pdf->Cell(40,10,$row['fecha'],1,0,'c',0);
    $pdf->Cell(30,10,$row['unidades'],1,0,'c',0);
    $pdf->Cell(20,10,'$'.$row['precio_venta'],1,0,'c',0);
    $pdf->Cell(30,10,'$'.$row['pago_total'],1,1,'c',0);
    $sumador_vendido += $row['pago_total'];
}

$pdf->Cell(70,10,'Vendido',1,0,'c',0);
$pdf->Cell(40,10,'-',1,0,'c',0);
$pdf->Cell(30,10,'-',1,0,'c',0);
$pdf->Cell(20,10,'-',1,0,'c',0);
$pdf->Cell(30,10,'$'.$sumador_vendido,1,1,'c',0);

$pdf->Output();

?>

