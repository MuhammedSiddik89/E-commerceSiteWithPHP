<?php
require_once('dbconnect.php');
session_start();

$customer ="customer";
$staff ="staff";

	$html= "";
	$html .=	'<ul>
			 <li><img src ="images/logo.png" alt = " website logo" id = "logo"/> <b id="companyName">JHONS STATIONARY</b></a></li>
			
			<div class="dropdown">
			  <li><a href="index.html#ProducDisplaycontainer">Home</a></li>
			</div>
			
			<div class="dropdown">
				<li><a href="index.html#AboutUs">About Us</a></li>
			</div>';
			if(isset($_SESSION["userType"])){
				
			  if($_SESSION['userType'] == $customer){
		$html .=	'<div class="dropdown">
				<li><a href="index.html#DisplayCart">Shopping Cart</a></li>
				</div>';
			  }
			}
		$html .=	'<div class="dropdown">
				<li><a href="#">Support</a></li>
					  <div class="dropdownlist">
						<a href="index.html#frequestQuestion">FAQ </a>
						<a href="index.html#UserGuide">USer Guide</a>
					  </div>
				</div>
			
			<div class="dropdown">
				<li><a href="index.html#ContactUs">Contact Us</a></li>
			</div>
			
			<div class="dropdown">
				<li id="UserAccount"><img src="images/user.png" alt = "UserAccount logo">';
				if(isset($_SESSION['user_Name'])){
					$html .= $_SESSION['user_Name'];
					
				}else{
					
					$html .= 'UnRegistered User';
				}
				
			$html .= 	'</li>
					<div class="dropdownlist">';
					if(!isset($_SESSION["current_user"]))
					{
				$html .=	'<a href="index.html#lgForm">Account Login</a>
						<a href="index.html#CustomerRegistation">Register</a>';
					}
					
					if(isset($_SESSION["current_user"]))
					{	
						if($_SESSION['userType'] == $customer){
						$html .=	'<a href="index.html#CustomerAccountEdit">Account Setting</a>';
						}
						
						if($_SESSION['userType'] == $staff){
						$html .=	'<a href="index.html#StaffRegistation">Create New Staff Account</a>';
						$html .=	'<a href="index.html#CustomerAccountInquery">Edit Customer Account</a>';
						$html .=	'<a href="index.html#CustomerAccountEdit">Customer Setting</a>';
						
						}
						
						$html .=	'<a onClick="logout(); return false;" href="index.html#LogoutButton">Logout</a>';
					}
					
				$html .=	'</div>
				</div>
				
				<input id = "search" type="text" placeholder="Search.." />
				
			</ul>';
			
			echo $html;

?>