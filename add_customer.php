<?php 
include 'dbcon.php';
	
	$name = $_POST['name'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];  
    $type = $_POST['type'];  
    
    mysqli_query($con,"INSERT INTO customer(name,address,contact_number,type)VALUES('$name','$address','$contact_number','$type')")or die(mysqli_error($con)); 
echo '
     <script>
        alert("Customer Successfully Added");
        window.location = "customers.php";
     </script>
';
  
?>