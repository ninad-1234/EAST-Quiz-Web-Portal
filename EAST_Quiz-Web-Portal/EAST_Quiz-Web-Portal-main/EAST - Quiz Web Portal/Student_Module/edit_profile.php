<?php
    session_start();
    include('connection.php');
    if(!isset($_SESSION["logged_in"])){
        header('Location: studentSignIn.php');
    }
    $_stdname=$_SESSION['name'];
?>
<html>
<head>
    <title>Update</title>
    <style>
        form 
        {
            width: 50%;
            border-radius: 5px;
            background-color: #FFCC00;
            padding: 20px;
        }

        .exception:hover
        {
            background-color: black;
            color: white;
            border: none;
        }
    </style>
</head>
<body style="background-color: #F5F5F5;">
    <br><br><br>

 <?php 
            $sql = "select * from student_info where name_std = '$_SESSION[name]'";
            $result=$conn->query($sql);
            
            while($row = $result->fetch_assoc())
            {?>
                <center><form method="post" action="edit_profile.php">
                    <input type="hidden" name="stdname" value="<?php echo $_stdname; ?>"/>
                    <h1>Update Your Details</h1><br>
                    <label for="name" >Name</label><br><br>
                    <input type="text" name="name_std" placeholder="Enter your name" size="70" style="height: 30px;" value="<?php echo $row['name_std'];?>" required/><br><br>            
                    <label for="std_id">Student Id</label><br><br>
                    <input type="text" name="std_id" placeholder="Enter your id" size="70" style="height: 30px;" value="<?php echo $row['std_id'];?>" required/><br><br>   
                    <label for="E-mail">E-Mail</label><br><br>
                    <input type="email"  name="email" placeholder="Enter your email id" size="70" style="height: 30px;" value="<?php echo $row['email'];?>" required/><br><br>  
                    <label for="institution_name">Institution Name</label><br><br>
                    <input type="text" name="institution_name" placeholder="Enter your Institution Name" size="70" style="height: 30px;" value="<?php echo $row['institution_name'];?>"  required/><br><br>                        
                    <label for="inst_id">Institution Id</label><br><br>
                    <input type="text" name="inst_id" placeholder="Enter your Institution id" size="70" style="height: 30px;" value="<?php echo $row['inst_id'];?>" required/><br><br>
                    <label for="dob">Date of Birth</label><br><br>
                    <input type="date" name="dob" style="height: 30px; width: 485px;"  value="<?php echo $row['dob'];?>" required/><br><br>
                    <label for="year_of_study">Year of Joining the Institute</label><br><br>
                    <input type="text" name="year_of_study" placeholder="Enter your year of joining" size="70" style="height: 30px;" value="<?php echo $row['year_of_study'];?>" required/><br><br><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                        
                    <input type="submit" class="exception" name="submitted" value="Update Details" style=" width: 100px; height: 35px;"/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="studentHomePage.php"><input type="button" class="exception" name="cancel" value="Cancel" style=" width: 100px; height: 35px;"></a><br><br>             
                </form></center>
            <?php }?>
</body>
</html>

<?php
if(isset($_POST['submitted']))
{
    include('connection.php');
    $stdname=$_POST['stdname'];
    $std_id=$_POST['std_id'];
    $inst_id=$_POST['inst_id'];
    $name_std=$_POST['name_std'];
    $dob=$_POST['dob'];
    $email=$_POST['email'];
    $institution_name=$_POST['institution_name'];
    $year_of_study=$_POST['year_of_study'];
    $sqlupdate="UPDATE student_info set std_id='$std_id',inst_id='$inst_id',name_std='$name_std',dob='$dob',email='$email',institution_name='$institution_name',year_of_study='$year_of_study' where name_std='$stdname'";
    if(!mysqli_query($conn,$sqlupdate))
    {
        die('error updating new records');
    }
}