<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Order Invoice Details</title>

    <!-- Bootstrap -->
 <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
	
    </head>
  <body>

   <div class="container" style="margin-bottom:30px;">
   	
		
		
			<div style="padding-top:15px;">
			
			<div class="col-md-1"></div>
			<div class="col-md-10" align="center">
			<div id="prdetails">
			<div style="padding-top:30px;">
			<?php
									
			$total_item = 0;
			foreach($orderdeatisl as $bbbv) {
			$total_item = $total_item + 1;  
			}
			?> 
			
					<table id="" class="" style="width:99.5%;padding: 0px;" cellpadding="0" cellspacing="0">
					<thead>
							
								
								<tr>
									<th colspan="4" style="color:#000000; font-size:12px; font-weight:bold; margin-left:-20px;"><img class="nav-user-photo" src="<?php echo base_url("uploads/".$baseinformation->proimage); ?>" alt="<?php echo $baseinformation->companyName; ?>" style="max-height:50px;"/></th>
									<th colspan="2" style=" color:#000000; font-size:12px; font-weight:bold; text-align:right; padding-right:2px;"><?php echo $baseinformation->website; ?>,<br/><?php echo $baseinformation->addres; ?>
					<br/>Phone: <?php echo $baseinformation->phone; ?>. Email: <?php echo $baseinformation->eamil; ?></th>
								</tr>
							</thead>
					</table>
					
					<table id="" class="" style="width:99.5%;padding: 0px;" cellpadding="0" cellspacing="0">
					<tr>
						<td style="font-size:16px; font-weight:bold; background:#f9f9f9; padding:2px;" colspan="3">Order Info :</td>
						<td style="font-size:16px; font-weight:bold; background:#f9f9f9; padding:2px;" colspan="3"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Delivery Address :</td>
					</tr>
					<tr>
						<td class="center" width="16%" style="padding:2px;">Order ID :</td>
						<td colspan="2" style="padding:2px;width:34%"><?php echo $orderinfo->orId; ?></td>
						<td colspan="2" style="padding:2px;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Name :</td>
						<td colspan="2" style="padding:2px;"><?php echo $orderinfo->d_name; ?></td>
					</tr>
					<tr>
						<td class="center" width="16%" style="padding:2px;">Placed : </td>
						<td colspan="2" style="padding:2px;"><?php echo $orderinfo->paymentdate; ?></td>
						<td colspan="2" style="padding:2px;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Address :</td>
						<td colspan="2" style="padding:2px;"><?php echo $orderinfo->d_address; ?></td>
					</tr>
					<tr>
						<td class="center" width="16%" style="padding-left:2px;">Invoice ID :</td>
						<td colspan="2" style="padding:2px;"><?php echo $orderinfo->invoice_no; ?></td>
						<td colspan="2" style="padding:2px;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Phone No :</td>
						<td colspan="2" style="padding:2px;"><?php echo $orderinfo->d_phone; ?></td>
					</tr>
					<tr>
						<td class="center" width="16%" style="padding:2px;">Payment Status : </td>
						<td colspan="2" style="padding:2px;"><?php echo $orderinfo->payment_type; ?></td>
						<td colspan="2" style="padding:2px;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Email :</td>
						<td colspan="2" style="padding:2px;"><?php echo $orderinfo->d_email; ?></td>
					</tr>
					<tr>
						<td class="center" width="16%" style="padding:2px;">Delivery Status :</td>
						<td colspan="2" style="padding:2px;"><?php echo $orderinfo->status; ?></td>
						<td colspan="2" style="padding:2px;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Order Count :</td>
						<td colspan="2" style="padding:2px;"><?php echo $total_item; ?></td>
					</tr>
					</table>
					<table id="" class="" style="width:99.5%;padding: 0px;" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
									<th colspan="1" style="padding:2px;border:#000000 1px solid;">SL.</th>
									<th colspan="1" style="padding:2px;border:#000000 1px solid;width:10%;">CODE</th>
									<th colspan="2" style="padding:2px;border:#000000 1px solid;">PRODUCT NAME</th>
									<th style="text-align:right;padding-right:2px;border:#000000 1px solid;">QTY</th>
									<th style="text-align:right;padding-right:2px;border:#000000 1px solid;">UNIT</th>
									<th style="text-align:right;padding-right:2px;border:#000000 1px solid;">UNIT PRICE</th>
									<th colspan="1" style="text-align:right;padding-right:2px;border:#000000 1px solid;"> TOTAL PRICE</th>
								</tr>
								<?php
								$sl =1;
								$total_amount = 0;
								$total_qTy = 0;
								foreach($orderdeatisl as $v) {
								$total_amount = $total_amount + $v->total_amount;
								$total_qTy = $total_qTy +  $v->qun;
								?> 
								<tr>
									<th colspan="1" style="padding:2px;border:#000000 1px solid; width:10px;"><?php echo $sl++; ?></th>
									<th colspan="1" style="padding:2px;border:#000000 1px solid; width:10px;"><?php echo $v->procode; ?></th>
									<th colspan="2" style="padding:2px;border:#000000 1px solid;"><?php echo $v->product_name; ?></th>
									<th style="text-align:right; padding-right:2px;border:#000000 1px solid;"><?php echo $v->qun; ?></th>
									<th style="text-align:right; padding-right:2px;border:#000000 1px solid;"><?php echo $v->product_kg_liter_dos; ?></th>
									<th style="text-align:right; padding-right:2px;border:#000000 1px solid;"><?php echo $v->prince; ?></th>
									<th colspan="1" style="text-align:right; padding-right:2px;border:#000000 1px solid;"><?php echo $v->total_amount; ?></th>
								</tr>
								<?php } ?>
								
								<?php 
									$de_cost_amount = $orderinfo->delevery_cost;
									$de_total = $total_amount + $de_cost_amount;
									$des_amount = ($total_amount*$orderinfo->offer)/100;
									$dis_minac = $total_amount-$des_amount;
									$dis_minac = $total_amount-$des_amount;
									$grand_total = $dis_minac+$de_cost_amount;
								?>
								<tr>
								<th colspan="5" style="text-align:right;padding:2px;border:#000000 1px solid;border-left:#000000 1px solid;">TOTAL PRODUCT: <?php echo $total_qTy;?></th>
									<th colspan="2" style="text-align:right;padding:2px;border:#000000 1px solid;border-left:#000000 1px solid;">Sub Total BDT </th>
									<th style="text-align:right; padding-right:2px;border:#000000 1px solid;"><?php echo number_format ($orderinfo->total_amount,2); ?></th>
								</tr>
								
								<?php 
						
									if($orderinfo->coupon_type == 'Percentage'){
										$protik = '%';
										$order_amount_per = ($orderinfo->total_amount*$orderinfo->coupon_amount)/100;
										
										$Code_amountorder_amount_per = ($orderinfo->coupon_amount);
										
										$Final_order_amount_per = ($orderinfo->total_amount-$order_amount_per);
										$LastFinal_order_amount_per = ($Final_order_amount_per)+$orderinfo->delevery_cost;
								
									} else if($orderinfo->coupon_type == 'Fixed Amount'){
										$protik = '';
										$order_amount_per = ($orderinfo->total_amount-$orderinfo->coupon_amount);
										 $Code_amountorder_amount_per = ($orderinfo->coupon_amount);
										$Final_order_amount_per = ($orderinfo->total_amount-$orderinfo->coupon_amount);
										
										$LastFinal_order_amount_per = ($Final_order_amount_per)+$orderinfo->delevery_cost;
					
										
									}else {
										$protik = '';
										$order_amount_per = 0;
										 $Code_amountorder_amount_per = ($orderinfo->coupon_amount);
										$Final_order_amount_per = ($orderinfo->total_amount);
										$LastFinal_order_amount_per = ($orderinfo->total_amount)+$orderinfo->delevery_cost;
									}
								
								?>
								
								
								<?php if ($orderinfo->coupon_amount > 0){ ?>
								<tr>
									<th colspan="7" style="text-align:right;padding:2px;border-right:#000000 1px solid;border-left:#000000 1px solid;"> (<?php echo $orderinfo->coupons_code;?>)Less Discount <?php echo $protik; ?>=</th>
									<th style="text-align:right; padding-right:2px;border:#000000 1px solid;"><?php echo number_format ($Code_amountorder_amount_per,2); ?></th>
								</tr>
								<?php } ?>
								
								<tr>
									<th colspan="7" style="text-align:right;padding:2px;border:#000000 1px solid;border-left:#000000 1px solid;font-weight:normal;">Sub  Total BDT</th>
									<th style="text-align:right; padding-right:2px;border:#000000 1px solid;"> <?php echo number_format ($Final_order_amount_per,2); ?></th>
								</tr>
								
								<tr>
									<th colspan="7" style="text-align:right;padding:2px;border:#000000 1px solid;border-left:#000000 1px solid;font-weight:normal;">Add Delivery Charge </th>
									<th style="text-align:right; padding-right:2px;border:#000000 1px solid;"><?php echo number_format ($orderinfo->delevery_cost,2); ?></th>
								</tr>
								
								<tr>
								<th colspan="5" style="text-align:right;padding:2px;border:#000000 1px solid;">Customer Payable</th>
									<th colspan="2" style="text-align:right;padding:2px;border:#000000 1px solid;border-left:#000000 1px solid;">Total BDT</th>
									<th style="text-align:right; padding-right:2px;border:#000000 1px solid;"><?php echo number_format ($LastFinal_order_amount_per,2); ?></th>
								</tr>
								
								
								
								
							<tr>
								<td style="font-size:16px; font-weight:bold;" colspan="8"></td>
							</tr>
							
							
							
								
							
							<tr>
								<td style="font-size:16px; font-weight:bold; background:#ffffff;" colspan="7"></td>
							</tr>
							</tr>
								</table>
								
			</div>
			</div>
			<form method="post" action="<?php echo site_url("websiteloginControler/new_order/webordersuccUpdate"); ?>" enctype="multipart/form-data">
			
			 <div class="form-group" style="padding-top:10px;">
			 <input type="hidden" value="<?php echo $orderinfo->orId; ?>" name="orId" id="orId" />
			 	<input type="hidden" value="<?php echo $orderinfo->d_email; ?>" name="d_email" id="d_email" />
				
			 
			 
				  <select name="status" id="status" class="form-control" id="sel1">
				    <option <?php if($orderinfo->status == 'Confirm'){ echo 'selected'; } ?> value="Confirm">Confirm</option>
					<option <?php if($orderinfo->status == 'Completed'){ echo 'selected'; } ?> value="Completed">Completed</option>
					<option <?php if($orderinfo->status == 'Pending'){ echo 'selected'; } ?> value="Pending">Pending</option>
					<option <?php if($orderinfo->status == 'Cancel'){ echo 'selected'; } ?> value="Cancel">Cancel</option>
				  </select>
			</div>
	  
			</div>
			<div class="col-md-1"></div>
			</div>
				<div class="col-md-1"></div>
				<div class="col-md-5" align="right">
					 <button type="submit" class="btn btn-primary">Submit</button>
				</div>
				</form>
				<div class="col-md-5">
					 <button type="button" class="btn btn-primary" onClick="printDivd('prdetails')">Inv Print</button>
				</div>
				<div class="col-md-1"></div>
			
		</div>

  </body>
</html>
	<script>
	
	function printDivd(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;

     window.print();
     document.body.innerHTML = originalContents;
	}
	
	</script>