<?php include 'session.php';?>
<?php include 'header.php';?>
<?php $id = $_GET['id']; ?>
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
                        <h4>Personnel</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a>
                            
                            </li>
                            <li class="breadcrumb-item"><a href="users.php">Personnel</a>
                            
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- Header end -->

            <!-- Tables start -->
            <!-- Row start -->
            <div class="row">

                <div class="col-sm-3 add">
                  <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Add Personnel</h5>
                            
                        </div>
                        <div class="card-block">
                            <div class="row">
                            <form method = "post" id = "form-add-user" action = "add_personel.php">
                            <div class = "form-group">
                                <input id = "firstname" type = "text" class = "form-control" name = "firstname" placeholder = "Firstname" required>
                            </div>
                             <div class = "form-group">
                                <input id = "lastname" type = "text" class = "form-control" name = "lastname" placeholder = "Lastname" required>
                            </div>
                            <div class = "form-group">
                                <input id = "username" type = "text" class = "form-control" name = "pin_number" placeholder = "Pin No." required>
                            </div>

                            <div class="form-group">
                                   <textarea class = "form-control" name = "address" placeholder="Address"></textarea> 
                            </div>

                             <div class="form-group">
                                   <select name = "sex" class="form-control">
                                       <option selected disabled=""> -- Select Gender --</option>
                                       <option>Male</option>
                                       <option>Female</option>
                                   </select>
                            </div>


                            <div class="form-group">
                                <div class="input-group date input-group-date-custom">
                                    <input type="text" class="form-control" name = "birthday" placeholder="Birthdate">
                                        <span class="input-group-addon bg-primary">
                                            <i class="icofont icofont-clock-time"></i>
                                        </span>
                                </div>
                            </div>

                            <div class = "form-group">
                                <input id = "password"  type = "text" class = "form-control" name = "mobile_number" placeholder = "Phone or Mobile Number" required>
                            </div>
                             <div class="form-group">
                                   <select name = "position" class="form-control">
                                       <option selected disabled=""> -- Select Position --</option>
                                       <option>Driver</option>
                                       <option>Delivery Boy</option>
                                   </select>
                            </div>
                                                          
                            <div class = "form-group">
                                <button type = "submit" class = "btn btn-primary btn-block save" name = "save"><i class = "fa fa-save"></i> Save</button>
                            </div>
                            


                            <div class = "alert alert-danger alert-response" style = " display:none">
                                Successfully Added
                            </div>                        
                        </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Personnel Table</h5>
                            
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-12 table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                       
                                            <th>Full Name</th>
                                            <th>Gender</th>
                                            <th>Pin</th>
                                            <th>Position</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            include 'dbcon.php';                
                                            $query1=mysqli_query($con,"SELECT * FROM personel ")or die(mysqli_error($con));
                                                while ($row=mysqli_fetch_array($query1)){
                                                $id=$row['personel_id'];                      
                                                ?>  
                                              <tr>
                                                 <td><?php echo $row['firstname']. " ". $row['lastname'];?>
                                                 <td><?php echo $row['sex'];?></td>
                                                 <td><?php echo $row['pin_number'];?></td>
                                                 <td><?php echo $row['position'];?></td>
                                                <td>
                                                <a href="update_personel.php?id=<?php echo $id;?>" class="btn btn-primary btn-xs"><i class = "fa fa-pencil"></i> Edit</a>
                                                <a href="profile_personel.php?id=<?php echo $id;?>" class="btn btn-success btn-xs"><i class = "fa fa-eye"></i> View</a>
                                                  
                                                </td>
                                                              
                                              </tr>
                                                             
                                          <?php }?>
                                        </tbody>
                                    </table>
                                </div>
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
</body>






</html>
