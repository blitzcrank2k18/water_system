<?php
include('dbcon.php');

 if (isset($_POST['update']))
 { 
	 $id = $_POST['customer_id'];
     $name = $_POST['name'];
     $address = $_POST['address'];
     $contact_number = $_POST['contact_number'];

     
	 mysqli_query($con,"UPDATE customer SET name='$name', address = '$address', contact_number = '$contact_number'where customer_id='$id'")
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Customer Successfully updated!');</script>";
		echo "<script>document.location='customers.php'</script>";
	
} 
