<?php
	require 'vendor/autoload.php';

    $app = new \Slim\Slim();
    $app->get('/', function() {
    	include('public_html/index.html');
    });

    //Post New
    $app->post('/api/addListings', function () use ($app) {
	    $request = $app->request();
	    $sql = "INSERT INTO listings (title, description, location, date, email) VALUES ('" 
	    	. $request->post('title') . "', '"
	    	. $request->post('description'). "', '"
	    	. $request->post('location') . "', '"
	    	. $request->post('time') . "', '"
	    	. $request->post('email') . "')";
	    echo $sql;
	    try {
	    	$db = getConnection();
	    	$db->exec($sql);
	    	$app->redirect('/volunteer/#/listings');
	    } catch(PDOException $e) {
	    	echo $e->getMessage();
	    }
	});

	$app->get('/api/listings/', function () use ($app) {
		$request = $app->request();
		$db = getConnection();
		$sql = $db->prepare("SELECT * FROM listings");
		$sql->execute();
		echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
	});

	$app->get('/api/listings/:id', function($id) use ($app) {
		$request = $app->request();
		$db = getConnection();
		$sql = $db->prepare("SELECT * FROM listings WHERE id = " . $id);
		$sql->execute();
		echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
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
		"title varchar(100) NOT NULL, " .
		"description varchar(1024) NOT NULL, " . 
		"location varchar(255) NOT NULL, " .
		"date varchar(20) NOT NULL, " .
		"email varchar(255) NOT NULL, " .
		"PRIMARY KEY (id));";
		$dbh->exec($courseInit);

    	return $dbh;
	}
	$app->run();
?>
