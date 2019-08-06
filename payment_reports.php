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
                        <h4>Payment Reports</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Reports</a>
                            
                            </li>
                            <li class="breadcrumb-item"><a href="payment_reports.php">Payment Reports</a>
                            
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
            
                <?php if (isset($_POST['generate']))
                {
                    include 'dbcon.php'; 
                    echo "<h4 style='text-align:center;'>Payment Report From ";
                    $start=$_POST['start'];
                    echo $start;
                    echo " to ";
                    $end=$_POST['end'];
                    echo $end."</h4>";
                  
                    //echo "<h4 style='text-align:center'>".$branch." Branch</h4>";
                    
                            $query1=mysqli_query($con,"SELECT * FROM `transaction` natural join product natural join order_details where transaction_date between '$start' and '$end' group by product_id")or die(mysqli_error($con));
                   
                   
                   
                }
                ?>
            
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
