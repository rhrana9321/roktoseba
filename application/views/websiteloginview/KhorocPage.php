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
							<li class="active">খরচ</li>
						</ul>
					</div>
					
					<div class="page-content" id="listView">
					   
						<div class="row">
							<div class="table-header" align="right">
								<a href="#modal-form" role="button" class="label label-xlg label-light arrowed-in-right blue"
								 data-toggle="modal" style="text-decoration:none;">  <i class="ace-icon fa fa-plus"></i> 	 </a>
								
							</div>
							
							
							<div>
							
							<?php if(!empty($success)){?> 
							
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>Success!</strong> &nbsp; &nbsp;<?php echo $success; ?>
							</div>
							<?php }?>
							<div id="listtable">
							    
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">SN</th>
											<th>Date</th>
											<th>Name</th>
											<th>Amounts</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
									
									<?php 
									$i=1;
									$total_amount =0;
									foreach($category_tablelist as $v) {
									$total_amount =$total_amount +$v->amounts;
										?> 
									
										<tr>
											<td class="center"><?php echo $i++; ?></td>
											<td><?php echo $v->cdate; ?></td>
											<td><?php echo $v->category_name; ?></td>
											<td><?php echo $v->amounts; ?></td>
											<td>
												<div class="hidden-sm hidden-xs action-buttons">
													
													
													<a class="green" href="#" data-id="<?php echo $v->catId ?>">
														<i class="ace-icon fa fa-pencil bigger-130"></i>
													</a>
													|
													
													<a class="red delete" href="<?php echo site_url("websiteloginControler/Joma/delete/" . $v->catId); ?>">
														<i class="ace-icon fa fa-trash-o bigger-130"></i>
													</a>
										
												</div>
											</td>
										</tr>
										
									<?php } ?>
									<tr>
											<td colspan="3" style="text-align:right;">Total =</td>
											<td colspan="2"><?php echo $total_amount; ?></td>
											
										</tr>
									
									

									</tbody>
								</table>
								</div>
							</div>
						</div>
						
						
						
					</div>
					
					
				</div>
			</div>
			
			
			
			
			
			<div id="modal-form" class="modal" tabindex="-1" data-backdrop="static">
						<form id="addForm" action="<?php echo site_url('websiteloginControler/Khoroc/store'); ?>" enctype="multipart/form-data" method="post">
							<input type="hidden" id="id" name="id" value="<?php echo $catId; ?>" />
							<div class="modal-dialog" style="width:680px;">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="blue bigger">Add </h4>
									</div>

									<div class="modal-body">
										
										
										<div class="row">
											<div class="col-xs-12 col-sm-11">
												
												<div class="row">
												<div class="col-md-6"><div class="form-group">
													<label for="pro_name"> Name</label>
													<div>
														<input type="text" required name="category_name" id="category_name"  tabindex="1" 
														class="form-control" placeholder="Name"  value="" />
														
													</div>
												</div></div>
												<div class="col-md-6"><div class="form-group">
													<label for="pro_name">Amounts</label>
													<div>
														<input type="text" required name="amounts" id="amounts"  tabindex="1" 
														class="form-control" placeholder="Amounts"  value="" />
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
			
			var formURL = "<?php echo site_url('websiteloginControler/Khoroc/update'); ?>";			
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {id:id},
				dataType: "json",
				success:function(data){
					$('#modal-form').modal('show');
					$('#id').val(data.catId);
					$('#category_name').val(data.category_name);
					$('#amounts').val(data.amounts);
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