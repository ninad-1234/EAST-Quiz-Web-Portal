<?php
    session_start();
    include('connection.php');
    if(!isset($_SESSION["logged_in"])){
        header('Location: studentSignIn.php');
    }
    $_stdname=$_SESSION['name'];
?>
<style>
        #testcode{
            width: 15%;
            border: 2px solid green;
        }
        
        .navbar {
        overflow: hidden;
        background-color: black;
        z-index: 10;
        width: 100%;
        }

        *{
        margin: 0;
        padding: 0;
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
        .card {
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
          width: 500px;
          height: 300px;
          font-family: arial;
        }

        .exe {
          border: none;
          outline: 0;
          display: inline-block;
          color: white;
          background-color: #000;
          cursor: pointer;
          font-size: 12px;
        }

        .exe:hover:hover {
          opacity: 0.7;
        }
</style>
<body style="background-color: #F5F5F5;;">
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
    <br><br><br><br>
    <h2>
 <?php 
            $sql = "select * from student_info where name_std = '$_SESSION[name]'";
            $result=$conn->query($sql);
            
            while($row = $result->fetch_assoc())
            {
                echo '<center><div class = "card" style="background-color: #FFCC00"><center><b style="font-size: 22px"><br>Your Profile </b></center><br>
                        <center><table>
                        <tr>
                        <td>Student id: '.$row['std_id'].'</td><tr> 
                        <td>Name: '.$row['name_std'].'</td><tr>
                        <td>Date of Birth: '.$row['dob'].'</td><tr>
                        <td>Email id: '.$row['email'].'</td><tr>
                        <td>Institution Name: '.$row['institution_name'].'</td><tr>
                        <td>Year of Study: '.$row['year_of_study'].'</td><tr>
                        <td>Account creation Date and Time: '.$row['creation_date'].'</td></tr></table></center><br>
                        <center><button class="exe" style="width: 70px; height: 40px;" onclick = "window.history.back()">Go Back</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="edit_profile.php"><button class="exe" style="width: 70px; height: 40px;">Edit</button></a><br></center></div></center>';
            }

?>
</body>


