<?php $pagetitle="News"; ?>
<?php include '../header.htm' ?>


<p><b>Here is where you will find news about any new artwork and sales!</b></p>


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

	$sql = 'select News_ID, link, message, date_posted from News where active = 1';
	$result = mysql_query($sql);
	
	echo 
	"<table background-color:#C27E3A>";
	while($row = mysql_fetch_array($result)) {
		echo "<tr>";
		echo "<td><img src=" . $row['link'] . " height='100'/></td>";
		echo "<td>" . $row['message'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysql_close($con);
?>


<?php include '../footer.htm' ?>
