<?php
include('dbcon.php');

 if (isset($_POST['update']))
 { 
	 $id = $_POST['personel_id'];
     $firstname = $_POST['firstname'];
     $lastname = $_POST['lastname'];
     $pin_number = $_POST['pin_number'];
     $address = $_POST['address'];
     $sex = $_POST['sex'];
     $birthday = $_POST['birthday'];
     $mobile_number = $_POST['mobile_number'];
     // $status = $_POST['status'];
     $position = $_POST['position'];
     
	 mysqli_query($con,"UPDATE personel SET firstname='$firstname', lastname = '$lastname', pin_number = '$pin_number', address = '$address', sex = '$sex', birthday = '$birthday', mobile_number = '$mobile_number', position = '$position'  where personel_id='$id'")
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Personel Successfully updated!');</script>";
		echo "<script>document.location='personel.php'</script>";
	
} 

