<?php
	include 'cms/db_config.php'; // Include the database configuration file

	// Test the connection
	echo $conn->connect_error ? "Test Connection failed: " . $conn->connect_error : "Test Connection successful.<br>";

	// Close the connection
	$conn->close();
?>
