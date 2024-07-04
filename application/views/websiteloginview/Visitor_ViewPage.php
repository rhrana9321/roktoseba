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
							<li class="active">Visitor View Manage</li>
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
							
							
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
										<tr>
											<th style="width:20%; background:#0033FF; color:#FFFFFF;">Todays Visitor's</th>
											<th style="background:#0033FF; color:#FFFFFF;"><?php echo $total_visitor->Total_count; ?></th>
										</tr>

									
								</table>
							</div>
						</div>
						
						
						
					</div>
					
					
				</div>
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
			
			var formURL = "<?php echo site_url('websiteloginControler/category_manage/update'); ?>";			
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
					$('#cat_icon').val(data.cat_icon);
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