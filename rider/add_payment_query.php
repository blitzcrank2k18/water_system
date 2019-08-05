<?php 
include 'dbcon.php';
	$order_id = $_POST['order_id'];
    $date = date('Y-m-d H:i:s');
    $delivery_id = $_POST['delivery_id'];
    $amount = $_POST['amount'];


 
    mysqli_query($con,"INSERT INTO transaction(order_id,transaction_date,transaction_type,amount) 
     VALUES('$order_id','$date','Cash','$amount')")or die(mysqli_error($con)); 



    mysqli_query($con,"UPDATE `order` SET payment_status='Paid' where order_id='$order_id'")or die(mysqli_error($con)); 


    mysqli_query($con,"UPDATE `delivery` SET delivery_status = 'Delivered' where delivery_id='$delivery_id' ")or die(mysqli_error($con)); 


echo '
     <script>
        alert("Payment Successfully Added");
        window.location = "dashboard.php";
     </script>
';
  
?>