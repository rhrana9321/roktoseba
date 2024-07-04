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
							<li class="active">Sub To Sub Category Manage</li>
						</ul>
					</div>
					
					<div class="page-content" id="listView">
						<div class="row">
						 <?php 
	$auid  	 			  = $this->session->userdata('websiteloginid');
	$adminuserinfo	= $this->M_cloud->find('website_adminlogin', array('webadId' => $auid));
?>
							<div class="table-header" align="right">	
							<?php if($adminuserinfo->SubsubCategory_add==1){ ?>											
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
							
							<?php if($adminuserinfo->SubsubCategory_list==1){ ?>	
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">SN</th>
											<th>Category Name</th>
											<th>Sub Category Name</th>
											<th>Sub To Sub Category Name</th>
											<th>Sub Banner Image</th>
											<th>Sub Category Image</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
									
									<?php 
									$i=1;
									foreach($subsubcategory_tablelist as $v) {
										$categoryByname	 = $this->M_cloud->find('category_mange', array('catId' => $v->category_id));
										$subcategoryByname		 = $this->M_cloud->find('subcategory_mange', array('subcatId' => $v->sub_category_id));
										$status  = $v->status;
										
										?> 
									
										<tr>
											<td class="center"><?php echo $i++; ?></td>
											<td><?php echo $categoryByname->category_name; ?></td>
											<td><?php echo $subcategoryByname->sub_category_name; ?></td>
											<td><?php echo $v->sub_to_sub_category_name; ?></td>
											<td><img height="30" src="<?php echo base_url("uploads/".$v->proimage); ?>" /></td>
											<td><img height="30" src="<?php echo base_url("uploads/".$v->proimage1); ?>" /></td>
											<td>
												<div class="hidden-sm hidden-xs action-buttons">
												<?php if($adminuserinfo->SubsubCategory_edit==1){ ?>	
													<a class="green" href="#" data-id="<?php echo $v->subsubcatId ?>">
														<i class="ace-icon fa fa-pencil bigger-130"></i>
													</a>
													|
													<?php } ?>
													<?php if($adminuserinfo->SubsubCategory_delete==1){ ?>	
													<a class="red delete" href="<?php echo site_url("websiteloginControler/subsubcategory_manage/delete/" . $v->subsubcatId); ?>">
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
						<form id="addForm" action="<?php echo site_url('websiteloginControler/subsubcategory_manage/store'); ?>" method="post">
							<input type="hidden" id="id" name="id" value="<?php echo $subsubcatId; ?>" />
							<div class="modal-dialog" style="width:680px;">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="blue bigger">Add  Sub To Sub Category Name</h4>
									</div>

									<div class="modal-body">
										
										
										<div class="row">
											<div class="col-xs-12 col-sm-11">
												
												
												<div class="form-group">
													<label for="pro_name">Category Name</label>
													<div>
														<select class="form-control" name="category_id" id="category_id" tabindex="6" required>
															<option selected="selected">Select Category</option>
															<?php foreach($category_tablelist as $cv) { ?>
                											<option value="<?php echo $cv->catId; ?>"><?php echo $cv->category_name; ?></option>
															<?php } ?>
														</select>
													</div>
												</div>
												
												<div class="form-group">
													<label for="pro_name">Sub Category Name</label>
													<div id="pro_sub_idfsf">
														<select class="form-control" name="sub_category_id" id="sub_category_id" tabindex="6" required>
															<option selected="selected"> Select Sub Category Name</option>
															<?php foreach($subcategory_tablelist as $scv) { ?>
                											<option value="<?php echo $scv->subcatId; ?>"><?php echo $scv->sub_category_name; ?></option>
															<?php } ?>
														</select>
													</div>
												</div>
												
												
												<div class="row">
													<div class="col-md-6"><div class="form-group">
													<label for="pro_name">Sub To Sub Category Name EN</label>
													<div>
														<input type="text" name="sub_to_sub_category_name" required id="sub_to_sub_category_name"  tabindex="1" 
														class="form-control" placeholder="Sub Category Name EN"  value="" />
													</div>
												</div></div>
													<div class="col-md-6"><div class="form-group">
													<label for="pro_name">Sub To Sub Category Name BN</label>
													<div>
														<input type="text" name="sub_to_sub_category_name_bn" id="sub_to_sub_category_name_bn"  tabindex="1" 
														class="form-control" placeholder="Sub Category Name BN" required  value="" />
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
												
												<div class="row" style="padding-left:15px;">
												<div class="form-group">
														<label for="comlogo"> Image Upload</label> 
														<div>
														<div>Banner Image  &nbsp; &nbsp;  &nbsp;  &nbsp; Sub To Sub Category Image &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;</div>
															<div>
															 <div class="attachmentbody" data-target="#proimage" data-type="proimage">
															 (W-700 X H-215) 
																<img class="upload" src="<?php echo base_url('resource/img/no_image.jpg') ?>" />
															  </div> 
																<input name="proimage" id="proimage" type="hidden" value="" />
															</div>
															<div>
															
															 <div class="attachmentbody" data-target="#proimage1" data-type="proimage1">
															 (W-200 X H-200)
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
	
		//$(".edit").click(function(e)
		$(document).on("click", ".green", function(e)
		{
		
	
			var id 		= $(this).attr("data-id");
			
			var formURL = "<?php echo site_url('websiteloginControler/subsubcategory_manage/update'); ?>";			
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {id:id},
				dataType: "json",
				success:function(data){
					$('#modal-form').modal('show');
					$('#id').val(data.subsubcatId);
					$('#category_id').val(data.category_id);
					$('#sub_category_id').val(data.sub_category_id);
					$('#sub_to_sub_category_name').val(data.sub_to_sub_category_name);
					$('#sub_to_sub_category_name_bn').val(data.sub_to_sub_category_name_bn);
					$('#status').val(data.status);
					$('.update').text("Update");
					
				}
			});
			
			e.preventDefault();
		});
	
	
		
	//update End
	
	
	$("#category_id").on('change', function(){
		var category_id = $(this).val();
		var url   = "<?php echo site_url('websiteloginControler/subsubcategory_manage/subcateidsubcat'); ?>";
		$.ajax({
			url:url,
			type:"POST",
			data:{category_id:category_id},
			success:function(data){
				$("#pro_sub_idfsf").html(data);
			}
		
		});
	});
	
	
	
	
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