<?php 
include 'dbcon.php';
	$payment = $_POST['payment'];
    $payment_method = $_POST['payment_method'];
	$delivery_date = $_POST['delivery_date'];
    $or = $_POST['or'];
    $date=date('Y-m-d H:i:s');

    $query=mysqli_query($con,"SELECT * FROM `order` where order_id='$or'")or die(mysqli_error($con));
        $row=mysqli_fetch_array($query);
         $type=$row['order_type'];                      
         $amount=$row['order_total'];  
         
   
        mysqli_query($con,"INSERT INTO `transaction` (order_id,transaction_date,transaction_type,amount) VALUES('$or','$date','$payment_method','$amount')")or die(mysqli_error($con));
    
    if ($type=="Delivery")
    {
        mysqli_query($con,"INSERT INTO `delivery` (order_id,delivery_date,delivery_status,user_id) VALUES('$or','$delivery_date','pending','$user')")or die(mysqli_error());
    }

    mysqli_query($con,"UPDATE `order` SET payment_status='$payment',order_status='confirmed' where order_id='$or'")or die(mysqli_error($con)); 
   
    
echo "
     <script>
        alert('Customer Successfully Added');
        window.location = 'receipt.php?or=$or';
     </script>
";
  
?>