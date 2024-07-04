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
							<li class="active">Discount Manage</li>
						</ul>
					</div>
					<?php 
    				    $auid  	 			  = $this->session->userdata('websiteloginid');
    		            $adminuserinfo	= $this->M_cloud->find('website_adminlogin', array('webadId' => $auid));
				    ?>
					<div class="page-content" id="listView">
						<div class="row">
							<div class="table-header" align="right">
							    <?php if($adminuserinfo->Coupons_add==1){ ?>												
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
							
							<?php if($adminuserinfo->Coupons_list==1){ ?>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">SN</th>
											<th class="center">Coupon Name</th>
											<th class="center">Code</th>
											<th class="center">Type</th>
											<th class="center">Discount</th>
											<th class="center">Date Start</th>
											<th class="center">Date End</th>
											<th class="center">Status</th>
											<th class="center">Action</th>
										</tr>
									</thead>

									<tbody>
									
									<?php 
									$i=1;
									foreach($product_tablelist as $v) {
										
										$status  = $v->status;
										
										?> 
									
										<tr>
											<td class="center"><?php echo $i++; ?></td>
											<td class="center"><?php echo $v->coupons_name; ?></td>
											<td class="center"><?php echo $v->coupons_code; ?></td>
											<td class="center"><?php echo $v->cou_type; ?></td>
											<td class="center"><?php echo $v->discount; ?></td>
											<td class="center"><?php echo $v->Date_Start; ?></td>
											<td class="center"><?php echo $v->Date_End; ?></td>
											<td class="center"><?php echo $v->Status; ?></td>
											<td class="center">
												<div class="">
												    <?php if($adminuserinfo->Coupons_edit==1){ ?>
													<a class="green" href="#" data-id="<?php echo $v->cou_id; ?>">
														<i class="ace-icon fa fa-pencil bigger-130"></i>
													</a>
													|
													<?php } ?>
													<?php if($adminuserinfo->Coupons_delete==1){ ?>
													<a class="red delete" href="<?php echo site_url("websiteloginControler/Coupons_manage/delete/" . $v->cou_id); ?>">
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
						<form id="addForm" action="<?php echo site_url('websiteloginControler/Coupons_manage/store'); ?>" method="post">
							<input type="hidden" id="id" name="id" value="<?php echo $add_id; ?>" />
							<div class="modal-dialog" style="width:680px;">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="blue bigger">Discount ADD</h4>
									</div>

									<div class="modal-body">
										
										<div class="row">
											<div class="col-xs-12 col-sm-11">
												
												
												
												<div class="form-group">
													<label for="pro_name">Discount Name</label>
													<div>
														<input type="text" required name="coupons_name" id="coupons_name"  tabindex="1" 
														class="form-control" placeholder="Coupons Name"  value="" />
													</div>
												</div>
												<div class="form-group">
													<label for="pro_name">Discount Code</label>
													<div>
														<input type="text" required name="coupons_code" id="coupons_code"  tabindex="1" 
														class="form-control" placeholder="Coupons Code"  value="" />
													</div>
												</div>
												
												<div class="form-group">
													<label for="pro_name">Show Type</label>
													<div>
														<select class="form-control" name="cou_type" id="cou_type" tabindex="6">
															<option value="" selected="selected">Type</option>
                											<option value="Percentage">Percentage</option>
															<option value="Fixed Amount">Fixed Amount</option>
														</select>
													</div>
												</div>
												
												<div class="form-group">
													<label for="pro_name">Discount Amount</label>
													<div>
														<input type="text" required name="discount" id="discount"  tabindex="1" 
														class="form-control" placeholder="Discount"  value="" />
													</div>
												</div>
												
												
												<div class="form-group">
													<label for="pro_name">Date Start</label>
													<div>
														<input type="date" required name="Date_Start" id="Date_Start"  tabindex="1" 
														class="form-control" placeholder="Date Start"  value="" />
													</div>
												</div>
												<div class="form-group">
													<label for="pro_name">Date End</label>
													<div>
														<input type="date" required name="Date_End" id="Date_End"  tabindex="1" 
														class="form-control" placeholder="Date End"  value="" />
													</div>
												</div>
												
												<div class="form-group">
													<label for="pro_name">Status</label>
													<div>
														<select class="form-control" name="Status" id="Status" tabindex="6">
															<option value="" selected="selected">Type</option>
                											<option value="Enabled">Enabled</option>
															<option value="Disabled">Disabled</option>
														</select>
													</div>
												</div>
											
												<div class="row" style="padding-left:15px;">
												<div class="form-group">
														
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
			var formURL = "<?php echo site_url('websiteloginControler/Coupons_manage/update'); ?>";			
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {id:id},
				dataType: "json",
				success:function(data){
					$('#modal-form').modal('show');
					$('#id').val(data.cou_id);
					$('#coupons_name').val(data.coupons_name);
					$('#coupons_code').val(data.coupons_code);
					$('#cou_type').val(data.cou_type);
					$('#discount').val(data.discount);
					$('#Date_Start').val(data.Date_Start);
					$('#Date_End').val(data.Date_End);
					$('#Status').val(data.Status);
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