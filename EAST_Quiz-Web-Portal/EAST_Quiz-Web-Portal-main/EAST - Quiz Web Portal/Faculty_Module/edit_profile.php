<?php
include("connection.php");
session_start();
//echo "<br><br>Faculty id: - ",$_SESSION['f_id'],"<br>";
$f_id=$_SESSION['f_id'];
//echo "<br>";
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


#edit_btn1
{
    
    width: 250px;
    height: 30px;
    font-size: 20px;
    background-color: rgb(177, 177, 7);
    color: black;
    margin-top:50px;
    margin-left:150px;
}
 #edit_btn1:hover
{
    background-color: black;
    color: white;
}


    </style>

<body style='background-color:#eeeeee;'>

<div style="font-family: Arial; font-size:17.5px;">
    <ul>
        <li style="width:100px"><a  href="home.php">Home</a></li>
        <li style="width:160px"><a href="resume_test.php">Resume Test</a></li>
        <li style="width:240px"><?php echo "<a href='faculty_response.php?f_id=$_SESSION[f_id]'>";?>Student Analysis</a></li>
        <li style="width:240px"><a href="facultyDiscussionForum1.php">Discussion Forum</a></li>
        <li style="width:100px"><?php echo "<a href='forum_fac_rec.php?f_id=$_SESSION[f_id]'>";?>Chats</a></li>
        <li style="width:210px"><a class="active" href="view_profile.php">View Profile</a></span></li>
        <li style="width:101.7px"><a href="logf.php">Logout</a></span></li>
    </ul>
    </div>


<form method="post" action="#" style="padding-left:250px; padding-top:-30px;">
    <h1>Edit Now</h1>
Name:- <input type="text" name="name"><br><br>
password:- <input type="text" name="password"><br><br>

<button type="submit" value="submit" name="submit" id="edit_btn1">Save changes</button>

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
</body>
</html>

<?php

if(isset($_POST['submit']))
{
    //echo "hii";
    echo $f_id;
    echo "<br>";
    $name=$_POST['name'];
    $password=$_POST['password'];
    echo $name;
    echo "<br>";
    echo $password;
    echo "<br>";
    $query=" update faculty set fac_name='$name' where fac_id='$f_id' ";
    $query1=" update faculty set password='$password' where fac_id='$f_id' ";
    $data=mysqli_query($conn,$query);
    $data1=mysqli_query($conn,$query1);
    header('location:view_profile.php');

}


?>