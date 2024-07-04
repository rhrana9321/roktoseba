
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
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
				<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
				
				
				
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
							<li class="active">রিপোর্ট </li>
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
							<div>
							<div class="col-md-4"><div class="form-group">
													<label for="pro_name">Form Date</label>
													
												<input type="date" name="formdate" id="formdate"  tabindex="1" 
												class="form-control" placeholder=" "  value="" />
													
												</div></div>
							<div class="col-md-4"><div class="form-group">
													<label for="pro_name">To Date</label>
													
													<input type="date" name="todate" id="todate"  tabindex="1" 
												class="form-control" placeholder=" "  value="" />
													
												</div></div>
												
							<div class="col-md-3" style="padding-top:30px;"><div class="form-group">
														<button id="" type="button"  style="width:100%;" class="pull-right form-control btn btn-primary class_click">
													<i class="fa fa-spinner fa-spin class_remove_add" style="font-size:24px; display:none;" ><span></span></i>
													<span class="text_remove_add">Show Now</span></button>
													
												</div></div>
							
							
							
							
							</div>
							<div id="Pro_list_show">
							    
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr valign="top">
											<th><table id="dynamic-table" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th class="center" colspan="5">জমা</th>
											
										</tr>
										<tr>
											<th class="center">SN</th>
											<th>Date</th>
											<th>Name</th>
											<th>Details</th>
											<th>Amounts</th>
										</tr>
									</thead>

									<tbody>
									
									<?php 
									$i=1;
									$total_amount =0;
									foreach($j_tablelist as $v) {
									$total_amount =$total_amount +$v->amounts;
									$result = $this->M_cloud->find('webproduct_mange_table', array('wproid' => $v->category_name));
										?> 
									
										<tr>
											<td class="center"><?php echo $i++; ?></td>
											<td><?php echo $v->cdate; ?></td>
											<td><?php echo $result->product_name; ?></td>
											<td><?php echo $v->details; ?></td>
											<td><?php echo $v->amounts; ?></td>
											
										</tr>
										
									<?php } ?>
									<tr>
											<td colspan="4" style="text-align:right;">Total =</td>
											<td colspan="2"><?php echo $total_amount; ?></td>
											
										</tr>

									</tbody>
								</table></th>
											<th valign="top"><table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
									<tr>
											<th class="center" colspan="4">খরচ</th>
											
										</tr>
										<tr>
											<th class="center">SN</th>
											<th>Date</th>
											<th>Name</th>
											<th>Amounts</th>
										</tr>
									</thead>

									<tbody>
									
									<?php 
									$i=1;
									$total_amountk =0;
									foreach($k_tablelist as $kv) {
									$total_amountk =$total_amountk +$kv->amounts;
										?> 
									
										<tr>
											<td class="center"><?php echo $i++; ?></td>
											<td><?php echo $kv->cdate; ?></td>
											<td><?php echo $kv->category_name; ?></td>
											<td><?php echo $kv->amounts; ?></td>
											
										</tr>
										
									<?php } ?>
									<tr>
											<td colspan="3" style="text-align:right;">Total =</td>
											<td colspan="2"><?php echo $total_amountk; ?></td>
											
										</tr>
									
									

									</tbody>
								</table></th>
										</tr>
									</thead>
									
									<tr valign="top" style="width:100%;">
									<th style="text-align:right;">মোট  জমা = <?php echo $total_amount;?></th>
									
									</tr>
									<tr valign="top" style="width:100%;">
									<th style="text-align:right;">মোট  খরচ = <?php echo $total_amountk; ?></th>
									
									</tr>
									
									<tr valign="top" style="width:100%;border-top:2px #000000 solid;">
									<th style="text-align:right;">মোট  = <?php echo $total_amount-$total_amountk; ?></th>
									
									</tr>

									
								</table>
								</div>
							</div>
						</div>
						
						
						
					</div>
					
					
				</div>
			</div>
			
			
			
			
<script>
	
	$(".class_click").on('click', function(){
	var formdate = $("#formdate").val();
	var todate = $("#todate").val();
	var url   = "<?php echo site_url('websiteloginControler/Report/Shorting'); ?>";
		$.ajax({
		url:url,
		type:"POST",
		data:{formdate:formdate,todate:todate},
		success:function(data){
		$("#Pro_list_show").html(data);
		}
	});
});
	
	
</script>	
			
			
<?php echo $this->load->view("websiteloginview/footer"); ?>