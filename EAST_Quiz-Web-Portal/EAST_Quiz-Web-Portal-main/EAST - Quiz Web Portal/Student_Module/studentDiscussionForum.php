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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        *{
                margin: 0;
                padding: 0;
        }

        .discussClassList{
            background-color: #EEEEEE;
            padding: 1%;
            margin-left: 1%;
            width: 24%;
            float: left;
        }
        .discuss{
            background-color: #EEEEEE;
            padding: 3%;
            width: 55%;
            margin-right: 5%;
            float: right;
        }

        .discuss div{
            width: 100%; 
            max-height:20em; 
            overflow-y:auto;
        }

        .classButtons{
            display: block;
            margin: 2%;
            padding: 2%;
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
    <div class ="discussClassList">
        <h3> Class List</h3>
        <?php
            $queryClassList = "select DISTINCT class_id from class_info where std_id = '".$_SESSION['std_id']."'";
            $classList = $conn->query($queryClassList);
            while($eachClassID = $classList->fetch_assoc())
            {
                ?>
                <button class='classButtons' id = '<?="buttonClass".$eachClassID['class_id']?>' onclick=<?="showFunc(".$eachClassID['class_id'].");"?>><?="ClassID-". $eachClassID['class_id'];?> </button>
                <?php
            }
        ?>
    </div>
    <div class ="discuss" id ="discuss">
            <h2><center>Your Chats</center></h2>
        <?php
            $queryClssList = "select DISTINCT class_id from class_info where std_id = '".$_SESSION['std_id']."'";
            $classes = $conn->query($queryClssList);
            while($class = $classes->fetch_assoc())
            {
                $id = 1;
                $queryMsgList = "select std_id,fac_id, msg, timeOfSend from discuss where  class_id = '".$class['class_id']."'";
                $messages = $conn->query($queryMsgList);
                echo("<div id = 'class".$class['class_id']."'>");
                $noOfRows = $messages->num_rows;
                if($noOfRows > 0){
                    while($eachMessage = $messages->fetch_assoc())
                    {
                        if($eachMessage['std_id']!=null)
                        {
                        $getName = "select name_std from student_info where std_id = '".$eachMessage['std_id']."'";
                        $name = $conn->query($getName)->fetch_assoc();
                        echo( "At   ". $eachMessage['timeOfSend']." --->". $name['name_std'].": ".$eachMessage['msg']."<br>");
                        }
                        else if($eachMessage['fac_id']!=null)
                        {
                            $getName = "select fac_name from faculty where fac_id = '".$eachMessage['fac_id']."'";
                        $name = $conn->query($getName)->fetch_assoc();
                        echo( "At   ". $eachMessage['timeOfSend']." --->". $name['fac_name'].": ".$eachMessage['msg']."<br>");
                        }
                    }    

                }
                ?>
                <form id="newMsg" action="refresh.php" method = "POST">
                    <input type = "text" name = 'typedMsg' id = 'typedMsg' placeholder ="Enter msg here">
                    <input type = "hidden" name = "cls" id ="cls" value = <?= $class['class_id'];?>>
                    <input type ="submit" onclick =".discuss" id="send" value ="Send">
                </form>
                <?php
                    if(isset($_POST['typedMsg'])){
                        $msg = $_POST['typedMsg'];
                        echo $msg;
                        echo $_SESSION['std_id'];
                        echo $_POST['cls'];
                       $std_id=$_SESSION['std_id'];
                       $cls=$_POST['cls'];
                        $saveMsgToDB = "insert into discuss (std_id,class_id,msg,timeOfSend) values ( '$std_id','$cls' , '$msg', CURRENT_TIMESTAMP() )";
                        $result = $conn->query($saveMsgToDB);
                        if($result === TRUE) {
                        } 
                        else {
                            echo "Error: ". $conn->error;
                        }
                    break;
                    }
                echo("</div>");
            }
            ?>
    </div>
    </center>
  </body>

  <script>
    var objDiv = document.getElementById("discuss");
    objDiv.scrollTop = objDiv.scrollHeight;
        function showFunc(a){
            $("#class"+a).toggle();
        }
        $( document ).ready(function() {
            $("#send").click(function(){
                $("#discuss").load(" #discuss > *");
            });
        });
  </script>
</html>