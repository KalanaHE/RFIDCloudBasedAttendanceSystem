<?php 

		$servername = "localhost";
		$username = "MySQL username";
		$password = "Your MYSQL Password";
	    $dbname = "attendanceSysDB";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

 ?>
