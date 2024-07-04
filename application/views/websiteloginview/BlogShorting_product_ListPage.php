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
													$i= 1;
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
																<a class="green" href="#" data-id="<?php echo $v->wproid ?>">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>
																<a class="red delete" href="<?php echo site_url("websiteloginControler/Blog/delete/" . $v->wproid); ?>">
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