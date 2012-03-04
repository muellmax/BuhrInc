<?php   //connect to database example for PHP 5.2

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

?>