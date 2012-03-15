<?php
	$pagetitle = "Shipping and Payment"; 

	session_start();
	$userID = $_SESSION['user'];

	include '../header.htm';
	include '../connection.php';

	if (is_null($userID) || $userID < 0) {
		echo "Please login before making an order!";
		include '../footer.htm';
	}
	else {

	// retrieve form parameters
	$art_id = trim ($_GET["art_id"]);

	$query = "select * from Art where Art_ID='" . $art_id . "'";
	$result = mysql_query ($query);
?>

<form name="payment" action="purchase_action.php" method="get">
<p>
	<b>Order</b><br/>
	<table border="1">
		<tr style="font-family:arial;font-size:12px;">
			<td height="30px"><b>No.</b></td><td height="30px"><b>Item</b></td>
			<td height="30px"><b>Price ($)</b></td><td height="30px"><b>Quantity</b></td><td height="30px"><b>Total ($)</b></td>
		</tr>
<?php
	// Initialize variables
	$iCount = 1; // No.
	$iQuantity = 1; // Quantity of each item
	$dSubTotal = 0; // UnitPrice * Quantity
	$dTotal = 0; // Total of the Order (Payment)

	while ($obj = mysql_fetch_object($result)) {
		$dSubTotal = ($obj->Price)*$iQuantity;
		$dTotal += $dSubTotal;
?>
		<tr style="font-family:arial;font-size:10px;">
			<td width="9%"><?php echo $iCount;?></td><td width="37%"><?php print($obj->Name);?></td>
			<td width="18%"><?php print($obj->Price);?></td><td width="18%"><?php echo $iQuantity;?></td><td width="18%"><?php echo $dSubTotal;?></td>
		</tr>
<?php
		$iCount += 1;
	} // end of while
?>

		<tr style="font-family:arial;font-size:12px;">
			<td height="30px" colspan="4" align="right"><b>Total ($)</b></td><td height="30px" style="color:red;"><b><?php echo $dTotal;?></b></td>
		</tr>
	</table>
</p>

<p>
	<b>Shipping adress</b><br/>
	<table border="1" style="font-family:arial;font-size:10px;">
		<tr>
			<td align="right">Address line 1:</td><td><input type="text" name="Address_Line_1" size="39" />
			<font style="color:red;">*</font>
			<br/><i>Street address, P.O. box, company name, c/o</i></td>
		</tr>
		<tr>
			<td align="right">Address line 2:</td><td><input type="text" name="Address_Line_2" size="39" />
			<br/><i>Apartment, suite, unit, building, floor, etc.</i></td>
		</tr>
		<tr>
			<td align="right">City:</td><td><input type="text" name="City" />
			<font style="color:red;">*</font></td>
		</tr>
		<tr>
			<td align="right">State/Province/Region:</td><td><input type="text" name="State" />
			<font style="color:red;">*</font></td>
		</tr>
		<tr>
			<td align="right">Zip:</td><td><input type="text" name="Zip" maxlength="5" size="5" />
			<font style="color:red;">*</font></td>
		</tr>
	</table>
	<font style="font-family:arial;color:red;font-size:14px;text-decoration:underline;"><b>Address Accuracy:</b></font>
	<font style="font-family:arial;color:blue;font-size:12px;text-decoration:italic;">
		<i>Make sure you get your stuff! If the address is not entered correctly, your package may be returned as undeliverable. You would then have to place a new order. Save time and avoid frustration by entering the address information in the appropriate box and double-checking for typos and other errors.</i>
	</font>
</p>

<p>
	<b>Payment option</b><br/>
	<table border="1" style="font-family:arial;font-size:10px;">
		<tr>
			<td align="right">Card type:</td><td><input type="text" name="Card_Type" />
			<font style="color:red;">*</font></td>
		</tr>
		<tr>
			<td align="right">Card number:</td><td><input type="text" name="Card_Number" />
			<font style="color:red;">*</font></td>
		</tr>
		<tr>
			<td align="right">Name on card:</td><td><input type="text" name="Name_On_Card" />
			<font style="color:red;">*</font></td>
		</tr>
		<tr>
			<td align="right">Expiration date:</td><td><input type="text" name="Card_Exp_Date" />
			<font style="color:red;">*</font></td>
		</tr>
		<tr>
			<td align="right">Security code:</td><td><input type="text" name="Security_Code" maxlength="3" size="3" />
			<font style="color:red;">*</font></td>
		</tr>
	</table>
</p>

<input type="hidden" value="<?php echo $userID; ?>" name="User_ID" />
<input type="hidden" value="<?php echo $art_id; ?>" name="Art_ID" />
<input type="hidden" value="<?php echo $dTotal; ?>" name="Total" />

<input type="submit" name="cmd" value="Insert" />
</form>

<?php include '../footer.htm'; }?>
