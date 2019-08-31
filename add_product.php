<?php 
include 'dbcon.php';
	$product_name = $_POST['product_name'];
	$category = $_POST['category'];
	$size = $_POST['size'];
    $price = $_POST['price'];
  
 
    mysqli_query($con,"INSERT INTO product(product_name,category,size,price) 
     VALUES('$product_name','$category','$size','$price')")or die(mysqli_error($con)); 
echo '
     <script>
        alert("Product Successfully Added");
        window.location = "product.php";
     </script>
';
  
?>