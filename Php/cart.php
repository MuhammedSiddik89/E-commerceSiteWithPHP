<?php 
require_once('dbconnect.php');
session_start();

if(isset($_GET["add_to_cart"]))
{
$pID = $_REQUEST["pid"];
$pName= $_REQUEST["pname"];
$pPrice	= $_REQUEST["pprice"];
$pQuantity = $_REQUEST["quantity"];
$count;

	if(isset($_SESSION["shopping_cart"]))
	{
		
		$arrayItemID = array_column($_SESSION["shopping_cart"],"item_id");
		if(!in_array($_REQUEST["pid"], $arrayItemID))
		{

			$count = count($_SESSION["shopping_cart"]);
			$Shopping_Array = array(
				'item_id'			=>	$pID,
				'item_name'			=>	$pName,
				'item_price'		=>	$pPrice,
				'item_quantity'		=>	$pQuantity
			);
			$_SESSION["shopping_cart"][$count] = $Shopping_Array;

		}
		else
		{		
		
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{

		$Shopping_Array = array(
				'item_id'			=>	$pID,
				'item_name'			=>	$pName,
				'item_price'		=>	$pPrice,
				'item_quantity'		=>	$pQuantity
		);
		$_SESSION["shopping_cart"][0] = $Shopping_Array;
		$count = count($_SESSION["shopping_cart"]);
	}
	
}



if(isset($_REQUEST["action"]))
{

	if($_REQUEST["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
		
			if($values["item_id"] == $_REQUEST["pid"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed from Cart")</script>';
			}else{
			
				echo '<script>alert("Item Not found for removal")</script>';
			}
		}
	}
}





if(isset($_REQUEST["action"]))
{

	if($_REQUEST["action"] == "payment")
	{
		$flag =0;
		$customerId = $_SESSION['userID'];
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			$itemID = $values["item_id"];
			$itemName = $values["item_name"];
			$itemPrice = $values["item_price"];
			$itemQty = $values["item_quantity"];
			$TOTAL = $itemQty * $itemPrice;
			
			$sql = "INSERT INTO customerOrder (customerID, itemId, itemName ,itemPrice,qty, total)
			VALUES ('$customerId', '$itemID', '$itemName', '$itemPrice', '$itemQty', '$TOTAL')";
			$result = mysqli_query($con, $sql);
			$flag=1;
		}
		
		if($flag ==1){
			echo "You have successfully, completed the transaction";
			echo "Our Free Delivery Service, apply 2 days of delivery time";
		}else{
			
			echo "Payment Failed";
		}
	
	
	}
	
	
}







if(isset($_SESSION["shopping_cart"]))
{
	$html = ' ';

		//	if($counter == 0)
			//{	
				$html .= '<table>
					<tr>
						<th width="10%">Item Name</th>
						<th width="1%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>';	
				//	$counter =1;
		//	}
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{

						$html .= '<tr>				
						<td>' .$values["item_name"] .'</td>
								<td>'.$values["item_quantity"] .'</td>
								<td>$'.$values["item_price"] .'</td>
								<td>$ '.number_format($values["item_quantity"] * $values["item_price"], 2) .'</td>
								<td>
								<input type="submit" id="'. $values["item_id"].'" name="RemovefromCart"  value="Remove" onClick="RemovefromCart()"/>
								
								</td>
							</tr>'. $total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
						$html .=	'<tr>
							<td colspan="3" align="right">Total</td>
							<td align="right">$ ' . number_format($total, 2) . '</td>
							<td></td>
						</tr>
						
						</table>
						<a id="right" href="index.html#Payment" class="cancelbtn2" value="Checkout" >Checkout</a>
						';
					}
		echo $html; 
}else{
  echo "Cart empty";	
	
}




?>