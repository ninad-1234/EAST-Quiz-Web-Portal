<?php
include("connection.php");
session_start();
echo "<br><br>Faculty id: - ",$_SESSION['f_id'],"<br>";
echo "<br>";
$test_id=$_SESSION['test_id'];
echo "<br><br>Test id: - ",$_SESSION['test_id'],"<br>";
?>



<?php

$a=$_SESSION['test_id'];

$fac_id=$_SESSION['f_id'];

$class_id=$_SESSION['class_id'];
$name=$_SESSION['name'];
$date=$_SESSION['date'];
$time=$_SESSION['time'];
$mark=$_SESSION['mark'];

$query="UPDATE test_info set marks='$mark' where test_id='$test_id'";
//$query="INSERT into test_info(test_id,fac_id,class_id,testname,creation_date,creation_time,marks) values('$a','$fac_id','$class_id','$name','$date','$time','$mark') ";

$data=mysqli_query($conn,$query);

?>