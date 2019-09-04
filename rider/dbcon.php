<?php
$con = mysqli_connect("localhost","root","l3@d1ng2020!","water_refilling");
// $con = mysqli_connect("localhost","root","","water_refilling");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
