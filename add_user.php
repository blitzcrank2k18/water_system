<?php 
include 'dbcon.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
  
    $pass=md5($password);
    $salt="a1Bz20ydqelm8m1wql";
    $pass=$salt.$pass;
    
    mysqli_query($con,"INSERT INTO user(username,password,firstname,lastname,status) 
     VALUES('$username','$pass','$firstname','$lastname', 'Active')")or die(mysqli_error($con)); 
echo '
     <script>
        alert("User Successfully Added");
        window.location = "users.php";
     </script>
';
  
?>