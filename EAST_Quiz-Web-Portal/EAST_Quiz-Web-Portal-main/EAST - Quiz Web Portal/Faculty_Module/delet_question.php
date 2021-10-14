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

#Submit
{
    
    width: 250px;
    height: 30px;
    font-size: 20px;
    background-color: rgb(177, 177, 7);
    color: black;
    margin-top:50px;
    margin-left:150px;
}
 #Submit:hover
{
    background-color: black;
    color: white;
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


<form action="#" method="POST" style="padding-left:400px;padding-top:30px">
<h1>Delete Questions</h1>
<?php
$result=mysqli_query($conn,"select * from test_q_a where test_id='$test_id'" );
while($rows=mysqli_fetch_assoc($result))
{?>
<?php
$val= $rows['q_id'];
?>
    <input type="checkbox" name="del_list[]" value="<?php echo $val; ?>" ><label><?php echo $rows['q_description'];?></label><br/>
    
    

<br>
<?php
//now create question_id and in check box ad that as name and id and direct pade to delet it and in that page delete the question
}
?>
 <button type="submit"  value="Submit" name="Submit" id="Submit">delete</button>
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

if(isset($_POST['Submit']))
{
   /// echo "hiiii";
    foreach($_POST['del_list'] as $del_it)
        {
            echo $del_it;
            $result=mysqli_query($conn,"delete from test_q_a where q_id= '$del_it'" );

            $query1="SELECT marks from test_info where test_id='$test_id'";
            $data1=mysqli_query($conn,$query1);
            $mark=mysqli_fetch_assoc($data1);
            $mark=$mark['marks'];
            
            $mark=$mark-1;
           // echo $mark;
            //echo $a;
            $query2="UPDATE test_info set marks='$mark' where test_id='$test_id'";
            $updat=mysqli_query($conn,$query2);



        }
        header('location:display_question.php');

}

?>


