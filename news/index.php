<?php
	$pagetitle = "News";

	include '../header.htm';
	include '../connection.php';
?>

<p><b>Here is where you will find news about any new artwork and sales!</b></p>

<?php 
	$sql = 'select News_ID, link, message, date_posted from News where active = 1';
	$result = mysql_query ($sql);

	echo "<table background-color:#C27E3A>";
	while ($row = mysql_fetch_array($result)) {
		echo "<tr>";
		echo "<td><img src=" . $row['link'] . " height='100'/></td>";
		echo "<td>" . $row['message'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";

	include '../footer.htm';
?>
