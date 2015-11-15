<?php
	require 'resources/connect.php';
	require 'vendor/autoload.php';

    $app = new \Slim\Slim();
    $app->get('/', function() {
    	include('public_html/index.html');
    });
    
    //Post New
    $app->get('/api/listings', function () use ($app) {
	    $request = $app->request();
	    $listing = json_decode($request->getBody());
	    class testClass {
	    	public $id = 1;
	    	public $title = "test";
	    	public $description = "test listing";
	    	public $location = "Sesame street";
	    	public $email = "russor3@rpi.edu";
	    }
	    $listing = new testClass;
	    $sql = "INSERT INTO listings (title, description, location, email) VALUES (:title, :description, :location, :email)";
	    try {
	        $db = getConnection();
	        $stmt = $db->prepare($sql);
	        $stmt->bindParam("title", $listing->title);
	        $stmt->bindParam("description", $listing->description);
	        $stmt->bindParam("location", $listing->location);
	        $stmt->bindParam("email", $listing->email);
	        $stmt->execute();
	        $db = null;
	        //echo json_encode($stmt);
	    } catch(PDOException $e) {
	        echo $e->getMessage();
	    }
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
