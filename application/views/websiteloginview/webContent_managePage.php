<?php echo $this->load->view("websiteloginview/header"); ?>				
		
				<div class="main-content">
				
				
				<style>
.attachmentbody{
	width: 114px;
	height: 110px;
	float: left;
}
.attachmentbody .progress{
	height: 12px;
	margin-top: 45px;
}
.attachmentbody ul {
	border-radius: 5px;
	list-style: outside none none;
	position: relative;
	float: left;
	padding: 0;
}
.attachmentbody ul li.remove{
	top: 0;
	right: 5px;
	position: absolute;
}
.attachmentbody img {
	border-radius: 5px;
	height: 100px;
	width: 100px;
	padding: 5px;
}

.hand {
	cursor: pointer;
	}

.attachmentbody ul.success {
	border: 1px solid #339933;   
}
.attachmentbody ul.img_error {
	background: #f0c6c3 none repeat scroll 0 0;
	border: 1px solid #cc6622;
}






@media only screen and (max-width: 500px) {


}


</style>
				
				
				
				
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
							<li class="active">Content  Manage</li>
						</ul>
					</div>
					
					<div class="page-content" id="listView">
					    <?php 
	$auid  	 			  = $this->session->userdata('websiteloginid');
	$adminuserinfo	= $this->M_cloud->find('website_adminlogin', array('webadId' => $auid));
?>
						<div class="row">
							<div class="table-header" align="right">
							    <?php if($adminuserinfo->Content_add==1){ ?>											
								<a href="#modal-form" role="button" class="label label-xlg label-light arrowed-in-right blue"
								 data-toggle="modal" style="text-decoration:none;">  <i class="ace-icon fa fa-plus"></i> 	 </a>
								 <?php } else { ?>
								 &nbsp;
								 <?php } ?>
							</div>
							
							
							<div>
							
							<?php if(!empty($success)){?> 
							
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>Success!</strong> &nbsp; &nbsp;<?php echo $success; ?>
							</div>
							
							<?php }?>
							
							 <?php if($adminuserinfo->Content_list==1){ ?>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">SN</th>
											<th>Menu Title</th>
											<th>Menu Name</th>
											<th>Image </th>
											<th>Details </th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
									
									<?php 
									$i=1;
									foreach($product_tablelist as $v) {
										
										?> 
									
										<tr>
											<td class="center"><?php echo $i++; ?></td>
											<td><?php echo $v->menu_title; ?></td>
											<td><?php echo $v->menu_name; ?></td>
											<td class="hidden-480"><img height="30" src="<?php echo base_url("uploads/".$v->proimage); ?>" /></td>
											<td><?php echo $v->prodetails; ?></td>
											
										
											
											<td>
												<div class="">
												    <?php if($adminuserinfo->Content_edit==1){ ?>
													<a class="green" href="#" data-id="<?php echo $v->web_con_id ?>">
														<i class="ace-icon fa fa-pencil bigger-130"></i>
													</a>
													|
													<?php } ?>
													<?php if($adminuserinfo->Content_delete==1){ ?>
													<a class="red delete" href="<?php echo site_url("websiteloginControler/WebContent_manage/delete/" . $v->web_con_id); ?>">
														<i class="ace-icon fa fa-trash-o bigger-130"></i>
													</a>
                                                    <?php } ?>
										
												</div>
											</td>
										</tr>
										
									<?php } ?>

									</tbody>
								</table>
								<?php } ?>
							</div>
						</div>
						
						
						
					</div>
					
					
				</div>
			</div>
			
			
			
			
			
			<div id="modal-form" class="modal" tabindex="-1" data-backdrop="static">
						<form id="addForm" action="<?php echo site_url('websiteloginControler/WebContent_manage/store'); ?>" method="post">
							<input type="hidden" id="id" name="id" value="<?php echo $wproid; ?>" />
							<div class="modal-dialog" style="width:680px;">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="blue bigger">Add  Content</h4>
									</div>

									<div class="modal-body">
										<div class="row">
											<div class="col-xs-12 col-sm-11">
												
												<div class="row">
												<div class="col-md-6"><div class="form-group">
													<label for="pro_name">Menu Title</label>
													<div>
														<input type="text" name="menu_title" id="menu_title"  tabindex="5" 
														class="form-control" placeholder=" Menu title"  value="" />
													</div>
												</div></div>
												<div class="col-md-6"><div class="form-group">
													<label for="pro_name">Menu Title BN</label>
													<div>
														<input type="text" name="menu_title_bn" id="menu_title_bn"  tabindex="5" 
														class="form-control" placeholder=" Menu title"  value="" />
													</div>
												</div></div>
												
												</div>
												
												
												<div class="form-group">
													<label for="pro_name">Other Menu Name</label>
													<div>
														<select class="form-control" name="menu_name" id="menu_name" tabindex="6">
															<option  selected="selected">Select Menu </option>
															<option value="Help_center">Help Center </option>
															<option value="About_Us">About Us</option>
                											<option value="FAQS">FAQS</option>
															<option value="Return_Policy">Return Policy</option>
															<option value="Privacy_Policy">Privacy Policy</option>
															<option value="Payment_Policy">Payment Policy</option>
															<option value="Terms_of_Use">Terms of Use</option>
														</select>
													</div>
												</div>
												
												
												
												
												<div class="form-group">
										<label for=""> Details </label>
										<div>
											<textarea class="form-control" rows="12" name="prodetails" id="ajaxfilemanager" value="" tabindex="20" style="height:400px;"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for=""> Details BN</label>
										<div>
											<textarea class="form-control" rows="12" name="prodetails_bn" id="ajaxfilemanager2" value="" tabindex="20" style="height:400px;"></textarea>
										</div>
									</div>
												
												<div class="row" style="padding-left:15px;">
												<div class="form-group">
														<label for="comlogo"> Image Upload (Size - W-1024px X H-250px) </label> 
														<div>
															<div>
															 <div class="attachmentbody" data-target="#agImage" data-type="agImage">
																<img class="upload" src="<?php echo base_url('resource/img/no_image.jpg') ?>" />
															  </div> 
																<input name="agImage" id="agImage" type="hidden" value="" />
															</div>
														</div>
													</div>
												
												</div>
												
																			
												
											
												
												
												
												
											</div>
										</div>
									</div>

									<div class="modal-footer">
										<button class="btn btn-sm" data-dismiss="modal">
											<i class="ace-icon fa fa-times"></i>
											Cancel
										</button>

										<button class="btn btn-sm btn-primary update" type="submit">
											<i class="ace-icon fa fa-check"></i>
											Save
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
			
			
			
			
<script>
	
		
	
	
		//$(".edit").click(function(e)
		$(document).on("click", ".green", function(e)
		{
		
	
			var id 		= $(this).attr("data-id");
			
			var formURL = "<?php echo site_url('websiteloginControler/WebContent_manage/update'); ?>";			
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {id:id},
				dataType: "json",
				success:function(data){
					$('#modal-form').modal('show');
					$('#id').val(data.web_con_id);
					$('#menu_title').val(data.menu_title);
					$('#menu_title_bn').val(data.menu_title_bn);
					$('#menu_name').val(data.menu_name);
					$('#ajaxfilemanager').val(data.prodetails);
					tinyMCE.get('ajaxfilemanager').setContent(data.prodetails);
					
					$('#ajaxfilemanager2').val(data.prodetails_bn);
					tinyMCE.get('ajaxfilemanager2').setContent(data.prodetails_bn);
					
					$('.update').text("Update");
					
					
				}
			});
			
			e.preventDefault();
		});
	
	
		
	//update End
	
	
	
	$('.delete').click(function (){
       var answer = confirm("Are you sure delete this data?");
          if (answer) {
             return true;
          }else{
             return false;
          }
    });
	
	
	
	
</script>	
			
			
<?php echo $this->load->view("websiteloginview/footer"); ?>