<?php include 'session.php' ;?>
<?php include 'header.php' ;?>

<style>
    
    #chartdiv {
      width: 100%;
      height: 500px;
    }

    #exportChart {
      font-size: 18px;
      padding: 5px 10px;
      position: absolute;
      top: 30px;
      right: 30px;
      z-index: 10;
    }




</style>
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
        <div class="main-header">
            <h4>Daily Counter</h4>
        </div>
    </div>
    <!-- 4-blocks row start -->
    <div class="row m-b-30 dashboard-header">
               <?php 
                    include 'dbcon.php';     
                    $today=date('Y-m-d');           
                    //echo $today;
                    $query=mysqli_query($con,"SELECT *,COUNT(*) as count FROM delivery natural join `order` natural join customer where delivery_date='$today' group by delivery_status")or die(mysqli_error($con));
                          while ($row=mysqli_fetch_array($query)){
                            if ($row['delivery_status']=="pending")
                              {  
                                $color="warning";
                                $icon="shield";
                                $status = 'To be delivered';
                              }
                            else
                            {
                                $color="success";
                                $icon="check";
                                 $status = 'Already Delivered';
                            }
                ?>  
                <div class="col-lg-3 col-sm-6">
                    <div class="col-sm-12 card dashboard-product">
                        <span><?php echo strtoupper($row['delivery_status']);?></span>
                        <h2 class="dashboard-total-products counter"><?php echo $row['count'];?></h2>
                        <span class="label label-<?php echo $color;?>"><?=$status?></span>
                        <div class="side-box bg-<?php echo $color;?>">
                            <i class="icon-<?php echo $icon;?>"></i>
                        </div>
                    </div>
                </div>
                <?php }?>


                <?php 

                  $date_val = date('Y-m-d');
                    $query12=mysqli_query($con,"SELECT *, CAST(order_date as date), COUNT(order_id) as total FROM `order`  where  order_type = 'Walkin' AND CAST(order_date as date) = '$date_val' ")or die(mysqli_error($con));
                          $row12=mysqli_fetch_array($query12);

                          $order_type = $row12['order_type'];


                ?>    
                <div class="col-lg-3 col-sm-6">
                    <div class="col-sm-12 card dashboard-product">
                        <span>TOTAL WALKIN CUSTOMER</span>
                        <h2 class="dashboard-total-products"><span class="counter"><?php echo $row12['total'];?></span></h2>
                        <span class="label label-danger">Walkin</span>
                        <div class="side-box bg-danger">
                            <i class="icon-rocket"></i>
                        </div>
                    </div>
                </div> 

                <?php 
                    $query1=mysqli_query($con,"SELECT *,COUNT(*) as total FROM delivery natural join `order` natural join customer where delivery_date='$today'")or die(mysqli_error($con));
                          $row1=mysqli_fetch_array($query1);



                ?>    
                <div class="col-lg-3 col-sm-6">
                    <div class="col-sm-12 card dashboard-product">
                        <span>TOTAL DELIVERIES</span>
                        <h2 class="dashboard-total-products"><span class="counter"><?php echo $row1['total'];?></span></h2>
                        <span class="label label-primary">Overall</span>
                        <div class="side-box bg-primary">
                            <i class="icon-social-soundcloud"></i>
                        </div>
                    </div>
                </div>


                  

            </div>
            <!-- 4-blocks row end -->
            
            <!-- 1-3-block row start -->
        <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="main-header">
                            <h4>Pending Deliveries</h4>
                        </div>
                        <div class="card-block">
                            <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Delivery Date</th>
                                            <th>Customer</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Total</th>
                                            <th>Payment Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            include 'dbcon.php';                
                                            $query=mysqli_query($con,"SELECT * FROM delivery natural join `order` natural join customer where delivery_status='pending' order by order_date")or die(mysqli_error($con));
                                                while ($row=mysqli_fetch_array($query)){
                                                ?>  
                                              <tr>
                                                 <td><?php echo $row['order_id'];?>
                                                 <td><?php echo $row['delivery_date'];?>
                                                 <td><?php echo $row['name'];?>
                                                 <td><?php echo $row['contact_number'];?>
                                                 <td><?php echo $row['address'];?></td>
                                                 <td><?php echo $row['order_total'];?></td>
                                                 <td><?php echo $row['payment_status'];?></td>
                                                         
                                              </tr>
                                                             
                                          <?php }?>
                                        </tbody>
                            </table>
                        </div>
                    </div>
                </div>
</div>

            <div class = "row">
                 <div class="main-header">
                    <h4>Overall Statisctics</h4>
                </div>
                <div class = "col-lg-5">
                    <div class = "card">
                        <div class = "main-header">
                            <h4>Overall Data for Order Types</h4>
                        </div>
                         <div class = "card-block" id="chartdiv">
                    </div>
                   
                    </div>
                </div>
            </div>
            
       
        <!-- 1-3-block row end -->

        <!-- 3-1-block start -->
       

   

           
     <?php                   
              $query21=mysqli_query($con,"SELECT *, CAST(order_date as date), COUNT(order_id) as total FROM `order`  where  order_type = 'Walkin' ")or die(mysqli_error($con));
                    $row21=mysqli_fetch_array($query21);
                    $order_type = $row21['order_type'];


     ?>    

     <?php                   
              $query22=mysqli_query($con,"SELECT *, CAST(order_date as date), COUNT(order_id) as total FROM `order`  where  order_type = 'Delivery' ")or die(mysqli_error($con));
                    $row22=mysqli_fetch_array($query22);
                    $order_type = $row22['order_type'];


     ?>   






      <!-- Required Jqurey -->
   <?php include 'index-script.php';?>




   <script type="text/javascript">
    var chart = AmCharts.makeChart("chartdiv", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [{
    "country": "For Delivery",
    "litres": <?php echo $row22['total'];?>
  }, {
    "country": "Walkin",
    "litres": <?php echo $row21['total'];?>,
    "color": "#ff0000"
  }],
  "valueField": "litres",
  "titleField": "country",
  "colorField": "color",
  "balloon": {
    "fixedPosition": true
  }
});
   </script>
</body>

</html>
