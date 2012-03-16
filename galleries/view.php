<?php
	ob_start();
	session_start();
	$pagetitle = "View Artwork";	
	include '../header.htm';
	include '../connection.php';
	
	$user_id = $_SESSION['user'];
	$art_id = trim ($_GET["art_id"]);
	
	$query = "select Link, Name, Author, For_Sale, Price, Size from Art where Art_ID = " . $art_id;
	$result = mysql_query ($query);
	$row = mysql_fetch_array($result);
	$link = $row['Link'];
	$name = $row['Name'];
	$author = $row['Author'];
	$for_sale = $row['For_Sale'];
	$price = $row['Price'];
	$size = $row['Size'];
	$findme = 'X';
	
	$query = "select * from Comments where Art_ID = " . $art_id . " order by Date_Posted desc";
?>
<p>
	<?php echo "Art Piece: " . $name . "<br>" . "Author: " . $author?> 
</p>
	<img border="0" src="<?php echo $link ?>" width="300" height="300" />
<p>
	<?php if($for_sale == 1) echo "Price: $" . $price?> 
</p>

<input type="submit" value="Purchase" onclick="window.location='./purchase.php?art_id=<?php echo $art_id?>';" />
<p>Comments </p><br>
<div style="border:1px solid black">
<?php 
	$query = "select User_ID, Message, Date_Posted from Comments where Art_ID = " . $art_id;
	$result = mysql_query ($query);
	while($row = mysql_fetch_array($result)){
		$userid = $row['User_ID'];
		$query = "select Username from User where User_ID = " . $userid;
		$result2 = mysql_query ($query);
		$row2 = mysql_fetch_array($result2);
		$username = $row2['Username'];
		echo "<p><font size=\"2\"</font>";
		echo $row['Message'] . "<br><br>";
		echo "Posted by: " . $username . "<br> Date Posted: " . $row['Date_Posted'];
		echo "</p><hr color = \"black\" >";
	}
?>
 Post your own comment here: <br><br> 
 
<!--<input type="text"  style="width:97%; height:100px;"  name="comment" value="" />
<input type="submit" value="Comment" onclick="window.location='./comment.php?art_id=<?php echo $art_id?>';" />
--->
<form method="post" action="./comment.php?art_id=<?php echo $art_id?>">
<textarea style="width:97%; height:100px;" name="Comment" cols="40" rows="5"></textarea><br>
<input type="submit" value="Submit Comment" />
</form>
</div>
<?php include '../footer.htm' ?>