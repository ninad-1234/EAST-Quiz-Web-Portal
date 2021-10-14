<?php
include("connection.php");
session_start();
//echo "<br><br>Faculty id: - ",$_SESSION['f_id'],"<br>";
$f_id=$_SESSION['f_id'];
//echo "<br>";
?>

<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <meta content="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
  color: black;
}

li a.active {
  color: black;
  background-color: #ffcc00;
}
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

        #testcode{
            width: 15%;
            border: 2px solid green;
        }
        
        .navbar {
        overflow: hidden;
        background-color: rgba(31, 30, 30, 0.685);
        }

        .navbar a {
        float: left;
        font-size: 16px;
        color: rgb(248, 244, 244);
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        }

        .dropdown {
        float: left;
        overflow: hidden;
        }

        .dropdown .dropbtn {
        font-size: 16px;  
        border: none;

        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
        }

        .navbar a:hover, .dropdown:hover .dropbtn {
        background-color: grey;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 20vw;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }

        .dropdown-content a {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
        }

        .dropdown-content a:hover {
        background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
        display: block;
        }
        #foot
{

    margin-top: 10px;
    height: 150px;
    
	background-color: black;
	color: white;
}
#contact
{
	padding-left: 45px;
	font-size: 30px;
}
#fadd
{
	padding-left: 250px;
}

    </style>
  </head>
  

  <body style='background-color:#eeeeee;'>

<div style="font-family: Arial; font-size:17.5px;">
    <ul>
        <li style="width:100px"><a  href="home.php">Home</a></li>
        <li style="width:160px"><a href="resume_test.php">Resume Test</a></li>
        <li style="width:240px"><?php echo "<a href='faculty_response.php?f_id=$_SESSION[f_id]'>";?>Student Analysis</a></li>
        <li style="width:240px"><a class="active" href="#">Discussion Forum</a></li>
        <li style="width:100px"><?php echo "<a href='forum_fac_rec.php?f_id=$_SESSION[f_id]'>";?>Chats</a></li>
        <li style="width:210px"><a href="view_profile.php">View Profile</a></span></li>
        <li style="width:101.7px"><a href="logf.php">Logout</a></span></li>
    </ul>
    </div>


    <center>
    <div class ="discussClassList">
        <h3> Class List</h3>
        <?php
            $queryClassList = "select DISTINCT class_id from class_info where fac_id = '$f_id'";
            $classList = $conn->query($queryClassList);
            while($eachClassID = $classList->fetch_assoc())
            {
                ?>
                <button class='classButtons' id = '<?=$eachClassID['class_id']?>' onclick=<?="showFunc(".$eachClassID['class_id'].");"?>><?="ClassID-". $eachClassID['class_id'];?> </button>
                <?php
            }
        ?>
    </div>
    <div class ="discuss" id ="discuss">
            <h2><center>Your Chats</center></h2>
        <?php
            $queryClssList = "select DISTINCT class_id from class_info where fac_id = '$f_id'";
            $classes = $conn->query($queryClssList);
            while($class = $classes->fetch_assoc())
            {
                $id = 1;
                $queryMsgList = "select std_id,fac_id, msg, timeOfSend from discuss where class_id = '".$class['class_id']."'";
                $messages = $conn->query($queryMsgList);
                echo("<div id = 'class".$class['class_id']."'>");
                $noOfRows = $messages->num_rows;
                if($noOfRows > 0){
                    while($eachMessage = $messages->fetch_assoc())
                    {
                        if($eachMessage['std_id']!=null )
                        {
                         //   echo "null";                        
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
    <table id="foot" width="100%">
    <tr>
    <td id="contact">
    Contact us &#128512 :
    </td>
    </tr>
    <tr>
    <td id="fadd" width="30%">
    &#127968 Address:
    </td>
    <td>
    Indira appartment, Gandhi road, Mumbai, 416502
    </td>
    </tr>
    <tr>
    <td id="fadd" width="30%">
    &#x260E Contact_no:
    </td>
    <td>
    5236014589
    </td>
    </tr>
    <tr>
    <td id="fadd" width="30%">
    &#x2709 Mail_id:
    </td>
    <td>
    topaleninad01@gmail.com
    </td>
    </tr>
    </table>
  </body>

  <script>
    var objDiv = document.getElementById("discuss");
    objDiv.scrollTop = objDiv.scrollHeight;
        function showFunc(a){
            // console.log("AAAAAA" + a);
            // alert("#"+a);
            $("#class"+a).toggle();
        }
    $( document ).ready(function() {
        

        $("#send").click(function(){
            $("#discuss").load(" #discuss > *");
        });
    });
  </script>
</html>