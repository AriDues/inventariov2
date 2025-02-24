<?php
// Incluir la biblioteca TCPDF
require_once('libs/tcpdf/tcpdf.php');

// Crear una instancia de TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Establecer información del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Aristides Rodriguez');
$pdf->SetTitle('Reporte de Notas');
$pdf->SetSubject('Reporte de Notas');
$pdf->SetKeywords('Notas, Reporte, PDF');

// Establecer márgenes
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Añadir una página
$pdf->AddPage();

// Contenido del PDF
$html = '<h1>Reporte de Notas</h1>';

// Aquí puedes agregar el contenido dinámico de las notas desde tu base de datos
$html .= '<p>Evento 4feb</p>';
$html .= '<p>30/01/2025</p>';
$html .= '<p>Evento en el hotel Meliá (8:00pm hasta las 11:00pm)</p>';
$html .= '<p>EQUIPOS: Altavoz Mackie mejorado = 10und, Microfonos JBL PartyBox = 10und, speaker JBL = 10und.</p>';

// Escribir el contenido en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Generar el PDF y enviarlo al navegador
$pdf->Output('reporte_notas.pdf', 'I');
?>