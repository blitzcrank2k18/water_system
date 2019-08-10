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
                        <h4>Sales Reports</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Reports</a>
                            
                            </li>
                            <li class="breadcrumb-item"><a href="payment_reports.php">Sales Reports</a>
                            
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
                       <div class="input-daterange input-group" id="datepicker">
                            <input type="text" class="input-sm form-control start" name="start" autocomplete="off" />
                            <span class="input-group-addon">to</span>
                            <input type="text" class="input-sm form-control end"  name="end"autocomplete="off"/>
                       </div>
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
                                <td>Customer Name</td>
                                <td>Transaction Date</td>
                                <td>Address</td>
                                <!-- <td>Mode of Payment</td> -->
                                <td>Amount</td>

                            </tr>
             </thead>
            
              <?php

              include 'dbcon.php';
                //     $mysqli = new mysqli('localhost', 'root', '', 'water_refilling');

                // if (mysqli_connect_error()) {
                //     echo mysqli_connect_error();
                //     exit();
                // }

               
             

                if (isset($_POST['generate'])) {
                   $start = date('Y-m-d', strtotime($_POST['start']));
                   $end = date('Y-m-d', strtotime($_POST['end']));
                   $query = "SELECT * FROM transaction  LEFT JOIN `order` ON order.order_id = transaction.order_id WHERE transaction_date BETWEEN '$start' AND '$end' AND  order.payment_status = 'Paid' AND transaction_type = 'CASH' GROUP BY transaction.order_id";

                   $data = mysqli_query($con, $query) ;

                   if (!$data) {
                       echo("Error description: " . mysqli_error($con));
                   } else {

                       while ($row = mysqli_fetch_array($data)) {

                       
                           echo "
                           <tr>
                               
                                <td>" . $row['transaction_date'] . "</td>
                               
                                <td>" . $row['amount'] . "</td>
                                
                               
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
