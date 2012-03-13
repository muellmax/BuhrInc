<?php session_start(); ?>
<?php $pagetitle="Please provide payment information"; ?>
<?php include '../header.htm'; ?>

<?php

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
		
	$userID = $_SESSION['user'];
	
	if (!is_null($userID)) {
		$query = mysql_query("SELECT * FROM Payment_Info WHERE User_ID = '$userID'");
		$query_row = mysql_fetch_array($query);
		$cardType = $query_row[2];
		$cardNumber = $query_row[3];
		$billingAddress = $query_row[4];
		$nameOnCard = $query_row[5];
		$cardExpDt = $query_row[6];
		$secCode = $query_row[7];
		$_SESSION['flag'] = 1;
	}
	else {
		$cardType = NULL;
		$cardNumber = NULL;
		$billingAddress = NULL;
		$nameOnCard = NULL;
		$cardExpDt = NULL;
		$secCode = NULL;
		$_SESSION['flag'] = 0;
	}
?>

<form id='RegisterPaymentInfo' action='RegisterPaymentInfo.php' method='post' accept-charset='UTF-8'>
	<fieldset>
		<legend>Order form</legend>
		<input type='hidden' name='submitted' id='submitted' value='1' />
		<label for='cardtype' >Card Type:*</label>
		<input type='text' name='cardtype' id='cardtype' maxlength="30" value="<?php echo($cardType); ?>" />
		<label for='cardnumber' >Credit Card Number:*</label>
		<input type='text' name='cardnumber' id='cardnumber' maxlength="65" value="<?php echo($cardNumber); ?>" />
		<label for='billaddress' >Billing Address:*</label>
		<input type='text' name='billaddress' id='billaddress' maxlength="65" value="<?php echo($billingAddress); ?>" />
		<label for='nameoncard' >Name On Card:*</label>
		<input type='text' name='nameoncard' id='nameoncard' maxlength="65" value="<?php echo($nameOnCard); ?>"/>
		<label for='expdate' >Card Expiration Date*:</label>
		<input type='text' name='expdate' id='expdate' maxlength="50" value="<?php echo($cardExpDt); ?>"/>
		<label for='security' >Security Code*:</label>
		<input type='text' name='security' id='security' maxlength="50" value="<?php echo($secCode); ?>"/>
		<input type='submit' name='Submit' value='Submit' />
	</fieldset>
</form>

<?php

	if (isset($_SESSION['error'])) {
		if ($_SESSION['error'] == 1) 
			echo "<p>Please fill out all the required fields.</p>";
		else 
			echo "<p>You have successfully created payment information.</p>";
	
	}

	include '../footer.htm'; 
?>