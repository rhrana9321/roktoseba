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
											
<script type="text/javascript">

		$(".customer_idclick").click(function(event){
			event.preventDefault();
			var searchIDs = $("input:checkbox:checked").map(function(){
			  return $(this).val();
			}).get(); // <----
			//console.log(searchIDs);
			
			var url   = "<?php echo site_url('websiteloginControler/webproduct_manage/multi_delete'); ?>";
						
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