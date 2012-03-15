<?php
session_start();
ob_start();

include '../connection.php';

$Fname = $_POST["firstname"];
$Lname = $_POST["lastname"];
$Email = $_POST["email"];
$Uname = $_POST["username"];
$Pword = $_POST["password"];
$var = NULL;

echo $Uname;
echo $Pword;
echo $Fname;
echo $Lname;
echo $Email;
echo $var;

$select = mysql_query ("SELECT Username from User WHERE Username = '" . $Uname . "'");

$query_row = mysql_fetch_array($select); 
if (!is_null($query_row[0])) {
	$_SESSION['userdup'] = 1;
	header ('Location:http://people.oregonstate.edu/~muellmax/buhrinc/registration/index.php');
	exit();
}
else $_SESSION['userdup'] = 0;

$insert = mysql_query ("INSERT INTO User (Username, Password, First_Name, Last_Name, Email)
			 VALUES(\"$Uname\", \"$Pword\", \"$Fname\", \"$Lname\", \"$Email\")");

if (!$insert) echo mysql_error();			 
			 
echo "record added.";
$result = mysql_query('select LAST_INSERT_ID()');
$query_row = mysql_fetch_array($result);			 
$_SESSION['user'] = $query_row[0];
header ('Location:http://people.oregonstate.edu/~muellmax/buhrinc/regConfirmation.php');
ob_flush();

exit();
?>
