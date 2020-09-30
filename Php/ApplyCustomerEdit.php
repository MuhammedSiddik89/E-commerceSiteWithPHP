<?php
require_once('dbconnect.php');
session_start();

if(isset($_SESSION['current_user'])){
$name = $_POST["sName"];
$DOB = $_POST["sDOB"];
$gender = $_POST["gender"];
$addr = $_POST["saddr"];
$sub = $_POST["sSuburb"];
$postc = $_POST["sPost"];
$email = $_POST["sEmail"];
$Phone = $_POST["cPhone"];
$username = $_POST["cusername"];
if($_SESSION['userType'] == $customer)
{
	$ID = $_SESSION['userID'];
else{
	
	$ID = $_SESSION['customerID'];
}


$sql = "UPDATE User SET Name = '$name', DOB = '$DOB', Gender = '$gender', Address ='$addr', Suburb ='$sub', PostalCode ='$postc', Phone='$Phone', Username ='$username', Email ='$email' WHERE ID = '$ID' ";

$result = mysqli_query($con,$sql);
	echo "you are logedin - Account information updated";
	$sql = "SELECT * FROM User WHERE ID='$_SESSION['userID']' ";

	$result = mysqli_query($con, $sql);

	while($row=mysqli_fetch_assoc($result)){
		$dbEmail = $row['Email'];
		$user = $row['Username'];
	}
	
	if($dbEmail != $email){
		$_SESSION['current_user'] = $dbEmail;
	}
	
	if($user != $username){
		$_SESSION['current_user'] = $user;
	}
	 
		echo ' Well Come ' . $_SESSION['current_user'].'<br/>';
	
	}else{
	
		echo "you need to be login to change Account information";
	}

?>