<html>
<head>
<title>Response and Evaluation</title>
</head>
<body>
<style>


ul {
  list-style-type: none;
  margin-top:-8px;
  margin-left:-8px;
  margin-right:-19px;
  padding: 0;
  overflow: hidden;
  border:none;
  background-color: black;
  width:101.3%;
    height:48px;
    z-index:1000px;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
#lin
{
    text-decoration:none;
    background-color:rgba(0,0,0,0.7);
    border-radius:3px;
    color:white;
    width:80px;
    height:30px;
    
}
#lin:hover
{
    text-decoration:none;
    background-color:rgba(0,0,0,0.2);
    color:black;
    border:2px solid black;
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
  color:black;
}

li a.active {
  color: black;
  background-color: #ffcc00;
}
</style>
<?php
session_start();
?>
<body style='background-color:#eeeeee;'>
    <div style="font-family: Arial; font-size:17.5px; ">
    <ul>
        <li style="width:100px"><a href="home.php">Home</a></li>
        <li style="width:160px"><a href="resume_test.php">Resume Test</a></li>
        <li style="width:240px"><?php echo "<a class='active' href='faculty_response.php?f_id=$_SESSION[f_id]'>";?>Student Analysis</a></li>
        <li style="width:240px"><a href="facultyDiscussionForum1.php">Discussion Forum</a></li>
        <li style="width:100px"><?php echo "<a href='forum_fac_rec.php?f_id=$_SESSION[f_id]'>";?>Chats</a></li>
        <li style="width:210px"><a href="view_profile.php">View Profile</a></span></li>
        <li style="width:84.9px"><a href="logf.php">Logout</a></span></li>
    </ul>
    </div>
<?php
include('connection.php');

$_SESSION['s_id']=$_GET['s_id'];
$_SESSION['test_id']=$_GET['test_id'];
$query="select * from test_response where test_id='$_SESSION[test_id]'";
$test_id=$_SESSION['test_id'];
$data=mysqli_query($conn,$query);
$tot=mysqli_num_rows($data);
//echo $tot;
//echo "<br><br>Student id: - ",$_SESSION['s_id'];
//echo "<br><br>Test id: - ",$_SESSION['test_id'];

if($data)
{
    //echo "Success";
}
else
{
    echo "Fail";
}
$mark=0;

echo "<h2 align='center'> Responses and Evaluation</h2>";
//$result=mysqli_fetch_assoc($data);
//$query8="select * from test_response where test_id='$_SESSION[test_id]' and s_id='$_SESSION[s_id]'";
//$data8=mysqli_query($conn,$query8);

?>

<form action='marks.php'>
<?php
while($result=mysqli_fetch_assoc($data))
{
   // $result8=mysqli_fetch_assoc($data8);
    $n=$result['marked_option'];
    //echo $n;
    $q_desp=$result['q_description'];
    ?>
    <div style=style='background-color:#ffdb4d; width:500px;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19); border-radius:10px;'>
    <table align='left'>
    <tr>
        <td><?php echo $result['q_id'],") ",$result['q_description'],"";?><b>(1 mark)</b></td>
    </tr>
    <tr>
        <td><input type='radio' name="rb<?php echo $result['q_id'];?>" disabled value="<?php echo $result['option1'];?>"
        <?php 
        if($n==$result['option1']) 
        {
            echo "checked";
        }
        ?>
       > a) <?php echo $result['option1'];?></td>
    </tr>
    <tr>
        <td><input type='radio' name="rb<?php echo $result['q_id'];?>" disabled value="<?php echo $result['option2'];?>"
        <?php 
        if($n==$result['option2']) 
        {
            echo "checked";
        }?>
       > b) <?php echo $result['option2'];?></td>
    </tr>
    <tr>
        <td><input type='radio' name="rb<?php echo $result['q_id'];?>" disabled value="<?php echo $result['option3'];?>"
        <?php 
        if($n==$result['option3']) 
        {
            echo "checked";
        }?>
       > c) <?php echo $result['option3'];?></td>
    </tr>
    <tr>
        <td><input type='radio' name="rb<?php echo $result['q_id'];?>" disabled value="<?php echo $result['option4'];?>"
        <?php 
        if($n==$result['option4']) 
        {
            echo "checked";
        }?>
       > d) <?php echo $result['option4'];?></td></tr><tr>
    </tr>
    </table>
    
    <?php
    $s='Wrong ';
    
    $query2="select * from test_q_a where test_id='$test_id' and q_description='$q_desp' ";
    $data2=mysqli_query($conn,$query2);
    $result2=mysqli_fetch_assoc($data2);


    $m=0;
        if($n==$result2['correct_option'])
        {
            $mark=$mark+1;
            $m=1;
            $s='Right ';
        }
    ?>
    <h4>&nbsp;&nbsp;Marked Answer :  <?php echo $n;?></h4>
    <h4>&nbsp;&nbsp;Correct Answer :  <?php echo $result2['correct_option'];?></h4>
    <h4>&nbsp;&nbsp;<?php echo $s," -: ",$m,"/1";?><br><br></div><hr><br>
    <?php
}
?>
<center><h3><?php echo "The Overall Marks of the Quiz is ",$mark,"/",$tot;?></h3></center>
<center><?php echo "<a href='fac_test.php?s_id=$_SESSION[s_id]'><input type='button' value='Back' style='font-size:16; border-color:blue; color:white; background-color:blue; border-radius:8px; height:25px; width:100px;'></a>";?></center>


</form>

<table id="foot" width="100%" style="background-color:black; color:white; margin-top:150px;">
    <tr>
    <td id="contact"style="background-color:black;color:white;">
    Contact us &#128512 :
    </td>
    </tr>
    <tr >
    <td id="fadd" width="30%"style="background-color:black;color:white;">
    &#127968 Address:
    </td>
    <td style="background-color:black;color:white;">
    Indira appartment, Gandhi road, Mumbai, 416502
    </td>
    </tr>
    <tr>
    <td id="fadd" width="30%"style="background-color:black;color:white;">
    &#x260E Contact_no:
    </td>
    <td style="background-color:black;color:white;">
    5236014589
    </td>
    </tr>
    <tr>
    <td id="fadd" width="30%" style="background-color:black;color:white;">
    &#x2709 Mail_id:
    </td>
    <td style="background-color:black;color:white;">
    topaleninad01@gmail.com
    </td>
    </tr>
    </table>
</body>
</html>