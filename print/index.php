<?php
///////////////////////////////////////////////////////////////////////////////////////////DEBUG EN PANTALLA
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

session_start();
require ("../assets/conn.php");
require('fpdf/fpdf.php');
require_once('barcode.inc.php');
require_once('barcode39.php');
require_once ('phpStringShortener.php');

if ($_GET['tag'] == '') {
    $query = "SELECT * FROM ingresos ORDER BY idIngreso DESC LIMIT 1";
} else {
    $query = "SELECT * FROM ingresos WHERE idIngreso = '" . $_GET['tag'] . "' LIMIT 1";
}
$result = $conn->query($query);
if (!$result)
    die($conn->error);

//Creacion del objeto pdf		
$pdf = new FPDF('P', 'mm', array(90, 140));

while ($row = $result->fetch_array(MYSQLI_BOTH)) {
    $string = $row['trackingnumber'];
    $phpSS = new PhpStringShortener();
    $hash = $phpSS->addHashByString($string);
    Barcode39($hash);
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 10);
    $pdf->Image('../img/logo_rec2.png', 5, 5, 80);
    $pdf->Ln(7);
    $pdf->Cell(0, 40, '' . utf8_decode("Nro Tracking") . '', 0, 0, 'L');
    $pdf->Ln(6);
    $pdf->SetFont('Arial', 'B', 20);
    $pdf->Cell(0, 40, utf8_decode($row['trackingnumber']), 0, 0, 'C');
    $pdf->Ln(4);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 50, '' . utf8_decode("Remitente") . '', 0, 0, 'C');
    $pdf->Ln(3);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 51, 'Nombre', 0, 0, 'L');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 51, utf8_decode($row['nombreIngreso']), 0, 0, 'R');
    $pdf->Ln(4);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 51, utf8_decode('Teléfono'), 0, 0, 'L');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 51, utf8_decode($row['telefonoIngreso']), 0, 0, 'R');
    $pdf->Ln(4);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 51, utf8_decode('Email'), 0, 0, 'L');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 51, utf8_decode($row['emailIngreso']), 0, 0, 'R');
    $pdf->Ln(8);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 50, '' . utf8_decode("Destinatario") . '', 0, 0, 'C');
    $pdf->Ln(3);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 51, 'Nombre', 0, 0, 'L');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 51, utf8_decode($row['renombre']), 0, 0, 'R');
    $pdf->Ln(4);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 51, utf8_decode('Teléfono'), 0, 0, 'L');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 51, utf8_decode($row['reTelef']), 0, 0, 'R');
    $pdf->Ln(4);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 51, utf8_decode('Email'), 0, 0, 'L');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 51, utf8_decode($row['reEmail']), 0, 0, 'R');
    if ($row['isdom'] == 0) {
        $domaddr = "RETIRO EN OFICINA";
    } elseif ($row['isdom'] == 1) {
        $domaddr = $row['domaddr'];
    }
    $pdf->Ln(30);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->drawTextBox(utf8_decode($domaddr), 0, 20, 'C', 'M', false);
    $pdf->Image('../img/codebar.png', 5, 110, 80, 20);
    $pdf->SetY(107);
    $pdf->SetX(5);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->drawTextBox($row['trackingnumber'] . " | " . $row['origenIngreso'] . " - " . $row['destinoIngreso'], 80, 1, 'C', 'M', false);
}
$pdf->Output("Etiquetas.pdf", "I");
?>
</body>
</html>