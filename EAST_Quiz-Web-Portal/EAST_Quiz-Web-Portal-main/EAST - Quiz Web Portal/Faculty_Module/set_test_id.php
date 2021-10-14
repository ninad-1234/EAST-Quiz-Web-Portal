<?php
include("connection.php");
session_start();
//echo "<br><br>Faculty id: - ",$_SESSION['f_id'],"<br>";
//echo "<br>";
?>

<?php

$a=uniqid();

$_SESSION['test_id']=$a;

$fac_id=$_SESSION['f_id'];



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

    margin-top: 170px;
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
#Submit
{
 
    width: 250px;
    height: 30px;
    font-size: 20px;
    background-color: #ffcc00;
    color: black;
}
#Submit:hover
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


<form method="post" style="margin-top:120px; margin-left:500px;  ">
<h1>Set test details</h1>
Class ID:-<input type="text" name="c_name" id="c_name"><br><br>
Duration:- <input type="time" name="time" id="time"><br><br>
Date:-<input type="date" name="date" id="date"><br><br>
Name of Test:-<input type="text" name="t_name" id="t_name"><br><br>
<button type="submit"  value="Submit" name="Submit" id="Submit" >Ready to set</button>
</form>
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
<body>
</html>


<?php

if(isset($_POST['Submit']))
{
    $class_id=$_POST['c_name'];
    $time=$_POST['time'];
    $date=$_POST['date'];
    $name=$_POST['t_name'];
    $_SESSION['class_id']=$class_id;
    $_SESSION['name']=$name;
    $_SESSION['date']=$date;
    $_SESSION['time']=$time;
    
$query="INSERT into test_info(test_id,fac_id,class_id,testname,creation_date,creation_time) values('$a','$fac_id','$class_id','$name','$date','$time') ";

$data=mysqli_query($conn,$query);

header('location:add_q.php');
}
?>