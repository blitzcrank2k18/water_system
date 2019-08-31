</div>
<div class = "panel-body">
        <table id = "" class = "table table-responsive table-bordered">
            <thead>
                <tr>
                    <td>Product Name</td>
                    <td>Qty Sales</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>
                <?php   
                                        include 'dbcon.php'; 
                        $total=0;
                        while ($row=mysqli_fetch_array($query1)){

                            $total=$total+$row['amount'];                                         
                            ?>  
                        <tr>
                            <td><?php echo $row['product_name'];?></td>
                            <td><?php echo $row['transaction_type'];?></td>
                            <td><?php echo $row['amount'];?></td>
                        </tr>
                       
                <?php }?>
                        <tr>
                            <td colspan="2"><strong class="primary-font">Total</strong></td>
                            <td><strong class="primary-font"><?php echo number_format($total,2);?></strong></td>
                        </tr>
                     </tbody>   
        </table>
 </div>