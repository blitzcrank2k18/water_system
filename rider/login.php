<?php session_start();

include('dbcon.php');

// $user_unsafe=$_POST['username'];
$pass_unsafe=$_POST['password'];

// $user = mysqli_real_escape_string($con,$user_unsafe);
$pass1 = mysqli_real_escape_string($con,$pass_unsafe);
$pass=md5($pass1);
$salt="a1Bz20ydqelm8m1wql";
$pass=$salt.$pass;


$query=mysqli_query($con,"select * from user where password='$pass' AND user_type = 'Delivery Personel' and status = 'Active' ")or die(mysqli_error($con));

		$row=mysqli_fetch_array($query);
           $id=$row['user_id'];   

           $counter=mysqli_num_rows($query);

		  	if ($counter > 0) 
			  {	
                $_SESSION['id']=$id;	
				  echo "True";
			  } 
			  else
			  {
			  	echo "False";  
			  }
?>