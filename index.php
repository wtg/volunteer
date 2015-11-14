<?php
	require "resources/connect.php";
	require 'vendor/autoload.php';

	try {
		$conn = new PDO("mysql:host=$server;", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
    	echo "Connection failed: " . $e->getMessage();
    }

    $app = new \Slim\Slim();
    $app->get('/', function() {
    	echo "You're home!";
    });
    $app->get('/hello/:name', function ($name) {
    	echo "Hello, " . $name;
	});
	$app->run();
?>