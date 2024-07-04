<?php echo $this->load->view("websiteloginview/header"); ?>				
					
					<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Profile Update Manage</li>
						</ul>

						
					</div>
					
					
					
					<div class="page-content">
						
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									

									<tbody>
									
									
										<tr>
											<td>
											<form action="<?php echo site_url('websiteloginControler/Admin_profileUpdate/profileEdit'); ?>" method="post">
											<div class="form-group">
												<label for="pro_name">User Name</label>
												<div>
													<input type="text" name="username" id="username" class="form-control" required placeholder=" User Name"  value="<?php echo $adminuserinfo->username; ?>" />
												</div>
											</div>
											<div class="form-group">
												<label for="pro_name">Old Password</label>
												<div>
													<input type="password" name="ollpass" id="ollpass" class="form-control" required placeholder=" * Old Password"  value="" />
													<span class="alermeg" style="color:red;"></span>
												</div>
											</div>
											<div class="form-group">
												<label for="pro_name">New Password</label>
												<div>
													<input type="password" name="password" id="password" class="form-control" required placeholder=" * New Password"  value="" />
												</div>
											</div>
											
											<div>
												<button class="btn btn-sm btn-primary update" type="submit"><i class="ace-icon fa fa-check"></i>Update</button>
											</div>
											</form>
											
											</td>
											
										</tr>
										
									

									</tbody>
								</table>
						
						
						
					</div>
				</div>
			</div>

<?php echo $this->load->view("websiteloginview/footer"); ?>