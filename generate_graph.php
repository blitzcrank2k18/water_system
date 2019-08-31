<?php
	$dbHost = "localhost";
	$dbDatabase = "water_refilling";
	$dbPasswrod = "";
	$dbUser = "root";


	$mysqli = mysqli_connect($dbHost, $dbUser, $dbPasswrod, $dbDatabase);
?>
<?php

$start = $_GET['date_start'];
$end = $_GET['date_end'];


include 'dbcon.php';


	/* Getting demo_viewer table data */
	// $sql = "select SUM(order_total) from `order` natural join transaction natural join product group by MONTH(date_added)+'-'+YEAR(date_added)";
	// $sql = "SELECT SUM(order_total) as count FROM `order` 
	// 		GROUP BY YEAR(order_date) ORDER BY order_date";
	// $viewer = mysqli_query($mysqli,$sql);
	// $viewer = mysqli_fetch_all($viewer,MYSQLI_ASSOC);
	// $viewer = json_encode(array_column($viewer, 'count'),JSON_NUMERIC_CHECK);


	/* Getting demo_click table data */
	$sql = "SELECT SUM(order_total) as count, CAST(order_date as date) FROM `order` WHERE CAST(order_date as date) BETWEEN '$start' AND '$end' GROUP BY CAST(order_date as date)  ORDER BY order_date";
	$click = mysqli_query($mysqli,$sql);
	$click = mysqli_fetch_all($click,MYSQLI_ASSOC);
	$date = json_encode(array_column($click, 'CAST(order_date as date)'),JSON_NUMERIC_CHECK);
	$click = json_encode(array_column($click, 'count'),JSON_NUMERIC_CHECK);
	


?>


<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>


<script type="text/javascript">


$(function () { 


    var data_click = <?php echo $click; ?>;

    var data = <?php echo $date; ?>;

    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Sales Report'
        },
        colors:'#ff0000',
        xAxis: {
            categories: data
        },
        yAxis: {
            title: {
                text: 'Amount'
            }
        },
        series: [{
            name: 'Sales',
            data: data_click,
            href : 'sales.report.php'
        },]
    });
});


</script>


<div class="container">
	<br/>
	<!-- <h2 class="text-center">Highcharts php mysql json example</h2> -->
    <div class="row">

             <center><a class  = "btn btn-success" href = "sales_report.php"> Return to Sales Report </a></center>
    </div>
        
        <br/>
           

            <div class="panel panel-default">

                <div class="panel-heading">Sales Report Data</div>
                <div class="panel-body">
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
