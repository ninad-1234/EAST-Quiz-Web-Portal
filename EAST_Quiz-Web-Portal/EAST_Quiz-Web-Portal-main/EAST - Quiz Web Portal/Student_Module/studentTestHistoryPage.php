<?php
    session_start();
    include('connection.php');

    if(!isset($_SESSION["logged_in"])){
        header('Location: studentSignIn.php');
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <meta content="">
    <style>
        *{
                margin: 0;
                padding: 0;
        }
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

        .allTestHistoryContainer{
            margin-left: 5%
        }
        
        .allTestHistoryContainer > table{
            border: none;
            font-size: 18px;
            width: 90%;
            margin-top: 5%;
        }

        td, th{
            border: 0px ;
            margin: 150px;
            font-size: 18px;
            padding: 2%;
            background-color: #FFCC00;
        }

        .exception {
            padding: 1%;
            margin-left: 70%;
            background-color: black;
            color: white;
            font-size: 15px;
        }

        .exception:hover {
            box-shadow: none;
            color: white;
        }
      
        body
        {
            background-color: #F5F5F5;
        }
    </style>
  </head>
  
  <body>
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
  
  
    <center>
        <h2>
        </h2>
        
    </center>

    <div class = 'allTestHistoryContainer'>
        <table>
        <th>Test information</th>
            <?php
            $class_id=$_SESSION['class_id'];
                $getRequiredInfo = "select distinct tr.test_id, ti.marks maxMarks, tr.class_id, ti.testname, tr.marks from test_info ti, test_response tr where
                 ti.test_id = tr.test_id and tr.std_id = '".$_SESSION['std_id']."' and ti.class_id='$class_id' ";
                $results = $conn->query($getRequiredInfo);
                while( $row = $results->fetch_assoc()){
                    echo("<tr><td>Test: ".$row['testname']."<br>Test ID: ".$row['test_id']);
                    echo("<button class='exception' onclick=\"location.href='eachTestHistory.php?id=".$row['test_id']."'\" style='width: 200px; height: 60px;'>View Details</button><br>");
                    echo("Marks scored: ".$row['marks']." /".$row['maxMarks']."<br>");
                    echo("</td></tr>");
                    $_SESSION['test_id']=$row['test_id'];
                }
            ?>
        </table>
    </div>
  </body>
</html>
