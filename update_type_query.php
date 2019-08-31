<?php
include('dbcon.php');

 if (isset($_POST['update']))
 { 
	 $id = $_POST['id'];
     $type = $_POST['type'];
     $discount = $_POST['discount'];
     $delivery_charge = $_POST['delivery_charge'];

	 mysqli_query($con,"UPDATE type SET type='$type', discount = '$discount',delivery_charge='$delivery_charge' where type_id='$id'")
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Type Successfully updated!');</script>";
		echo "<script>document.location='type.php'</script>";
	
} 


