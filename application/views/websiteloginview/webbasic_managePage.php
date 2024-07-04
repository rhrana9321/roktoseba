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
							<li class="active"> Basic Information</li>
						</ul>
					</div>
					
					<div class="page-content" id="listView">
						<div class="row">
							<div class="table-header" align="right">											
								&nbsp;
							</div>
							
							
							<div>
							
							<?php if(!empty($success)){?> 
							
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>Success!</strong> &nbsp; &nbsp;<?php echo $success; ?>
							</div>
							
							<?php }?>
							
							<?php 
            				    $auid  	 			  = $this->session->userdata('websiteloginid');
            		            $adminuserinfo	= $this->M_cloud->find('website_adminlogin', array('webadId' => $auid));
        				    ?>
        				    <?php if($adminuserinfo->basic_list==1){ ?>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">
												SN
											</th>
											<th>website Title</th>
											<th>Phone</th>
											<th>Company E-mail</th>
											<th>website link</th>
											<?php if($adminuserinfo->basic_edit==1){ ?>
											<th>Action</th>
											<?php } ?>
										</tr>
									</thead>

									<tbody>
									
									<?php 
									$i=1;
									foreach($basicinfo as $v) {
										
										?> 
									
										<tr>
											<td class="center"><?php echo $i++; ?></td>
											<td><?php echo $v->title; ?></td>
											<td class="hidden-480"><?php echo $v->phone; ?></td>
											<td><?php echo $v->eamil; ?></td>
											<td><?php echo $v->website; ?></td>
											<?php if($adminuserinfo->basic_edit==1){ ?>
											<td>
												<div class="hidden-sm hidden-xs action-buttons">
													<a class="green" href="#" data-id="<?php echo $v->bsId ?>">
														<i class="ace-icon fa fa-pencil bigger-130"></i>
													</a>
												
										
												</div>
											</td>
											<?php } ?>
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
						<form id="addForm" action="<?php echo site_url('websiteloginControler/webbasic_manage/store'); ?>" method="post">
							<input type="hidden" id="id" name="id" value="<?php echo $bsId; ?>" />
							<div class="modal-dialog" style="width:680px;">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="blue bigger">Add  Basic Information</h4>
									</div>

									<div class="modal-body">
										
										
										<div class="row">
											<div class="col-xs-12 col-sm-11">
											
											<div class="row">
												<div class="col-md-12"><div class="form-group">
													<label for="pro_name">Website Title</label>
													<div>
														<input type="text" name="title" id="title"  tabindex="1" 
														class="form-control" required  value="" />
													</div>
												</div></div>
												
												
												</div>
											<div class="row">
												<div class="col-md-12"><div class="form-group">
													<label for="pro_name">Company Name</label>
													<div>
														<input type="text" name="companyName" id="companyName"  tabindex="2" 
														class="form-control" required  value="" />
													</div>
												</div></div>
												
												
												</div>
												
												
												
												
												
												
												
												
												<div class="form-group">
													<label for="pro_unit">Website Link</label>
													<div>
														<input type="text" name="website" id="website" tabindex="5" 
														class="form-control" required value=""  />
													</div>
												</div>
												
												
												<div class="form-group">
													<label for="pro_code">Phone Number</label>
													<div>
														<input type="text" name="phone" id="phone"  tabindex="3" 
														class="form-control" required value=""  />
													</div>
												</div>
												
													<div class="form-group">
													<label for="pro_code">Hotline Number</label>
													<div>
														<input type="text" name="hotline" id="hotline"  tabindex="3" 
														class="form-control" required value=""  />
													</div>
												</div>
												
												
												<div class="form-group">
													<label for="pro_unit">E-mail</label>
													<div>
														<input type="email" name="eamil" id="eamil" tabindex="4" 
														class="form-control" required value=""  />
													</div>
												</div>
												<div class="form-group">
													<label for="purchase_price">Address </label>
													<div>
									<textarea class="form-control" rows="3" name="addres" id="addres" value="" placeholder="Please Enter Address...."></textarea>
													</div>
												</div>
												
												<div class="form-group">
													<label for="pro_unit">নোটিশঃ</label>
													<div>
														<input type="text" name="bkash_short_details" id="bkash_short_details" tabindex="5" 
														class="form-control" required value=""  />
													</div>
												</div>
												
												
												
												
												
												<div class="form-group">
													<label for="purchase_price">Footer Details</label>
													<div>
									<textarea class="form-control" rows="3" name="about_us" id="about_us" value="" placeholder=""></textarea>
													</div>
												</div>
												
												
												<div class="form-group">
													<label for="purchase_price">Payment Process </label>
													<div>
									<textarea class="form-control" rows="3" name="payment_process" id="payment_process" value="" placeholder=""></textarea>
													</div>
												</div>
												
												
												
												
												
												
												<div class="row" style="padding-left:15px;">
												<div class="form-group">
														<label for="comlogo">Logo Image &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Help Us Banner Image</label> 
														<div>
															<div>
															 <div class="attachmentbody" data-target="#proimage" data-type="proimage">
															  (W-160px X H-42px)
																<img class="upload" src="<?php echo base_url('resource/img/no_image.jpg') ?>" />
															  </div> 
																<input name="proimage" id="proimage" type="hidden" value="" />
															</div>
														</div>
														<div>
															<div>
															 <div class="attachmentbody" data-target="#proimage1" data-type="proimage1">
															  (W-1052 X H-187)
																<img class="upload" src="<?php echo base_url('resource/img/no_image.jpg') ?>" />
															  </div> 
																<input name="proimage1" id="proimage1" type="hidden" value="" />
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
	/*
	//callback handler for form submit
		$("#addForm").submit(function(e)
		{
			var postData = $(this).serializeArray();
			var formURL = $(this).attr("action");
			console.log(postData);
			console.log($("#ajaxfilemanager").val());
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : postData,
				success:function(data){
					$("#listView").html(data);				
					//$("#addForm").find("input[type=text], textarea").val("");
					$("#addForm input[type='text'], input[type='password'], input[type='hidden'], input[type='number'], input[type='email'], #addForm textarea, #addForm input[type='number").val("");
					$('.update').remove("Update");
					
				}
			});
			
			e.preventDefault();
		});
*/
	
		
	
	
		//$(".edit").click(function(e)
		$(document).on("click", ".green", function(e)
		{
		
	
			var id 		= $(this).attr("data-id");
			
			var formURL = "<?php echo site_url('websiteloginControler/webbasic_manage/update'); ?>";			
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {id:id},
				dataType: "json",
				success:function(data){
					$('#modal-form').modal('show');
					$('#id').val(data.bsId);
					$('#title').val(data.title);
					$('#title_bn').val(data.title_bn);
					$('#companyName').val(data.companyName);
					$('#companyName_bn').val(data.companyName_bn);
					$('#phone').val(data.phone);
					$('#hotline').val(data.hotline);
					$('#eamil').val(data.eamil);
					$('#website').val(data.website);
					$('#bank_short_details').val(data.bank_short_details);
					$('#bkash_short_details').val(data.bkash_short_details);
					$('#Referral_short_details').val(data.Referral_short_details);
					$('#cash_and_delevery').val(data.cash_and_delevery);
					$('#facebook').val(data.facebook);
					$('#youtube').val(data.youtube);
					$('#twiter').val(data.twiter);
					$('#instagram').val(data.instagram);
					$('#addres').val(data.addres);
					$('#about_us').val(data.about_us);
					$('#about_us_bn').val(data.about_us_bn);
					$('#delevery_free_limit').val(data.delevery_free_limit);
					$('#delevery_charge').val(data.delevery_charge);
					$('#offer').val(data.offer);
					$('#payment_process').val(data.payment_process);
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