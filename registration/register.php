<?php
//include 'http://people.oregonstate.edu/~muellmax/buhrinc/connection.php';
session_start();
ob_start();
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
	
echo 'Successfully connected to database!';
			  
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

$select = mysql_query("SELECT Username from User WHERE Username = '" . $Uname . "'");

$query_row = mysql_fetch_array($select); 
if (!is_null($query_row[0])) {
	$_SESSION['userdup'] = 1;
	header('Location:http://people.oregonstate.edu/~muellmax/buhrinc/registration/index.php');
	exit();
}
else $_SESSION['userdup'] = 0;

$insert = mysql_query("INSERT INTO User (Username, Password, First_Name, Last_Name, Email)
			 VALUES(\"$Uname\", \"$Pword\", \"$Fname\", \"$Lname\", \"$Email\")");

if (!$insert) echo mysql_error();			 
			 
echo "record added.";			 
mysql_close($mysql_handle);

header('Location:http://people.oregonstate.edu/~muellmax/buhrinc/regConfirmation.php');
ob_flush();
exit();
?>
