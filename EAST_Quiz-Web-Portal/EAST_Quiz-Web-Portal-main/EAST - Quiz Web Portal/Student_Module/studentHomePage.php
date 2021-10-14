<?php
    session_start();
    include('connection.php');
    if(!isset($_SESSION["logged_in"])){
        header('Location: studentSignIn.php');
    }
?>

  <head>
    <title></title>
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
        
        .jointestdiv{
            margin-top: 8%;
        }

        .attemptTestdiv{
            background-color: #FFCC00;
            color: black;

            width: 17%;
        }

        .Tgl{
            width: 40%;
            padding: 1.5%;
            background-color: #000000;
            color: white;
        }

        .logout{
            width: 15%;
            padding: 1%;
            background-color: #000000;
            color: white;
        }

    </style>
  </head>
  
  <body style="background-color: #F5F5F5;">
  <center>
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
    <h2>
<?php 
            $sql = "select name_std , class_id from student_info where std_id = '$_SESSION[std_id]'";
            $result=$conn->query($sql);
            $row = $result->fetch_assoc();
        
    if($row==TRUE)
            {
                $_SESSION["name"] = $row["name_std"];
                
                $class_id=$row["class_id"];
                echo $class_id;
                $_SESSION["class_id"]=$class_id;
                echo("<span style =' padding-left: 80%;'>"."Hello ".$_SESSION["name"]." !</span>");
            }
            else{
                echo ("You are Mr. X");
            }
            ?>
            <br><br>
            <form name = "logout" method = "POST" >
                <span style =' padding-left: 80%;'><button id="logout" name = "logout" class = "logout">Logout</button></span>
            </form>
            <?php
                if(isset($_POST["logout"])){
                    session_destroy();
                    header('Location: studentSignIn.php');
                }
            ?>

        </h2>
        <?php
              $sql1 = "select * from test_info where class_id = '$class_id'";
              $query1=$conn->query($sql1);
              
              while($row=$query1->fetch_assoc())
              {
                //  echo "inside while";
                  if($row['creation_date']>date('Y-m-d H:i:s') && $row['flag']==0)
                  {
                    echo '<br><div class="attemptTestdiv">
                    <form id="attemptTest" name="attemptTest" method="post" action=""><br><br>
                    <label for="classid">'.$row['class_id'].'</label><br><br>
                    <label for="attemptcode">Attempt Test Now</label><br><br>
                    <label for="dateforTest">Date and Time of Exam:<br>'.$row['creation_date'].'</label><br><br>
                    <label for="testname"><b>'.$row['testname'].'</b></label><br><br>
                    <label for="Marks">Total Marks: '.$row['marks'].'</label><br><br>
                    <input type="button" class="Tgl" value="Attempt" id="Tgl"><br><br>
                    </div>'; 
                  }

              }
   
if(isset($_POST['testcode1']))
{
    $_SESSION['test_id']=$_POST['testcode1'];
    header("location: studentTestPage.php");
    // $sql2 = "select * from test_info where name_std = '$_SESSION[name]' and testname";
    // $query2=mysqli_query($conn,$sql2);
    // $row=mysqli_fetch_array($query2);
    // $t_name=$row['testname'];
    // if($row==TRUE)
    // {
    //     $sqlinsert="UPDATE test_info set flag=0 where testname='$t_name'"; 
    // }
    
    // if(!mysqli_query($conn,$sqlinsert))
    // {
    //     die('error inserting new records');
    // }
    // else
    // {
    //     echo "Done!!!";
    // }
}
?>

        <div class="jointestdiv">
            <form  method = "post" class = "jointest" name="jointest" id="jointest">
                To write test, enter test code: <input type = "text" id = "testcode1" name = "testcode1" placeholder = "Eg. abcdefghi" required>
                <input type="submit" id="joinbutton" name="joinbutton" value="Join">
            </form>
        </div>
        
    </center>

    </body>
    </html>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>    
        <script type="text/javascript">
            $(document).ready(function(){
                $('.jointestdiv').hide();
                $('#Tgl').click(function(){
                    $('.jointestdiv').show();
                });      
            });
        </script>



  

