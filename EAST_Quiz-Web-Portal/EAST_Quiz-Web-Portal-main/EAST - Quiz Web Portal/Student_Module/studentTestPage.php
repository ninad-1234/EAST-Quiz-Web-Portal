<?php
    session_start();
    include('connection.php');
    if(!isset($_SESSION["logged_in"])){
        header('Location: studentSignIn.php');
    }
?>
<script>

function pickAnswer(qno, response)
{
    document.getElementById("response"+qno).value=response;
}

</script>
<?php
include("connection.php");
$test_id=$_SESSION['test_id'];
echo $test_id;
$sql="SELECT * FROM test_q_a where test_id='$test_id' ";
$result=$conn->query($sql);
?>

<center><h1>MCQ</h1></center>
<span id="timer" name="sub" style="margin-left: 75%; font-size: 22px; color: red;"></span>
<form method="POST" action="studentTestPage.php">
    <?php
    while($row = $result->fetch_assoc())
    {
        echo $row['q_id'].". ";
        echo $row['q_description']."<br>";
        $qno=$row['q_id'];
        $class_id
        //echo $_SESSION["class_id"];
        ?>
        <input type="radio" name="rb<?php echo $qno?>" id="rb<?php echo $qno?>" onclick="pickAnswer('<?php echo $qno?>','<?php echo $row['option1']?>')" /><?php echo $row['option1'];?><br>
        <input type="radio" name="rb<?php echo $qno?>" id="rb<?php echo $qno?>" onclick="pickAnswer('<?php echo $qno?>','<?php echo $row['option2']?>')" /><?php echo $row['option2'];?><br>    
        <input type="radio" name="rb<?php echo $qno?>" id="rb<?php echo $qno?>" onclick="pickAnswer('<?php echo $qno?>','<?php echo $row['option3']?>')" /><?php echo $row['option3'];?><br>
        <input type="radio" name="rb<?php echo $qno?>" id="rb<?php echo $qno?>" onclick="pickAnswer('<?php echo $qno?>','<?php echo $row['option4']?>')" /><?php echo $row['option4'];?><br>       
        <br>     
        <input type="hidden" name="response<?php echo $qno?>" id="response<?php echo $qno?>" />
        <?php    
    }
    ?>
    <input type="hidden" id="timer1" name="sub">
    <input type="submit" name="submit" value="Submit" style="height: 35px; width: 60px;">
</form>
<script>
        var timer,timeleft = 900; 

        function time()
        {
            var minute = Math.floor(timeleft / 60);
            var seconds = timeleft % 60;
            
            if (timeleft >= 0)
            {
                if (minute < 10)
                {
                    minute = "0" + minute;
                }
                
                if (seconds < 10)
                {
                    seconds = "0" + seconds;
                }
            
                document.getElementById("timer").innerHTML = minute + ":" + seconds;
            }
            
            if (timeleft <= 0)
            {    
                clearTimeout(timer);
                document.getElementById("exam").submit();
                
                return;
            }

            timeleft--;
            
            timer = setTimeout(time, 1000);
        }

        time();
</script>
<?php
if(isset($_POST['submit']))
{
    $sql="SELECT * FROM test_q_a where test_id= '$test_id'";
    $result=$conn->query($sql);
    $marks=0;
    while($row = $result->fetch_assoc())
    {
        $qno=$row['q_id'];
        $response=$_POST['response'.$qno];
        if($response==$row['correct_option'])
        {
            $marks++;
        }
    }
    $sql1="SELECT * FROM test_q_a where test_id='$test_id'";
    $result1=$conn->query($sql1);
    $sql2="SELECT * FROM test_info where test_id='$test_id'";
    $result2=$conn->query($sql2);
    $row2=$result2->fetch_assoc();
    $test_id=$_SESSION['test_id'];
    $class_id=$row2['class_id'];
    $std_id=$_SESSION['std_id'];
    
    $sqlupdate="UPDATE test_info set flag=1 where class_id='$class_id' and test_id='$test_id'";
    $result4=mysqli_query($conn,$sqlupdate);

    while($row1 =$result1->fetch_assoc())
    {
        $qno=$row1['q_id'];
        $response=$_POST['response'.$qno];
        $q_description=$row1['q_description'];
        $option1=$row1['option1'];
        $option2=$row1['option2'];
        $option3=$row1['option3'];
        $option4=$row1['option4'];
        $sqlinsert="INSERT INTO test_response(test_id,class_id,std_id,q_id,q_description,marked_option,option1,option2,option3,option4,marks) VALUES('$test_id','$class_id','$std_id','$qno','$q_description','$response','$option1','$option2','$option3','$option4','$marks')"; 
        $result3=mysqli_query($conn,$sqlinsert);
    }  

    header("Location: studentHomePage.php");
   
}

?>