<?php
ob_start();

if (session_id() == "")
	session_start(); 

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

$Uname = $_POST["username"];
$Pword = $_POST["password"];

$query = mysql_query("SELECT User_ID FROM User WHERE Username = '$Uname' AND Password = '$Pword'");
$query_row = mysql_fetch_array($query);

if (!$select) echo mysql_error();		

echo ($query_row[0]);
$id = ($query_row[0]);

if (is_null($id)) {
	$id = -1;
}

$_SESSION['user'] = $id;


//echo $Uname;
//echo $Pword;
echo $_SESSION['user'];


header('Location:http://people.oregonstate.edu/~muellmax/buhrinc/login/index.php');


//ob_flush();
mysql_close($mysql_handle);
?>