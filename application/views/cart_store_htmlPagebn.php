<?php
	class BanglaConverter {
		public static $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
		public static $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
		public static function bn2en($number) {
			return str_replace(self::$bn, self::$en, $number);
		}
		public static function en2bn($number) {
			return str_replace(self::$en, self::$bn, $number);
		}
	}
?>
<style>
	.loadingsssss {                                                                        
	  position: absolute;
	  padding-left:350px;
	  padding-top:400px;
	  transform: translate(-50%, -50%);
	  -ms-transform: translate(-50%, -50%);    
	  z-index:1000000000;                
	}      
  </style>
<div class="shoppingCart collapsed empty responsive">
 
      <div class="header">
        <div class="cart" onClick="open_cart_panel();">
          <?php $basicinfo = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc'); ?>
        </div>
        <div class="itemCount">
          <p><span class="total_items">
		  	
			<?php 
			$language_check = $this->session->userdata('language_data');
			$rows = count($this->cart->contents()); 
			?>
			<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
			<?php echo $rows; ?>
			<?php } else if($language_check == 'BN') { ?>
			<?php echo BanglaConverter::en2bn("$rows\n"); ?>
			<?php } ?>
		  </span> <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
			ITEMS
			<?php } else if($language_check == 'BN') { ?>
			 টি পণ্য
			<?php } ?></p>
           </div>
        <button class="closeCartButtonTop" onClick="close_cart_panel();">
            
            <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
			Close
			<?php } else if($language_check == 'BN') { ?>
			 বন্ধ
			<?php } ?>
            </button>
      </div>
      <section class="stickyHeader" onclick="open_cart_panel();">
        <div class="itemCount">
          
          <p><span class="total_items">0</span> 
		  <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
			ITEMS
			<?php } else if($language_check == 'BN') { ?>
			 টি পণ্য
			<?php } ?>
		  </p>
        </div>
        <div class="total"> <span>৳ </span>
          <div class="odometer"> 0 </div>
        </div>
      </section>
      <div class="body" style="display:none;">
        <div class="emptyCart">
          <?php $language_check = $this->session->userdata('language_data');?>
          
        </div>
        <div class="" style="color:#000000;"> 
		
		<table class="table table-condensed">
		 <?php $rows = $this->cart->contents(); 
		  		if(!empty($rows)) { ?>
			<tr style="border-bottom:1px #fee29b solid; background:#797778; color:#FFFFFF; font-weight:500;">
				<td colspan="3" style="padding-top:10px;font-size:13px;">
				<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Delivery charge Fee 
				<?php } else if($language_check == 'BN') { ?>
				বিতরণ চার্জ ফি
				<?php }?>
				</td>
				<td colspan="2" style="padding-top:10px;font-size:13px; text-align:right;"> ৳ 
				<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				<?php echo $basicinfo->delevery_charge; ?>
				<?php } else if($language_check == 'BN') { ?>
				<?php  echo BanglaConverter::en2bn("$basicinfo->delevery_charge\n"); ?>
				<?php }?>
				</td>
			  </tr>
			<tbody>
			<div align="center" class="loadingsssss" id="loader" style="display:none;">
							   <img src="<?php echo base_url('images/loadings.gif');?>" height="200"/>
							</div>
			   <?php 
			   $i = 1;
			   foreach($this->cart->contents() as $items): 
			   $count = $i++;
			   $pro_price = $items['price']; 
			   $total_pro_price = $items['subtotal'];
			   $result_cart = $this->M_cloud->find('webproduct_mange_table', array('wproid' => $items['id']));	
			   ?>
			  <tr style="border-bottom:1px #fee29b solid;" class="cart_row_count">
				<td><img style="height:35px; margin-top:8px;" src="<?php echo base_url("uploads/".$items['proimg']); ?>"></td>
				<td style="font-size:12px;padding-top:25px;">
				<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
					<?php echo $result_cart->product_name; ?>
					<?php } else if($language_check == 'BN') { ?>
					<?php echo $result_cart->product_name_bn; ?>
					<?php } ?>
				
				</td>
				<td style="padding-top:15px; width:90px;">
				   <style>
													.quantity-selector{min-width:auto!important;padding:0 10px}.form_qty{display:inline-block;vertical-align:middle;line-height:40px}.form_qty .inline{position:relative;float:right;line-height:40px;padding:5px 0}input.quantity-selector{width:35px;height:30px;text-align:center;-webkit-appearance:none;-moz-appearance:none;-ms-appearance:none;border:1px solid #949292;padding:0;border-radius:0;line-height:30px}.items{display:block;width:15px;height:15px;cursor:pointer;background:url("<?php echo base_url('assets/img/plus-minus.png');?>") no-repeat #444}@media (max-width:568px){.items{}}.items:hover{background-color:#346fbf}.items.reduced{background-position:2px -47px}.items.increase{background-position:2px 2px}
												</style>
												
												<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
					
					<?php $En_qty_value2 =  $items['qty'];  ?>
					
					<?php } else if($language_check == 'BN') { ?>
					<?php $item_cart_bn_en =  $items['qty']; ?>
					<?php  $En_qty_value2 = BanglaConverter::en2bn("$item_cart_bn_en\n"); ?>
				
					<?php }?>
					<div class="form_qty">
						<input type="text" readonly id="quantity<?php echo $items['rowid']; ?>" name="quantity[]" value="<?php echo $En_qty_value2; ?>" max="20" class="quantity-selector">
						<div class="inline">
							<div data-id="<?php echo $items['rowid']; ?>" Prodata-id="<?php echo $items['id']; ?>" Prodata-Price="<?php echo $items['price']; ?>" data_qty ="<?php echo $items['qty']; ?>" id="<?php echo $count; ?>" onclick="myFunctionPlus(<?php echo $count; ?>)" onchange="myFunctionPlus(<?php echo $count; ?>)" class="increase items plus_qty" onClick="var result = document.getElementById('quantity<?php echo $items['rowid']; ?>'); var qty = result.value; var max = result.max; if( !isNaN( qty ) &amp;&amp; qty < +max ) result.value++; return false;"></div>
							
							<div data-id="<?php echo $items['rowid']; ?>" Prodata-id="<?php echo $items['id']; ?>" Prodata-Price="<?php echo $items['price']; ?>" data_qty="<?php echo $items['qty']; ?>" id="<?php echo $count; ?>" onclick="myFunctionMinus(<?php echo $count; ?>)" class="reduced items minus_qty" onClick="var result = document.getElementById('quantity<?php echo $items['rowid']; ?>'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty > 1 ) result.value--; return false;"></div>
						</div>
					</div>
					<input type="hidden" name="rowid[]" value="<?php echo $items['rowid']; ?>">
						
				  </td>
				<td style="padding-top:25px;">  
				<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				<?php echo $total_pro_price; ?>
				<?php } else if($language_check == 'BN') { ?>
				<?php  echo BanglaConverter::en2bn("$total_pro_price\n");?>
				<?php }?>
				
				</td>
				<td style="padding-top:20px;"><img data-id="<?php echo $items['rowid']; ?>" class="deletecart" id="<?php echo $count; ?>" Prodata-Price="<?php echo $items['price']; ?>" Prodata-id="<?php echo $items['id']; ?>"  onclick="myFunction(<?php echo $count; ?>)" style="height:20px;cursor:pointer;" src="<?php echo base_url('resource/delete.jpg');?>"></td>
			  </tr>
			  
			 
			  <?php endforeach; ?> 
			  <?php 
				$rows = $this->cart->contents();
				$cart_total_value = $this->cart->total();
				
				 ?>
			  <?php } else { ?>
			<th colspan="5" style="width:20%;"><img style="height:300px;" src="<?php echo base_url("frontend/image/enptycart.png"); ?>" class="img-responsive" alt=""></th>
			<?php } ?>
			</tbody>
		  </table>
		  
		
		</div>
      </div>
      <div class="emptyFooter" style="display:none;">
        <div class="footer">
		<div align="center" style="background:#FFFFFF;">
		<?php 
		$Coupon_amount_check = $this->session->userdata('Coupon_amount');
		$CouAmount_type_check = $this->session->userdata('CouAmount_type');
		if($CouAmount_type_check == 'Percentage'){
			$cou_discount_order = ($cart_total_value*$Coupon_amount_check)/100;
			$final_cart_order_value = $cart_total_value-$cou_discount_order;
		} else if($CouAmount_type_check == 'Fixed Amount'){
			$final_cart_order_value = ($cart_total_value-$Coupon_amount_check);
		} else {
			$final_cart_order_value = $cart_total_value;
		}
		?>
		<label for="chkPassport">
    <input type="checkbox" id="chkPassport" />
   <?php if(($language_check == 'EN') ||  (empty($language_check))) { ?>
				Have a special code?
				<?php } else if($language_check == 'BN') { ?>
					স্পেশাল কোড আছে?
				<?php }?>
</label>
		<div id="dvPassport" style="display: none;;background:#FFFFFF;">
	<input style="color:#000000; width:84%;border:1px #E3282C solid;padding:2px;" autocomplete="off" placeholder="<?php if(($language_check == 'EN') ||  (empty($language_check))) { ?>Special Code<?php } else if($language_check == 'BN') { ?>স্পেশাল কোড<?php }?>" type="text" id="txtPassportNumber" />  <input type="submit" class="Coupon" style="color:#FFFFFF; background:#E3282C;padding:2px;" value="<?php if(($language_check == 'EN') ||  (empty($language_check))) { ?>GO<?php } else if($language_check == 'BN') { ?>এপ্লাই<?php }?>" id="" />
		</div>
		
		</div>
		
          <div class="shoppingtCartActionButtons">
            <button id="placeOrderButton" style="width:100%;background:#FF6262">
			<?php $customerid  = $this->session->userdata('websitecusId'); if(empty($customerid)) { ?>	
            <span class="placeOrderText"> <a href="<?php echo site_url("Sign_in");?>" style="text-decoration:none; color:#FFFFFF;">
				<?php if(($language_check == 'EN') ||  (empty($language_check))) { ?>
				Place Order Confirm
				<?php } else if($language_check == 'BN') { ?>
					অর্ডার নিশ্চিত করুন
				<?php }?>
			</a> </span> 
			<?php } else { ?>
			<span class="placeOrderText"> <a href="<?php echo site_url("Bulid_and_shipping");?>" style="text-decoration:none; color:#FFFFFF;">
			<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
			Place Order Confirm
			<?php } else if($language_check == 'BN') { ?>
			অর্ডার নিশ্চিত করুন
			<?php }?>
			
			</a> </span> 
			<?php } ?>
			
			<span class="totalMoneyCount"  style="background:#E3282C;color:#FFFFFF;"> <span>৳ </span> <span class="odometer">
				<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				<?php echo $final_cart_order_value; ?>
				<?php } else { ?>
				<?php  echo BanglaConverter::en2bn("$final_cart_order_value\n");?>
				<?php } ?>
				
			</span> 
            </button>
          </div>
          <br>
          
        </div>
      </div>
    </div>


<script type="text/javascript">

$(function () {
		$("#chkPassport").click(function() {
			if ($(this).is(":checked")) {
				$("#dvPassport").show(1000);
			   
			} else {
				$("#dvPassport").hide(2000);
			}
		});
	});
	
$('.Coupon').on('click', function(e){
		var txtPassportNumber = $("#txtPassportNumber").val();
		$("#loader").css("display", "block");
		
		var urlmgs = "<?php echo site_url('Home/Coupon_apply');?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{txtPassportNumber:txtPassportNumber},
			success:function(data){
				$(".cart_html_view_list").html(data);
				$("#loader").css("display", "none");
				open_cart_panel();
			}
		});
		e.preventDefault();
	});

</script>