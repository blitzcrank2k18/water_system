<?php 
include 'dbcon.php';
	
	$name = $_POST['name'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];  
    $type_id = $_POST['type_id'];  
    
    mysqli_query($con,"INSERT INTO customer(name,street,barangay,contact_number,type_id)VALUES('$name','$street','$barangay','$contact_number','$type_id')")or die(mysqli_error($con)); 
echo '
     <script>
        alert("Customer Successfully Added");
        window.location = "customers.php";
     </script>
';
  
?>