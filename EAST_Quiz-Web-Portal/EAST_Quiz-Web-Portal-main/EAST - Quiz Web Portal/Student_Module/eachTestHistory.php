<?php
    session_start();
    include('connection.php');
    // include('testHistoryClass.php');

    $test_idFromURL = $_GET['id'];
    if(!isset($_SESSION["logged_in"])){
        header('Location: studentSignIn.php');
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Test history of selected</title>
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
        width: 13%;
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

        
        table{
            border: 1px solid #A87CA0;
            font-size: 18px;
            width: 90%;
            margin-top: 5%;
        }

        td{
            border: 1px solid #F5F5F5;
            font-size: 18px;
            padding: 1.5%;
            background-color: #FFCC00;
        }

        th{
            border: 1px solid #F5F5F5;
            font-size: 18px;
            padding: 1.5%;
            background-color: #FFCC00;
        }

        .exception {
            padding: 1%;
            background-color: black;
            color: white;
            font-size: 15px;
            margin-bottom: 4%;
        }

        .exception:hover {
            box-shadow: none;
            color: black;
            background-color: #FFCC00;
        }

        .buttonContainer{
            margin-top: 4%;
        }

        .qp{
            border: 1px solid black;
            padding: 4%;
            background-color: #F2EECB;
            margin-left:5%;
            margin-right: 5%;
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

                    <a href = "studentDiscussionForum.php">Discussion forum</a>

                    <a href = "">Contact us</a>
    </div>
  
    <center>
        <div>
            <table>
                <?php
                    $queryToGetTestInfo = "select ti.testname, ti.test_id, ti.class_id, ti.fac_id, ti.marks maxMarks, tr.marks scored from test_info ti, test_response tr where ti.test_id = tr.test_id and tr.class_id = tr.class_id and tr.std_id ='".$_SESSION['std_id']."' and ti.test_id = '$test_idFromURL'";
                    $results = $conn->query($queryToGetTestInfo)->fetch_assoc();
                    $queryToGetQuestions = "select q_id, q_description, option1, option2, option3, option4 from test_q_a where test_id = '".$results['test_id']."'";
                    $questionResults = $conn->query($queryToGetQuestions);
                    echo("<th colspan = '2'>Test- ".$results['testname']."</th>");
                    echo("<tr><td>Test ID</td><td> ".$results['test_id']."</td></tr>");
                    echo("<tr><td>Class ID</td><td> ".$results['class_id']."</td></tr>");
                    echo("<tr><td>Marks scored</td><td> ".$results['scored']."</td></tr>");
                    echo("<tr><td>Max. marks of test</td><td> ".$results['maxMarks']."</td></tr>");
                ?>
            </table>
        </div>
    </center>

    <center><div class = "buttonContainer">
        <button class="exception" onclick = "location.href ='studentResponsePage.php?id=<?=$_SESSION['test_id']=$results['test_id'];?>'">My test attempts</button>
        <button class="exception" onclick = "window.history.back()">Go Back</button><br>
    </div></center>

    <div class = "qp" id = "qp">
        <h2><u>Question Paper</u></h2>
        <br>
        <?php
            $qno = 1;
            while( $row = $questionResults->fetch_assoc()){
                echo($qno.". ".$row['q_description']."<br>");
                echo("(a) ".$row['option1']."<br>");
                echo("(b) ".$row['option2']."<br>");
                echo("(c) ".$row['option3']."<br>");
                echo("(d) ".$row['option4']."<br><br>");
                $qno += 1;
            }
        ?>
    </div>
    <br><br>
    <center><button class="exception" onclick = "printDiv();">Print Question paper</button></center>
  </body>
  <script> 
        function printDiv() { 
            var divContents = document.getElementById("qp").innerHTML; 
            var a = window.open('', '', 'height=1024, width=1536'); 
            a.document.write('<html>'); 
            a.document.write('<body>'); 
            a.document.write(divContents); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 
        } 
    </script> 
</html>
