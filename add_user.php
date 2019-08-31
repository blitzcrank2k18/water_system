<?php 
include 'dbcon.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $user_type = $_POST['user_type'];
  
    $pass=md5($password);
    $salt="a1Bz20ydqelm8m1wql";
    $pass=$salt.$pass;
    
    mysqli_query($con,"INSERT INTO user(username,password,firstname,lastname,status,user_type) 
     VALUES('$username','$pass','$firstname','$lastname', 'Active' , '$user_type')")or die(mysqli_error($con)); 
echo '
     <script>
        alert("User Successfully Added");
        window.location = "users.php";
     </script>
';
  
?>