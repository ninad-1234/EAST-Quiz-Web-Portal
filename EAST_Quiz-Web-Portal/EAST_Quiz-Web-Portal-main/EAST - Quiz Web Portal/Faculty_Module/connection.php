<?php

$servername="localhost";
$username="root";
$password="";
$dbname="quiz";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
    //echo "Connection Success";
}
else
{
    //echo "Connection Failed",mysqli_connect_error;
}

?>