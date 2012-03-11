<?php
	//define credentials
	DEFINE ('DB_HOST', 'oniddb.cws.oregonstate.edu');
	DEFINE ('DB_USER', 'forells-db');
	DEFINE ('DB_PASSWORD', 'hvG5g5XxQUGSCdZP');
	DEFINE ('DB_NAME', 'forells-db');

	//establish a connection
	$connect = mysql_connect (DB_HOST, DB_USER, DB_PASSWORD) 
		or die ("Unable to connect to server.<br>");
	//echo "Connected to server " . DB_HOST . " as user " . DB_USER . "<BR>";

	//select the database
	mysql_select_db (DB_NAME) 
		or die ("Unable to select database" . DB_NAME . "<br>");
	//echo "Connected to database " . DB_NAME . "<BR><BR>";
?>
