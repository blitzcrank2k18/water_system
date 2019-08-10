<?php 
include 'dbcon.php';
    $payment = $_POST['payment'];	
	$delivery_date = $_POST['delivery_date'];
    $or = $_POST['or'];

   
    $user = $_POST['user'];
    $date=date('Y-m-d H:i:s');

    $query=mysqli_query($con,"SELECT * FROM `order` where order_id='$or'")or die(mysqli_error($con));
        $row=mysqli_fetch_array($query);
         $type=$row['order_type'];                      
         $amount=$row['order_total'];  
         $balance = ($amount - $payment);



         if($balance  <= '0'){
            $payment_status = 'Paid';
         }
         else if($balance < $amount){
            $payment_status = 'Partially Paid';
         }
         else if($balance == $amount){
            $payment_status = 'Unpaid';
         }
         
   
        mysqli_query($con,"INSERT INTO `transaction` (order_id,transaction_date,transaction_type,amount) VALUES('$or','$date','Cash','$payment')")or die(mysqli_error($con));
    
    if ($type=="Delivery")
    {
        mysqli_query($con,"INSERT INTO `delivery` (order_id,delivery_date,delivery_status,user_id) VALUES('$or','$delivery_date','pending','$user')")or die(mysqli_error());
    }
   
    mysqli_query($con,"UPDATE `order` SET payment_status='$payment_status',order_status='confirmed', payment = '$payment', balance = '$balance' where order_id='$or'")or die(mysqli_error($con)); 
   
    
echo "
     <script>
        alert('Customer Successfully Added');
        window.location = 'receipt.php?or=$or';
     </script>
";
  
?>