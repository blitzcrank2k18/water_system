<?php
include('dbcon.php');

 if (isset($_POST['update']))
 { 
	 $id = $_POST['user_id'];
     $firstname = $_POST['firstname'];
     $lastname = $_POST['lastname'];
     $username = $_POST['username'];
     $password = $_POST['password'];
     $user_type = $_POST['user_type'];
     $status = $_POST['status'];

    $pass=md5($password);
    $salt="a1Bz20ydqelm8m1wql";
    $pass=$salt.$pass;
     
	 mysqli_query($con,"UPDATE user SET firstname='$firstname', lastname = '$lastname', username = '$username', password = '$pass', user_type = '$user_type', status = '$status' where user_id='$id'")
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('User Successfully updated!');</script>";
		echo "<script>document.location='users.php'</script>";
	
} 

