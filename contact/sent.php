<?php $pagetitle="Your message has been sent successfully."; ?>
<?php include '../header.htm' ?>
<?php include '../connection.php'?>

<?php 

session_start();
$userid = $_SESSION['user'];
$subject = $_POST["subject"];
$message = $_POST["message"];

if (is_null($userid)){
	echo "Please login before sending a message!";
}

else {
	$sql = "insert into Email 
			(Date_Sent, Subject, Message, Replied, User_ID) 
			values
			(NOW(), '" . $subject . "','" . $message . "', 0, " . $userid . ")";
			
	mysql_query($sql);
	//TODO: insert emailing here
	echo "Information sent succesfully!"; 	
}
?>
 
<?php include '../footer.htm' ?>