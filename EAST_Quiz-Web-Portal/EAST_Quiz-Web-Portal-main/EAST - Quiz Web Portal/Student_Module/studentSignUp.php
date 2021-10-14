<html>
<head>
    <title>SignUp</title>
    <style>
        form 
        {
            margin-left: 35%;
            margin-right:25%;
            width: 35%;
            border-radius: 5px;
            background-color: #FFCC00;
            padding: 40px;
        }
        .exception:hover
        {
            color:white;
            background-color: black;
        }

    </style>
    <script type="text/javascript">

            function checkForm(form)
            {
                re = /^\w+$/;
                if(form.password_std.value != "" && form.password_std.value == form.recon_password_std.value) {
                    if(form.password_std.value.length < 8) {
                    alert("Error: Password must contain at least eight characters!");
                    form.password_std.focus();
                    return false;
                    }
                    re = /[0-9]/;
                    if(!re.test(form.password_std.value)) {
                    alert("Error: password must contain at least one number (0-9)!");
                    form.password_std.focus();
                    return false;
                    }
                    re = /[a-z]/;
                    if(!re.test(form.password_std.value)) {
                    alert("Error: password must contain at least one lowercase letter (a-z)!");
                    form.password_std.focus();
                    return false;
                    }
                    re = /[A-Z]/;
                    if(!re.test(form.password_std.value)) {
                    alert("Error: password must contain at least one uppercase letter (A-Z)!");
                    form.password_std.focus();
                    return false;
                    }
                } 
                else {
                    alert("Error: Passwords do not match!");
                    form.password_std.focus();
                    return false;
                }

                alert("You entered a valid password: " + form.password_std.value);
                return true;
            }    
</script>
</head>
<body style="background-color: #F5F5F5;">
    <br><br><br> 
        <form method="post" action="studentSignUp.php" onSubmit = "return checkForm(this)">
            <input type="hidden" name="submitted" value="true"/>
            <h1>SignUp Form</h1><br>
            <label for="name" >Name</label><br><br>
            <input type="text" name="name_std" placeholder="Enter your name" size="70" style="height: 30px;" required/><br><br>            
            <label for="std_id">Student Id</label><br><br>
            <input type="text" name="std_id" placeholder="Enter your id" size="70" style="height: 30px;" required/><br><br>   
            <label for="E-mail">E-Mail</label><br><br>
            <input type="email"  name="email" placeholder="Enter your email id" size="70" style="height: 30px;" required/><br><br>  
            <label for="institution_name">Institution Name</label><br><br>
            <input type="text" name="institution_name" placeholder="Enter your Institution Name" size="70" style="height: 30px;" required/><br><br>                        
            <label for="inst_id">Institution Id</label><br><br>
            <input type="text" name="inst_id" placeholder="Enter your Institution id" size="70" style="height: 30px;" required/><br><br>
            <label for="dob">Date of Birth</label><br><br>
            <input type="date" name="dob" style="height: 30px; width: 485px;" required/><br><br>
            <label for="year_of_study">Year of Joining the Institute</label><br><br>
            <input type="text" name="year_of_study" placeholder="Enter your year of joining" size="70" style="height: 30px;" required/><br><br>                          
            <label for="password">Password</label><br><br>          
            <input type="password" name="password_std" id="password_std" placeholder="Enter your password" size="70" style="height: 30px;" required/><br><br><br>
            <label for="password">Reconfirm Password</label><br><br>
            <input type="password" name="recon_password_std" placeholder="Reconfirm Password" size="70" style="height: 30px;" required/><br><br><br>
            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="submit" class="exception" value="Submit" style=" width: 100px; height: 35px;"/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" name="cancel" class="exception" value="Cancel" style=" width: 100px; height: 35px;" onClick="history.back()"></a><br><br>             
        </form>
</body>
</html>

<?php
if(isset($_POST['submitted']))
{
    include('connection.php');
    $std_id=$_POST['std_id'];
    $inst_id=$_POST['inst_id'];
    $name_std=$_POST['name_std'];
    $dob=$_POST['dob'];
    $email=$_POST['email'];
    $password_std=$_POST['password_std'];
    $institution_name=$_POST['institution_name'];
    $year_of_study=$_POST['year_of_study'];
    $sqlinsert="INSERT INTO student_info(std_id,inst_id,name_std,creation_date,dob,email,password_std,institution_name,year_of_study) VALUES('$std_id','$inst_id','$name_std',CURRENT_TIMESTAMP(),'$dob','$email','$password_std','$institution_name','$year_of_study')";
    if(!mysqli_query($conn,$sqlinsert))
    {
        die('error inserting new records');
    }
    else
    {
        echo "Done!!!";
    }
}