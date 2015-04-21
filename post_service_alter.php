<?php
	//variables for connect to
	$hostName = "127.0.0.1";
	$userName = "root";
	$userPass = "fox123";
	$dbName   = "reportsdb";

	// Create connection
	$con = mysqli_connect($hostName, $userName, $userPass, $dbName);

	// Check connection
	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	if (isset($_REQUEST)) 
	{
		$http_body = file_get_contents('php://input');
		$data = json_decode($http_body, true);


		$var_name = $data['name'];
	    $var_address = $data['address'];
	    $var_latitude = $data['latitude'];
	    $var_longitude = $data['longitude'];
	    $var_datetime = $data['datetime'];

	    //SQL query
	    $insertProfile = "INSERT INTO reports_table (id_repport, name, address, latitude, longitude, datetime) 
	       			      VALUES (null,'". $var_name ."','". $var_address ."','". $var_latitude ."','". $var_longitude ."','". $var_datetime ."')";

	    mysqli_query($con, $insertProfile) or die (mysqli_error("Insert item's profile failed"));

	    echo "Item added successfully!";
		
	}
	mysql_close();

?>