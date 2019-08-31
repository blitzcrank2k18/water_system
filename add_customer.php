<?php 
include 'dbcon.php';
	
	$name = $_POST['name'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];  
    $type_id = $_POST['type_id'];  
    
    mysqli_query($con,"INSERT INTO customer(name,address,contact_number,type_id)VALUES('$name','$address','$contact_number','$type_id')")or die(mysqli_error($con)); 
echo '
     <script>
        alert("Customer Successfully Added");
        window.location = "customers.php";
     </script>
';
  
?>