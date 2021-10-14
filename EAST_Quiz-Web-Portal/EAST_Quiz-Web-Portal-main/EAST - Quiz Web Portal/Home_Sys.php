<!DOCTYPE html>
<html>
<head><title>Home Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
}

li a.active {
  color: white;
  background-color: #ffcc00;
  font-weight:bold;
}
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: absolute;
  bottom: 490px;
  right: 428px;
  width: 280px;
}
/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: absolute;
  bottom: 30;
  right: 15px;
  border: 3px solid #f1f1f1;
  top:93px;
  right: 410px;
  z-index: 199px;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #ff9933;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: black;
  opacity:0.6;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
#img1
{
  margin-top:35px;
  margin-left:35px;
  margin-right:10px;
  width:1060px;
  height:430px;
}

</style></head>


<body style='background-color:#eeeeee;'>
<div style="font-family: Arial; font-size:17.5px;">
    <ul>
        <li style="width:189px"><a class='active' href="">Home</a></li>
        <li style="width:189px"><a href="#">About Us</a></li>
        <li style="width:189px"><a href='#'>Contacts</a></li>
        <li style="width:189px"><a href="#" onclick="openForm()">Faculty</a></li>
        <li style="width:190px"><a href="final_student\studentSignIn.php">Student</a></span></li>
        <li style="width:190px"><a href="#">Register</a></span></li>
    </ul>
    </div>

<img src='quiz.jpg' height=200px width=400px id='img1'>
<!-- <button class="open-button" onclick="openForm()">Faculty Login</button> -->
<br>

<div class="form-popup" id="myForm">
  <form class="form-container" method='POST'>
    <h1 align='center'>Login</h1>

    <label for="fac_id"><b>Faculty Id</b></label>
    <input type="text" placeholder="Enter Faculty Id" name="f_id" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" required>

    <button type="submit" class="btn" name="submit">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>


<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

</script>


<?php

include("connection.php");
session_start();
?>
<?php

if(isset($_POST['submit']))
{
	$f_id=$_POST['f_id'];
	$pwd=$_POST['pwd'];
	
  $query="select * from faculty where fac_id='$f_id' and password='$pwd'";
  $query1="select * from faculty where fac_id='$f_id'";
  $data=mysqli_query($conn,$query);
  $data1=mysqli_query($conn,$query1);
	$result=mysqli_fetch_assoc($data);
	$_SESSION['f_id']=$result['fac_id'];
  $tot=mysqli_num_rows($data);
  $tot1=mysqli_num_rows($data1);
	$result=mysqli_fetch_assoc($data);
    //echo $tot;
	if($tot1==1)
	{
    if($tot==1)
    {
      header('location:final_faculty\home.php');
    }
    else
    {
      echo "<br><br><h4 align='center'><font color='red'>Login Failed, Incorrect Password</font></h4>";
    }
	}
	else if($tot==0)
	{
    echo "<br><br><h4 align='center'><font color='red'>Login Failed, Invalid User</font></h4>";
	}
}

?>
<br>
<hr width=80%>
<br>
<h1 align='center'>Functionalities provided by us</h1><br><br>
<table width='99%' >
    <tr>
        <td width='33%' align='center'>
      <img src="faculty.gif" style="width:310px; height:200px"><br><br><div style='border:3px solid grey; width:310px; height:40px; padding:5px;'>Faculty sets the test</div>
    </td>
    <td width='33%' align='center'>
      <img src="sms.gif" style="width:340px; height:200px"><br><br><div style='border:3px solid grey; width:340px; height:40px; padding:5px;'>Faculty sends test id to students</div>
    </td>
    <td width='33%' align='center'>
     <img src="student.png" style="width:320px; height:200px"><br><br><div style='border:3px solid grey; width:320px; height:40px; padding:5px;'>Students attempts the test</div>
    </td>
    </tr>
    <tr><td><br><td><br></td></tr>
    <tr><td><br><td><br></td></tr>
    <tr><td><br><td><br></td></tr>
    <tr><td><br><td><br></td></tr>

    <tr>
        <td width='33%' align='center'>
     <img src="performance.jpg" style="width:310px; height:220px"><br><br><div style='border:3px solid grey; width:310px; height:40px; padding:5px;'>Students view thier performances</div>
  </td>
  <td width='33%' align='center'>
     <img src="fac_perf.gif" style="width:340px; height:220px"><br><br><div style='border:3px solid grey; width:340px; height:40px; padding:5px;'>Faculty view student's performances</div>
  </td>
  <td  width='33%' align='center'><img src="sms_1.jpg" style="width:320px; height:220px"><br><br><div style='border:3px solid grey; width:320px; height:40px; padding:5px;'>Discussion Forum</div></td>
  </tr>
  </table>
  <br><br>
  <table style="background-color: black;width:1142.99px; height:40px; margin-bottom:-16px; margin-left:-14px; ">
<tr>
    <td style="color:white; text-align: center;">
        Vellore Institute of Technology Chennai
    </td>
</tr></table>
</body>
</html>