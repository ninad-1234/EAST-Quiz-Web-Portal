<?php
include("connection.php");
session_start();
//echo "<br><br>Faculty id: - ",$_SESSION['f_id'],"<br>";
$f_id=$_SESSION['f_id'];
//echo "<br>";
?>

<?php
if(isset($_POST['typedMsg'])){
$msg = $_POST['typedMsg'];
echo $msg;
echo $f_id;
echo $_POST['cls'];
$cls=$_POST['cls'];
$saveMsgToDB = "insert into discuss (fac_id,class_id,msg,timeOfSend) values ( '$f_id','$cls' , '$msg', CURRENT_TIMESTAMP() )";
$result = $conn->query($saveMsgToDB);
if($result === TRUE) {
    header('location:facultyDiscussionForum1.php');
    } 
else {
echo "Error: ". $conn->error;
    }
                 
 }