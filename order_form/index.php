<?php session_start(); ?>
<?php $pagetitle="Login/Logout"; ?>
<?php include '../header.htm' ?>

<?php
	//establish a connection
	$mysql_handle = @mysql_connect($dbhost, $dbuser, $dbpass)
		or die("Error connecting to database server");
		
	//select the database
	mysql_select_db($dbname, $mysql_handle)
		or die("Error selecting database: $dbname");
		
	$userID = $_SESSION['user'];
	
	if (!is_null($userID)) {
		$query = mysql_query("SELECT * FROM Payment_Info WHERE User_ID = '$userID' AND Password = '$Pword'");
	}
?>

<form id='RegisterUser' action='RegisterUser.php' method='post' accept-charset='UTF-8'>
	<fieldset>
		<legend>Order form</legend>
		<input type='hidden' name='submitted' id='submitted' value='1' />
		<label for='cardtype' >Card Type:*</label>
		<input type='text' name='cardtype' id='cardtype' maxlength="30" />
		<label for='cardnumber' >Credit Card Number:*</label>
		<input type='text' name='cardnumber' id='cardnumber' maxlength="65" />
		<label for='billaddress' >Billing Address:*</label>
		<input type='text' name='billaddress' id='billaddress' maxlength="65" />
		<label for='nameoncard' >Name On Card:*</label>
		<input type='text' name='nameoncard' id='nameoncard' maxlength="65" />
		<label for='expdate' >Card Expiration Date*:</label>
		<input type='text' name='expdate' id='expdate' maxlength="50" />
		<label for='security' >Security Code*:</label>
		<input type='text' name='security' id='security' maxlength="50" />
		<input type='submit' name='Submit' value='Submit' />
	</fieldset>
</form>
<?php include '../footer.htm'; ?>