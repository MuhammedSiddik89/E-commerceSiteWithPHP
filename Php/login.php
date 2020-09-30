<?php
require_once('dbconnect.php');
session_start();

$loginEmail= $_POST["loginEmail"];
$loginPass =$_POST["loginpass"];

$query = "SELECT * FROM User WHERE (Email = '$loginEmail' || Username = '$loginEmail') AND password = '$loginPass'";
$result = mysqli_query($con, $query);
$numrows=mysqli_num_rows($result);

if($numrows > 0){
	
	while($row=mysqli_fetch_assoc($result))
	{
		$dbEmail = $row['Email'];
		$type =$row['type'];
		$user = $row['Username'];
		$dbpass = $row['password'];	
		$loginID = $row['ID'];
		$Name = $row['Name'];
		
	}
	
	if(($loginEmail == $dbEmail || $loginEmail == $user )&& $loginPass == $dbpass)
	{
		$_SESSION['current_user'] = $loginEmail;
		$_SESSION['userID'] = $loginID;
		$_SESSION['userType'] = $type;
		$_SESSION['user_Name']= $Name;
		
		echo "Login Successfully";
		echo '<meta http-equiv="refresh" content="0">';
		//header( 'Location: http://ceto.murdoch.edu.au/~32912826/Assignment2/index.html' ) ;
		
	}	

	
}else{	
	echo "Invalid Login Attempt!";
}
	
?>
