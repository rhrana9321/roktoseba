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
						<li class="active">User Manage</li>
					</ul>
				</div>
				<?php 
				    $auid  	 			  = $this->session->userdata('websiteloginid');
		            $adminuserinfo	= $this->M_cloud->find('website_adminlogin', array('webadId' => $auid));
			    ?>
				<div class="page-content" id="listView">
					<div class="row">
						<div class="table-header" align="right">
						    <?php if($adminuserinfo->user_add==1){ ?>											
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
							
        				    <?php if($adminuserinfo->user_list==1){ ?>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">SN</th>
											<th>Username</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
									
									<?php 
									$i=1;
									foreach($slider_tablelist as $v) {
										$status  = $v->status;
										?> 
									
										<tr>
											<td class="center"><?php echo $i++; ?></td>
											<td><?php echo $v->username; ?></td>
											<td>
												<div class="action-buttons">
												   
													<?php if($adminuserinfo->user_edit==1){ ?>
													<a class="green" href="#" data-id="<?php echo $v->webadId; ?>">
														<i class="ace-icon fa fa-pencil bigger-130"></i>
													</a>
													|
													<?php } ?>
													<?php if($adminuserinfo->user_delete==1){ ?>
													<a class="red delete" href="<?php echo site_url("websiteloginControler/User_manage/delete/" . $v->webadId); ?>">
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
						<form id="addForm" action="<?php echo site_url('websiteloginControler/User_manage/store'); ?>" method="post">
							<input type="hidden" id="id" name="id" value="<?php echo $sliId; ?>" />
							<div class="modal-dialog" style="width:900px;">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="blue bigger">Add  User </h4>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-xs-12 col-sm-11">
												<div class="form-group">
													<label for="pro_name">Username</label>
													<div>
														<input type="text" name="username" id="username"  tabindex="1" 
														class="form-control" placeholder="Username"  value="" />
													</div>
												</div>
												<div class="form-group">
													<label for="pro_name">Password</label>
													<div>
														<input type="text" name="password" id="password"  tabindex="1" 
														class="form-control" placeholder="Password"  value="" />
													</div>
												</div>
												<div class="row" style="padding-left:10px;font-size:16px;color:#FF0000;font-weight:bold;">User Roll </div>
												
												<hr />
												<h5 class="blue bolder">Company Settings</h5>
												<div class="row" style="padding-top:10px;">
												<div style="padding-left:12px;"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Basic" name="Basic" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Basic Informtion Modulesss</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="basic_list" name="basic_list" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Basic List</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="basic_edit" name="basic_edit" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Basic Edit</label>
												</div>
												</div></div>
												</div>
												
												<hr />
												<h5 class="blue bolder">Ads Module</h5>
												<div class="row" style="padding-top:10px;">
												<div style="padding-left:12px;"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="pro_add" name="pro_add" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Ads Module</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="add_add" name="add_add" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Add Ads</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Add_list" name="Add_list" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Ads List</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Add_edit" name="Add_edit" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Ads Edit</label>
												</div>
												</div></div>
													<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Add_Delete" name="Add_Delete" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Ads Delete</label>
												</div>
												</div></div>
												</div>
												
												<hr />
												
												
												<h5 class="blue bolder">Discount Module</h5>
												<div class="row" style="padding-top:10px;">
												<div style="padding-left:12px;"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Coupons" name="Coupons" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Discount Module</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Coupons_list" name="Coupons_list" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Discount List </label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Coupons_add" name="Coupons_add" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Discount Add</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Coupons_edit" name="Coupons_edit" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Discount Edit</label>
												</div>
												</div></div>
													<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Coupons_delete" name="Coupons_delete" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Discount Delete</label>
												</div>
												</div></div>
												</div>
												
												<hr />
												
												<h5 class="blue bolder">User Module</h5>
												<div class="row" style="padding-top:10px;">
												<div style="padding-left:12px;"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="User" name="User" value="1">
												<label class="form-check-label" for="inlineCheckbox1">User manage Module</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="user_list" name="user_list" value="1">
												<label class="form-check-label" for="inlineCheckbox1">User List</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="user_add" name="user_add" value="1">
												<label class="form-check-label" for="inlineCheckbox1">User Add</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="user_edit" name="user_edit" value="1">
												<label class="form-check-label" for="inlineCheckbox1">User Edit</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="user_delete" name="user_delete" value="1">
												<label class="form-check-label" for="inlineCheckbox1">User Delete</label>
												</div>
												</div></div>
												</div>
												
												<hr />
												<h5 class="blue bolder">Main Slider Module</h5>
												<div class="row" style="padding-top:10px;">
												<div style="padding-left:12px;"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Slider" name="Slider" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Slider manage Module</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="slider_list" name="slider_list" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Slider List</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="slider_add" name="slider_add" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Slider Add</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="slider_edit" name="slider_edit" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Slider Edit</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="slider_delete" name="slider_delete" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Slider Delete</label>
												</div>
												</div></div>
												</div>
												
												<hr />
												<h5 class="blue bolder">Secondery Slider Module</h5>
												<div class="row" style="padding-top:10px;">
												<div style="padding-left:12px;"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="How_to_order" name="How_to_order" value="1">
												<label class="form-check-label" for="inlineCheckbox1">How to order manage Module</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="How_to_order_list" name="How_to_order_list" value="1">
												<label class="form-check-label" for="inlineCheckbox1">How to order List</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="How_to_order_add" name="How_to_order_add" value="1">
												<label class="form-check-label" for="inlineCheckbox1">How to order Add</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="How_to_order_edit" name="How_to_order_edit" value="1">
												<label class="form-check-label" for="inlineCheckbox1">How to order Edit</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="How_to_order_delete" name="How_to_order_delete" value="1">
												<label class="form-check-label" for="inlineCheckbox1">How_to_order Delete</label>
												</div>
												</div></div>
												</div>
												
												<hr />
												<h5 class="blue bolder">Content Management Module</h5>
												<div class="row" style="padding-top:10px;">
												<div style="padding-left:12px;"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Content" name="Content" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Content manage Module</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Content_list" name="Content_list" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Content List</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Content_add" name="Content_add" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Content Add</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Content_edit" name="Content_edit" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Content Edit</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="Content_delete" name="Content_delete" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Content Delete</label>
												</div>
												</div></div>
												</div>
												
												<hr />
												<h5 class="blue bolder">Category Module</h5>
												<div class="row" style="padding-top:10px;">
												<div style="padding-left:12px;"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Category" name="Category" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Category Manage Module</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Category_list" name="Category_list" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Category List</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Category_add" name="Category_add" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Category Add</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Category_edit" name="Category_edit" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Category Edit</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="Category_delete" name="Category_delete" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Category Delete</label>
												</div>
												</div></div>
												</div>
												
												<hr />
												<h5 class="blue bolder">Sub-Category Module</h5>
												<div class="row" style="padding-top:10px;">
												<div style="padding-left:12px;"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="subCategory" name="subCategory" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Sub Category manage Module</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="subCategory_list" name="subCategory_list" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Sub Category  List</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="subCategory_add" name="subCategory_add" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Sub Category Add</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="subCategory_edit" name="subCategory_edit" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Sub Category Edit</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="subCategory_delete" name="subCategory_delete" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Sub Category Delete</label>
												</div>
												</div></div>
												</div>
												
												
												<hr />
												<h5 class="blue bolder">Sub To Sub-Category Module</h5>
												<div class="row" style="padding-top:10px;">
												<div style="padding-left:12px;"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="SubsubCategory" name="SubsubCategory" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Sub TO Sub Category manage Module</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="SubsubCategory_list" name="SubsubCategory_list" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Sub To Sub Category  List</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="SubsubCategory_add" name="SubsubCategory_add" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Sub To Sub Category Add</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="SubsubCategory_edit" name="SubsubCategory_edit" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Sub To Sub Category Edit</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="SubsubCategory_delete" name="SubsubCategory_delete" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Sub To Sub Category Delete</label>
												</div>
												</div></div>
												</div>
												
												<hr />
												<h5 class="blue bolder">Products Module</h5>
												<div class="row" style="padding-top:10px;">
												<div style="padding-left:12px;"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Product" name="Product" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Product Manage Module</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Product_list" name="Product_list" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Product List</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Product_add" name="Product_add" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Product Add</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Product_edit" name="Product_edit" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Product Edit</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="Product_delete" name="Product_delete" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Product Delete</label>
												</div>
												</div></div>
												</div>
												
												<hr />
												<h5 class="blue bolder">New Order Module</h5>
												<div class="row" style="padding-top:10px;">
												<div style="padding-left:12px;"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="New_Order" name="New_Order" value="1">
												<label class="form-check-label" for="inlineCheckbox1">New Order Manage Module</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="New_Order_list" name="New_Order_list" value="1">
												<label class="form-check-label" for="inlineCheckbox1">New Order List</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="New_Order_view" name="New_Order_view" value="1">
												<label class="form-check-label" for="inlineCheckbox1">New Order View</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="New_Order_edit" name="New_Order_edit" value="1">
												<label class="form-check-label" for="inlineCheckbox1">New Order Edit</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="New_Order_delete" name="New_Order_delete" value="1">
												<label class="form-check-label" for="inlineCheckbox1">New Order Delete</label>
												</div>
												</div></div>
												</div>
												
												<hr />
												<h5 class="blue bolder">Order Confirm Module</h5>
												<div class="row" style="padding-top:10px;">
												<div style="padding-left:12px;"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Order_Confirm" name="Order_Confirm" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Order Confirm Manage Module</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Order_Confirm_list" name="Order_Confirm_list" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Order Confirm List</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Order_Confirm_View" name="Order_Confirm_View" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Order Confirm View</label>
												</div>
												</div></div>
												<div class="col-md-3"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="Order_Confirm_delete" name="Order_Confirm_delete" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Order Confirm Delete</label>
												</div>
												</div></div>
												</div>
												
												<hr />
												<h5 class="blue bolder">Order Complete Module</h5>
												<div class="row" style="padding-top:10px;">
												<div style="padding-left:12px;"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Order_Completed" name="Order_Completed" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Order Completed Manage Module</label>
												</div>
												</div></div>
												<div class="col-md-4"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Order_Completed_list" name="Order_Completed_list" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Order Completed List</label>
												</div>
												</div></div>
												<div class="col-md-4"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Order_Completed_View" name="Order_Completed_View" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Order Completed View</label>
												</div>
												</div></div>
												<div class="col-md-4"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="Order_Completed_delete" name="Order_Completed_delete" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Order Completed Delete</label>
												</div>
												</div></div>
												</div>
												
												<hr />
												<h5 class="blue bolder">Register Module</h5>
												<div class="row" style="padding-top:10px;">
												<div style="padding-left:12px;"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Register" name="Register" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Register View Manage Module</label>
												</div>
												</div></div>
												<div class="col-md-4"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Register_list" name="Register_list" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Register List</label>
												</div>
												</div></div>
												<div class="col-md-4"><div class="form-group">
												<div class="form-check form-check-inline">
												<input class="form-check-input all_select" type="checkbox" id="Register_delete" name="Register_delete" value="1">
												<label class="form-check-label" for="inlineCheckbox1">Register Delete</label>
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
	
		//$(".edit").click(function(e)
		$(document).on("click", ".green", function(e)
		{
			var id 		= $(this).attr("data-id");
			var formURL = "<?php echo site_url('websiteloginControler/User_manage/update'); ?>";			
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {id:id},
				dataType: "json",
				success:function(data){
					$('#modal-form').modal('show');
					$('#id').val(data.webadId);
					$('#username').val(data.username);
					$('#password').val(data.re_type_password);
					if(data.Basic){
					$('#Basic').prop('checked', true);
					}
					if(data.basic_list){
					$('#basic_list').prop('checked', true);
					}
					if(data.basic_edit){
					$('#basic_edit').prop('checked', true);
					}
					
					
					
					
					if(data.User){
					$('#User').prop('checked', true);
					}
					if(data.user_list){
					$('#user_list').prop('checked', true);
					}
					if(data.pro_add){
					$('#pro_add').prop('checked', true);
					}
					if(data.add_add){
					$('#add_add').prop('checked', true);
					}
					
					
					if(data.Add_list){
					$('#Add_list').prop('checked', true);
					}
					if(data.Add_edit){
					$('#Add_edit').prop('checked', true);
					}
					if(data.Add_Delete){
					$('#Add_Delete').prop('checked', true);
					}
					if(data.user_add){
					$('#user_add').prop('checked', true);
					}
					if(data.user_edit){
					$('#user_edit').prop('checked', true);
					}
					if(data.user_delete){
					$('#user_delete').prop('checked', true);
					}
					if(data.Slider){
					$('#Slider').prop('checked', true);
					}
					if(data.slider_list){
					$('#slider_list').prop('checked', true);
					}
					if(data.slider_add){
					$('#slider_add').prop('checked', true);
					}
					if(data.slider_edit){
					$('#slider_edit').prop('checked', true);
					}
					if(data.slider_delete){
					$('#slider_delete').prop('checked', true);
					}
					if(data.How_to_order){
					$('#How_to_order').prop('checked', true);
					}
					if(data.How_to_order_list){
					$('#How_to_order_list').prop('checked', true);
					}
					if(data.How_to_order_add){
					$('#How_to_order_add').prop('checked', true);
					}
					if(data.How_to_order_edit){
					$('#How_to_order_edit').prop('checked', true);
					}
					if(data.How_to_order_delete){
					$('#How_to_order_delete').prop('checked', true);
					}
					if(data.Content){
					$('#Content').prop('checked', true);
					}
					if(data.Content_list){
					$('#Content_list').prop('checked', true);
					}
					if(data.Content_add){
					$('#Content_add').prop('checked', true);
					}
					if(data.Content_edit){
					$('#Content_edit').prop('checked', true);
					}
					if(data.Content_delete){
					$('#Content_delete').prop('checked', true);
					}
					if(data.Category){
					$('#Category').prop('checked', true);
					}
					if(data.Category_list){
					$('#Category_list').prop('checked', true);
					}
					if(data.Category_add){
					$('#Category_add').prop('checked', true);
					}
					if(data.Category_edit){
					$('#Category_edit').prop('checked', true);
					}
					if(data.Category_delete){
					$('#Category_delete').prop('checked', true);
					}
					if(data.subCategory){
					$('#subCategory').prop('checked', true);
					}
					if(data.subCategory_list){
					$('#subCategory_list').prop('checked', true);
					}
					if(data.subCategory_add){
					$('#subCategory_add').prop('checked', true);
					}
					if(data.subCategory_edit){
					$('#subCategory_edit').prop('checked', true);
					}
					if(data.subCategory_delete){
					$('#subCategory_delete').prop('checked', true);
					}
					
					
					if(data.SubsubCategory){
					$('#SubsubCategory').prop('checked', true);
					}
					if(data.SubsubCategory_list){
					$('#SubsubCategory_list').prop('checked', true);
					}
					if(data.SubsubCategory_add){
					$('#SubsubCategory_add').prop('checked', true);
					}
					if(data.SubsubCategory_edit){
					$('#SubsubCategory_edit').prop('checked', true);
					}
					if(data.SubsubCategory_delete){
					$('#SubsubCategory_delete').prop('checked', true);
					}
					
					
					if(data.Product){
					$('#Product').prop('checked', true);
					}
					if(data.Product_list){
					$('#Product_list').prop('checked', true);
					}
					if(data.Product_add){
					$('#Product_add').prop('checked', true);
					}
					if(data.Product_edit){
					$('#Product_edit').prop('checked', true);
					}
					if(data.Product_delete){
					$('#Product_delete').prop('checked', true);
					}
					if(data.New_Order){
					$('#New_Order').prop('checked', true);
					}
					if(data.New_Order_list){
					$('#New_Order_list').prop('checked', true);
					}
					if(data.New_Order_view){
					$('#New_Order_view').prop('checked', true);
					}
					if(data.New_Order_edit){
					$('#New_Order_edit').prop('checked', true);
					}
					if(data.New_Order_delete){
					$('#New_Order_delete').prop('checked', true);
					}
					if(data.Order_Confirm){
					$('#Order_Confirm').prop('checked', true);
					}
					if(data.Order_Confirm_list){
					$('#Order_Confirm_list').prop('checked', true);
					}
					if(data.Order_Confirm_View){
					$('#Order_Confirm_View').prop('checked', true);
					}
					if(data.Order_Confirm_delete){
					$('#Order_Confirm_delete').prop('checked', true);
					}
					if(data.Order_Completed){
					$('#Order_Completed').prop('checked', true);
					}
					if(data.Order_Completed_list){
					$('#Order_Completed_list').prop('checked', true);
					}
					if(data.Order_Completed_View){
					$('#Order_Completed_View').prop('checked', true);
					}
					if(data.Order_Completed_delete){
					$('#Order_Completed_delete').prop('checked', true);
					}
					if(data.Register){
					$('#Register').prop('checked', true);
					}
					if(data.Register_list){
					$('#Register_list').prop('checked', true);
					}
					if(data.Register_delete){
					$('#Register_delete').prop('checked', true);
					}
					if(data.Coupons){
					$('#Coupons').prop('checked', true);
					}
					if(data.Coupons_list){
					$('#Coupons_list').prop('checked', true);
					}
					if(data.Coupons_add){
					$('#Coupons_add').prop('checked', true);
					}
					if(data.Coupons_edit){
					$('#Coupons_edit').prop('checked', true);
					}
					if(data.Coupons_delete){
					$('#Coupons_delete').prop('checked', true);
					}
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

<script type="text/javascript">
//$("#all_select").click(function(event){
//	$('.all_select') = $("input:checkbox:checked").map(function(){
//});
$('input[name="all_select"]:checked').each(function() {
  alert('ok');
});




</script>
			
			
<?php echo $this->load->view("websiteloginview/footer"); ?>