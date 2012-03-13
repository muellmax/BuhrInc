<?php $pagetitle="Your message has been sent successfully."; ?>
<?php include '../header.htm' ?>
<?php include '../connection.php'?>

<?php 

//define credentials
DEFINE ('DB_USER', 'forells-db');
DEFINE ('DB_PASSWORD', 'hvG5g5XxQUGSCdZP');
DEFINE ('DB_HOST', 'oniddb.cws.oregonstate.edu');
DEFINE ('DB_NAME', 'forells-db');

//establish a connection
$dbc = @mysql_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) 
              or die ('Connection to the database did not work because:  ' . mysql_connect_error() );
			  
//select the database
mysql_select_db(DB_NAME, $dbc);

session_start();
$userid = $_SESSION['user'];
$subject = $_POST["subject"];
$message = $_POST["message"];

$sql = "insert into Email 
		(Date_Sent, Subject, Message, Replied, User_ID) 
		values
		(NOW(), '" . $subject . "','" . $message . "', 0, " . $userid . ")";
		
mysql_query($sql);
mysql_close($con);]

?>
 
<?php include '../footer.htm' ?>