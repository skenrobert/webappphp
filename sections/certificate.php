<?php
require('../library/fpdf185/fpdf.php');
include_once('../configurations/db.php');

$conexionDB = DB::crearInstancia();

//***************************************** */

function addTex($pdf, $texto, $x, $y, $align='L', $font='ARIAL', $size=10, $r=0, $g=0, $b=0){
    $pdf->SetFont($font, "", $size);
    $pdf->SetXY($x, $y);
    $pdf->SetTextColor($r, $g, $b);
    $pdf->Cell(0, 10, $texto, 0, 0, $align);
}

function addImage($pdf, $imagen, $x, $y)
{
    $pdf->Image($imagen, $x, $y);
}


//***************************************** */
// print_r($_GET);
$student_id=isset($_GET['student_id']) ? $_GET['student_id'] : '';
$course_id=isset($_GET['course_id']) ? $_GET['course_id'] : '';

$sql = "SELECT students.name, students.last_name, courses.name as course_name FROM students, courses WHERE students.id=:student_id AND courses.id=:course_id";
$consulta=$conexionDB->prepare($sql);
$consulta->bindParam('student_id',$student_id);
$consulta->bindParam('course_id',$course_id);
$consulta->execute();
$student = $consulta->fetch(PDO::FETCH_ASSOC);

// print_r($student);

// $pdf = new FPDF("L","mm",array(529,254));
$pdf = new FPDF("L","mm",array(529,354));
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
addImage($pdf,"../src/Certificate.png", 0, 0);
addTex($pdf, ucwords($student['name'].' '.$student['last_name']) , 210, 115, 'L', "Helvetica", 30, 0, 255, 255);
addTex($pdf, ucwords($student['course_name']) , 210, 170, 'L', "Helvetica", 30, 0, 255, 255);
addTex($pdf,date("d/m/Y"), 400, 285, 'L', "Helvetica", 30, 0, 255, 255);
// $pdf->Cell(40,10,'Hello World!');
$pdf->Output();




































?>