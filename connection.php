<?php
	$serverName = 'localhost';
	$userName = 'root';
	$password = '';
	$dbName = 'addressbook3';

	//create connection

	$conn = new mysqli($serverName, $userName, $password, $dbName);

	//check connection

/*	if($conn->connect_error) {
		echo 'Connection failed';
	}
	else {
		echo 'connection succesffully';
	}

*/

?>