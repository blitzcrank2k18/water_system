<?php include 'session.php';?>
<?php  include 'header.php';?>
<style type="text/css">
@media print {
          .btn-print {
            display:none !important;
          }
      }
</style>
<body>
            <!-- Tables start -->
            <?php 
                include 'dbcon.php';    
                $or=$_REQUEST['or'];            
                $queryc=mysqli_query($con,"SELECT * FROM `order` natural join customer where order_id='$or'")or die(mysqli_error($con));
                    $rowc=mysqli_fetch_array($queryc);
            ?> 
        
            
                            <h5 style="text-align: center">Blue Water Refilling Station</h5>
                            <h6 style="text-align: center; color : red ;">OR No.  - BWRS-00<?=$rowc['order_id']?></h6>
                   
                                <table style="width: 100%">
                                    <tr>
                                        <td>Customer Name</td>
                                        <td><?php echo $rowc['name'];?></td>
                                        <td>Contact #</td>
                                        <td><?php echo $rowc['contact_number'];?></td>
                                    </tr>
                                </table>
                            
                            <h5 class="card-header-text">Order Details</h5>
              
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                       
                                            <th>Qty</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                           // include 'dbcon.php';    
                                           // $or=$_REQUEST['or'];            
                                            $query=mysqli_query($con,"SELECT * FROM `order` natural join order_details natural join product where `order`.order_id='$or'")or die(mysqli_error($con));
                                                while ($row=mysqli_fetch_array($query)){
                                               // $id=$row['product_id'];                      
                                                ?>  
                                              <tr>
                                                <td><?php echo $row['order_qty']?></td>
                                                 <td><?php echo $row['product_name'];?></td>
                                                 <td><?php echo $row['price'];?></td>
                                                 <td><?php echo $row['total'];?></td>
                                              </tr>
                                                             
                                          <?php }?>
                                          <tr>
                                                <th></th>
                                                <th></th>
                                                <th>Discount</th>
                                                <th><?php echo $rowc['disc'];?></th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>Charge</th>
                                                <th><?php echo $rowc['charge'];?></th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>Total</th>
                                                <th><?php echo $rowc['order_total'];?></th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>Amount Paid or rendered</th>
                                                <th><?php echo $rowc['payment'];?></th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>Balance to paid</th>
                                                <th><?php echo $rowc['balance'];?></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <input class="btn-print" type="button" name="print" value="Print" onclick="window.print();window.location.href='place_order.php';">

<?php //include 'scripts.php';?>
<script type="text/javascript">
    $(document).ready(function () {
        window.print();
        setTimeout("closePrintView()",3000);
    });
    function closePrintView() {
        document.location.href = 'place_order.php';
    }
</script>
</body>

</html>
