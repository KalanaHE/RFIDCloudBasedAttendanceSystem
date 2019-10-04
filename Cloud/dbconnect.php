<?php 

		$servername = "localhost";
		$username = "root";
		$password = "Tangojuliet1996";
	    $dbname = "attendanceSysDB";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

 ?>