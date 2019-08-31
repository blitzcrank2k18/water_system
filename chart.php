<?php
	$dbHost = "localhost";
	$dbDatabase = "water_refilling";
	$dbPasswrod = "";
	$dbUser = "root";


	$mysqli = mysqli_connect($dbHost, $dbUser, $dbPasswrod, $dbDatabase);
?>
<?php



include 'dbcon.php';


	/* Getting demo_viewer table data */
	// $sql = "select SUM(order_total) from `order` natural join transaction natural join product group by MONTH(date_added)+'-'+YEAR(date_added)";
	// $sql = "SELECT SUM(order_total) as count FROM `order` 
	// 		GROUP BY YEAR(order_date) ORDER BY order_date";
	// $viewer = mysqli_query($mysqli,$sql);
	// $viewer = mysqli_fetch_all($viewer,MYSQLI_ASSOC);
	// $viewer = json_encode(array_column($viewer, 'count'),JSON_NUMERIC_CHECK);


	/* Getting demo_click table data */
	$sql = "SELECT SUM(order_total) as count,DATE_FORMAT(order_date,'%Y/%m/%d') as date FROM `order` 
			GROUP BY DATE_FORMAT(order_date,'%Y/%m/%d') ORDER BY order_date";
	$click = mysqli_query($mysqli,$sql);
	$click = mysqli_fetch_all($click,MYSQLI_ASSOC);
	$date = json_encode(array_column($click, 'date'),JSON_NUMERIC_CHECK);
	$click = json_encode(array_column($click, 'count'),JSON_NUMERIC_CHECK);
	


?>


<!DOCTYPE html>
<html>
<head>
	<title>HighChart</title>
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
                text: 'Rate'
            }
        },
        series: [{
            name: 'Sales',
            data: data_click
        },]
    });
});


</script>


<div class="container">
	<br/>
	<!-- <h2 class="text-center">Highcharts php mysql json example</h2> -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
