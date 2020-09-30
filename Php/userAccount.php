<?php
require_once('dbconnect.php');
session_start();
$customer ="customer";
$staff ="staff";

if($_SESSION['userType'] == $customer)
{
	$UserID= $_SESSION['userID'];
		$sql = "SELECT * FROM User WHERE ID='$UserID' ";
		$result = mysqli_query($con, $sql);
		$customerdata = array();
		while($row=mysqli_fetch_assoc($result)){
			$customerdata[] = $row;
		}
		
		echo json_encode($customerdata);
		
}else{
	
	$usernameoremail = $_POST["customerusername"];
	$query = "SELECT * FROM User WHERE (Email = '$usernameoremail' || Username = '$usernameoremail')";
	$result = mysqli_query($con, $query);
	
	$customerdata = array();
	while($row = mysqli_fetch_assoc($result)){
		$customerdata[] = $row;
		$customerID = $row['ID'];
	}
	$_SESSION['customerID'] = $customerID ;
	
	echo json_encode($customerdata);
	//echo '<center><a href="index.html#CustomerAccountEdit">Get Customer Account Form</a></center>';
}

?>
