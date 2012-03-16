<?php
	$pagetitle = "Comment"; 

	session_start();
	$userID = $_SESSION['user'];

	include '../header.htm';
	include '../connection.php';
	
	// retrieve form parameters
	$art_id = trim ($_GET["art_id"]);
	$comment = trim( $_POST["Comment"] );

	if (is_null($userID) || $userID < 0) {
		echo "Please login before posting a comment!";
	}
	else {
	$sql = "insert into Comments (User_ID, Art_ID, Message, Date_Posted) values (" . $userID . "," . $art_id . ", '" . $comment . "', NOW())";
	mysql_query ($sql);
	echo "<br> Your comment has succesfully been uploaded.<br><br>";	
	}
?>

<form method="post" action="./view.php?art_id=<?php echo $art_id?>">
	<input type="submit" value="Click to go back" />
</form>
<?php 
	include '../footer.htm';
?>