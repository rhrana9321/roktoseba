<?php echo $this->load->view("websiteloginview/header"); ?>				
		
				<div class="main-content">
				
				
				<style>
					.pagi a {
						color: black;
						border: 1px solid #ddd;
						padding: 8px 16px 8px !important;
						border-radius : 0px !important;
					}
					
					.pagi strong {
						background-color: #4CAF50;
						color: white;
						padding: 8px 16px;
						border: 1px solid #4CAF50;
					}
					
					.mgs{
						color:red;
						font-weight:800;
					}
					
					.complete {
					 	background:#00CC33;
						color:#FFFFFF;
					}
					.pending {
						background:#66CCFF;
						color:#FFFFFF;
					}
					
					
					
					</style>
				<style>
					.loading {                                                                        
					  position: absolute;
					  padding-left:1000px;
					  padding-top:50px;
					  transform: translate(-50%, -50%);
					  -ms-transform: translate(-50%, -50%);    
					  z-index:1000000000;                
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
							<li class="active">ব্লগ</li>
						</ul>
					</div>
					
					<div class="page-content" id="listView">
					    <?php 
	$auid  	 			  = $this->session->userdata('websiteloginid');
	$adminuserinfo	= $this->M_cloud->find('website_adminlogin', array('webadId' => $auid));
?>
						<div class="row">
							<div class="table-header" align="right">
							    <?php if($adminuserinfo->Product_add==1){ ?>										
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
							
							 <?php if($adminuserinfo->Product_list==1){ ?>
							<div>
							<div class="col-md-3"><div class="form-group">
													<label for="pro_name">&nbsp;</label>
													
													<select class="form-control selectpicker" id="pro_cat_id2" name="pro_cat_id2" data-live-search="true">
													  <option value="">Select Category</option>
													  <?php foreach($category_tablelist as $vv){ ?>
													  <option value="<?php echo $vv->catId; ?>"><?php echo $vv->category_name; ?></option>
													 <?php } ?>
													</select>
													
												</div></div>
							
												
							<div class="col-md-3" style="padding-top:30px;"><div class="form-group">
														<button id="" type="button"  style="width:100%;" class="pull-right form-control btn btn-primary ShowNow disabled_add">
													<i class="fa fa-spinner fa-spin class_remove_add" style="font-size:24px; display:none;" ><span></span></i>
													<span class="text_remove_add">Show Now</span></button>
													
												</div></div>
							
							
							
							
							</div>
							<div align="center" class="loading" id="loader" style="display:none;">
							   <img src="<?php echo base_url('resource/img/loadings.gif');?>" height="200"/>
							</div>
							<div class="search_product_Value" id="CustomerList">
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
														<th>SL.</th>
														<th>Category Name</th>
														<th style="width:20%;"> Name</th>
														<th>Date</th>
														<th>Image </th>
														<th>Action</th>
														
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                
                                                
                                                 <?php
												 	if($onset_row == 0){
														$i= 1;
													} else {
														$i= $onset_row+1;
													}
													foreach($product_tablelist as $v) {
													$status  = $v->status;
													$cateinfo				= $this->M_cloud->find('blog_category_mange', array('catId' => $v->pro_cat_id));
													
													?> 
                                                
                                                    <tr>
														<td><?php echo $i++; ?></td>
														
														<td><?php echo $cateinfo->category_name; ?></td>
														<td style="width:20%;"><?php echo $v->product_name; ?></td>
														<td style="width:20%;"><?php echo $v->cdate; ?></td>
														<td class="hidden-480"><img height="30" src="<?php echo base_url("uploads/".$v->proimage); ?>" /></td>
														<td>
															<div class="action-buttons">
															    <?php if($adminuserinfo->Product_edit==1){ ?>
																<a class="green" href="#" data-id="<?php echo $v->wproid ?>">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>
																|
																<?php } ?>
																<?php if($adminuserinfo->Product_delete==1){ ?>
																<a class="red delete" href="<?php echo site_url("websiteloginControler/Blog/delete/" . $v->wproid); ?>">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
			                                                    <?php } ?>
													
															</div>
														</td>
                                             </tr>
                                                    
                                                    
                                                     <?php }?>
                                                    
                                                    

                                                </tbody>
                                            </table>
											
								<div id="page" style="padding-bottom:100px;">
								<ul class="pagination-sm list-inline text-center">
									<li class="pagi"><?php echo $this->pagination->create_links(); ?></li>
								</ul>
							  </div>
							</div>
							</div>
							<?php } ?>
						</div>
						
						
						
					</div>
					
					
				</div>
			</div>
			
			
			
			
			
			<div id="modal-form" class="modal" tabindex="-1" data-backdrop="static">
						<form id="addForm" action="<?php echo site_url('websiteloginControler/Blog/store'); ?>" enctype="multipart/form-data" method="post">
							<input type="hidden" id="id" name="id" value="<?php echo $wproid; ?>" />
							<div class="modal-dialog" style="width:680px;">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="blue bigger">Add  Blog</h4>
									</div>

									<div class="modal-body">
										
										
										<div class="row">
											<div class="col-xs-12 col-sm-11">
												
												<div class="form-group">
													<label for="pro_name">Category</label>
													
													<select class="form-control" id="pro_cat_id" name="pro_cat_id" data-live-search="true">
													  <option value="">Select</option>
													 <?php foreach($category_tablelist as $v){ ?>
													  <option value="<?php echo $v->catId; ?>"><?php echo $v->category_name; ?></option>
													 <?php } ?>
													</select>
													
												</div>
												
												
												<div class="row">
												<div class="col-md-12"><div class="form-group">
												<label for="pro_name"> Name</label>
												<div>
												<input type="text" name="product_name" id="product_name"  tabindex="1" 
												class="form-control" placeholder=" Name"  value="" />
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
												
												
												
												<div class="form-group">
												<label for="">Details</label>
												<div>
												<textarea class="form-control" rows="12" name="prodetails" id="ajaxfilemanager" value="" tabindex="20" style="height:400px;"></textarea>
												</div>
												</div>
												
												<div class="row" style="padding-left:15px;">
												<div class="form-group">
												<label for="comlogo"> Image  (Size W-500 X H-350)</label>
												<div>
												<input name="proimage" id="proimage" type="file" value="" />
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

$("#cate_id").on('change', function(){
	var cate_id = $(this).val();
	var url   = "<?php echo site_url('websiteloginControler/Blog/CityWisearea'); ?>";
		$.ajax({
		url:url,
		type:"POST",
		data:{cate_id:cate_id},
		success:function(data){
		$("#sub_cat").html(data);
		}
	});
});


$(".class_click").on('click', function(){
	var cate_id = $("#cate_id").val();
	var sub_cat = $("#sub_cat").val();
	var url   = "<?php echo site_url('websiteloginControler/Blog/Shorting'); ?>";
		$.ajax({
		url:url,
		type:"POST",
		data:{cate_id:cate_id,sub_cat:sub_cat},
		success:function(data){
		$("#Pro_list_show").html(data);
		}
	});
});

</script>			
<script>

//$(".edit").click(function(e)
$(document).on("click", ".green", function(e)
{
	var id 		= $(this).attr("data-id");
	var formURL = "<?php echo site_url('websiteloginControler/Blog/update'); ?>";			
		$.ajax(
		{
		url : formURL,
		type: "POST",
		data : {id:id},
		dataType: "json",
		success:function(data){
		$('#modal-form').modal('show');
		$('#id').val(data.wproid);
		$('#pro_cat_id').val(data.pro_cat_id);
		$('#pro_sub_id').val(data.pro_sub_id);
		$('#sub_sub_pro_id').val(data.sub_sub_pro_id);
		$('#product_name').val(data.product_name);
		$('#product_name_bn').val(data.product_name_bn);
		$('#product_kg_liter_dos').val(data.product_kg_liter_dos);
		$('#product_kg_liter_dos_bn').val(data.product_kg_liter_dos_bn);
		$('#product_price').val(data.product_price);
		$('#discount_price').val(data.discount_price);
		$('#product_discount').val(data.product_discount);
		$('#search_key_word').val(data.search_key_word);
		$('#procode').val(data.procode);
		$('#prosize').val(data.prosize);
		$('#status').val(data.status);
		$('#quntity').val(data.quntity);
		if(data.new_arrival){
		$('#new_arrival').prop('checked', true);
		}
		if(data.new_arrival){
		$('#Offer').prop('checked', true);
		}
		$('#ajaxfilemanager').val(data.prodetails);
		tinyMCE.get('ajaxfilemanager').setContent(data.prodetails);
		$('#ajaxfilemanager2').val(data.prodetails_bn);
		tinyMCE.get('ajaxfilemanager2').setContent(data.prodetails_bn);
		$('.update').text("Update");
		Edit_cateWish(data.pro_cat_id,data.pro_sub_id);
		Edit_SubcateWish(data.pro_cat_id,data.pro_sub_id,data.sub_sub_pro_id);
		}
	});

	e.preventDefault();
});
//update End



$("#pro_cat_id").on('change', function(){
	var pro_cat_id = $(this).val();
	var url   = "<?php echo site_url('websiteloginControler/Blog/subcateidsubcat'); ?>";
		$.ajax({
		url:url,
		type:"POST",
		data:{pro_cat_id:pro_cat_id},
		success:function(data){
		$("#pro_sub_id").html(data);
		}
	});
});


$("#pro_sub_id").on('change', function(){
	var pro_sub_id = $(this).val();
	var url   = "<?php echo site_url('websiteloginControler/Blog/Subsubcateidsubcat'); ?>";
		$.ajax({
		url:url,
		type:"POST",
		data:{pro_sub_id:pro_sub_id},
		success:function(data){
		$("#sub_sub_pro_id").html(data);
		}
	});
});

function Edit_SubcateWish(pro_cat_id,pro_sub_id,subsubcate){
	var pro_cat_id = pro_cat_id;
	var pro_sub_id = pro_sub_id;
	var pro_Sub_sub_id = subsubcate;
	var urlmgs = "<?php echo site_url('websiteloginControler/Blog/Subsubcateidsubcat'); ?>";
		$.ajax({
		url:urlmgs,
		type:"POST",
		data:{pro_sub_id:pro_sub_id},
		success:function(data){
		$("#sub_sub_pro_id").html(data);
		$('#sub_sub_pro_id').val(subsubcate);
		}
	});
}


function Edit_cateWish(pro_cat_id,pro_sub_id){
	var pro_cat_id = pro_cat_id;
	var pro_sub_id = pro_sub_id;
	var urlmgs = "<?php echo site_url('websiteloginControler/Blog/subcateidsubcat'); ?>";
		$.ajax({
		url:urlmgs,
		type:"POST",
		data:{pro_cat_id:pro_cat_id},
		success:function(data){
		$("#pro_sub_id").html(data);
		$('#pro_sub_id').val(pro_sub_id);
		}
	});
}




$('.delete').click(function (){
	var answer = confirm("Are you sure delete this data?");
		if (answer) {
		return true;
		}else{
		return false;
		}
});




</script>	
<script type="text/javascript">

	$(".customer_idclick").click(function(event){
	event.preventDefault();
	var searchIDs = $("input:checkbox:checked").map(function(){
		return $(this).val();
		}).get(); // <----
		//console.log(searchIDs);
		
		var url   = "<?php echo site_url('websiteloginControler/Blog/multi_delete'); ?>";
		
		$.ajax({
		url:url,
		type:"POST",
		data:{searchIDs:searchIDs},
		dataType: "html",
		success:function(data){
		location.reload();
		}
	});
});



</script>
<script type="text/javascript">

$(".ShowNow").on('click', function(){

	var pro_cat_id2 			= $('#pro_cat_id2').val();
	var url   = "<?php echo site_url('websiteloginControler/Blog/Show_now'); ?>";
		$.ajax({
		url:url,
		type:"POST",
		data:{pro_cat_id2:pro_cat_id2},
		dataType: "html",
		success:function(data){
		$("#CustomerList").html(data);
		}
	});
});


</script>	
			
<?php echo $this->load->view("websiteloginview/footer"); ?>