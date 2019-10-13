<?php
include('dbcon.php');

 if (isset($_POST['update']))
 { 
	 $id = $_POST['product_id'];
     $product_name = $_POST['product_name'];
     $category = $_POST['category'];
     $size = $_POST['size'];
     $price = $_POST['price'];
   
     
	 mysqli_query($con,"UPDATE product SET product_name='$product_name', category = '$category', size = '$size', price = '$price' where product_id='$id'")
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Personel Successfully updated!');</script>";
		echo "<script>document.location='product.php'</script>";
	
} 

