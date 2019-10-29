<?php include 'session.php' ;?>
<?php include 'header.php' ;?>

<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<style>
    
    #mycanvas {
      width: 200%;
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

#chartdiv2 {
  width: 100%;
  height: 430px;
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

      <div class = "col-md-12">
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
                        <small><?php echo strtoupper($row['delivery_status']);?></small>
                        <h6 class="dashboard-total-products counter"><?php echo $row['count'];?></h6>
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
                        <small>TOTAL WALK-IN</small>
                        <h6 class="dashboard-total-products"><span class="counter"><?php echo $row12['total'];?></span></h6>
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
                        <small>TOTAL DELIVERIES</small>
                        <h6 class="dashboard-total-products"><span class="counter"><?php echo $row1['total'];?></span></h6>
                        <span class="label label-primary">Overall</span>
                        <div class="side-box bg-primary">
                            <i class="icon-social-soundcloud"></i>
                        </div>
                    </div>
                </div>

                <?php    
                     $quer=mysqli_query($con,"SELECT SUM(order_total) as total_walk FROM `order`  where  order_type = 'Walkin' ")or die(mysqli_error($con));
                        $rowz=mysqli_fetch_array($quer);
                         // $order_type = $row24['order_type'];
                  ?> 

                   <?php    
                     $quer2=mysqli_query($con,"SELECT SUM(order_total) as total FROM `order`  where  order_type = 'Delivery' ")or die(mysqli_error($con));
                        $rowz1=mysqli_fetch_array($quer2);
                         // $order_type = $row24['order_type'];
                  ?> 
                

</div>

<!-- <div class="col-lg-6 col-sm-6">
                    <div class="col-sm-12 card dashboard-product">
                        <h4/>Overall Total Sales Walkin and For Delivery</h4>

                        <div class = "panel-heading">
                            <h4>Walkin <span class = "label label-warning dashboard-total-products counter"><?=$rowz['total_walk']?></span></h4>
                            <h4>For Delivery <span class = "label label-success dashboard-total-products counter"><?=$rowz1['total']?></span></h4>
                        </div>
                        
                      <div id="chartdiv2"></div>
                  </div>
</div> -->


<div class  = "col-lg-12">
  <div class = "col-lg-12">
     <div class = "card">
       <div class = "main-header">
          <h4>Overall Data for Barangay</h4>
        </div>
        <div class = "card-block">
        <!--   <h4>Walkin <span class = "label label-warning dashboard-total-products counter"><?=$rowz['total_walk']?></span></h4>
          <h4>For Delivery <span class = "label label-success dashboard-total-products counter"><?=$rowz1['total']?></span></h4> -->
        </div>

          <canvas class ="card-block" id="mycanvas"></canvas>
      </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>


<div class  = "col-lg-12">
  <div class = "col-lg-12">
     <div class = "card">
        <div class = "main-header">
          <h4/>Overall Total Sales Walkin and For Delivery</h4>
        </div>
        <div class = "card-block">
          <h4>Walkin <span class = "label label-warning dashboard-total-products counter"><?=$rowz['total_walk']?></span></h4>
          <h4>For Delivery <span class = "label label-success dashboard-total-products counter"><?=$rowz1['total']?></span></h4>
        </div>
          <div class = "card-block" id="chartdiv2"></div>                   
    </div>
  </div>
</div>
                  

  </div>
   

  
      <?php 
        $query21=mysqli_query($con,"SELECT *,COUNT(*) as total_count FROM delivery natural join `order` natural join customer WHERE order.order_type = 'delivery' ")or die(mysqli_error($con));
        $row21=mysqli_fetch_array($query21);
       ?>   

      <?php    
         $query22=mysqli_query($con,"SELECT *, CAST(order_date as date), COUNT(order_id) as total_id FROM `order`  where  order_type = 'Walkin' ")or die(mysqli_error($con));
            $row22=mysqli_fetch_array($query22);
             $order_type = $row22['order_type'];
      ?>  




      <?php    
         $query23=mysqli_query($con,"SELECT SUM(order_total) as total FROM `order`  where  order_type = 'delivery' ")or die(mysqli_error($con));
            $row23=mysqli_fetch_array($query23);
             // $order_type = $row23['order_type'];
      ?>  

      <?php    
         $query24=mysqli_query($con,"SELECT SUM(order_total) as total_walk FROM `order`  where  order_type = 'Walkin' ")or die(mysqli_error($con));
            $row24=mysqli_fetch_array($query24);
             // $order_type = $row24['order_type'];
      ?> 


      <!-- Required Jqurey -->
   <?php include 'index-script.php';?>




<script type="text/javascript">
  var chart = AmCharts.makeChart("chartdiv", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [{
    "country": "For Delivery",
    "litres": <?php echo $row21['total_count'];?>
  }, {
    "country": "Walkin",
    "litres": <?php echo $row22['total_id'];?>
  }],
  "valueField": "litres",
  "titleField": "country",
  "colorField": "color",
  "balloon": {
    "fixedPosition": true
  }
});


  var chart = AmCharts.makeChart("chartdiv2", {
  "type": "pie",
  "theme": "dark",
  "dataProvider": [{
    "country": "Walkin",
    "litres": <?php echo $row24['total_walk'];?>    
  }, {
    "country": "For Delivery",
    "litres": <?php echo $row23['total'];?>
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
