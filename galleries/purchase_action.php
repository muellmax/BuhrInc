<?php
	include '../header.htm';
	include '../connection.php';

	// retrieve form parameters
	$cmd = trim( $_GET["cmd"] );
	$User_ID = trim( $_GET["User_ID"] );
	$Art_ID = trim( $_GET["Art_ID"] );
	$Total = trim( $_GET["Total"] );

	$Address_Line_1 = trim( $_GET["Address_Line_1"] );
	$Address_Line_2 = trim( $_GET["Address_Line_2"] );
	$City = trim( $_GET["City"] );
	$State = trim( $_GET["State"] );
	$Zip = trim( $_GET["Zip"] );

	$Card_Type = trim( $_GET["Card_Type"] );
	$Card_Number = trim( $_GET["Card_Number"] );
	$Name_On_Card = trim( $_GET["Name_On_Card"] );
	$Card_Exp_Date = trim( $_GET["Card_Exp_Date"] );
	$Security_Code = trim( $_GET["Security_Code"] );

	// error checking
	$errorFound = false; // assume no errors initially

	if( !strlen($Address_Line_1) ) {
		echo "Missing value: Address_Line_1 <br>";
		$errorFound = $errorFound || true; // indicate error
	}
	if( !strlen($City) ) {
		echo "Missing value: City <br>";
		$errorFound = $errorFound || true; // indicate error
	}
	if( !strlen($State) ) {
		echo "Missing value: State <br>";
		$errorFound = $errorFound || true; // indicate error
	}
	if( !strlen($Zip) ) {
		echo "Missing value: Zip <br>";
		$errorFound = $errorFound || true; // indicate error
	}

	if( !strlen($Card_Type) ) {
		echo "Missing value: Card_Type <br>";
		$errorFound = $errorFound || true; // indicate error
	}
	if( !strlen($Card_Number) ) {
		echo "Missing value: Card_Number <br>";
		$errorFound = $errorFound || true; // indicate error
	}
	if( !strlen($Name_On_Card) ) {
		echo "Missing value: Name_On_Card <br>";
		$errorFound = $errorFound || true; // indicate error
	}
	if( !strlen($Card_Exp_Date) ) {
		echo "Missing value: Card_Exp_Date <br>";
		$errorFound = $errorFound || true; // indicate error
	}
	if( !strlen($Security_Code) ) {
		echo "Missing value: Security_Code <br>";
		$errorFound = $errorFound || true; // indicate error
	}

	/*if( $cmd == "Insert" || $cmd == "Update" ) { // other params needed for
		if( !strlen($type) ) { // Insert and Update
			echo "Missing value: type<br>";
			$errorFound = $errorFound || true;
		}
		if( !strlen($name) ) {
			echo "Missing value: name<br>";
			$errorFound = $errorFound || true;
		}
	}*/

	if ($errorFound) {
		die ("<br><br><font color=orange>Error found: $cmd not executed</font>");
	}

	switch( $cmd ) {
		case "Insert":
			// insert into Shipping_Address
			$query = "insert into Shipping_Address( User_ID, Address_Line_1, Address_Line_2, City, State, Zip ) ";
			$query .= "values( $User_ID, '$Address_Line_1', '$Address_Line_2', '$City', '$State', '$Zip' )";

			$result = mysql_query ($query); // execute SQL statement
			if (!$result) {
				die ('Insert Row Failed at shipping!' . mysql_error());
			}

			// get the id of the record that has just been inserted
			$new_addr_id = mysql_insert_id();

			// insert into Payment_Info
			$query = "insert into Payment_Info( User_ID, Card_Type, Card_Number, Name_On_Card, Card_Exp_Date, Security_Code, Billing_Address ) ";
			$query .= "values( $User_ID, '$Card_Type', '$Card_Number', '$Name_On_Card', '$Card_Exp_Date', '$Security_Code', '$Zip' )";

			$result = mysql_query ($query); // execute SQL statement
			if (!$result) {
				die ('Insert Row Failed at pay info!' . mysql_error());
			}

			// get the id of the record that has just been inserted
			$new_pay_id = mysql_insert_id();

			// insert into Order_Info
			$query = "insert into Order_Info( User_ID, Pay_ID, Address_ID, Order_Date, Shipment_Type, Art_ID ) ";
			$query .= "values( $User_ID, $new_pay_id, $new_addr_id, NOW(), 'Standard', $Art_ID )";

			$result = mysql_query ($query); // execute SQL statement
			if (!$result) {
				die ('Insert Row Failed at order info!' . mysql_error());
			}

			echo "Your order has been processed.<br><br>$$Total has been charged from the account $Card_Number.<br><br>Thank you for your purchase.";

			break;

		/*case "Update":
			$updateTable = "update node";
			$valueList = " set title = '$title', type = '$type'";
			$whereClause = " where title='$title'";
			$query = $updateTable . $valueList . $whereClause;

			break;

		case "Delete":
			$query = "delete from node where title='$title'";*/
	}
?>

<?php include '../footer.htm' ?>
