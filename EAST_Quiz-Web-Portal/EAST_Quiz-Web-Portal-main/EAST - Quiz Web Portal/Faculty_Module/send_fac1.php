<html>
    <head>
        <title>
            Discussion Forum
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
  color: black;
}

li a.active {
  color: black;
  background-color: #ffcc00;
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
  width:600px;
}

th, td {
  text-align: left;
  padding: 18px;
  font-size:18;
  text-align:center;
}
#lin
{
    text-decoration:none;
    background-color:rgba(0,0,0,0.7);
    border-radius:3px;
    color:white;
    width:160px;
}
#lin1
{
    text-decoration:none;
    background-color:rgba(0,0,0,0.7);
    border-radius:3px;
    color:white;
    width:10px;
}
#lin1:hover
{
    text-decoration:none;
    background-color:rgba(0,0,0,0.2);
    color:black;
    border:2px solid black;
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
    border-radius:10px;
}

tr:nth-child(odd) {background-color: #ffffff;}
tr:hover:nth-child(odd) {background-color: #d9d9d9;}
input[type=text]
{
    width: 100%;

 
  
  background: #ffffff;
}
input[type=text]:focus
{
    background-color: #f1f1f1;
  outline: none;
}
</style>
<?php
session_start();
?>


<body style='background-color:#eeeeee;'>
    <div style="font-family: Arial; font-size:17.5px;">
    <ul>
        <li style="width:100px"><a href="home.php">Home</a></li>
        <li style="width:160px"><a href="resume_test.php">Resume Test</a></li>
        <li style="width:240px"><?php echo "<a href='faculty_response.php?f_id=$_SESSION[f_id]'>";?>Student Analysis</a></li>
        <li style="width:240px"><a href="facultyDiscussionForum1.php">Discussion Forum</a></li>
        <li style="width:100px"><a class="active" href="forum_fac_rec.php">Chats</a></li>
        <li style="width:210px"><a href="view_profile.php">View Profile</a></span></li>
        <li style="width:101.7px"><a href="logf.php">Logout</a></span></li>
    </ul>
    </div>
<br><br><br><br>

<?php

include('connection.php');
$date=$_GET['date'];
$f_id=$_GET['f_id'];
$to=$_GET['to'];
$msg=$_GET['msg'];

?>
<table align='center'>
<tr>
<td style="background-color:#ffbb33;"><b>Date</b></td><td><?php echo $date;?></td></tr>
<tr>
<td style="background-color:#ffbb33;"><b>Sender</b></td>
<td><?php echo $f_id;?></td></tr>
<tr><td style="background-color:#ffbb33;"><b>Reciever</b></td>
<td><?php
echo $to;?></td></tr>
<tr><td style="background-color:#ffbb33;"><b>Message</b></td><td><?php
echo $msg;?></td></tr>
</table>

<?php echo "<center><br><br><a href='send_fac.php?f_id=$_SESSION[f_id]';?><input id='lin' type='button' value='Back'></a></center>";?>

<table id="foot" width="100%" style=" width:100%; background-color:black; color:white; margin-top:50px;">
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