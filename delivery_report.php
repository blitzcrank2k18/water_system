<?php include 'session.php';?>
<?php include 'header.php';?>

<body class="sidebar-mini fixed">
<div class="wrapper">
      <div class="loader-bg">
    <div class="loader-bar">
    </div>
  </div>
<?php include 'nav-header.php';?>
      </div>
      <!-- search end -->
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
<?php include 'side-nav.php';?>

    <div class="content-wrapper">
        <!-- Container-fluid starts -->
        <div class="container-fluid">

            <!-- Header Starts -->
            <div class="row">
                <div class="col-sm-12 p-0">
                    <div class="main-header">
                        <h4>Delivery Reports</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Reports</a>
                            
                            </li>
                            <li class="breadcrumb-item"><a href="payment_reports.php">Delivery Reports</a>
                            
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- Header end -->

            <!-- Tables start -->
            <!-- Row start -->
            <div class="row">
                <div class="col-sm-12">


                 <div class = "col-sm-3">
                    <form method  = "POST">
                      <label>Date Range</label>
                       <div class="input-daterange input-group" id="datepicker">

                            <input type="text" class="input-sm form-control start" name="start" autocomplete="off" required="" />
                            <span class="input-group-addon">to</span>
                            <input type="text" class="input-sm form-control end"  name="end"autocomplete="off" required="" />
                       </div>
                       <br/>
                       <div class="input-input-group">
                        <label>Delivery Personel</label>
                            <select name = "user_id" class= "form-control">
                                <option selected disabled> Select Delivery Boy </option>
                                <?php
                                 include 'dbcon.php';
                                 $query1=mysqli_query($con,"SELECT * FROM user WHERE user_type = 'Delivery Personel' ")or die(mysqli_error($con));
                                  while ($row=mysqli_fetch_array($query1)){

                                    $id = $row['user_id']
                                 
                                ?>
                                <option value = "<?=$row['user_id'];?>"><?=$row['firstname']. " " .$row['lastname']?></option>

                              <?php } ?>
                            </select>


                       </div>
                       <br/>
                       <button class = "btn btn-primary btn-block filter" name = "generate" style = "margin-top: 5px;">Find</button>
                    </form>
                </div>
<br/>
    <div class = "col-lg-12">
        <div class = "panel" style = "margin-top :10px;">
            <div class = "panel-heading">
                <table class = 'table table-bordered'>

                           <thead>
                            <tr>
                                <td>Delivery Personel</td>
                                <td>Date Ordered</td>
                                <td>Date Delivered</td>
                                <td>Customer Name </td>
                           
                                
                                

                            </tr>
             </thead>
            
              <?php
              include 'dbcon.php';
                if (isset($_POST['generate'])) {
                   $start = date('Y-m-d', strtotime($_POST['start']));
                   $end = date('Y-m-d', strtotime($_POST['end']));
                   $id  =$_POST['user_id'];
                   

                   $query = "SELECT * FROM delivery LEFT JOIN `order` ON `order`.order_id = delivery.order_id LEFT JOIN customer ON customer.customer_id = `order`.customer_id LEFT JOIN user ON user.user_id = delivery.user_id WHERE `order`.order_date BETWEEN '$start' AND '$end' AND delivery.delivery_status ='delivered' AND delivery.user_id = '$id' ORDER BY delivery.delivery_date";

                   // $query = "SELECT * FROM delivery LEFT JOIN `order` ON `order`.order_id = delivery.order_id WHERE `order`.order_date BETWEEN '$start' AND '$end'";

                   $data = mysqli_query($con, $query) ;

                   if (!$data) {
                       echo("Error description: " . mysqli_error($con));
                   } else {

                       while ($row2 = mysqli_fetch_array($data)) {

                        $customer_name = $row2['name'];

                       
                           echo "
                           <tr>
                                <td>" . $row2['firstname'] . " " .$row2['lastname'] . "</td>
                                <td>" . date('F d, Y', strtotime($row2['order_date'])) . "</td>
                                <td><span class = 'badge badge-success'>" . date('F d, Y', strtotime($row2['delivery_date'])) . "</span></td>
                                 <td>" . $customer_name. "</td>
                                
                               
                              </tr>
                             ";
                       }
                   }
                }
                ?>
            
             </table>
        </div>
        </div>
        </div>
                </div>
            </div>
            <!-- Row end -->
            <!-- Tables end -->
        </div>

        <!-- Container-fluid ends -->
    </div>
</div>




<?php include 'scripts.php';?>
<script>
 //$('.filter').on('click', function(){
  //var  start  =  $('.start').val();
  // var end =  $('.end').val();

 // alert(start);
   
 //})
</script>


</body>

</html>
