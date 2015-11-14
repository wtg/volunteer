<?php
	require "resources/connect.php";

	try {
		$conn = new PDO("mysql:host=$server;", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	echo "Connected successfully"; 
	} catch(PDOException $e) {
    	echo "Connection failed: " . $e->getMessage();
    }
?>