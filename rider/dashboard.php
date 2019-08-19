<?php include 'session.php' ;?>
<?php include 'header.php' ;?>
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
        <div class="main-header" style="text-align: center; padding: 15px !important; ">
            <h4>Dashboard</h4>
        </div>
    </div>
    <!-- 4-blocks row start -->
    <div class="row m-b-30 dashboard-header">

        <?php include 'dbcon.php';?>

  

           
             <?php 
                include 'dbcon.php';    
                date_default_timezone_set('Asia/Manila');
                $date = Date('m/d/y',strtotime("+3 days"));
                $query1=mysqli_query($con,"SELECT * FROM delivery LEFT JOIN `order` ON order.order_id = delivery.order_id LEFT JOIN customer ON customer.customer_id = order.customer_id WHERE user_id = $session_id AND delivery_status = 'pending'")or die(mysqli_error($con));
                    while ($row=mysqli_fetch_array($query1)){
                    $id=$row['delivery_id'];     
                    $status = $row['payment_status'];  
                    $balance  = $row['balance'];

                    if($balance <= 0){
                        $balance = 'Already Paid';
                    }
                    else{
                        $balance = 'Php.'.$balance;
                    }

            ?>  
                  <a href = "view_details.php?id=<?=$row['customer_id']?>&delivery_id=<?=$row['delivery_id']?>">
            <div class="col-lg-3 col-sm-6">
                <div class="col-sm-12 card dashboard-product">
                    <h4><b><?=$row['name']?></b></h4>
                    <h2 class="dashboard-total-products"><span></span><?=$balance?></h2>

                     
                  <?php
                    if($status == 'Unpaid'){
                        echo '  <span class="label label-danger">'.$row["payment_status"].'</span>' ;   
                    }
                    else if($status == 'Paid'){
                        echo '  <span class="label label-success">'.$row["payment_status"].'</span>' ; 
                    }
                    else if($status =='Partially Paid'){
                        echo '  <span class="label label-warning">'.$row["payment_status"].'</span>' ; 
                    }

                   ?>

                   <p><?=$row['address']?></p>


                    <?php
                    if($status == 'Unpaid'){
                        echo '<div class="side-box bg-danger">
                        <i class="icon-social-soundcloud"></i>
                    </div>';
                        }
                    else if($status == 'Paid'){
                        echo '<div class="side-box bg-success">
                        <i class="icon-social-soundcloud"></i>
                    </div>';    
                        }
                    else if($status == 'Partially Paid'){
                        echo '<div class="side-box bg-warning">
                        <i class="icon-social-soundcloud"></i>
                    </div>';    
                        }
                    ?>
                   
                </div>
            </div>
        <?php } ?>
        </a>
    </div>

        <!-- 1-3-block row end -->

        <!-- 3-1-block start -->
       

   

           
    






      <!-- Required Jqurey -->
   <?php include 'index-script.php';?>
</body>

</html>
