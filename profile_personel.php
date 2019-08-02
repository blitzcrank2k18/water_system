<?php include 'session.php';?>
<?php include 'header.php';
    $id = $_GET['id'];
?>

<?php 
  include 'dbcon.php';                
  $query1=mysqli_query($con,"SELECT * FROM personel WHERE personel_id = $id")or die(mysqli_error($con));
  $row=mysqli_fetch_array($query1)
?> 
<style type="text/css">
  .md-tabs .nav-item{
    background-color: #fff;
    width: calc(100% / 2) !important;
    text-align: center;

  }
  .nav-tabs .slide {
    width: calc(100% / 2) !important;
  }
</style>

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
            <div class="row">
                <div class="main-header" style="margin-top: 0px;">
                    <h4>Profile</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icofont icofont-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="personel.php">Personel</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Profile</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- Header end -->
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="card faq-left">
                        <div class="social-profile">
                            <img class="img-fluid" src="assets/images/social/profile.jpg" alt="">
                            <div class="profile-hvr m-t-15">
                                <i class="icofont icofont-ui-edit p-r-10 c-pointer"></i>
                                <i class="icofont icofont-ui-delete c-pointer"></i>
                            </div>
                        </div>
                        <div class="card-block">
                            <h4 class="f-18 f-normal m-b-10 txt-primary"><?=$row['firstname']. " ". $row['lastname']?></h4>
                            <ul>
                                <li class="faq-contact-card">
                                    <i class="icofont icofont-telephone"></i>
                                   <?=$row['mobile_number']?>
                                </li>
                                <li class="faq-contact-card">
                                    <i class="icofont icofont-key"></i>
                                    <a href="#"><?=$row['pin_number']?></a>
                                </li>
                                
                            </ul>
                        

                        </div>
                    </div>

                </div>
                <!-- end of col-lg-3 -->

                <!-- start col-lg-9 -->
                <div class="col-xl-9 col-lg-8">
                    <!-- Nav tabs -->
                    <div class="tab-header">
                        <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Personal Info</a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#project" role="tab">Projects</a>
                                <div class="slide"></div>
                            </li>
                        </ul>
                    </div>
                    <!-- end of tab-header -->

                    <div class="tab-content">
                        <div class="tab-pane active" id="personal" role="tabpanel">
                            <div class="card">
                                <div class="card-header"><h5 class="card-header-text">About Me</h5>
                                    <button id="edit-btn" type="button" class="btn btn-primary waves-effect waves-light f-right">
                                        <i class="icofont icofont-edit"></i>
                                    </button>
                                </div>
                                <div class="card-block">
                                    <div class="view-info">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="general-info">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xl-6">
                                                            <table class="table m-0">
                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row">Full Name</th>
                                                                    <td><?=$row['firstname']. " ". $row['lastname']?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Gender</th>
                                                                    <td><?=$row['sex']?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Birth Date</th>
                                                                    <td><?= date('F d,Y', strtotime($row['birthday']))?></td>
                                                                </tr>
                                                                
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- end of table col-lg-6 -->

                                                        <div class="col-lg-12 col-xl-6">
                                                            <table class="table">
                                                                <tbody>
                                                               
                                                                <tr>
                                                                    <th scope="row">Mobile Number</th>
                                                                    <td><?=$row['mobile_number']?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Pin Number</th>
                                                                    <td><?=$row['pin_number']?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Position</th>
                                                                    <td><?=$row['position']?></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- end of table col-lg-6 -->
                                                    </div>
                                                    <!-- end of row -->
                                                </div>
                                                <!-- end of general info -->
                                            </div>
                                            <!-- end of col-lg-12 -->
                                        </div>
                                        <!-- end of row -->
                                    </div>
                                    <!-- end of view-info -->

                                   
                                    <!-- end of view-info -->
                                </div>
                                <!-- end of card-block -->
                            </div>
                            <!-- end of card-->

                           
                            <!-- end of row of education and experience  -->

                         
                            <!-- end of row -->
                        </div>
                        <!-- end of tab-pane -->
                        <!-- end of about us tab-pane -->

                        <!-- start tab-pane of project tab -->
                        <div class="tab-pane" id="project" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-header-text">Project Details</h5>
                                    <button type="button" class="btn btn-primary waves-effect waves-light f-right">
                                        + ADD PROJECTS</button>
                                </div>
                                <!-- end of card-header  -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="project-table">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center txt-primary pro-pic">Photo</th>
                                                        <th class="text-center txt-primary">Client</th>
                                                        <th class="text-center txt-primary">Start Date</th>
                                                        <th class="text-center txt-primary">End Date</th>
                                                        <th class="text-center txt-primary">Status</th>
                                                        <th class="text-center txt-primary">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/avatar-2.png" class="img-circle" alt="tbl">
                                                        </td>
                                                        <td>Web Consultant</td>
                                                        <td>Oct 25th, 2014</td>
                                                        <td>Oct 25th, 2015</td>
                                                        <td class="text-center"><span class="label label-success m-t-20">Finish</span>
                                                        </td>
                                                        <td class="faq-table-btn">
                                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                <i class="icofont icofont-ui-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                                                <i class="icofont icofont-eye-alt"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                                <i class="icofont icofont-ui-delete"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/avatar-2.png" class="img-circle" alt="tbl">
                                                        </td>
                                                        <td>Web Consultant</td>
                                                        <td>Oct 25th, 2014</td>
                                                        <td>Oct 25th, 2015</td>
                                                        <td class="text-center"><span class="label label-success">Finish</span>
                                                        </td>
                                                        <td class="faq-table-btn">
                                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                <i class="icofont icofont-ui-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                                                <i class="icofont icofont-eye-alt"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                                <i class="icofont icofont-ui-delete"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/avatar-2.png" class="img-circle" alt="tbl">
                                                        </td>
                                                        <td>Web Consultant</td>
                                                        <td>Oct 25th, 2014</td>
                                                        <td>Oct 25th, 2015</td>
                                                        <td class="text-center"><span class="label label-warning">Pending</span>
                                                        </td>
                                                        <td class="faq-table-btn">
                                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                <i class="icofont icofont-ui-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                                                <i class="icofont icofont-eye-alt"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                                <i class="icofont icofont-ui-delete"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/avatar-2.png" class="img-circle" alt="tbl">
                                                        </td>
                                                        <td>Web Consultant</td>
                                                        <td>Oct 25th, 2014</td>
                                                        <td>Oct 25th, 2015</td>
                                                        <td class="text-center"><span class="label label-success">Finish</span></td>
                                                        <td class="faq-table-btn">
                                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                <i class="icofont icofont-ui-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                                                <i class="icofont icofont-eye-alt"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                                <i class="icofont icofont-ui-delete"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/avatar-2.png" class="img-circle" alt="tbl">
                                                        </td>
                                                        <td>Web Consultant</td>
                                                        <td>Oct 25th, 2014</td>
                                                        <td>Oct 25th, 2015</td>
                                                        <td class="text-center"><span class="label label-danger">cancel</span></td>
                                                        <td class="faq-table-btn">
                                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                <i class="icofont icofont-ui-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                                                <i class="icofont icofont-eye-alt"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                                <i class="icofont icofont-ui-delete"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/avatar-2.png" class="img-circle" alt="tbl">
                                                        </td>
                                                        <td>Web Consultant</td>
                                                        <td>Oct 25th, 2014</td>
                                                        <td>Oct 25th, 2015</td>
                                                        <td class="text-center"><span class="label label-warning">Pending</span>
                                                        </td>
                                                        <td class="faq-table-btn">
                                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                <i class="icofont icofont-ui-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                                                <i class="icofont icofont-eye-alt"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                                <i class="icofont icofont-ui-delete"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/avatar-2.png" class="img-circle" alt="tbl">
                                                        </td>
                                                        <td>Web Consultant</td>
                                                        <td>Oct 25th, 2014</td>
                                                        <td>Oct 25th, 2015</td>
                                                        <td class="text-center"><span class="label label-success m-t-20">Finish</span>
                                                        </td>
                                                        <td class="faq-table-btn">
                                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                <i class="icofont icofont-ui-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                                                <i class="icofont icofont-eye-alt"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                                <i class="icofont icofont-ui-delete"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/avatar-2.png" class="img-circle" alt="tbl">
                                                        </td>
                                                        <td>Web Consultant</td>
                                                        <td>Oct 25th, 2014</td>
                                                        <td>Oct 25th, 2015</td>
                                                        <td class="text-center"><span class="label label-success m-t-20">Finish</span>
                                                        </td>
                                                        <td class="faq-table-btn">
                                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                <i class="icofont icofont-ui-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                                                <i class="icofont icofont-eye-alt"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                                <i class="icofont icofont-ui-delete"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/avatar-2.png" class="img-circle" alt="tbl">
                                                        </td>
                                                        <td>Web Consultant</td>
                                                        <td>Oct 25th, 2014</td>
                                                        <td>Oct 25th, 2015</td>
                                                        <td class="text-center"><span class="label label-warning">Pending</span>
                                                        </td>
                                                        <td class="faq-table-btn">
                                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                <i class="icofont icofont-ui-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                                                <i class="icofont icofont-eye-alt"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                                <i class="icofont icofont-ui-delete"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/avatar-2.png" class="img-circle" alt="tbl">
                                                        </td>
                                                        <td>Web Consultant</td>
                                                        <td>Oct 25th, 2014</td>
                                                        <td>Oct 25th, 2015</td>
                                                        <td class="text-center"><span class="label label-success m-t-20">Finish</span>
                                                        </td>
                                                        <td class="faq-table-btn">
                                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                <i class="icofont icofont-ui-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                                                <i class="icofont icofont-eye-alt"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                                <i class="icofont icofont-ui-delete"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/avatar-2.png" class="img-circle" alt="tbl">
                                                        </td>
                                                        <td>Web Consultant</td>
                                                        <td>Oct 25th, 2014</td>
                                                        <td>Oct 25th, 2015</td>
                                                        <td class="text-center"><span class="label label-warning">Pending</span>
                                                        </td>
                                                        <td class="faq-table-btn">
                                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                <i class="icofont icofont-ui-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                                                <i class="icofont icofont-eye-alt"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                                <i class="icofont icofont-ui-delete"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!-- end of table -->
                                            </div>
                                            <!-- end of table responsive -->
                                        </div>
                                        <!-- end of project table -->
                                    </div>
                                    <!-- end of col-lg-12 -->
                                </div>
                                <!-- end of row -->
                            </div>
                            <!-- end of card-main -->

                    </div>
                    </div>
                    <!-- end of main tab content -->
                </div>
            </div>

        </div>

        <!-- Container-fluid ends -->
    </div>
</div>




<script src="assets/plugins/jquery/dist/jquery.min.js"></script>
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/plugins/tether/dist/js/tether.min.js"></script>

<!-- Required Fremwork -->
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- waves effects.js -->
<script src="assets/plugins/Waves/waves.min.js"></script>

<!-- Scrollbar JS-->
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script>

<!--classic JS-->
<script src="assets/plugins/classie/classie.js"></script>

<!-- notification -->
<script src="assets/plugins/notification/js/bootstrap-growl.min.js"></script>

<!-- pie chart.js -->
<script type="text/javascript" src="assets/plugins/bower-jquery-easyPieChart/dist/jquery.easypiechart.min.js"></script>
<script type="text/javascript" src="assets/pages/counter.js"></script>

<!-- Date picker.js -->
<script type="text/javascript" src="assets/plugins/moment/moment.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- custom js -->
<script type="text/javascript" src="assets/js/main.min.js"></script>
<script type="text/javascript" src="assets/pages/profile.js"></script>
<script type="text/javascript" src="assets/pages/elements.js"></script>
<script type="text/javascript" src="assets/js/menu.min.js"></script>
</body>

</html>
