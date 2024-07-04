<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php $this->load->view("title"); ?></title>

<?php $this->load->view("cssjsLink"); ?>

</head>
  
<body class="color428bca">

<div class="container">
	<div class="row color428bca">
	
		<div class="col-md-2">
			&nbsp;	
		</div>
			
		<div class="col-md-8 lgPg1">
			<div class="row lgPg2">
				<div align="center">
					<img src="<?php echo base_url("view_resource/image/logo2.png"); ?>" class="img-responsive"/>
				</div>
				<div class="lgPg3">
					Already an Associate?
				</div>
				<div class="lgPg4">
					Sign in to your account
				</div>
				<div style="color:red; font-weight:900;"><?php if(!empty($invalidUser)){echo $invalidUser; }?></div>
				<div>
					<form method="post" action="<?php echo site_url("userlogin/userAuth"); ?>" enctype="multipart/form-data">
					
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" name="userName" id="userName" class="form-control" placeholder="Username" aria-describedby="sizing-addon1">
					</div>
					
					<div class="input-group" style="padding-top:15px;">
						<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon1">
					</div>
					  
					<div class="lgPg5">
						<div class="col-md-6 lgPg6">
							Forgot Password? <a href="<?php echo site_url('forgotpassword'); ?>" class="lgPg7">Click Here</a>
						</div>
						<div class="col-md-6 colPadding" align="right">
							<button type="submit" class="btn btn-success" value="Submit"> Sign in > </button>
						</div>
					</div>
					  
					</form>
					
				</div>
			</div>
			<div class="row lgPg8">
				<a href="<?php echo site_url("home/signup"); ?>" class="btn btn-default button1">Not yet an Associate? Create Account Now</a>
			</div>
		</div>
				
		<div class="col-md-2">
			&nbsp;	
		</div>
			
	</div>
</div>

</body>
</html>