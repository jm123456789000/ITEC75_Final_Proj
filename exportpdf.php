<?php

include "fpdf184/fpdf.php";
include "conn.php";

if (isset($_GET['title'])) {
    $title = $_GET['title'];

    $sql = "SELECT * FROM data WHERE title = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $title);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $details = $row['details'];
        $authors = $row['authors'];

        // Create a PDF with custom size (width, height) in millimeters
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetAutoPageBreak(false);

        // Certificate border and background
        $pdf->Image('', 0, 0, 210, 297);

        // Certificate title
        $pdf->SetFont('Arial', 'B', 45);
        $pdf->SetXY(0, 100);
        $pdf->Cell(210, 40, $title, 0, 2, 'C');

        // Certificate details
        $pdf->SetFont('Arial', '', 19);
        $pdf->MultiCell(210, 10, $details, 0, 'C');

        // Certificate authors
        $pdf->SetXY(0, 230);
        $pdf->Cell(210, 8, "Authors: " . $authors, 0, 2, 'C');


        // Output the PDF
        header('Content-Type: application/pdf');
        $pdf->Output();
    } else {
        echo "No record found!";
    }

    $stmt->close();
    $con->close();
} else {
    echo "Invalid or missing 'title' parameter!";
}
?>