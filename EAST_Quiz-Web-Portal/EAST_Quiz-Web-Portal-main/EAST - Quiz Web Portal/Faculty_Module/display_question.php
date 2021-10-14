<?php
include("connection.php");
session_start();
//echo "<br><br>Faculty id: - ",$_SESSION['f_id'],"<br>";
//echo "<br>";
$test_id=$_SESSION['test_id'];
//echo "<br><br>Test id: - ",$_SESSION['test_id'],"<br>";
?>
<html>

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

#foot
{

    margin-top: 10px;
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

    </style>
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

  

<div class="questions" style="margin-left:450px;">
<h1>View Questions</h1>
<?php


$result=mysqli_query($conn,"select * from test_q_a where test_id='$test_id'" );
$cnt=1;

while($rows=mysqli_fetch_assoc($result))
{

    
    echo "Question    ";
    echo $cnt ;
    echo "      ";
    ?><b><?php
    echo $rows['q_description'];
    ?></b><br><?php
    echo "option1 ".":-";
    ?><b><?php
    echo $rows['option1'];
    ?></b><br>
    <?php
    echo "option2 ".":-";
    ?><b><?php
    echo $rows['option2'];
    ?></b><br>
    <?php    echo "option3 ".":-";
    ?><b><?php
    echo $rows['option3'];
    ?></b><br>
    <?php
    echo "option4 ".":-";
    ?><b><?php
    echo $rows['option4'];
    ?></b><br>
    <?php
    echo "correct ans ".":-";
    ?><b><?php
    echo $rows['correct_option'];
    ?></b><br><br>
    <?php
    $cnt=$cnt+1;
}

$_SESSION['mark']=$cnt;
?>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button onclick="location.href = 'add_q.php';"style="background-color:#ffcc00;
height:50px;"id="btn1">Add more question</button>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button id="btn2" onclick="location.href = 'delet_question.php';" style="background-color:#ffcc00;
height:50px;">Delete Questions</button>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button id="btn3" onclick="location.href = 'pdf_paper.php';"style="background-color:#ffcc00;
height:50px;">Finalaize and get pdf</button>


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