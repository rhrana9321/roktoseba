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
			<div class="row" align="" style="margin-left:0px;padding-bottom:100px;">
				  <div class="col-md-12">
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
									<th colspan="4" style="color:#000000; font-size:12px; font-weight:bold; margin-left:-20px;"><img class="nav-user-photo" src="<?php echo base_url("uploads/".$basicinfo->proimage); ?>" alt="<?php echo $basicinfo->companyName; ?>" style="max-height:50px;"/></th>
									<th colspan="2" style=" color:#000000; font-size:12px; font-weight:bold; text-align:right; padding-right:2px;"><?php echo $basicinfo->website; ?>,<br/><?php echo $basicinfo->addres; ?>
					<br/>Phone: <?php echo $basicinfo->phone; ?>. Email: <?php echo $basicinfo->eamil; ?></th>
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
						
							
							<div class="col-md-1"></div>
						
					</div>
				  </div>
				</div>
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
