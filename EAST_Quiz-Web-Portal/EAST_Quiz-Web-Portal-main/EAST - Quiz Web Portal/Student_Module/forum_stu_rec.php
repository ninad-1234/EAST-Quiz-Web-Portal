<?php
session_start();
include('connection.php');
?>

<html>
    <head>
        <title>
            Student Chat
</title>
</head>
<style>

.navbar {
        overflow: hidden;
        background-color: black;
        z-index: 10;
        width: 100%;
        }


        
        .navbar a {
        float: left;
        font-size: 16px;
        color: rgb(248, 244, 244);
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        width: 11%;
        }

        .dropdown {
        float: left;
        overflow: hidden;
        }

        .dropdown .dropbtn {
        font-size: 16px;  
        border: none;
        width: 250px;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
        }

        .navbar a:hover, .dropdown:hover .dropbtn {
        background-color: yellow;
        color: black;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 20vw;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        width: 16%;
        }

        .dropdown-content a {
        float: none;
        color: white;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
        background-color: black;
        width: 100%;
        }

        .dropdown-content a:hover {
        background-color: yellow;
        width: 100%;
        }

        .dropdown:hover .dropdown-content {
        display: block;
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
  width:300px;
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
tr:hover:nth-child(even) {background-color: #d9d9d9;}
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
<body style='background-color:#eeeeee;'>
<div class = "navbar">
                    <a href = "">About us</a>

                    <a href = "studentHomePage.php">Home page</a>

                    <a href="studentTestHistoryPage.php">Test results</a>

                    <div class="dropdown">
                        <button class="dropbtn">Profile
                        </button>
                        <div class="dropdown-content">
                          <a href="view_profile.php">View Profile</a>
                          <a href="edit_profile.php">Edit Profile</a>
                        </div>
                    </div> 
                    <a href = 'forum_stu_rec.php?s_id=$_SESSION[sid]'>Chat</a>
                    <a href = "studentDiscussionForum.php">Discussion forum</a>
                    

                    <a href = "">Contact us</a>
    </div>

<?php

$s_id=$_SESSION['std_id'];
echo $s_id;
?>
<form method='POST'>
    <table align='center' cellpadding=14px>
        <tr>
            <th style="background-color:#ffbb33"><?php echo $s_id;?></td></tr>
            <td><input type='text' name='reciever' placeholder='reciever'></td></tr>
            <td><input type='text' name='message' placeholder='message'></td></tr>
            <td><input type='submit' name='sub' value='Send Message' id='lin'></td></tr>
        </tr>
</table>
</form>    

</body>
</html>

<?php


if(isset($_POST['sub']))
{
   
    $reciever=$_POST['reciever'];
    $message=$_POST['message'];
    $query1="select * from student where s_id='$reciever'";
    $data1=mysqli_query($conn,$query1);
    $query2="select * from faculty where fac_id='$reciever'";
    $data2=mysqli_query($conn,$query2);
    $tot1=mysqli_num_rows($data1);
    $tot2=mysqli_num_rows($data2);
    
    if($tot1==1 || $tot2==1)
    {
        $query="insert into discussion_forum values (CURRENT_TIMESTAMP,'$s_id','$reciever','$message')";
        $data=mysqli_query($conn,$query);
        if($data)
        {
            echo "<script>alert('Message sent');</script>";
        }
        else
        {
            echo "<script>alert('Error');</script>";
        }
    }
    else
    {
        echo "<script>alert('Invalid Recipient');</script>";
    }

}
echo "<center><br><br><a href='forum_stu_send.php?s_id=$_SESSION[std_id]';?><input style='width:180px;' type='button' value='View Message' id='lin'></a>";
/*echo "<br><br><a href='Question_paper1.php?s_id=$_SESSION[s_id]';?>Back to Home</a>";*/
echo "<center><a href='send_stu.php?s_id=$_SESSION[std_id]';?><input style='width:180px;' type='button' value='Outgoing Message' id='lin'></a>";

?>
