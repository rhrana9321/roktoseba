<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
<title> <?php echo $baseinformation->title; ?></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>

 


    </head>
<body>

<div style="border:1px #7060bf solid;" id="ele4">		
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">

									<thead>
									<tr valign="top">
											<th colspan="2" style="text-align:center;"><img class="nav-user-photo" src="<?php echo base_url("uploads/".$baseinformation->proimage); ?>" alt="<?php echo $baseinformation->companyName; ?>" style="max-height:40px;"/><br/><br/><?php echo $baseinformation->addres;?><br/><br/><?php echo $formdate;?> / <?php echo $todate;?></th>
											
										</tr>
										
										
										
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
									<th  colspan="2"style="text-align:center;">মোট  জমা = <?php echo $total_amount;?></th>
									
									</tr>
									<tr valign="top" style="width:100%;">
									<th  colspan="2"style="text-align:center;">মোট  খরচ = <?php echo $total_amountk; ?></th>
									
									</tr>
									
									<tr valign="top" style="width:100%;border-top:2px #000000 solid;">
									<th colspan="2" style="text-align:center;">&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; মোট  = <?php echo $total_amount-$total_amountk; ?></th>
									
									</tr>

									
								</table>
		<div class="modal-footer avoid-this"><button class="btn btn-info print-link">Print <i class="ace-icon fa fa-print align-top bigger-125 icon-on-right"></i></button></div>
						  
						  
</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script type='text/javascript'>
			//<![CDATA[
			jQuery(function($) { 'use strict';
				$("#ele2").find('.print-link').on('click', function() {
					//Print ele2 with default options
					$.print("#ele2");
				});
				$("#ele4").find('button').on('click', function() {
					//Print ele4 with custom options
					$("#ele4").print({
						//Use Global styles
						globalStyles : true,
						//Add link with attrbute media=print
						mediaPrint : false,
						//Custom stylesheet
						stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
						//Print in a hidden iframe
						iframe : false,
						//Don't print this
						noPrintSelector : ".avoid-this",
						//Add this at top
						//prepend : "Hello World!!!<br/>",
						//Add this on bottom
						//append : "<br/>Buh Bye!",
						//Log to console when printing is done via a deffered callback
						//deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
					});
				});
				// Fork https://github.com/sathvikp/jQuery.print for the full list of options
			});
			//]]>
        </script>



</body>
</html>
