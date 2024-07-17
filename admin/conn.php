<?php
	$conn = mysqli_connect("localhost", "root", "12345678", "db_file");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>