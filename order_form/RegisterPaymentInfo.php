<?php
	session_start();
	ob_start();
	$userID = $_SESSION['user'];
	
	$dbuser = 'forells-db';
	$dbpass = 'hvG5g5XxQUGSCdZP';
	$dbhost = 'oniddb.cws.oregonstate.edu';
	$dbname = 'forells-db';
	
	//establish a connection
	$mysql_handle = @mysql_connect($dbhost, $dbuser, $dbpass)
		or die("Error connecting to database server");
		
	//select the database
	mysql_select_db($dbname, $mysql_handle)
		or die("Error selecting database: $dbname");
		
	$UserID = $_SESSION['user'];
	if (is_null($UserID)) $_SESSION['error'] = 1;
	$CardType = $_POST["cardtype"];
	if (is_null($CardType)) $_SESSION['error'] = 1;
	$CardNum = $_POST["cardnumber"];
	if (is_null($CardNum)) $_SESSION['error'] = 1;
	$BillAddress = $_POST["billaddress"];
	if (is_null($BillAddress)) $_SESSION['error'] = 1;
	$NameOnCard = $_POST["nameoncard"];
	if (is_null($NameOnCard)) $_SESSION['error'] = 1;
	$CardExpDate = $_POST["expdate"];
	if (is_null($CardExpDate)) $_SESSION['error'] = 1;
	$SecCode = $_POST["security"];
	if (is_null($SecCode)) $_SESSION['error'] = 1;
	
	if ($_SESSION['error'] != 1) {
		if ($_SESSION['flag'] == 0) {
	
			$query = mysql_query("INSERT INTO Payment_Info (User_ID, Cart_Type, Card_Number, Billing_Address, Name_On_Card, Card_Exp_Date, Security_Code)
				VALUES(\"$UserID\", \"$CardType\", \"$CardNum\", \"$BillAddress\", \"$NameOnCard\", \"$CardExpDate\", \"$SecCode\")");
		}
		else {
			$query = mysql_query("UPDATE Payment_Info
								SET User_ID = $UserID, Cart_Type = $CardType,
								Card_Number = $CardNum, Billing_Address = $BillAddress,
								Name_On_Card = $NameOnCard, Card_Exp_Date = $CardExpDate,
								Security_Code = $SecCode
								WHERE User_ID = $UserID");
		}
		if (!$query) echo mysql_error();
		echo $_SESSION['flag'];
		echo "hi";
		echo $_SESSION['error'];
	}
	mysql_close($mysql_handle);
	//header('Location:http://people.oregonstate.edu/~muellmax/buhrinc/order_form/index.php');
?>							  