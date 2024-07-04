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
							<li class="active">How to order Manage</li>
						</ul>
					</div>
					
					<div class="page-content" id="listView">
					    <?php 
	$auid  	 			  = $this->session->userdata('websiteloginid');
	$adminuserinfo	= $this->M_cloud->find('website_adminlogin', array('webadId' => $auid));
?>
						<div class="row">
							<div class="table-header" align="right">
							    	<?php if($adminuserinfo->How_to_order_add==1){ ?>										
								<a href="#modal-form" role="button" class="label label-xlg label-light arrowed-in-right blue"
								 data-toggle="modal" style="text-decoration:none;">  <i class="ace-icon fa fa-plus"></i></a>
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
							
							<?php if($adminuserinfo->How_to_order_list==1){ ?>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">SN</th>
											<th> Title</th>
											<th> Image </th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
									
									<?php 
									$i=1;
									foreach($order_tablelist as $v) {
										
										$status  = $v->status;
										
										?> 
									
										<tr>
											<td class="center"><?php echo $i++; ?></td>
											<td><?php echo $v->slider_title; ?></td>
											<td class="hidden-480"><img height="30" src="<?php echo base_url("uploads/".$v->proimage); ?>" /></td>
										
											
											<td>
												<div class="hidden-sm hidden-xs action-buttons">
												    <?php if($adminuserinfo->How_to_order_edit==1){ ?>
													<a class="green" href="#" data-id="<?php echo $v->sliId ?>">
														<i class="ace-icon fa fa-pencil bigger-130"></i>
													</a>
													|
													<?php } ?>
													<?php if($adminuserinfo->How_to_order_delete==1){ ?>
													<a class="red delete" href="<?php echo site_url("websiteloginControler/How_to_order/delete/" . $v->sliId); ?>">
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
						<form id="addForm" action="<?php echo site_url('websiteloginControler/How_to_order/store'); ?>" method="post" enctype="multipart/form-data">
							<input type="hidden" id="id" name="id" value="<?php echo $sliId; ?>" />
							<div class="modal-dialog" style="width:680px;">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="blue bigger">Add   image</h4>
									</div>

									<div class="modal-body">
										
										
										<div class="row">
											<div class="col-xs-12 col-sm-11">
												
												
												
												
												
												<div class="row">
												<div class="col-md-6"><div class="form-group">
													<label for="pro_name"> Title EN</label>
													<div>
														<input type="text" name="slider_title" id="slider_title"  tabindex="1" 
														class="form-control" placeholder=" Title"  value="" />
													</div>
												</div></div>
												<div class="col-md-6"><div class="form-group">
													<label for="pro_name"> Title BN</label>
													<div>
														<input type="text" name="slider_title_bn" id="slider_title_bn"  tabindex="1" 
														class="form-control" placeholder=" Title BN"  value="" />
													</div>
												</div></div>
												
												</div>
												
												
												<div class="form-group">
													<label for="pro_name">Status</label>
													<div>
														<select class="form-control" name="status" id="status" tabindex="6">
															<option value="1" selected="selected">Active</option>
                											<option value="0">Inactive</option>
														</select>
													</div>
												</div>
												
												<div class="row">
												
												<div class="col-md-6"><div class="form-group">
												<label for="comlogo">Image Upload  (Size-W-1024px X H-250px)</label>
												<div>
												<input name="proimage" id="proimage" type="file" value="" />
												</div>
												</div></div>
												
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
			
			var formURL = "<?php echo site_url('websiteloginControler/How_to_order/update'); ?>";			
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {id:id},
				dataType: "json",
				success:function(data){
					$('#modal-form').modal('show');
					$('#id').val(data.sliId);
					$('#slider_title').val(data.slider_title);
					$('#slider_title_bn').val(data.slider_title_bn);
					$('#status').val(data.status);
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