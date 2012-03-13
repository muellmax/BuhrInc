<?php
	session_start();
	ob_start();
	$userID = $_SE
	
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