var DataRequest =  new XMLHttpRequest();
var method = "GET";
var url = "http://ceto.murdoch.edu.au/~32912826/Assignment2/Php/product.php"
var flag = true;

DataRequest. open(method, url, flag);
DataRequest.send();
DataRequest.onreadystatechange = function(){

if(this.readyState == 4 & this.status ==200){
	var data = JSON.parse(this.responseText);
	console.log(data);
	
	var id;
	var name;
	var price;
	var html='';
	for(var a =0; a< data.length; a++){
		
		id = data[a].id;
		name = data[a].name;
		price= data[a].price;
		
		//this is making the same ID 3 times which doesnot seems to work
	html +=	'<form method="post" onsubmit="AddtoCart(); return false;" action="http://ceto.murdoch.edu.au/~32912826/Assignment2/Php/product.php">';
	html +=	'<div>';

	html +=	 '<div hidden="hidden" name="pid" id ="productId">' + id + '</div>';
	
	html +=	 '<div name="pname" id ="productName" >' + name +'</div>';
				
	html +=	 '<div name="pprice" id ="productPrice">' + price + '</div>';
				
	html +=	'<input type="number" name="quantity" id ="quantity" min="1" required />';

	html +=	'<input type="submit" name="add_to_cart"  value="Add to Cart" />';

	html +=	'</div>	</form>';
			
		
	}
	
	document.getElementById("ProductDisplay").innerHTML= html;
	//document.getElementById("productId").innerHTML= id;
	//document.getElementById("productName").innerHTML= name;
//	document.getElementById("productPrice").innerHTML = price;
	
}	
	
}
