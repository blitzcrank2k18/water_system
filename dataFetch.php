<?php

header('content-type: application/json');

define('DB_HOST','127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD','');
define('DB_NAME', 'water_refilling');

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed" . $mysqli->error);
}



	$query = sprintf("SELECT barangay, sum(order.order_total) as total FROM `order`,`customer` where customer.customer_id = `order`.customer_id GROUP BY customer.barangay");

	$result = $mysqli->query($query);

	$data = array();
	foreach ($result as $row) {
		$data[] = $row;

	}

	



$mysqli->close();

print json_encode($data);


 ?>


 
 