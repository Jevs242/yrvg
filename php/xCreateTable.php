<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "SurveyDB";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// sql to create table
	$sql = "CREATE TABLE SurveyGames (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		Nombre VARCHAR(20) NOT NULL,
		email VARCHAR(20),
        game VARCHAR(20),
        Review VARCHAR(250),
        Console VARCHAR(10),
        Ratings VARCHAR(10)	
	)";

	if ($conn->query($sql) === TRUE) {
		echo "Table MyGuests created successfully";
	} else {
		echo "Error creating table: " . $conn->error;
	}

	$conn->close();
?>