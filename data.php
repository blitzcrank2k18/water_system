<?php

include 'dbcon.php';
// Connect to MySQL
$link = new mysqli( 'localhost', 'root', '', 'water_refilling' );
if ( $link->connect_errno ) {
  die( "Failed to connect to MySQL: (" . $link->connect_errno . ") " . $link->connect_error );
} 



// Fetch the data
$query = "SELECT CAST(order_date as date), customer_id, SUM(order_total) as total_order_paid FROM `order` LEFT JOIN `transaction` ON transaction.order_id = order.order_id GROUP BY CAST(order_date as date)  ORDER BY order.order_id ";
$result = $link->query( $query );



// All good?
if ( !$result ) {
  // Nope
  $message  = 'Invalid query: ' . $link->error . "n";
  $message .= 'Whole query: ' . $query;
  die( $message );
}

// Set proper HTTP response headers
header( 'Content-Type: application/json' );

// Print out rows
$data = array();
while ( $row = $result->fetch_assoc() ) {



	


  $data[] = $row;
}


echo json_encode( $data );

// Close the connection
mysqli_close($link);

?>