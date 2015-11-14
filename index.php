<?php
	require "resources/connect.php";

	try {
		$conn = new PDO("mysql:host=$server;", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	echo "Connected successfully";
	} catch(PDOException $e) {
    	echo "Connection failed: " . $e->getMessage();
    }

    $init = "CREATE DATABASE IF NOT EXISTS volunteer";
    $conn->exec($init);
?>
<!DOCTYPE html>
<html>
<head>
	<title>RPI Hackathan Volunteer App</title>
</head>
<body>
	<h1>Testing the application. Yes it works!</h1>
</body>
</html>
