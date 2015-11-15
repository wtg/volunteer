<?php
	require 'resources/connect.php';
	require 'vendor/autoload.php';

    $app = new \Slim\Slim();
    $app->get('/', function() {
    	include('public_html/index.html');
    });

    //Post New
    $app->post('/api/listings', function () use ($app) {
	    $request = $app->request();
	    $sql = "INSERT INTO listings (title, description, location, email) VALUES ('" . $request->post('title') . "', '" . $request->post('description'). "', '" . $request->post('location') . "', '" . $request->post('email') . "')";
	    echo $sql;
	    try {
	    	$db = getConnection();
	    	$db->exec($sql);
	    } catch(PDOException $e) {
	    	echo $e->getMessage();
	    }
	    /*$sql = "INSERT INTO listings (title, description, location, email) VALUES (:title, :description, :location, :email)";
	    try {
	        $db = getConnection();
	        $stmt = $db->prepare($sql);
	        $stmt->bindParam("title", listing->title);
	        $stmt->bindParam("description", $request->post('title'));
	        $stmt->bindParam("location", $request->post('title'));
	        $stmt->bindParam("email", $request->post('title'));
	        $stmt->execute();
	        $db = null;
	        //echo json_encode($stmt);
	    } catch(PDOException $e) {
	        echo $e->getMessage();
	    }*/
	});

	function getConnection() {
    	$dbhost="127.0.0.1";
    	$dbuser="root";
    	$dbpass="root";
    	$dbname="volunteerdb";

    	//Create PDO
    	$dbh = new PDO("mysql:host=$dbhost;", $dbuser, $dbpass);
    	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	
    	//Createa Database
    	$dbinit = "CREATE DATABASE IF NOT EXISTS $dbname COLLATE utf8_general_ci";
    	$dbh->exec($dbinit);
    	$dbh->exec("USE $dbname");

    	//Create Tables
    	$courseInit = "CREATE TABLE IF NOT EXISTS listings(" . 
		"id INT AUTO_INCREMENT, " .
		"title varchar(20) NOT NULL, " .
		"description varchar(1024) NOT NULL, " . 
		"location varchar(255) NOT NULL, " .
		"email varchar(255) NOT NULL, " .
		"PRIMARY KEY (id));";
		$dbh->exec($courseInit);

    	return $dbh;
	}
	$app->run();
?>
