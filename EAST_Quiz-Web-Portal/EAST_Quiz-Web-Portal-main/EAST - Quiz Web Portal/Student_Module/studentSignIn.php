<?php
    session_start();
    $uid;
    $password;
    $captcha;
    include('connection.php');
    $secretKey = "6LcSs7YZAAAAABq20UiCoTuxzilIJNhBbRG60ZYn";
    if( isset($_POST["uid"])){
        $uid = $_POST["uid"];
    }
    if(isset($_POST["password"])){
        $password = $_POST["password"];
    }
    if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
          $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
           $response = file_get_contents($url);
           $responseKeys = json_decode($response,true);
    
    
    }
    
//     if( !isset($captcha)){
//         echo '<h2>Please check the the captcha form.</h2>';
//         exit;
//     }
    
   
    $ip = $_SERVER['REMOTE_ADDR'];
    // post request to server
    // should return JSON with success as true    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        if(isset($responseKeys["success"])){
            if($responseKeys["success"]) {
                    if(strlen($uid) > 0 && strlen($password) > 0){
                        try{
                            $checkIfPresentInDB = "SELECT std_id, password_std from student_info where email = '$uid' and password_std = '$password'";
                            $result = $conn -> query($checkIfPresentInDB);
                            if($result->num_rows > 0){
                                $result = $result-> fetch_assoc();
                                if (isset($result)){
                                    if($result["std_id"]){
                                        $_SESSION["std_id"] = $result["std_id"];
                                        $_SESSION["logged_in"] = true;
                                        header("Location: studentHomePage.php");
                                    }
                                    else{
                                            header('Location: studentSignIn.php');
                                            echo("<center><p>Record not found</p></center>");
                                    }
                                }
                                else{
                                        header('Location: studentSignIn.php');
                                        echo("<center><p>Record not found</p></center>");
                                }
                            }
                        }
                        catch(Exception $e){
                            echo($e);
                            session_destroy();
                            header('Location: studentSignIn.php');
                            echo("<center><p>Please enter correct information</p></center>");
                        }
                    }
                    else{
                        echo("<p>Please fill all the text boxes</p>");
                    }
            }
        }
    }
?>

<!DOCTYPE html>
 <html>
    <script src='https://www.google.com/recaptcha/api.js' async defer ></script>
    <script>
    
    </script>
    <head>
        <title>Sign In- Student</title>

        <style>
            body{
                background-color: #F5F5F5;
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

            #signInDivision{
                background-color: #FFCC00;
                border: none;
                display: block;
                padding: 3%;
                margin-left: 30%;
                margin-right: 30%;
                width: 40%;
            }

            .g-recaptcha{
                margin-top: 2%;
            }
            
            #submit{
                background-color: black;
                color: white;
                width: 50%;
                padding: 2%;
                display: block;
                margin: 2%;
            }
            
            button:hover, #submit:hover{
                background-color: green;
                color: black;
            }

            
        </style>
    </head>

    <body>
        <center><h1>EAST - Easy And Secure Test</h1></center>
        <div id = "signInDivision">
            <form id="signInForm" name="signInForm" method="POST" action = "">
                <h2>Sign In</h2>
                <input type="text" id = "uid" name = "uid" placeholder = "Username/E-mail">
                
                <input type ="password" id = "password" name="password" placeholder="Password">
                <div class="g-recaptcha" data-sitekey="6LcSs7YZAAAAAObcGwo7jICW37-srud1Qczmgi6f"></div>
                    
                <center><button type = "submit" name = "submit" id = "submit">Submit</button></br></center>
            </form>
            <a href="studentSignUp.php" style="text-align: center; display: block;">New registration</a>
        </div>
    </body>
 </html>
