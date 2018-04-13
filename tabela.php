<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

// Simple table
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}


}

$pdf = new PDF();
// Column headings
$header = array('Data', 'Local', 'Data', 'Local');
$arquivo = fopen("roteiro.txt", "w");
$txt1 = "03/10/2017;Juazeiro do Norte/CE; 03/10/2017; Fortaleza/CE\n"; 
$txt2 = "10/10/2017;Fortaleza/CE; 10/10/2017; Juazeiro/CE";
fwrite($arquivo, $txt1);
fwrite($arquivo, $txt2);
fclose($arquivo);
// Data loading
$data = $pdf->LoadData('roteiro.txt');
//print_r(array_values ($data));
$pdf->SetFont('Arial','',8);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
/*$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->AddPage();
$pdf->FancyTable($header,$data);*/
$pdf->Output();
?>
