<?php include 'header_login.php';?>
<body>

	<style type="text/css">
		@media only screen and (max-width: 576px){
			.login-card {
			    width: 290px;
			    border-radius: 30px;
			}
			.logo-container {
			    position: relative;
			    top: -50px;
			}
			.login-card.card-block {
			    position: relative;
			    top: -50px;
			}
			input.md-form-control {
				text-align: center;
			}
		}
	</style>
<section class="login p-fixed d-flex text-center">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
		<div class="row">
			<div class = "logo-container" style="text-align: center;">
				<img src = "./assets/images/logo_asset.png" style = "max-width:180px"/>
			</div>

			<div class="col-sm-12">
				<div class="login-card card-block">
					<form class="md-float-material" method="POST" enctype="multipart/form-data" id = "login_form" >
						<div class="text-center">
							<!-- <img src="assets/images/logo-blue.png" alt="logo"> -->

						</div>
						<h3 class="text-center txt-primary">
							Delivery Login
						</h3>
						
						<div class="md-input-wrapper">
							<input type="password" class="md-form-control"  name = "password"  placeholder="Enter Your Pin / Password " />
							
						</div>
						
						<div class="row">
							<div class="col-xs-10 offset-xs-1">
								<button  class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
							</div>
						</div>
						<!-- <div class="card-footer"> -->
						<!-- </div> -->
					</form>


						<div  id = "error" class = "alert alert-danger">
							Error Credentials Please Try Again !
						</div>
						<div  id = "correct" class = "alert alert-success">
							Credentials Accepted !
						</div>




					<!-- end of form -->
				</div>

				<!-- end of login-card -->
			</div>
			<!-- end of col-sm-12 -->
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container-fluid -->
</section>


<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jqurey -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery_v4.min.js"></script>
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/plugins/tether/dist/js/tether.min.js"></script>
<!-- Required Fremwork -->
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- waves effects.js -->
<script src="assets/plugins/Waves/waves.min.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/pages/elements.js"></script>


<script>
	jQuery(document).ready(function(){
		$('#error').hide()
		$('#correct').hide()
	jQuery("#login_form").submit(function(e){
		
			e.preventDefault();
			var formData = jQuery(this).serialize();
			$.ajax({
				type: "POST",
				url: "login.php",
				data: formData,
				success: function(html){
				console.log('html ', html)
				if(html=='True')
				{
					$('#error').hide();
					$("#correct").slideDown();					
					setTimeout(function(){	window.location = 'dashboard.php';   }, delay);  
				}else{
				$('#error').slideDown();	
					var delay = 3000;
					setTimeout(function(){	$('#error').slideUp();  }, delay);  
				}
				}
			});
				return false;
		});
	});
</script>
</body>
</html>