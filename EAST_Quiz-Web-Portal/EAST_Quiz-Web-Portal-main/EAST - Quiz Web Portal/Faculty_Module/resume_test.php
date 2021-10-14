<?php
include("connection.php");
session_start();
//echo "<br><br>Faculty id: - ",$_SESSION['f_id'],"<br>";
//echo "<br>";
$fac_id=$_SESSION['f_id'];

?>
<html>
<head>
<script>
    function enter_value(ids,cnt)
    {
        //alert(ids);
        document.getElementById("test_ids"+cnt).value=ids;
      <?php // echo $test_id ?>
      //  alert(document.getElementById("test_id").value);
    }
    </script>
    </head>


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

    margin-top: 70px;
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

#submit
{
    
    width: 250px;
    height: 30px;
    font-size: 20px;
    background-color: rgb(177, 177, 7);
    color: black;
    margin-top:20px;
    margin-left:150px;
}
 #submit:hover
{
    background-color: black;
    color: white;
}

        </style>
 <body style='background-color:#eeeeee;'>

<div style="font-family: Arial; font-size:17.5px;">
    <ul>
        <li style="width:100px"><a  href="home.php">Home</a></li>
        <li style="width:160px"><a class="active" href="resume_test.php">Resume Test</a></li>
        <li style="width:240px"><?php echo "<a href='faculty_response.php?f_id=$_SESSION[f_id]'>";?>Student Analysis</a></li>
        <li style="width:240px"><a href="facultyDiscussionForum1.php">Discussion Forum</a></li>
        <li style="width:100px"><?php echo "<a href='forum_fac_rec.php?f_id=$_SESSION[f_id]'>";?>Chats</a></li>
        <li style="width:210px"><a  href="view_profile.php">View Profile</a></span></li>
        <li style="width:101.7px"><a href="logf.php">Logout</a></span></li>
    </ul>
    </div>

  


<?php
$cnt=1;
$result=mysqli_query($conn,"SELECT DISTINCT test_id FROM test_info where fac_id='$fac_id' ");
while ($rows=mysqli_fetch_assoc($result))
{
    ?>
    <form action="display_resumed_question.php" method="POST" style="padding-left:300px;">
     
    <?php
    $test_id= $rows['test_id'];
    $result2=mysqli_query($conn,"SELECT  testname FROM test_info where fac_id='$fac_id' and test_id='$test_id' ");
    $rows2=mysqli_fetch_assoc($result2);

    $result3=mysqli_query($conn,"SELECT  creation_date FROM test_info where fac_id='$fac_id' and test_id='$test_id' ");
    $rows3=mysqli_fetch_assoc($result3);


    //echo $rows2['testname'];
    $ftestname=$rows2['testname'];
    ?>
    
    <?php
   // echo "<br>";
    //echo "<br>";
    ?>
    <button type="submit" id="submit" value="submit" name="submit" onclick="enter_value('<?php echo $test_id; ?>','<?php  echo $cnt ;?>')" ><?php  echo $ftestname; ?></button>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <b>Dated on:- <?php  echo $rows3['creation_date'] ?></b>
    <input type="hidden" name="test_ids" id="test_ids<?php  echo $cnt ;?>" >
    </form>
    
    <?php
    $cnt=$cnt+1;
}

?>



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
    $test_id1=$_POST['test_ids'];
    echo $test_id1;
}

?>

