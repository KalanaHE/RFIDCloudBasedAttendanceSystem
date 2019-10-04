<?php 

	require 'dbconnect.php';

	$var = $_GET['allow'];
	$id = $_GET['id'];
	
	if(id=='17121543'){
		$id = "Kalana Hettiarachchi";
	}



	$sql = "INSERT INTO user_attendance (id, userid, allow)
	VALUES ('', '$id', '$var')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

 ?>