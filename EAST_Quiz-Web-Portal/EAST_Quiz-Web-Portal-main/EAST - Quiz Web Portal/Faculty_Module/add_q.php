<?php
include("connection.php");
session_start();
//echo "<br><br>Faculty id: - ",$_SESSION['f_id'],"<br>";
echo "<br>";
$a=$_SESSION['test_id'];
$class_id=$_SESSION['class_id'];
?>

<html>
<head>
<style>
  ul {
  list-style-type: none;
  margin-top:-8px;
  margin-left:-8px;
  margin-right:-8px;
  padding: 0;
  overflow: hidden;
  border:none;
  background-color: black;
  width:101.4%;
    height:48px;
    z-index:1000px;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  font-weight:bold;
  background-color: #ffcc00;
  color: black;
}

li a.active {
  color: black;
  background-color: #ffcc00;
}
.question
{
   display: none;
}
.question form
{
    margin-left: 100px;
    margin-top: 100px;
}
#foot
{

    margin-top: 270px;
    height: 150px;
    
	background-color: black;
	color: white;
}
#contact
{
	padding-left: 45px;
	font-size: 30px;
}
#fadd
{
	padding-left: 250px;
}
 #btn2
{
 
    width: 250px;
    height: 30px;
    font-size: 20px;
    background-color: rgb(177, 177, 7);
    color: black;
    margin-top:50px;
    margin-left:150px;
}
 #btn2:hover
{
    background-color: black;
    color: white;
}

#btn1
{
    
    width: 250px;
    height: 30px;
    font-size: 20px;
    background-color: rgb(177, 177, 7);
    color: black;
    margin-top:50px;
    margin-left:150px;
}
 #btn1:hover
{
    background-color: black;
    color: white;
}

#submit
{
    
    width: 250px;
    height: 30px;
    font-size: 20px;
    background-color: rgb(177, 177, 7);
    color: black;
    margin-top:50px;
    margin-left:150px;
}
 #submit:hover
{
    background-color: black;
    color: white;
}
#lin
{
    text-decoration:none;
    background-color:rgba(0,0,0,0.7);
    border-radius:3px;
    color:white;
}
#lin:hover
{
    text-decoration:none;
    background-color:rgba(0,0,0,0.2);
    color:black;
    border:2px solid black;
}
</style>

</head>


<body style='background-color:#eeeeee;'>

<div style="font-family: Arial; font-size:17.5px;">
    <ul>
        <li style="width:100px"><a class="active" href="home.php">Home</a></li>
        <li style="width:160px"><a href="resume_test.php">Resume Test</a></li>
        <li style="width:240px"><?php echo "<a href='faculty_response.php?f_id=$_SESSION[f_id]'>";?>Student Analysis</a></li>
        <li style="width:240px"><a href="facultyDiscussionForum1.php">Discussion Forum</a></li>
        <li style="width:100px"><?php echo "<a href='forum_fac_rec.php?f_id=$_SESSION[f_id]'>";?>Chats</a></li>
        <li style="width:210px"><a href="view_profile.php">View Profile</a></span></li>
        <li style="width:101.7px"><a href="logf.php">Logout</a></span></li>
    </ul>
    </div>
    <button onclick="window.history.back()" id="lin">Go Back</button>

    <div class="set">
        <button class="add_question" onclick="add_question()" id="btn1">Add question</button>
    </div>
    <div class="view">
    <form action="display_question.php"  method="POST" id="form2">
    <button type="submit" form="form2" value="view" onclick="cnt()" id="btn2">View questions</button>
    </form>

    </div>
    <div class="question" id="question" style="margin-left:250px;">
        <form action="#" method="POST" id="form1">
            <h1>Enter question details</h1>
        <label for="question_id"><b>Question_ID</b></label>
            <input type="number" placeholder="question_id" name="question_id" id="question_id">
            <br><br>
            <label for="question"><b>Question</b></label>
            <input type="text" placeholder="question" name="question" id="question">
            <br><br>
            <label for="question"><b>option_1</b></label>
            <input type="text" placeholder="op1" name="op1" id="op1">
            <br><br>
            <label for="question"><b>option_2</b></label>
            <input type="text" placeholder="op2" name="op2" id="op2">
            <br><br>
            <label for="question"><b>option_3</b></label>
            <input type="text" placeholder="op3" name="op3" id="op3">
            <br><br>
            <label for="question"><b>option_4</b></label>
            <input type="text" placeholder="op4" name="op4" id="op4">
            <br><br>
            <label for="question"><b>correct</b></label>
            <input type="text" placeholder="correct" name="correct" id="correct">
            <br><br>
            <button type="submit" form="form1" value="Submit" onclick="ack()" name="Submit" id="submit">Submit</button>
        </form>
    </div>


    
    <script>
    function add_question()
    {
        document.getElementById("question").style.display = "block";
    }
    function ack(){
        alert("question set");
    }

    
    
    </script>

<table id="foot" width="100%">
    <tr>
    <td id="contact">
    Contact us &#128512 :
    </td>
    </tr>
    <tr>
    <td id="fadd" width="30%">
    &#127968 Address:
    </td>
    <td>
    Indira appartment, Gandhi road, Mumbai, 416502
    </td>
    </tr>
    <tr>
    <td id="fadd" width="30%">
    &#x260E Contact_no:
    </td>
    <td>
    5236014589
    </td>
    </tr>
    <tr>
    <td id="fadd" width="30%">
    &#x2709 Mail_id:
    </td>
    <td>
    topaleninad01@gmail.com
    </td>
    </tr>
    </table>


</body>
</html>

<?php


if(isset($_POST['Submit']))
{
    $fac_id=$_SESSION['f_id'];
    $qid=$_POST['question_id'];
    $q=$_POST['question'];
    $op1=$_POST['op1'];
    $op2=$_POST['op2'];
    $op3=$_POST['op3'];
    $op4=$_POST['op4'];
    $c=$_POST['correct'];
    if($q!='')
    {

        $query="INSERT INTO test_q_a (test_id,class_id,q_id,q_description, correct_option,
         option1,option2,option3,option4) values('$a','$class_id','$qid','$q','$c','$op1','$op2','$op3','$op4')";
      //  $query="insert into paper values ('$a','$fac_id','$qid1','$q1','$op11','$op12','$op13','$op14','$c1')";
        $data=mysqli_query($conn,$query);

        $query1="SELECT marks from test_info where test_id='$a'";
        $data1=mysqli_query($conn,$query1);
        $mark=mysqli_fetch_assoc($data1);
        $mark=$mark['marks'];
        
        $mark=$mark+1;
       // echo $mark;
        //echo $a;
        $query2="UPDATE test_info set marks='$mark' where test_id='$a'";
        $updat=mysqli_query($conn,$query2);
    }
}

?>
    