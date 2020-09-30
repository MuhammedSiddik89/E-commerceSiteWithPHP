<?php
require_once('dbconnect.php');
session_start();
//signup
$name = $_POST["sName"];
$DOB = $_POST["sDOB"];
$gender = $_POST["gender"];
$addr = $_POST["saddr"];
$sub = $_POST["sSuburb"];
$postc = $_POST["sPost"];
$phone = $_POST["cPhone"];
$username = $_POST["cusername"];
$email = $_POST["sEmail"];
$pass = $_POST["spass"];
$type = $_POST["type"];

$query ="SELECT * FROM User WHERE Email = '$email' || Username ='$username' ";
$result = mysqli_query($con, $query);
$numrows=mysqli_num_rows($result);

if($numrows == 0)
{
//Signup inserting to db
$sql = "INSERT INTO User (Name, DOB, Gender ,Address,Suburb, PostalCode, Phone, Username, Email, password, type)
VALUES ('$name', '$DOB', '$gender', '$addr', '$sub', '$postc','$phone','$username', '$email','$pass','$type')";
$result = mysqli_query($con, $sql);


if($result){
	echo "Account successfully created";
}else{
	echo "Signup Failed";
}


}else{
	
	echo " The username/Email is taken, please try again with unique email/username";
}

?>
