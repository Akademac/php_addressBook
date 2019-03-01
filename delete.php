<?php
	if(isset($_GET['id'])) {
		require_once"connection.php";
		$id = $_GET['id'];
		$delete_contact = "DELETE FROM addresstable WHERE id = '$id'";
		$sql_delete_contact = $conn->query($delete_contact);
		
		if($sql_delete_contact) {
			header("Location: index.php");
		}
	}
	

?>