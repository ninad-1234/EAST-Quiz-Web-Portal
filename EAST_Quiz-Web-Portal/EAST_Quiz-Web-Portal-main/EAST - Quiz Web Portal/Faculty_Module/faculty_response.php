<html>
<head>
<title>
Fac Response
</title>
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
  color:black;
}

li a.active {
  color: white;
  background-color: #ffcc00;
  color:black;
}
            h2{
                margin-top: 2%;
            }
            input{
                display: block;
                width: 100%;
                margin-top: 2%;
                padding: 5px;
            }

            label{
                display: inline;
            }

            table {
  border-collapse: collapse;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
  border-radius:15px;
}

th, td {
  text-align: left;
  padding: 15px;
  font-size:18;
  text-align:center;
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
tr:hover
{
    background-color:#d9d9d9;
    
}
#t1
{
    background-color:black; 
    height:34px;
    margin-bottom:-2225px;
    margin-left:-15px;
    margin-right:-15px;
    width:1130px;
    padding:2.5px;
    border:none;
}

tr:nth-child(odd) {background-color: #ffffff;}
tr:hover:nth-child(odd) {background-color: #d9d9d9;}



</style>
<?php
session_start();
?>
<body style='background-color:#eeeeee;'>
<div style="font-family: Arial; font-size:17.5px;">
    <ul>
        <li style="width:100px"><a href="home.php">Home</a></li>
        <li style="width:160px"><a href="resume_test.php">Resume Test</a></li>
        <li style="width:240px"><?php echo "<a  class='active' href='faculty_response.php?f_id=$_SESSION[f_id]'>";?>Student Analysis</a></li>
        <li style="width:240px"><a href="facultyDiscussionForum1.php">Discussion Forum</a></li>
        <li style="width:100px"><?php echo "<a href='forum_fac_rec.php?f_id=$_SESSION[f_id]'>";?>Chats</a></li>
        <li style="width:210px"><a href="view_profile.php">View Profile</a></span></li>
        <li style="width:101.7px"><a href="logf.php">Logout</a></span></li>
    </ul>
    </div>

    <br><br>

<table align='center' border=3px cellpadding=14px>
<tr style="background-color:#ffbb33">
<td>Student_id</td>
<td>Student Name</td>
<td>Tests Appeared</td>
</tr>

<?php
include('connection.php');
$query="select * from student_info";
$data=mysqli_query($conn,$query);
while($result=mysqli_fetch_assoc($data))
{
    ?><tr>
    <td><?php echo $result['std_id'];?></td>
    <td><?php echo $result['name_std'];?></td>
    <td align='center'><?php echo "<a href='fac_test.php?s_id=$result[std_id]'><input type='button' value='Check'></a>";?></td>
    </tr>
    <?php
}


?>
</table>
<?php echo "<center><a href='home.php?f_id=$_SESSION[f_id]'><input style='width:80px;' type='button' value='Back' id='lin'></a></center>";?>
<br>
<div >
<table id="foot" width="100%" style="background-color:black; color:white;">
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
</div>
</body>
</html>