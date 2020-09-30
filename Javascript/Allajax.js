//load navigation
function loginUser(){
	$loginEmail=$("#loginEmail").val();
	$loginpass=$("#loginpass").val();
	$("#lgerror").load("Php/login.php",{"loginEmail":$loginEmail, "loginpass":$loginpass});
}

function CustomerAccountEdit(){
	
	$Name=$("#cName").val();
	$Date=$("#cDOB").val();
	$Gender=$("#cGender").val();
	$Address=$("#cAddress").val();
	$Suburb=$("#cSuburb").val();
	$PostCode=$("#cPost").val();
	$Phone=$("#cPhone").val();
	$Username=$("#cUserName").val();
	$Email=$("#cEmail").val();
	
	$("#CustomerAccountEditOutput").load("Php/ApplyCustomerEdit.php",{"sName":$Name, "sDOB":$Date,"gender":$Gender,"saddr":$Address,"sSuburb":$Suburb,"sPost":$PostCode,"cPhone":$Phone,"cusername":$Username,"sEmail":$Email});
}

function CustomerAccountinquery(){
	
	$UsernameorEmail=$("#customerUserName").val();
	
//	$("#DisplayCustomerAccountInquery").load("Php/userAccount.php",{"customerusername":$UsernameorEmail});

	$.post("Php/userAccount.php",{"customerusername":$UsernameorEmail},function(data, status){
	//	var customerdata = data;
		var customerdata = JSON.parse(data);
		
		console.log(status);
		console.log(data);
		//console.log(customerdata);
		console.log("hellooooooo");
		//console.log(data[0].Name);
		//console.log(data[1].Name);
		console.log(customerdata[0].Name);

		console.log("hellooooooo2222");
		var name = customerdata[0].Name;
		var DOB = customerdata[0].DOB;
		var gender = customerdata[0].Gender;
		var addr = customerdata[0].Address;
		var sub = customerdata[0].Suburb;
		var postc = customerdata[0].PostalCode;
		var phone = customerdata[0].Phone;
		var username = customerdata[0].Username;
		var email = customerdata[0].Email;
		var type= customerdata[0].type; 
	
	
		document.getElementById("cName").value = name;
		document.getElementById("cDOB").value = DOB;
		document.getElementById("cGender").value = gender;
		document.getElementById("cAddress").value = addr;
		document.getElementById("cSuburb").value = sub;
		document.getElementById("cPost").value = postc;
		document.getElementById("cPhone").value = phone;
		document.getElementById("cUserName").value = username;
		document.getElementById("cEmail").value = email;
		document.getElementById("cType").value = type; 
		
		
	});


}



function SignupAccount(){
	$name=$("#sName").val();
	$date=$("#sDOB").val();
	$gender=$("#gender").val();
	$address=$("#saddr").val();
	$suburb=$("#sSuburb").val();
	$postCode=$("#sPost").val();
	$phone=$("#c_Phone").val();
	$username=$("#cusername").val();
	$email=$("#sEmail").val();
	$pass=$("#spass").val();
	$type=$("#type").val();
	
	$("#CustomerAccountverification").load("Php/signup.php",{"sName":$name, "sDOB":$date,"gender":$gender,"saddr":$address,"sSuburb":$suburb,"sPost":$postCode,"cPhone":$phone,"cusername":$username,"sEmail":$email,"spass":$pass,"type":$type});
	
}


function staffSignupAccount(){
					
	$name=$("#staffName").val();
	$date=$("#staffDOB").val();
	$gender=$("#staffgender").val();
	$address=$("#staffaddr").val();
	$suburb=$("#staffSuburb").val();
	$postCode=$("#staffPost").val();
	$phone=$("#staffphone").val();
	$username=$("#staffusername").val();
	$email=$("#staffEmail").val();
	$pass=$("#staffpass").val();
	$type=$("#stafftype").val();
	
	$("#staffregistationOutput").load("Php/staffSignup.php",{"staffName":$name, "staffDOB":$date,"staffgender":$gender,"staffaddr":$address,
	"staffSuburb":$suburb,"staffPost":$postCode,"staffphone":$phone,"staffusername":$username,"staffEmail":$email,"staffpass":$pass,"stafftype":$type});
	
}


	   
function logout(){
	$("#logoutmsg").load("Php/logout.php?logout");
}

function AddtoCart(){
	$productId=$("#productId").html();
	$productName=$("#productName").html();
	$productPrice=$("#productPrice").html();
	$quantity=$("#quantity").val();

	$("#cartOutput").load("Php/cart.php?add_to_cart",{"pid":$productId, "pname":$productName,"pprice":$productPrice,"quantity":$quantity});
}	
	
	
function RemovefromCart(){

	$productId= $("#productId").html();

	$("#cartOutput").load("Php/cart.php?action=delete",{"pid":$productId});	
}


function PayBill(){


	$("#cartOutput").load("Php/cart.php?action=payment");	
}