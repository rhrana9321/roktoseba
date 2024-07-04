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
							<li class="active">ডোনার লিস্ট </li>
						</ul>
					</div>
					
					<div class="page-content" id="listView">
						<div class="row">
							<div class="table-header" align="right">											
								&nbsp;
							</div>
							
							
							<div>
							<div>
							<div class="col-md-2"><div class="form-group">
													<label for="pro_name">&nbsp;</label>
													
													<select class="form-control" id="status" name="status">
													  <option value="">Select</option>
													  <option value="1">প্লাটিলেট</option>
													</select>
													
												</div></div>
							<div class="col-md-2"><div class="form-group">
													<label for="pro_name">&nbsp;</label>
													
													<select class="form-control" id="blood_group" name="blood_group">
													  <option value="">Select Blood Group</option>
													  <option value="A+">A+</option>
													  <option value="A-">A-</option>
													  <option value="B+">B+</option>
													  <option value="B-">B-</option>
													  <option value="O+">O+</option>
													  <option value="O-">O-</option>
													  <option value="AB+">AB+</option>
													  <option value="AB-">AB-</option>
													</select>
													
												</div></div>
												
									
									<div class="col-md-2"><div class="form-group">
													<label for="pro_name">&nbsp;</label>
													
													<select name="s_district" class="form-control custom-select"  id="s_district" required>
											<option value="">বাছাই করুন  জেলা</option>
										<?php foreach($DIstlist as $dv1){ ?>
											<option value="<?php echo $dv1->id; ?>"><?php echo $dv1->bn_name; ?></option>
											<?php } ?>
										</select>
													
												</div></div>			
										<div class="col-md-2"><div class="form-group">
													<label for="pro_name">&nbsp;</label>
													
													<select name="s_upzilla" class="form-control custom-select"  id="upzillaListv" required>
											<option value="">বাছাই করুন  উপজেলা</option>
										
										</select>
													
												</div></div>		
												
												
							<div class="col-md-4" style="padding-top:30px;"><div class="form-group">
														<button id="" type="button"  style="width:100%;" class="pull-right form-control btn btn-primary class_click">
													<i class="fa fa-spinner fa-spin " style="font-size:24px; display:none;" ><span></span></i>
													<span class="text_remove_add">Show Now</span></button>
													
												</div></div>
							</div>
							
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
							
							<div class="Pro_list_show" id="Pro_list_show">
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">SN</th>
											<th>Name</th>
											<th>Email</th>
											<th>Number</th>
											<th>Address</th>
											<th>Blood Group</th>
											<th>Last Donate Date</th>
											<th>Counting</th>
											<th>Action</th>
											
										</tr>
									</thead>

									<tbody>
									
									<?php 
									$i=1;
									foreach($registationview as $v) {
										
									?> 
									
										<tr>
											<td class="center"><?php echo $i++; ?></td>
											<td><?php echo $v->signName; ?></td>
											<td><?php echo $v->signEmail; ?></td>
											<td><?php echo $v->signMobile; ?></td>
											<td><?php echo $v->address; ?></td>
											<td><?php echo $v->blood_group; ?></td>
											<td><?php echo $v->last_day; ?>/<?php echo $v->last_month; ?>/<?php echo $v->last_year; ?></td>
											<td><?php echo $v->counting_donate; ?></td>
											<td>
											<a target="_blank" class="" href="<?php echo site_url("websiteloginControler/Registation_View/edit/" . $v->signId); ?>">
														<i class="ace-icon fa fa-pencil bigger-130"></i>
													</a>
													|
											    <a class="red delete" href="<?php echo site_url("websiteloginControler/Registation_View/delete/" . $v->signId); ?>">
														<i class="ace-icon fa fa-trash-o bigger-130"></i>
													</a></td>
											
											
										</tr>
										
									<?php } ?>

									</tbody>
								</table>
							</div>
							</div>
						</div>
						
						
						
					</div>
					
					
				</div>
			</div>
			
<script>
	$('.delete').click(function (){
       var answer = confirm("Are you sure delete this data?");
          if (answer) {
             return true;
          }else{
             return false;
          }
    });
	
$(".class_click").on('click', function(){
	var status = $("#status").val();
	var blood_group = $("#blood_group").val();
	var s_district = $("#s_district").val();
	var upzillaListv = $("#upzillaListv").val();
	var url   = "<?php echo site_url('websiteloginControler/Registation_View/Show_now'); ?>";
		$.ajax({
		url:url,
		type:"POST",
		data:{status:status,blood_group:blood_group,s_district:s_district,upzillaListv:upzillaListv},
		success:function(data){
		$("#Pro_list_show").html(data);
		}
	});
});


$("#s_district").on('change', function(){
	var s_district = $(this).val();
	var cruneturl  = "<?php echo site_url('Sign_up/S_upzillaList'); ?>";
		$.ajax({
			url:cruneturl,
			type:"POST",
			data:{s_district:s_district},
			success:function(data){
				$("#upzillaListv").html(data);
			}
		});
});   

$("#district").on('change', function(){
	var district = $(this).val();
	var cruneturl  = "<?php echo site_url('Sign_up/S_upzillaList2'); ?>";
		$.ajax({
			url:cruneturl,
			type:"POST",
			data:{district:district},
			success:function(data){
				$("#s_upzillaListv").html(data);
			}
		});
});
	
	</script>	
			
<?php echo $this->load->view("websiteloginview/footer"); ?>