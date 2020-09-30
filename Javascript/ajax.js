var DataRequest =  new XMLHttpRequest();
var method = "GET";
var url = "http://ceto.murdoch.edu.au/~32912826/Assignment2/Php/userAccount.php";
var flag = true;

DataRequest. open(method, url, flag);

DataRequest.send();

DataRequest.onreadystatechange = function(){

if(this.readyState == 4 & this.status ==200){
	var customerdata = JSON.parse(this.responseText);
	console.log(customerdata);
	
	var name="";
	var DOB;
	var gender;
	var addr = "";
	var sub = "";
	var postc = "";
	var email = "";
	var phone ="";
	var type ="";
	var username="";
	for(var a =0; a< customerdata.length; a++){
		
		name = customerdata[a].Name;
		DOB = customerdata[a].DOB;
		gender = customerdata[a].Gender;
		addr = customerdata[a].Address;
		sub = customerdata[a].Suburb;
		postc = customerdata[a].PostalCode;
		phone = customerdata[a].Phone;
		username = customerdata[a].Username;
		email = customerdata[a].Email;
		type= customerdata[a].type; 
	}
	
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
}	
	
}






