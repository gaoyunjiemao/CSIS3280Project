<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "recipemanagementdb";

try{
	//Define connection object
	$dbConn = new PDO("mysql:host = $serverName;dbname=$dbName", $userName, $password);

	//Define error mode
	$dbConn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	//Feedback message
	// print "Connected to recipemanagementdb database successfully!";

	}catch(PDOExcpetion $ex){
	print "Failed";
}
?><?php

?>
