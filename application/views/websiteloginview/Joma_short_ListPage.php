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
											<th colspan="5" style="text-align:center;"><img class="nav-user-photo" src="<?php echo base_url("uploads/".$baseinformation->proimage); ?>" alt="<?php echo $baseinformation->companyName; ?>" style="max-height:40px;"/><br/><br/><?php echo $baseinformation->addres;?><br/><br/>Name : <?php echo $Nameablelist->product_name;?>, ID No. : <?php echo $Nameablelist->quntity;?></th>
											
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
