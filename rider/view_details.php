<?php include 'session.php' ;?>
<?php include 'header.php' ;?>

<?php $id = $_GET['id'];?>
<?php $did = $_GET['delivery_id'];?>
 <body class="sidebar-mini fixed">
    <div class="loader-bg">
        <div class="loader-bar">
        </div>
    </div>
    <div class="wrapper">
    <!--   <div class="loader-bg">
    <div class="loader-bar">
    </div>
</div> -->
<!-- Navbar-->
<?php include 'nav-header.php';?>
</div>
<!-- Sidebar chat end-->
<div class="content-wrapper">

   <!-- Container-fluid starts -->
   <!-- Main content starts -->
   <div class="container-fluid">
    <div class="row">
        <div class="main-header" style="text-align: center">
            
        </div>
    </div>
    <!-- 4-blocks row start -->
    <div class="row m-b-30 dashboard-header" style="padding:">

        <?php include 'dbcon.php';?>

    <div class = "card" >
        <div class = "card-header ">
          <a href = "dashboard.php"><i class = "icon-arrow-left icon-small"></i></a><span class = "gen"> General Information</span>
        </div>
        <div class = "card-block">

             <?php 
                include 'dbcon.php';    
                date_default_timezone_set('Asia/Manila');
               
                $query1=mysqli_query($con,"SELECT * FROM delivery LEFT JOIN `order` ON order.order_id = delivery.order_id LEFT JOIN customer ON customer.customer_id = order.customer_id LEFT JOIN order_details ON order.order_id = order_details.order_id WHERE customer.customer_id = '$id' AND delivery_id = $did ")or die(mysqli_error($con));
                    $row=mysqli_fetch_array($query1);
                    $id2=$row['delivery_id'];   
                    $or = $row['order_id'];                   
            ?>  
            <table class = "table table-responsive tec">
                    <tr>
                        <td>Name : </td>
                        <td><?=$row['name']?></td>
                    </tr>
                    <tr>
                        <td>Address : </td>
                        <td><?=$row['address']?></td>
                    </tr>
                     <tr>
                        <td>Contact : </td>
                        <td><?=$row['contact_number']?></td>
                    </tr>
                     <tr>
                        <td>Total : </td>
                        <td><a href = "#">Php. <?=$row['balance']?></a></td>
                    </tr>

                         <?php 
                                                          
                             $query=mysqli_query($con,"SELECT * FROM order_details LEFT JOIN `order` ON order.order_id = order_details.order_id LEFT JOIN product ON product.product_id = order_details.product_id LEFT JOIN customer ON customer.customer_id = order.customer_id WHERE order.customer_id = '$id' AND order_details.order_id  = '$or' ")or die(mysqli_error($con));
                            while ($row1=mysqli_fetch_array($query)){


                                                                
                         ?>  

                    <tr>
                        <td>
                            Qty.
                        </td>
                        <td><?=$row1['order_qty']?></td>
                    </tr>
                    <tr>
                        <td>
                            Product Name
                        </td>
                        <td><?=$row1['product_name']?></td>
                    </tr>

                <?php }?>
            </table>

            <form method="POST">

            <input type = "hidden" name = "delivery_id" value = "<?=$row['delivery_id']?>">
            <input type = "hidden" name = "order_id" value = "<?=$row['order_id']?>">
           

            

          <?php 
            $status = $row['payment_status'];
            if( $status == 'Unpaid' || $status == 'Partially Paid' ) {
                echo '<a href  = "#myModal'.$row['delivery_id'].'" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal'.$row['delivery_id'].'">
                          Mark as Paid
                     </a>';
            }
            else{
                echo '<button class = "btn btn-small btn-primary btn-block" name = "delivered">Delivered</button>';
            }

          ?>

        </form>

        <?php
            include('dbcon.php');

             if (isset($_POST['delivered']))
             { 
                 $id = $_POST['delivery_id'];
                
                 
                 mysqli_query($con,"UPDATE delivery SET delivery_status='delivered' where delivery_id='$id'")
                 or die(mysqli_error($con)); 

                    echo "
                     <div id = 'spinner' >
                        <img src = 'assets/images/spinner.gif'/>
                    </div>";
                    echo "<script>
                    window.setTimeout(function(){
                        window.location.href = 'dashboard.php';
                    }, 3000);
                   </script>";
                
            } 
        ?>

        <?php
            include('dbcon.php');

             if (isset($_POST['add_payment']))
             { 
                 $id = $_POST['delivery_id'];
                
                 
                 mysqli_query($con,"UPDATE delivery SET delivery_status='delivered' where delivery_id='$id'")
                 or die(mysqli_error($con)); 

                    echo "
                     <div id = 'spinner' >
                        <img src = 'assets/images/spinner.gif'/>
                    </div>";
                    echo "<script>
                    window.setTimeout(function(){
                        window.location.href = 'dashboard.php';
                    }, 3000);
                   </script>";
                
            } 
        ?>
       
          
            
        </div>
    </div>

        
    </div>


    <div class="modal" id="myModal<?=$row['delivery_id']?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <span class="modal-title"></span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form method = "POST" action = "add_payment_query.php">
                <div class = "form-group">
                    <input type = "hidden" class = "form-control" name = "order_id" value = "<?=$or?>">
                    <input type = "hidden" class = "form-control" name = "delivery_id" value = "<?=$id2?>">
                    <input type = "hidden" class = "form-control" name = "amount" value = "<?=$row['balance']?>">
                   <center> Are you sure this customer is already paid ?</center> 
                </div>
                
                <div class = "form-group">
                    <button  class ="btn btn-primary btn-block" name = "submit">Submit as paid</button>
                </div>
            </form>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
      <!-- Required Jqurey -->
   <?php include 'index-script.php';?>
</body>

</html>
