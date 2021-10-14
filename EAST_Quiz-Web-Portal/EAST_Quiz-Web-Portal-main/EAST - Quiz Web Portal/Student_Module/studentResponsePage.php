<style>
    *{
        margin: 0;
        padding: 0;
    }

    .response{
        background-color: #FF;
        margin: 50px;
        border: 1px solid black;
        padding: 20px;
    }
    .exception {
                
                background-color: black;
                color: white;
                font-size: 15px;
                margin-bottom: 4%;
                
                width: 20%;
                height: 5%;
    }

    .exception:hover {
        box-shadow: none;
        color: black;
        background-color: #FFCC00;
    }

</style>
<?php
    session_start();
    include('connection.php');
    if(!isset($_SESSION["logged_in"])){
        header('Location: studentSignIn.php');
    }
    $test_id=$_SESSION['test_id'];
    $std_id=$_SESSION['std_id'];
$sql="SELECT * FROM test_response where test_id='$test_id' and std_id= '$std_id' ";
$result=$conn->query($sql);

?>
<body>
<div class="response" id = "response"> 
<h1><center>Response Page with Marks</center><br></h1>
<?php
$marks=0;
while($row = $result->fetch_assoc())
{
    $qno=$row['q_id'];
    echo $qno.". ";
    echo $row['q_description']."<br>";
    $sql1="SELECT correct_option FROM test_q_a where q_id='".$row['q_id']."' and test_id='".$_SESSION['test_id']."'";
    $result1=$conn->query($sql1);
    $row1=$result1->fetch_assoc();
    ?>
    <input type="radio" name="rb<?php echo $qno?>" id="rb<?php echo $qno?>" <?php if($row['marked_option']==$row['option1']){echo 'checked="checked"';}?> disabled /><?php echo $row['option1'];?><br>
    <input type="radio" name="rb<?php echo $qno?>" id="rb<?php echo $qno?>" <?php if($row['marked_option']==$row['option2']){echo 'checked="checked"';}?> disabled /><?php echo $row['option2'];?><br>
    <input type="radio" name="rb<?php echo $qno?>" id="rb<?php echo $qno?>" <?php if($row['marked_option']==$row['option3']){echo 'checked="checked"';}?> disabled /><?php echo $row['option3'];?><br>
    <input type="radio" name="rb<?php echo $qno?>" id="rb<?php echo $qno?>" <?php if($row['marked_option']==$row['option4']){echo 'checked="checked"';}?> disabled /><?php echo $row['option4'];?><br><br>
    <?php 
    echo "Your response: ".$row['marked_option']."<br>";
    echo "Correct Answer: ".$row1['correct_option']."<br><br>";
    $marks=$row['marks'];    
}

$sql2="SELECT marks FROM test_info where test_id='".$_SESSION['test_id']."'";
$result2=$conn->query($sql2);
$row2=$result2->fetch_assoc();
echo "<b>"."Total Marks secured : ".$marks." /".$row2['marks']."<b>";
?>


</div>
<center>
<input type="button" class="exception" value="Go Back" onclick = "window.history.back()"/>
<button class="exception" onclick = "printDiv();">Print Question paper</button></center>
</body>
<script>

    function printDiv() { 
        var divContents = document.getElementById("response").innerHTML; 
        var a = window.open('', '', 'height=1024, width=1536'); 
        a.document.write('<html>'); 
        a.document.write('<body>'); 
        a.document.write(divContents); 
        a.document.write('</body></html>'); 
        a.document.close(); 
        a.print(); 
    }
</script>
</html>