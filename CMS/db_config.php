<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cms";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} else {
		// Debug: Confirm connection success
		// Uncomment the line below for debugging purposes
		// echo "Debug: Database connection successful.<br>";
	}
?>