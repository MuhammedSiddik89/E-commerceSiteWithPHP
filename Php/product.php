<?php 
session_start();
require_once('dbconnect.php');

$query = "SELECT * FROM tbl_product ORDER BY id ASC";
$result = mysqli_query($con, $query);
$data = array();
	while($row = mysqli_fetch_array($result))
	{
		$data[] = $row;
	}	
	 echo json_encode($data);	 
	 
?>