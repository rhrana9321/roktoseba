<!DOCTYPE html>
<html class="en theme-grocery needs-cover">
<head>
	<?php $this->load->view("cssjsLink"); ?>
</head>

<body class="" id="body">

<div id="page">
  <div class="app catalog navOpen theme navBtn">
    <?php $this->load->view("header_part"); ?>
   
        <div class="landingPage2">
          <section id="how-to-order-theme">
		  
			
			 <?php $rows = $this->cart->contents(); 
		  	if(!empty($rows)) { ?>	
			<div class="row" align="" style="padding-top:50px; margin-left:0px;">
				<div class="container" style="padding-bottom:100px;">
            <h3>
			
			<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Offline Payment method
				<?php } else if($language_check == 'BN') { ?>
				অফলাইন অর্থ প্রদানের পদ্ধতি
				<?php }?>
			
			</h3>
            <ul class="nav nav-tabs">
              
              <li class="active"><a data-toggle="tab" href="#menu1">
			  
			  <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Payment With Bank
				<?php } else if($language_check == 'BN') { ?>
				ব্যাংক এর মাধ্যমে অর্থ প্রদানের
				<?php }?>
			  </a></li>
              <li><a data-toggle="tab" href="#menu2">
			  
			   <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Payment With Bkash
				<?php } else if($language_check == 'BN') { ?>
				বিকাশের সাথে অর্থ প্রদান
				<?php }?>
			  </a></li>
              <li><a data-toggle="tab" href="#menu3">
			  
			   <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Payment With Rocket
				<?php } else if($language_check == 'BN') { ?>
				রকেট সাথে অর্থ প্রদান
				<?php }?>
			  </a></li>
			    <li><a data-toggle="tab" href="#menu4">
				
				<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Cash On Delivery
				<?php } else if($language_check == 'BN') { ?>
			    বিতরনের সময় অর্থ প্রদান
				<?php }?>
				</a></li>
            </ul>
            <div class="tab-content">
              
              <div id="menu1" class="tab-pane fade in active">
                <h3>
				 <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Payment With Bank
				<?php } else if($language_check == 'BN') { ?>
				ব্যাংক এর মাধ্যমে অর্থ প্রদানের
				<?php }?>
				
				</h3>
				<p><?php echo $basicinfo->Referral_short_details; ?></p>
				<form class="form-horizontal" action="<?php echo site_url("payment_with_bank/order_confirm"); ?>" method="post" enctype="multipart/form-data">
                <div class="row" style="padding-top:10px;">
						<span class="col-md-2 control-label" style="text-align:left; color:#666666;">
						
						<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Receipt number
				<?php } else if($language_check == 'BN') { ?>
				রশিদ নম্বর
				<?php }?>
						</span>
						<div class="col-md-6" style="padding-bottom:10px;">
						  <input type="text" class="form-control input-sm" name="Receipt_number" id="Receipt_number" placeholder="<?php if(($language_check == 'EN') || (empty($language_check))) { ?>Receipt number<?php } else if($language_check == 'BN') { ?>রশিদ নম্বর<?php }?>" required>
						</div>
						</div>
				<div class="row" style="padding-top:10px;">
						<span class="col-md-2 control-label" style="text-align:left; color:#666666;">
						
						
						<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Bank Account Number
				<?php } else if($language_check == 'BN') { ?>
				ব্যাংক একাউন্ট নম্বর
				<?php }?>
						</span>
						<div class="col-md-6" style="padding-bottom:10px;">
						  <input type="text" class="form-control input-sm" name="Bank_Account_number" id="Bank_Account_number" placeholder="<?php if(($language_check == 'EN') || (empty($language_check))) { ?>Bank Account Number<?php } else if($language_check == 'BN') { ?>ব্যাংক একাউন্ট নম্বর<?php }?>" required>
						</div>
						</div>
				
				<div class="row" style="padding-top:10px;">
						<span class="col-md-2 control-label" style="text-align:left; color:#666666;">
						
						<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Bank Name
				<?php } else if($language_check == 'BN') { ?>
				ব্যাংকের নাম
				<?php }?>
						</span>
						<div class="col-md-6" style="padding-bottom:10px;">
						  <input type="text" class="form-control input-sm" name="bank_name" id="bank_name" placeholder="<?php if(($language_check == 'EN') || (empty($language_check))) { ?>Bank Name<?php } else if($language_check == 'BN') { ?>ব্যাংকের নাম<?php }?>" required>
						</div>
						</div>
						

						<?php
						$shoping_amount = $this->cart->total();
						$Coupon_amount_check = $this->session->userdata('Coupon_amount');
						$CouAmount_type_check = $this->session->userdata('CouAmount_type');
						if($CouAmount_type_check == 'Percentage'){
						$cou_discount_order = ($shoping_amount*$Coupon_amount_check)/100;
						$final_cart_order_value = $shoping_amount-$cou_discount_order;
						} else if($CouAmount_type_check == 'Fixed Amount'){
						$final_cart_order_value = ($shoping_amount-$Coupon_amount_check);
						} else {
						$final_cart_order_value = $shoping_amount;
						}
						?>
						
						
						<?php
						 $delevery_cost = $basicinfo->delevery_charge;
						 $shoping_amount = $final_cart_order_value;
						 $totalWithDelevery_amount = $shoping_amount + $delevery_cost;     
						 $car_bdt_amount = $totalWithDelevery_amount;
						?>
						
						
				
						
				<div class="row" style="padding-top:10px;">
						<span class="col-md-2 control-label" style="text-align:left; color:#666666;">
						
						
						<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Amount
				<?php } else if($language_check == 'BN') { ?>
				টাকার পরিমান 
				<?php }?>
						</span>
						<div class="col-md-6" style="padding-bottom:10px;">
						  <input type="text" class="form-control input-sm" readonly="readonly" name="Amount" id="Amount" value="<?php if(($language_check == 'EN') || (empty($language_check))) { ?><?php echo $car_bdt_amount; ?><?php } else if($language_check == 'BN') { ?><?php  echo BanglaConverter::en2bn("$car_bdt_amount\n"); ?><?php }?>" required>
						</div>
						</div>
				<div class="row" style="padding-top:10px;">
						<span class="col-md-2 control-label" style="text-align:left; color:#666666;"></span>
						<div class="col-md-6" style="padding-bottom:10px;">
						  <button type="submit" class="abc left1_btn left1_btn-1 left1_btn-1c abc abcd" style="background:#E3282C; color:#FFFFFF; border:1px #ff686e solid; padding:5px;">
						  
						  <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				CONFIRM ORDER
				<?php } else if($language_check == 'BN') { ?>
				অর্ডার  নিশ্চিত করুন
				<?php }?>
						  
						  </button>
						</div>
						</div>
				</form>		
						
              </div>
              <div id="menu2" class="tab-pane fade">
                <h3>
				 <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Payment With Bkash
				<?php } else if($language_check == 'BN') { ?>
				বিকাশের সাথে অর্থ প্রদান
				<?php }?>
				</h3>
               <p><?php echo $basicinfo->bkash_short_details; ?></p>
				<form class="form-horizontal" action="<?php echo site_url("payment_with_bkash/order_confirm"); ?>" method="post" enctype="multipart/form-data">
               <div class="row" style="padding-top:10px;">
						<span class="col-md-2 control-label" style="text-align:left; color:#666666;">
						
						<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Bkash Phone Number
				<?php } else if($language_check == 'BN') { ?>
				বিকাশ ফোন নম্বর
				<?php }?>
						</span>
						<div class="col-md-6" style="padding-bottom:10px;">
						  <input type="text" class="form-control input-sm" name="bKashnumber" id="bKashnumber" placeholder="<?php if(($language_check == 'EN') || (empty($language_check))) { ?>Bkash Phone Number<?php } else if($language_check == 'BN') { ?>বিকাশ ফোন নম্বর<?php }?>" required>
						</div>
						</div>
						
				<div class="row" style="padding-top:10px;">
						<span class="col-md-2 control-label" style="text-align:left; color:#666666;">
						<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Amount
				<?php } else if($language_check == 'BN') { ?>
				টাকার পরিমান 
				<?php }?>
						</span>
						<div class="col-md-6" style="padding-bottom:10px;">
						<input type="text" class="form-control input-sm" readonly="readonly" name="Amount" id="Amount" value="<?php if(($language_check == 'EN') || (empty($language_check))) { ?><?php echo $car_bdt_amount; ?><?php } else if($language_check == 'BN') { ?><?php  echo BanglaConverter::en2bn("$car_bdt_amount\n"); ?><?php }?>" required>
						</div>
						</div>
				<div class="row" style="padding-top:10px;">
						<span class="col-md-2 control-label" style="text-align:left; color:#666666;">
						
						
						<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Bkash transaction id
				<?php } else if($language_check == 'BN') { ?>
				বিকাশ লেনদেনের আইডি
				<?php }?>
						</span>
						<div class="col-md-6" style="padding-bottom:10px;">
						  <input type="text" class="form-control input-sm" name="TxID" id="TxID" placeholder="<?php if(($language_check == 'EN') || (empty($language_check))) { ?>Bkash transaction id<?php } else if($language_check == 'BN') { ?>বিকাশ লেনদেনের আইডি<?php }?>" required>
						</div>
						</div>
				<div class="row" style="padding-top:10px;">
						<span class="col-md-2 control-label" style="text-align:left; color:#666666;"></span>
						<div class="col-md-6" style="padding-bottom:10px;">
						  <button type="submit" class="abc left1_btn left1_btn-1 left1_btn-1c abc abcd" style="background:#E3282C; color:#FFFFFF; border:1px #ff686e solid; padding:5px;">
						  
						  <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				CONFIRM ORDER
				<?php } else if($language_check == 'BN') { ?>
				অর্ডার  নিশ্চিত করুন
				<?php }?>
						  
						  </button>
						</div>
						</div>
						</form>
              </div>
              <div id="menu3" class="tab-pane fade">
                <h3>
				<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Payment With Rocket
				<?php } else if($language_check == 'BN') { ?>
				রকেট সাথে অর্থ প্রদান
				<?php }?>
				</h3>
                <p><?php echo $basicinfo->bank_short_details; ?></p>
				<form class="form-horizontal" action="<?php echo site_url("payment_with_rocket/order_confirm"); ?>" method="post" enctype="multipart/form-data">
                <div class="row" style="padding-top:10px;">
						<span class="col-md-2 control-label" style="text-align:left; color:#666666;">
						
						 <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Rocket Phone Number
				<?php } else if($language_check == 'BN') { ?>
				রকেট ফোন নম্বর
				<?php }?>
						</span>
						<div class="col-md-6" style="padding-bottom:10px;">
						  <input type="text" class="form-control input-sm" name="bKashnumber" id="bKashnumber" placeholder="<?php if(($language_check == 'EN') || (empty($language_check))) { ?>Rocket Phone Number<?php } else if($language_check == 'BN') { ?>রকেট ফোন নম্বর<?php }?>" required>
						</div>
						</div>
						
				<div class="row" style="padding-top:10px;">
						<span class="col-md-2 control-label" style="text-align:left; color:#666666;">
						<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Amount
				<?php } else if($language_check == 'BN') { ?>
				টাকার পরিমান 
				<?php }?>
						</span>
						<div class="col-md-6" style="padding-bottom:10px;">
						 <input type="text" class="form-control input-sm" readonly="readonly" name="Amount" id="Amount" value="<?php if(($language_check == 'EN') || (empty($language_check))) { ?><?php echo $car_bdt_amount; ?><?php } else if($language_check == 'BN') { ?><?php  echo BanglaConverter::en2bn("$car_bdt_amount\n"); ?><?php }?>" required>
						</div>
						</div>
				<div class="row" style="padding-top:10px;">
						<span class="col-md-2 control-label" style="text-align:left; color:#666666;">
						
						<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Rocket transaction id
				<?php } else if($language_check == 'BN') { ?>
				রকেট লেনদেনের আইডি
				<?php }?>
						
						</span>
						<div class="col-md-6" style="padding-bottom:10px;">
						  <input type="text" class="form-control input-sm" name="TxID" id="TxID" placeholder="<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
Rocket transaction id<?php } else if($language_check == 'BN') { ?>রকেট লেনদেনের আইডি<?php }?>" required>
						</div>
						</div>
				
				
				
				<div class="row" style="padding-top:10px;">
						<span class="col-md-2 control-label" style="text-align:left; color:#666666;"></span>
						<div class="col-md-6" style="padding-bottom:10px;">
						  <button type="submit" class="abc left1_btn left1_btn-1 left1_btn-1c abc abcd" style="background:#E3282C; color:#FFFFFF; border:1px #ff686e solid; padding:5px;">
						  
						  <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				CONFIRM ORDER
				<?php } else if($language_check == 'BN') { ?>
				অর্ডার  নিশ্চিত করুন
				<?php }?>
						  
						  </button>
						</div>
						</div>
						</form>
              </div>
			  <div id="menu4" class="tab-pane fade">
                <h3>
				<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Cash On Delivery
				<?php } else if($language_check == 'BN') { ?>
		 	    বিতরনের সময় অর্থ প্রদান
				<?php }?>
				</h3>
              <p>
                 <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
			        <?php echo $basicinfo->cash_and_delevery; ?>
				<?php } else if($language_check == 'BN') { ?>
		 	    প্রিয় গ্রাহক, আপনার  অর্ডার করা পণ্যটি আপনার কাছে পৌঁছানোর পরে নগদ অর্থ গ্রহন করা হবে। সকল সম্মানিত গ্রাহকদের ধন্যবাদ।
				<?php }?>
                  
                  
                  </p>
				<form class="form-horizontal" action="<?php echo site_url("payment_with_cash/order_confirm"); ?>" method="post" enctype="multipart/form-data">
                
				<div class="row" style="padding-top:10px;">
						<span class="col-md-2 control-label" style="text-align:left; color:#666666;"><button type="submit" class="abc left1_btn left1_btn-1 left1_btn-1c abc abcd" style="background:#E3282C; color:#FFFFFF; border:1px #ff686e solid; padding:5px;">
						  
						  <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				CONFIRM ORDER
				<?php } else if($language_check == 'BN') { ?>
				অর্ডার  নিশ্চিত করুন
				<?php }?>
						  
						  </button></span>
						<div class="col-md-6" style="padding-bottom:10px;">
						  
						</div>
						</div>
				</form>
              </div>
            </div>
          </div>
				</div>
			<?php } else { ?>
  			<div align="center" style="padding-bottom:100px; padding-top:50px;"><img style="height:300px;" src="<?php echo base_url("frontend/image/enptycart.png"); ?>" class="img-responsive" alt=""></div>
			<?php } ?>
        
			
			
			
          </section>
         
          
          
          
        </div>
      </section>
      <?php $this->load->view("footer"); ?>
	   <!--Cart Box start-->
	 <?php $this->load->view("cart_boxPage"); ?>
	<!--Cart Box End-->
    </div>
  </div>
</div>
<div id="modal_dialog"> </div>
<script>

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
				open_cart_panel();
				$("#loader").css("display", "none");
			}
		});
		e.preventDefault();
	});

var width = $(window).width();

var language_check = "<?php echo $language_check; ?>";
if(!language_check){
    language_check='EN';
}

$('.cart_store').on('click', function(e){
		var product_id = $(this).attr('product-id');
		$("#loader").css("display", "block");
		
		var urlmgs = "<?php echo site_url('Cart/store');?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{product_id:product_id},
			success:function(data){
				$(".cart_html_view_list").html(data);
				$(".cart_row_amountList").html('');
                var totalCart = $('.cart_row_count').length; 
                if(language_check=='BN'){
                    totalCartt = engToBanglaConvert(totalCart);
					$(".cart_row_amountList").html(totalCartt);
                } else {
					$(".cart_row_amountList").html(totalCart);
				}
				if(width > 600){
				open_cart_panel();
				}
				$("#loader").css("display", "none");
			}
		});
		
		
		e.preventDefault();
	});
	
	$('.remove').on('click', function(e){
		var product_id = $(this).attr('product-id');
		var quantity = $(this).attr('dty-id');
		$("#loader").css("display", "block");
		var urlmgs = "<?php echo site_url('Cart/updateCartItem');?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{product_id:product_id,quantity:quantity},
			success:function(data){
				$(".cart_html_view_list").html(data);
				if(width > 600){
				open_cart_panel();
				}
				$("#loader").css("display", "none");
			}
		});
		
		
		e.preventDefault();
	});
	
	
	function remove_quanty(quantity,prod_id){
        var product_id  = prod_id;
		var quantity    = quantity;
		$("#loader").css("display", "block");
		var urlmgs = "<?php echo site_url('Cart/FindCartItemUpdate');?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{product_id:product_id,quantity:quantity},
			success:function(data){
				$(".cart_html_view_list").html(data);
				open_cart_panel();
				$("#loader").css("display", "none");
				
			}
		});
		
    }
	

    function engToBanglaConvert(number){
        var engBangArray = {'0':'০','1':'১','2':'২','3':'৩','4':'৪','5':'৫','6':'৬','7':'৭','8':'৮','9':'৯'};
        var numberLength  = number.toString().length;
        var numberToString = number.toString();
        var engToBangla = [];
        for (var i = 0; i<= numberLength - 1; i++) {
            engToBangla.push(engBangArray[numberToString[i]]);
        }
        return engToBangla.join('');
    }
	
	
	function myFunction(j){
		var row_id = $('#'+j).attr("data-id");	
		var prod_id = $('#'+j).attr("Prodata-id");
		var prod_price = $('#'+j).attr("Prodata-Price");
		$("#loader").css("display", "block");
		
		var urlmgs = "<?php echo site_url("Cart/cartdelete");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{row_id:row_id},
			success:function(data){
				$(".cart_html_view_list").html(data);
				$(".cart_row_amountList").html('');
				var totalCart = $('.cart_row_count').length; 
				if(language_check=='BN'){
                    totalCartt = engToBanglaConvert(totalCart);
					totalPricett = engToBanglaConvert(prod_price);
					$(".cart_row_amountList").html(totalCartt);
					$('.QuantityTextContainer_bn_'+prod_id).html('১');
					$('.priceByProduct_Bn_'+prod_id).html(totalPricett);
                } else {
					$(".cart_row_amountList").html(totalCart);
					$('.QuantityTextContainer_'+prod_id).html('1');
					$('.priceByProduct_'+prod_id).html(prod_price);
				}
				$('.Delete_Show_Hide_TextContainer_'+prod_id).show();
				$('.Delete_Hide_Show_TextContainer_'+prod_id).hide();
				open_cart_panel();
				$("#loader").css("display", "none");
			}
		});
		e.preventDefault();
	}
	
	function myFunctionPlus(k){
		var row_id = $('#'+k).attr("data-id");
		var prod_id = $('#'+k).attr("Prodata-id");
		var prod_price = $('#'+k).attr("Prodata-Price");
		var data_qty = $('#'+k).attr("data_qty");
		var quantity = +data_qty+1;
		var total_amount_data = (prod_price*quantity);
		$("#loader").css("display", "block");
		
		
		var urlmgs = "<?php echo site_url("Cart/updateCartItem");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{row_id:row_id,quantity:quantity},
			success:function(data){
				$(".cart_html_view_list").html(data);
				 if(language_check=='BN'){
                    totalCartt = engToBanglaConvert(quantity);
					totalAmounT = engToBanglaConvert(total_amount_data);
					 $('.QuantityTextContainer_bn_'+prod_id).html(totalCartt);
					 $('.priceByProduct_Bn_'+prod_id).html(totalAmounT);
                } else {
					 $('.QuantityTextContainer_'+prod_id).html(quantity);
					 $('.priceByProduct_'+prod_id).html(total_amount_data);
				}
				open_cart_panel();
				$("#loader").css("display", "none");
			}
		});
		e.preventDefault();
	}
	
	
	function myFunctionMinus(L){
		var row_id = $('#'+L).attr("data-id");
		var prod_id = $('#'+L).attr("Prodata-id");
		var data_qty = $('#'+L).attr("data_qty");
		var prod_price = $('#'+L).attr("Prodata-Price");
		var quantity = data_qty-1;
		$("#loader").css("display", "block");
		
		
		var total_amount_data = (prod_price*quantity);
		var urlmgs = "<?php echo site_url("Cart/updateCartItem");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{row_id:row_id,quantity:quantity},
			success:function(data){
				$(".cart_html_view_list").html(data);
				 
				if(quantity == 0){
					if(language_check=='BN'){
						totalPricett = engToBanglaConvert(prod_price);
						$('.QuantityTextContainer_bn_'+prod_id).html('১');
						$('.priceByProduct_Bn_'+prod_id).html(totalPricett);
                	} else {
						$('.QuantityTextContainer_'+prod_id).html('1');
						$('.priceByProduct_'+prod_id).html(prod_price);
					}
						$('.Delete_Show_Hide_TextContainer_'+prod_id).show();
						$('.Delete_Hide_Show_TextContainer_'+prod_id).hide();
				} else {
				
					if(language_check=='BN'){
						totalCartt = engToBanglaConvert(quantity);
						totalAmounT = engToBanglaConvert(total_amount_data);
						 $('.QuantityTextContainer_bn_'+prod_id).html(totalCartt);
						 $('.priceByProduct_Bn_'+prod_id).html(totalAmounT);
						 $('.QuantityTextContainer_'+prod_id).html(quantity);
						 $('.priceByProduct_'+prod_id).html(total_amount_data);
					} else {
						 $('.QuantityTextContainer_'+prod_id).html(quantity);
						 $('.priceByProduct_'+prod_id).html(total_amount_data);
					}
				
				}
				
				open_cart_panel();
				$("#loader").css("display", "none");
			}
		});
		e.preventDefault();
	}
	
	$(".header_search_keyup").on('keyup', function() {
	var header_search_value = $(this).val();
	if(header_search_value != '')
    {
    	$.ajax({
    		url : "<?php echo site_url('Home/headerserchPro'); ?>",
    		type : "POST",
    		dataType : 'html',
    		data : {header_search_value:header_search_value},
    		success : function(data) {
				$(".search_product_Value").fadeIn();
    			$(".search_product_Value").html(data);
    		}
    	});
    } else {
		$(".search_product_Value").fadeOut();
    	$(".search_product_Value").html("");
	}
});
	
</script>
<style type="text/css">
img.theme_logo{
	background:url('resorces/201903301376.png') no-repeat
}
</style>
<script type="text/javascript">
	var cartWrapperWidth  = $(".shoppingCartWrapper").width();
	
	var headerWrapperHeight = $(".headerWrapper").outerHeight();
	var screenHeight = $(window).height();
	
	
	var cartHeight = parseFloat(screenHeight);// - parseFloat(headerWrapperHeight) - 50
	cartHeight = cartHeight - 50;
	
$('.menu').css("height",cartHeight+"px");

$(document).on("click", '.signInBtn', function() {
	$("#modal_dialog").html('<div class="mui"> <div class="authDialogs"> <div class="ModalDialogContainer"> <div class="ModalDialog"> <img src="images/loader.gif" class="img-responsive" alt="Loader"> </div> </div> </div> </div>');
    $("#modal_dialog").load('login_with_pass.php');
    $("#body").addClass('hiddenOverflow');
});
$(document).on("click", '.signInBtnPlaceOrder', function() {
  $("#modal_dialog").html('<div class="mui"> <div class="authDialogs"> <div class="ModalDialogContainer"> <div class="ModalDialog"> <img src="images/loader.gif" class="img-responsive" alt="Loader"> </div> </div> </div> </div>');
    $("#modal_dialog").load('login_with_pass.php?loc=checkout');
  $("#body").addClass('hiddenOverflow');
});
$(document).on("click", '#signInCloseBtn', function() {
    $("#modal_dialog").html('');
  $("#body").removeClass('hiddenOverflow');
});

$(document).on("click", '.signUpBtn', function() {
  $("#modal_dialog").html('<div class="mui"> <div class="authDialogs"> <div class="ModalDialogContainer"> <div class="ModalDialog"> <img src="images/loader.gif" class="img-responsive" alt="Loader"> </div> </div> </div> </div>');
    $("#modal_dialog").load('register.php');
  $("#body").addClass('hiddenOverflow');
});
$(document).on("click", '#signUpCloseBtn', function() {
    $("#modal_dialog").html('');
  $("#body").removeClass('hiddenOverflow');
});

$(document).on("click", '.forgotPasswordBtn', function() {
  $("#modal_dialog").html('<div class="mui"> <div class="authDialogs"> <div class="ModalDialogContainer"> <div class="ModalDialog"> <img src="images/loader.gif" class="img-responsive" alt="Loader"> </div> </div> </div> </div>');
    $("#modal_dialog").load('recover_password.php');
  $("#body").addClass('hiddenOverflow');
});
$(document).on("click", '#forgotPasswordCloseBtn', function() {
    $("#modal_dialog").html('');
  $("#body").removeClass('hiddenOverflow');
});


$(document).on("click", '.dotMenuIcon', function() {
  $("#modal_dialog").html('<div class="mui"> <div class="authDialogs"> <div class="ModalDialogContainer"> <div class="ModalDialog"> <img src="images/loader.gif" class="img-responsive" alt="Loader"> </div> </div> </div> </div>');
    $("#modal_dialog").load('nav_bar_popup.php');
  $("#body").addClass('hiddenOverflow');
});
$(document).on("click", '#dotMenuCloseIcon', function() {
    $("#modal_dialog").html('');
  $("#body").removeClass('hiddenOverflow');
});

$(document).on("click", '.hamburgerMenu', function() {
  $(".navBtn").toggleClass('navOpen');
});

$(document).on("click", '.hamBergerMenuIcon', function() {
  $(".hamBergerMenuIcon").toggleClass('change');
  $(".theme-grocery").toggleClass('fullscreen-menu');
});
$(document).on("click", '.start_shopping_btn', function() {
  $(".hamBergerMenuIcon").addClass('change');
  $(".theme-grocery").addClass('fullscreen-menu');
});



$(document).on("click", '.moreButton', function() {
    $("#modal_dialog").html('');
  $("#body").removeClass('hiddenOverflow');
});

var open_cart_panel = function(){

  $(".shoppingCartWrapper").addClass('shoppingCartWrapperExpanded');
  $(".shoppingCart").removeClass('collapsed').addClass('expanded');
  $(".cart").hide();

  $('.body').show();


  $('.emptyFooter').show();


  var cartWrapperWidth  = $(".shoppingCartWrapper").width();

  var headerWrapperHeight = $(".headerWrapper").outerHeight();
  var screenHeight = $(window).height();
  var emptyFooterHeight = $(".emptyFooter").outerHeight();

  var cartHeight = parseFloat(screenHeight) - parseFloat(headerWrapperHeight);
  var cartHeight = parseFloat(cartHeight) - parseFloat(emptyFooterHeight);

  $('.body').css("height",cartHeight+"px");
  $('.theme-grocery').addClass('sc-fullscreen');

  $(".theme").addClass('shoppingCartIsExpanded');

  $('.everythingElseWrapper').attr('style', 'padding-right: '+cartWrapperWidth+'px');
}
var close_cart_panel = function(){


    $(".shoppingCartWrapper").removeClass('shoppingCartWrapperExpanded');

  $(".shoppingCart").removeClass('expanded').addClass('collapsed');

  $('.body').hide();



  $('.emptyFooter').hide();

  $('.theme-grocery').removeClass('sc-fullscreen');

  $(".theme").removeClass('shoppingCartIsExpanded');

  $('.everythingElseWrapper').attr('style', 'padding-right: 0px');

  $(".cart").show();
}

var add_to_bag = function(prod_id,qty){

  
        var div_id = $('#prod_' + prod_id);

        $(div_id).addClass('isInCart');

        var prodname = $(div_id).data('prodname');
        var weight = $(div_id).data('weight');
        var weight_unit = $(div_id).data('weight_unit');

        var price = $(div_id).data('price');
        var thumbnail = $(div_id).data('thumbnail');

        $(div_id).find('.addText').hide();
        $(div_id).find('.cart_increser').show();

        $(div_id).find('.productQuantityZero').hide();
        $(div_id).find('.productQuantityEditor').show();

        $('.popQuantityEditor').show();
        $('.popBuyNowButton').hide();


        $(".fullCart").html('<center><img src="http://cdn.lowgif.com/small/cc969141c5fa3c69-.gif" alt=""></center>');
        jQuery.ajax({
            type: 'POST',
            url: 'cart_update_new.php',
            data: 'id=' + prod_id + '&quantity=' + qty + '&product_name=' + (prodname) + '&product_price=' + price + '&weight=' + weight + '&weight_unit=' + weight_unit + '&thumbnail=' + thumbnail,
            cache: false,
            success: function (response) {
                $(".fullCart").html(response);
                $('#buyNowButtons').show();
                if (prod_id > 0) {
                                        open_cart_panel();
                                    }

            },
            error: function (jqXHR, exception) {
                //alert('something wrong 1!!');
            }
        });
        $('.emptyCart').hide();
        $('.fullCart').show();
        }
$('body').on('click', '.plusQuantity', function() {
    var prod_id = $(this).data('prodid');

    if ($(".lightboxContent").length > 0) {
        var qty = $('.lightboxContent .QuantityTextContainer_'+prod_id).html();
    }else{
        var qty = $('.QuantityTextContainer_'+prod_id).html();
    }
    var qty = parseFloat(qty) + parseFloat(1);
	
	if(language_check=='BN'){
		totalCartt = engToBanglaConvert(qty);
		$('.QuantityTextContainer_'+prod_id).html(qty);
		$('.QuantityTextContainer_bn_'+prod_id).html(totalCartt);
	} else {
		$('.QuantityTextContainer_'+prod_id).html(qty);
	}
	
	
    var productPrice = $('.productPrice_'+prod_id).html();
    var totalPrice = parseFloat(productPrice) * parseFloat(qty);
	
	if(language_check=='BN'){
		totalPrice_amount = engToBanglaConvert(totalPrice);
		$('.priceByProduct_'+prod_id).html(totalPrice);
		$('.priceByProduct_Bn_'+prod_id).html(totalPrice_amount);
	} else {
		$('.priceByProduct_'+prod_id).html(totalPrice);
	}
	
	

    add_to_bag(prod_id,qty);
});

$('body').on('click', '.minusQuantity', function() {
            var prod_id 	= $(this).data('prodid');
			var prod_pprice = $(this).data('price');
			var prod_qqty 	= $(this).data('qqty');
			
        var qty = $('.QuantityTextContainer_'+prod_id).html();

        if(qty > 0){
            var qty = parseFloat(qty) - parseFloat(1);
			remove_quanty(qty,prod_id);
			
			if(qty == 0){
			 var minimum_qty = prod_qqty;
			} else {
			 var minimum_qty = qty;
			}
			
			if(language_check=='BN'){
				totalCartt = engToBanglaConvert(minimum_qty);
				$('.QuantityTextContainer_'+prod_id).html(minimum_qty);
				$('.QuantityTextContainer_bn_'+prod_id).html(totalCartt);
			} else {
				$('.QuantityTextContainer_'+prod_id).html(minimum_qty);
			}
			
			var productPrice = $('.productPrice_'+prod_id).html();
    		var totalPrice = parseFloat(productPrice) * parseFloat(qty);
			
			if(totalPrice == 0){
			 var minimum = prod_pprice;
			} else {
			 var minimum = totalPrice;
			}
    
	
			if(language_check=='BN'){
				totalPrice_amount = engToBanglaConvert(minimum);
				$('.priceByProduct_'+prod_id).html(minimum);
				$('.priceByProduct_Bn_'+prod_id).html(totalPrice_amount);
			} else {
				$('.priceByProduct_'+prod_id).html(minimum);
			}
			
			
			
            add_to_bag(prod_id,qty);
            if(qty == 0){

                var div_id = $('#prod_'+prod_id);
                $(div_id).removeClass('isInCart');
                $(div_id).find('.addText').show();
                $(div_id).find('.cart_increser').hide();
                $(div_id).find('.productQuantityZero').show();
                $(div_id).find('.productQuantityEditor').hide();

                $('.QuantityTextContainer_'+prod_id).html(1);
                $('.popQuantityEditor').hide();

                $('#buyNowButtons').hide();

                var qty_modal = $('.lightboxContent .QuantityTextContainer_'+prod_id).html();
                if ($(".lightboxContent").length > 0) {
                    $('.lightboxContent .QuantityTextContainer_'+prod_id).html(0);
                    $('.lightboxContent .productQuantityEditor').show();
                    $('.lightboxContent .popQuantityEditor').show();
                }
            }
        }else{
            var div_id = $('#prod_'+prod_id);
            $(div_id).removeClass('isInCart');
            $(div_id).find('.addText').show();
            $(div_id).find('.cart_increser').hide();
            $(div_id).find('.productQuantityZero').show();
            $(div_id).find('.productQuantityEditor').hide();
            $('.QuantityTextContainer_'+prod_id).html(1);
            $('#buyNowButtons').show();
        }
        });
add_to_bag(0,0);


</script>
</body>
</html>