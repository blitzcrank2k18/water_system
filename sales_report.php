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

            <center><h4>Total Sales Report  </h4></center>  
            </div>
            <div class = "panel-body" style = "padding:30px">

                <table class = 'table table-bordered'>

                           <thead>
                            <tr>
                                
                                <td>Date</td>
                               
                                <!-- <td>Mode of Payment</td> -->
                                <td>Total Sales <i>(per date)</i></td>

                            </tr>
             </thead>
            
              <?php

              include 'dbcon.php';
                if (isset($_POST['generate'])) {
                   $start = date('Y-m-d', strtotime($_POST['start']));
                   $end = date('Y-m-d', strtotime($_POST['end']));

                   $query = "SELECT CAST(order_date as date), transaction_date,  SUM(order_total) as total_order_total  FROM transaction  LEFT JOIN `order` ON order.order_id = transaction.order_id WHERE CAST(order_date as date)   BETWEEN '$start' AND '$end' AND  order.payment_status = 'Paid' AND transaction_type = 'CASH' GROUP BY CAST(order_date as date)";

                   $data = mysqli_query($con, $query) ;

                   if (!$data) {
                       echo("Error description: " . mysqli_error($con));
                   } else {

                       while ($row = mysqli_fetch_array($data)) {

                          $total = $row['total_order_total'];



                     

                       
                           echo "
                           <tr>
                               
                                <td>" . date('F d, Y', strtotime($row['CAST(order_date as date)'])) . "</td>
                               
                                <td class = 'total_amount'>" . $row['total_order_total'] . "</td>
                               
                              </tr>

                             
                             ";
                       }



                   }
                }
                ?>
            
             </table>

             <div class = "btn btn-success pull-right" readonly>
               Total Sales: Php. <span class = "total_td"></span>
             </div>

             <a class = "btn btn-primary" href = "generate_graph.php?date_start=<?=$start?>&date_end=<?=$end?>">Generate Graph</a>

        </div>

        </div>
        </div>

        
                </div>
            </div>
          
           
        </div>



        <!-- Container-fluid ends -->
    </div>
</div>




<?php include 'scripts.php';?>
<script>

  var sum = 0;
// iterate through each td based on class and add the values
  $(".total_amount").each(function() {

      var value = $(this).text();
      // add only if the value is number
      if(!isNaN(value) && value.length != 0) {
          sum += parseFloat(value);
      }
      $('.total_td').text(sum);
  });
  </script>



</body>

</html>
