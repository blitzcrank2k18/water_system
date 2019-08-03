<?php 
include 'dbcon.php';
	$customer = $_POST['customer'];
	$qty = $_POST['qty'];
    $product = $_POST['product'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $date=date('Y-m-d H:i:s');
    

    $query=mysqli_query($con,"SELECT * FROM customer natural join type where customer_id='$customer'")or die(mysqli_error($con));
        $row=mysqli_fetch_array($query);
         $type1=$row['type'];                      
         $discount=$row['discount'];   
         $delivery_charge=$row['delivery_charge']; 
                                              
     mysqli_query($con,"INSERT INTO `order` (customer_id,order_date,order_type) VALUES('$customer','$date','$type')")or die(mysqli_error());

     $id = mysqli_insert_id($con);
     $i=0;
     $total=0;
    foreach($qty as $value) {  
        if ($value<>0)
        {
            $subtotal=$price[$i]*$value;
      mysqli_query($con,"INSERT INTO order_details (order_id,product_id,order_qty,order_price,total) VALUES('$id','$product[$i]','$value','$price[$i]','$subtotal')")or die(mysqli_error($con));
            $total=$total+($price[$i]*$value);
        }
        $i++;           
    
    }

    if ($type1=="Vendor")
    {     
        $disc=$total*$discount/100;
      //  echo $disc;
        $total=$total-$disc;

        mysqli_query($con,"UPDATE `order` SET order_total='$total',disc='$disc' where order_id='$id'")
     or die(mysqli_error($con)); 
    }
    elseif ($type1=="Household" and $type=="Delivery")
    {     
        $charge=$total*$delivery_charge/100;
        $total=$total+$charge;
     //   echo $charge;
         mysqli_query($con,"UPDATE `order` SET order_total='$total',charge='$charge' where order_id='$id'")
     or die(mysqli_error($con)); 
    }
    
echo "
     <script>
        alert('Customer Successfully Added');
        window.location = 'payment.php?or=$id';
     </script>
";
  
?>