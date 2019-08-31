<?php 
include 'dbcon.php';
	
	$firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $pin_number = $_POST['pin_number'];
    $address = $_POST['address'];
    $sex = $_POST['sex'];
    $birthday = $_POST['birthday'];
    $mobile_number = $_POST['mobile_number'];
    $position = $_POST['position'];
    
    mysqli_query($con,"INSERT INTO personel(firstname,lastname,pin_number,address,sex,birthday,mobile_number,position) 
     VALUES('$firstname','$lastname','$pin_number','$address', '$sex', '$birthday', '$mobile_number', '$position')")or die(mysqli_error($con)); 
echo '
     <script>
        alert("Personel Successfully Added");
        window.location = "personel.php";
     </script>
';
  
?>