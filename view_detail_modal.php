<div id="myModal<?=$row['delivery_id']?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title">Order Details</h4>
                                                        </div>
                                                        <div class="modal-body">

                                                            <center><h5>Order No --  BRWS-00 <?php echo $row['order_id'];?></h5></center>

                                                            <p>Cashier : <?=$user_username?></p>                                                                                                                   
                                                            <p>Customer : <?=$row['name']?></p>                                                                                                                   
                                                            <p>Transaction Date : <?=date('F d, Y', strtotime($row['delivery_date']))?></p>                         
                                                                                                                                                                              
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>  