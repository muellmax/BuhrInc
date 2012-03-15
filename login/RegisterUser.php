<?php
ob_start();

if (session_id() == "")
	session_start(); 

include '../connection.php';

$Uname = $_POST["username"];
$Pword = $_POST["password"];

$query = mysql_query ("SELECT User_ID FROM User WHERE Username = '$Uname' AND Password = '$Pword'");
$query_row = mysql_fetch_array ($query);

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

if ($id > -1) {
	header ('Location: ../index.php');
}
else {
	header('Location: ../login/index.php');
}
//header ('Location:http://people.oregonstate.edu/~muellmax/buhrinc/index.php');

//ob_flush();
?>
