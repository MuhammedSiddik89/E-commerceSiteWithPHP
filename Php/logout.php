<?php 
   require_once('dbconnect.php');
   session_start();
    if(isset($_REQUEST['logout']))
    {
		if(isset($_SESSION["current_user"])){
			
			echo "session1: " . $_SESSION['current_user'] . " <br />";
			session_destroy();
			echo "Logout successful!";
			echo '<meta http-equiv="refresh" content="2">'; 
		}else{
			echo "You are not loged in";
		}
		
    }

 
?>