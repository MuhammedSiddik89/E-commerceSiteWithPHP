<?php
require_once('dbconnect.php');
session_start();
//signup
$name = $_POST["staffName"];
$DOB = $_POST["staffDOB"];
$gender = $_POST["staffgender"];
$addr = $_POST["staffaddr"];
$sub = $_POST["staffSuburb"];
$postc = $_POST["staffPost"];
$phone = $_POST["staffphone"];
$username = $_POST["staffusername"];
$email = $_POST["staffEmail"];
$pass = $_POST["staffpass"];
$type = $_POST["stafftype"];

//Signup inserting to db
$query ="SELECT * FROM User WHERE Email = '$email' || Username ='$username' ";
$result = mysqli_query($con, $query);
$numrows=mysqli_num_rows($result);

if($numrows ==0)
{
$sql = "INSERT INTO User(Name, DOB, Gender ,Address,Suburb, PostalCode, Phone, Username, Email, password, type)
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
