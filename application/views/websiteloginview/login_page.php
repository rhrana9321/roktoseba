<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $baseinformation->title; ?></title>
		<!-- Favicon Icon -->
		<link rel="shortcut icon" href="<?php echo base_url("frontend/css/favicon.ico"); ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url("frontend/css/favicon.ico"); ?>" type="image/x-icon">
        <!-- Stylesheet -->
		<link rel="stylesheet" href="<?php echo base_url("resource/css/bootstrap.min.css"); ?>" />
		<link rel="stylesheet" href="<?php echo base_url("resource/font-awesome/4.2.0/css/font-awesome.min.css"); ?>" />
		<link rel="stylesheet" href="<?php echo base_url("resource/fonts/fonts.googleapis.com.css"); ?>" />
		<link rel="stylesheet" href="<?php echo base_url("resource/css/ace.min.css"); ?>" />
		<link rel="stylesheet" href="<?php echo base_url("resource/css/ace-rtl.min.css"); ?>" />
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
						
								<h1>
									<div class="space-20"></div>
				<img class="nav-user-photo" src="<?php echo base_url("uploads/".$baseinformation->proimage); ?>" alt="Company Logo" style="max-height:50px;"/>
									
									
								</h1>
								
								
							</div>

					
							<div class="space-20"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<?php if(!empty($invalidUser)) {?> 
								
												<div class="alert alert-warning alert-dismissible fade in" role="alert">
												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												  </button>
												  <strong>Wrong!</strong> <?php echo $invalidUser; ?>.
												</div>
												
												
												<?php } ?>
										
											<h4 class="header blue lighter bigger">
												<i class="fa fa-lock" aria-hidden="true"></i> &nbsp; Website Login Panel										
											</h4>

											<div class="space-6"></div>

											<form method="post" action="<?php echo site_url("websitelogin/webadmin"); ?>">
												<fieldset>
													
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="username" class="form-control" placeholder="Username" required/>
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password" id="password" class="form-control" placeholder="Password" required/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														
														<button type="reset" class="width-35 pull-left btn btn-sm btn-primary">
															
															<span class="bigger-110">Reset</span>
														</button>
														

														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

											<div class="social-or-login center">
												<span class="bigger-110">Or Login Using</span>
											</div>
										</div>

										<div class="toolbar clearfix">
											<div>
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													I forgot my password
												</a>
											</div>

										</div>
									</div>
								</div>

								<div id="forgot-box" class="forgot-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="ace-icon fa fa-key"></i>
												Retrieve Password
											</h4>

											<div class="space-6"></div>
											<p>
												Enter your email and to receive instructions
											</p>

											<form method="post" action="<?php echo site_url("adminpanel/profileUpdate/forgotpasscheck"); ?>">
												<fieldset>
												
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<div class="clearfix">
														<button type="button" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="ace-icon fa fa-lightbulb-o"></i>
															<span class="bigger-110">Send Me!</span>
														</button>
													</div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												Back to login
												<i class="ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div>
								</div>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

	

		<!--[if !IE]> -->
		<script src="<?php echo base_url("resource/js/jquery.2.1.1.min.js"); ?>"></script>
		<script src="<?php echo base_url("resource/js/bootstrap.min.js"); ?>"></script>

		
		
	

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
	</body>
</html>
