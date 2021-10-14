<?php
    session_start();
    include('connection.php');
    if(!isset($_SESSION["logged_in"])){
        header('Location: studentSignIn.php');
    }
?>

<?php
if(isset($_POST['typedMsg'])){
$msg = $_POST['typedMsg'];
echo $msg;
echo $_SESSION['std_id'];
echo $_POST['cls'];
$std_id=$_SESSION['std_id'];
$cls=$_POST['cls'];
$saveMsgToDB = "insert into discuss (std_id,class_id,msg,timeOfSend) values ( '$std_id','$cls' , '$msg', CURRENT_TIMESTAMP() )";
$result = $conn->query($saveMsgToDB);
if($result === TRUE) {
    header('location:studentDiscussionForum.php');
    } 
else {
echo "Error: ". $conn->error;
    }
                 
 }