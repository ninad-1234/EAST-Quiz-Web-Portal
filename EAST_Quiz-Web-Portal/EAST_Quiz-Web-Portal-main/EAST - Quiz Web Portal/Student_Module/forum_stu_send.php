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
<br>

<table align='center' cellpadding=14px >
    <tr>
        <th style="background-color:#ffbb33;">From</td>
        <th style="background-color:#ffbb33;">To</td>
        <th style="background-color:#ffbb33; width:200px;">Date Time</td>
        <th style="background-color:#ffbb33;">View Message</td>
    </tr>

<?php

$s_id=$_GET['s_id'];
$query="select * from discussion_forum where to_rec='$s_id'";
$data=mysqli_query($conn,$query);

while($result=mysqli_fetch_assoc($data))
{
    ?>
    <tr>
        <td><?php echo $result['from_send'];?></td>
        <td><?php echo $s_id;?></td>
        <td><?php echo $result['Date'];?></td>
        <td><?php echo "<a href='view_stu.php?s_id=$s_id&date=$result[Date]&from=$result[from_send]&msg=$result[message]';?><input id='lin' type='button' value='View Msg'></a>"?></td>
</tr>
<?php
}
?>
</table>
<?php echo "<center><br><br><a href='forum_stu_rec.php?s_id=$_SESSION[std_id]';?><input style='width:180px;' type='button' value='Back to Chats' id='lin'></a></center>";?>
</body>
</html>
