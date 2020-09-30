<?php
$host = "localhost";
$user = "X32912826";
$password = "X32912826";
$dbname = "X32912826";

$con = mysqli_connect($host, $user, $password, $dbname);
 
    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
?>