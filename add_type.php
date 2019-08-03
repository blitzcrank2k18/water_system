<?php 
include 'dbcon.php';
	
	$type = $_POST['type'];
    $discount = $_POST['discount'];
    
    mysqli_query($con,"INSERT INTO type(type,discount)VALUES('$type','$discount')")or die(mysqli_error($con)); 
echo '
     <script>
        alert("Customer Successfully Added");
        window.location = "type.php";
     </script>
';
  
?>