<table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                   <tr>
														<th>SL.</th>
														<th>Select</th>
														<th>ID No.</th>
														<th>সংগঠন </th>
														<th>পদবি  </th>
														<th style="width:20%;"> Name</th>
														<th>Mobile</th>
														<th>Email </th>
														<th>Address</th>
														<th>Image </th>
														<th>Action</th>
														
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                
                                                
                                                 <?php
													$i= 1;
													foreach($product_tablelist as $v) {
													$status  = $v->status;

													if($v->pro_cat_id == 'updestha_mondoli'){
													$name_songothon = 'উপদেষ্টামন্ডলী'; 
													} else if($v->pro_cat_id == 'sudhi_mondoli'){
													$name_songothon = 'সুধীমন্ডলী'; 
													} else if($v->pro_cat_id == 'admin_bindho'){
													$name_songothon = 'এডমিনবৃন্দ'; 
													} else if($v->pro_cat_id == 'seycha_sebok_bindho'){
													$name_songothon = 'সেচ্ছাসেবকবৃন্দ'; 
													}
													?> 
                                                
                                                    <tr>
														<td><?php echo $i++; ?></td>
														<td><div class="checkbox">
														  <label>
														  	<input id="customer_id[]" class="myCheckbox" type="checkbox" name="customer_id[]" value="<?php echo $v->wproid; ?>">
														  </label>
														</div></td>
														<td><?php echo $v->quntity; ?></td>
														<td><?php echo $name_songothon; ?></td>
														<td style="width:20%;"><?php echo $v->product_kg_liter_dos_bn; ?></td>
														<td style="width:20%;"><?php echo $v->product_name; ?></td>
														<td><?php echo $v->procode; ?></td>
														<td><?php echo $v->product_kg_liter_dos; ?></td>
														<td><?php echo $v->prodetails; ?></td>
														<td class="hidden-480"><img height="30" src="<?php echo base_url("uploads/".$v->proimage); ?>" /></td>
														<td>
															<div class="action-buttons">
															    
																<a class="green" href="#" data-id="<?php echo $v->wproid ?>">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>
																|
																
																
																<a class="red delete" href="<?php echo site_url("websiteloginControler/webproduct_manage/delete/" . $v->wproid); ?>">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
			                                                  
													
															</div>
														</td>
                                             </tr>
                                                    
                                                    
                                                     <?php }?>
                                                    
                                                    

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