<!DOCTYPE html>
<html>
<head><title>Home Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
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
  z-index: 99px;
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
</style>
</head>
<body style="z-index=-3px">


<button class="open-button" onclick="openForm()">Faculty Login</button>

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

</body>
</html>


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
	$data=mysqli_query($conn,$query);
	$result=mysqli_fetch_assoc($data);
	$_SESSION['f_id']=$result['fac_id'];
	$tot=mysqli_num_rows($data);
	$result=mysqli_fetch_assoc($data);
    //echo $tot;
	if($tot==1)
	{
		//echo "Login Ok"; 
		header('location:home.php');
	}
	else
	{
		echo "<h4 align='center'><font color='red'>Login Failed, Please try again</font></h4>";
	}
}

?>