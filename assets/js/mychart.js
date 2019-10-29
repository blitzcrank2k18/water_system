$(document).ready(function(){

	$.ajax({
		url: 'dataFetch.php',
		method: 'GET',
		success:function(data){
			console.log(data);
			var barangay = [];
			var sales = [];

			for (var i in data) {
				barangay.push(data[i].barangay);
				sales.push(data[i].total);
			}
			var chartdata = {
				labels : barangay,
				datasets : [
					{
						label: "Earnings",
					      lineTension: 0.3,
					      backgroundColor: "rgba(78, 115, 223, 0.05)",
					      borderColor: "rgba(78, 115, 223, 1)",
					      pointRadius: 3,
					      pointBackgroundColor: "rgba(78, 115, 223, 1)",
					      pointBorderColor: "rgba(78, 115, 223, 1)",
					      pointHoverRadius: 3,
					      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
					      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
					      pointHitRadius: 10,
					      pointBorderWidth: 2,
						data: sales
					}
				]
			};



			var ctx = $("#mycanvas");

			var lineChart = new Chart(ctx, {
				type: 'line',
				data: chartdata,
				
			});
		},
		error:function(data){
			console.log(data);
		}
	});


});