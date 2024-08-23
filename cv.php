<?php
require_once __DIR__ . '/vendor/autoload.php';

// Handle form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $objective = $_POST['objective'];
    $education = $_POST['education'];
    $experience = $_POST['experience'];
    $skills = $_POST['skills'];

    // Handle file upload
    $profileImage = $_FILES['profile_image']['tmp_name'];
    $profileImagePath = 'uploads/' . basename($_FILES['profile_image']['name']);
    move_uploaded_file($profileImage, $profileImagePath);

    // Create new PDF document
    $pdf = new TCPDF();

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor($name);
    $pdf->SetTitle($name . ' - CV');
    $pdf->SetSubject('Curriculum Vitae');
    $pdf->SetKeywords('TCPDF, PDF, CV, ' . $name);

    // Set default header data (optional)
    $pdf->SetHeaderData('', 0, 'Curriculum Vitae', $name);

    // Set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // Set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // Set margins
    $pdf->SetMargins(15, 27, 15);
    $pdf->SetHeaderMargin(5);
    $pdf->SetFooterMargin(10);

    // Set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, 25);

    // Set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // Add a page
    $pdf->AddPage();

    // Set font for the main content
    $pdf->SetFont('helvetica', '', 12);

    // Right-side Profile Image
    $pdf->Image($profileImagePath, 160, 30, 30, 30, '', '', '', true, 150, '', false, false, 1, false, false, false);

    // Set X and Y for the left-side text
    $pdf->SetXY(15, 30); // Position text on the left side
    $pdf->SetFont('helvetica', 'B', 16);
    $pdf->Cell(0, 10, $name, 0, 1, 'L'); // Name
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, 'Email: ' . $email, 0, 1, 'L'); // Email
    $pdf->Cell(0, 10, 'Phone: ' . $phone, 0, 1, 'L'); // Phone
    $pdf->Cell(0, 10, 'Address: ' . $address, 0, 1, 'L'); // Address

    // Add a line break
    $pdf->Ln(10);

    // Add Objective section
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Cell(0, 10, 'Objective', 0, 1, 'L');
    $pdf->SetFont('helvetica', '', 12);
    $pdf->MultiCell(0, 10, $objective, 0, 'L', 0, 1, '', '', true);

    // Add Education section
    $pdf->Ln(5);
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Cell(0, 10, 'Education', 0, 1, 'L');
    $pdf->SetFont('helvetica', '', 12);
    $pdf->MultiCell(0, 10, $education, 0, 'L', 0, 1, '', '', true);

    // Add Experience section
    $pdf->Ln(5);
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Cell(0, 10, 'Experience', 0, 1, 'L');
    $pdf->SetFont('helvetica', '', 12);
    $pdf->MultiCell(0, 10, $experience, 0, 'L', 0, 1, '', '', true);

    // Add Skills section
    $pdf->Ln(5);
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Cell(0, 10, 'Skills', 0, 1, 'L');
    $pdf->SetFont('helvetica', '', 12);
    $pdf->MultiCell(0, 10, $skills, 0, 'L', 0, 1, '', '', true);

    // Add Declaration section
    $pdf->Ln(5);
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Cell(0, 10, 'Declaration', 0, 1, 'L');
    $pdf->SetFont('helvetica', '', 12);
    $pdf->MultiCell(0, 10, "I hereby declare that the above information is true to the best of my knowledge.", 0, 'L', 0, 1, '', '', true);

    // Output the PDF
    $pdf->Output($name . '_CV.pdf', 'I');
}
?>
