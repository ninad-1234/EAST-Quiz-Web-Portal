<?php
include("connection.php");
session_start();
//echo "<br><br>Faculty id: - ",$_SESSION['f_id'],"<br>";
//echo "<br>";
$test_id=$_SESSION['test_id'];
//echo "<br><br>Test id: - ",$_SESSION['test_id'],"<br>";
?>

<?php
require('C:/xampp/htdocs/fpdf.php');

$result=mysqli_query($conn,"select * from  test_info where test_id='$test_id' ");

$result1=mysqli_query($conn,"select * from  test_q_a where test_id='$test_id' ");
//echo $test_id;

$data=mysqli_fetch_assoc($result);
//echo $data['creation_time'];



$pdf =new FPDF('p','mm','A4');

$pdf->AddPage();


$pdf ->SetFont('Arial','B',14);



$pdf -> Cell(130 ,5, 'EAST ',0,0);
$pdf -> Cell(59  ,5, 'Test paper invoice',0,1);
$pdf -> Cell(189 ,5,'',0,1);

$pdf ->SetFont('Arial','',14);

$pdf -> Cell(130 ,5, 'Test_ID ',0,0);
$pdf -> Cell(59  ,5, $test_id,0,1);

$pdf -> Cell(189 ,5,'',0,1);
$pdf -> Cell(189 ,5,'',0,1);

$cnt=1;

$pdf -> Cell(130 ,5, 'Duration:-   '.$data['creation_time'],0, 0);

$pdf -> Cell(59 ,5, 'Date:-   '. $data['creation_date'],0,1);

$pdf -> Cell(189 ,5,'',0,1);
$pdf -> Cell(189 ,5,'',0,1);

while($rows=mysqli_fetch_assoc($result1))
{

  //  echo $rows['question'];
   // echo $rows['option1'];
    //echo $rows['option2'];
    //echo $rows['option3'];
   // echo $rows['option4'];
   // echo $rows['correct_option'];
    
    $pdf ->SetFont('Arial','',12);
    $pdf ->Cell(9,5,$cnt.") ",0,0);
    $pdf ->Cell(180,5,$rows['q_description'],0,1);
    $pdf -> Cell(189 ,5,'',0,1);
    $pdf ->Cell(50,5,"a)  ".$rows['option1'],0,0);
    $pdf ->Cell(50,5,"b)  ".$rows['option2'],0,1);
    $pdf -> Cell(189 ,5,'',0,1);
    $pdf ->Cell(50,5,"c)  ".$rows['option3'],0,0);
    $pdf ->Cell(50,5,"d)  ".$rows['option4'],0,1);
    $cnt=$cnt+1;
    $pdf -> Cell(189 ,5,'',0,1);
    $pdf -> Cell(189 ,5,'',0,1);
}

$pdf -> Output();


?>