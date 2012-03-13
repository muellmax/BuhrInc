<?php
	include '../header.htm';
	include '../connection.php';

	// retrieve form parameters
	$cmd = trim( $_GET["cmd"] );
	$Address_Line_1 = trim( $_GET["Address_Line_1"] );

	/*$errorFound = false; // assume no errors initially
	if( !strlen($title) ) { // no title, title needed for all cases
		echo "Missing value: title <br>";
		$errorFound = $errorFound || true; // indicate error
	}
	if( $cmd == "Insert" || $cmd == "Update" ) { // other params needed for
		if( !strlen($type) ) { // Insert and Update
			echo "Missing value: type<br>";
			$errorFound = $errorFound || true;
		}
		if( !strlen($name) ) {
			echo "Missing value: name<br>";
			$errorFound = $errorFound || true;
		}
	}
	if( $errorFound ) {
		die( "<br><br><font color=orange>Error found: $cmd not executed</font>" );
	}*/

	/*switch( $cmd ) {
		case "Insert":
			$query  = "insert into node( title, type, author ) ";
			$query .= "values( '$title', '$type', 1 )";
			break;
		case "Update":
			$updateTable = "update node";
			$valueList = " set title = '$title', type = '$type'";
			$whereClause = " where title='$title'";
			$query = $updateTable . $valueList . $whereClause;
			break;
		case "Delete":
			$query = "delete from node where title='$title'";
	}*/

	/*echo "Query Statement = $query<BR><BR>";
	$result = mysql_query($query); // execute SQL statement
	echo "Query executed, \$result = $result<BR><BR>";*/
	
	
	echo $userID . "." . $cmd . "." . $Address_Line_1;
?>

<?php include '../footer.htm' ?>
