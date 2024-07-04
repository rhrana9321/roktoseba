<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">SN</th>
											<th>Sub Category Name</th>
											<th>Product Name</th>
											<th>Product Code</th>
											<th>Old Price</th>
											<th>New Price</th>
											<th>Product Size</th>
											<th>Product Image </th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
									
									<?php 
									$i=1;
									foreach($product_tablelist as $v) {
									$sub_catList	= $this->M_cloud->find('subcategory_mange', array('subcatId' => $v->pro_sub_id));	
										$status  = $v->status;
										
										?> 
									
										<tr>
											<td class="center"><?php echo $i++; ?></td>
											<td><?php echo $sub_catList->sub_category_name; ?></td>
											<td><?php echo $v->product_name; ?></td>
											<td><?php echo $v->procode; ?></td>
											<td><?php echo $v->product_discount; ?></td>
											<td><?php echo $v->product_price; ?></td>
											<td><?php echo $v->prosize; ?></td>
											<td class="hidden-480"><img height="30" src="<?php echo base_url("uploads/".$v->proimage); ?>" /></td>
										
											
											<td>
												<div class="hidden-sm hidden-xs action-buttons">
													<a class="green" href="#" data-id="<?php echo $v->wproid ?>">
														<i class="ace-icon fa fa-pencil bigger-130"></i>
													</a>
													
													<a class="red delete" href="<?php echo site_url("websiteloginControler/webproduct_manage/delete/" . $v->wproid); ?>">
														<i class="ace-icon fa fa-trash-o bigger-130"></i>
													</a>

										
												</div>
											</td>
										</tr>
										
									<?php } ?>

									</tbody>
								</table>