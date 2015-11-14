<?php
	require 'resources/connect.php';
	require 'vendor/autoload.php';

	try {
		$conn = new PDO("mysql:host=$server;", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
    	echo "Connection failed: " . $e->getMessage();
    }

    $app = new \Slim\Slim();
    $app->get('/', function() {
    	include('public_html/index.html');
    });
    $app->get('/api/listings', function() {
    	echo "OH SHIT";
    });

	/*function addListing() {
	    $request = Slim::getInstance()->request();
	    $wine = json_decode($request->getBody());
	    $sql = "INSERT INTO wine (name, grapes, country, region, year, description) VALUES (:name, :grapes, :country, :region, :year, :description)";
	    try {
	        $db = getConnection();
	        $stmt = $db->prepare($sql);
	        $stmt->bindParam("name", $wine->name);
	        $stmt->bindParam("grapes", $wine->grapes);
	        $stmt->bindParam("country", $wine->country);
	        $stmt->bindParam("region", $wine->region);
	        $stmt->bindParam("year", $wine->year);
	        $stmt->bindParam("description", $wine->description);
	        $stmt->execute();
	        $wine->id = $db->lastInsertId();
	        $db = null;
	        echo json_encode($wine);
	    } catch(PDOException $e) {
	        echo '{"error":{"text":'. $e->getMessage() .'}}';
	    }
	}*/
	$app->run();
?>
