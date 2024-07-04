<!DOCTYPE html>
<html class="en theme-grocery needs-cover">
<head>
	<?php $this->load->view("cssjsLink"); ?>
</head>
<style>
		
		#page {
			margin-right:7px;
		}
		.pagi a {
			color: white;
			border: 1px solid #FFFFFF;
			background-color: #ff6700;
			padding: 8px 16px !important;
			border-radius : 0px !important;
		}
		.pagi a:hover {
			color: white;
			border: 1px solid #FFFFFF;
			background-color: #ff6700;
			padding: 8px 16px !important;
			border-radius : 0px !important;
			text-decoration:none;
		}
		.pagi strong {
			background-color: #0061cc;
			color: white;
			padding: 8px 16px;
			border: 1px solid #FFFFFF;
		}
	</style>
<body class="" id="body">

<div id="page">
  <div class="app catalog navOpen theme navBtn">
    <?php $this->load->view("header_part"); ?>
   
        <div class="landingPage2">
          <section id="how-to-order-theme">
		  
			
			<div class="contact-us authForm" style="padding-top:20px; padding-bottom:50px;">
                <div style="background:#ff6700;color:#FFFFFF; padding-left:10px;padding-top:10px;padding-bottom:10px;font-size:16px;font-weight:normal;">
				
				<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Contact Us
				<?php } else if($language_check == 'BN') { ?>
				যোগাযোগ করুন
				<?php }?>
				</div>
				<div>&nbsp;</div>
				<div>
				
				<?php if(($language_check == 'EN') ||  (empty($language_check))) { ?>
				Feel free to contact us anytime at 
				<?php } else { ?>
				আমাদের সাথে যে কোনও সময় নির্দ্বিধায় যোগাযোগ করুন
				<?php }?>
				
				<?php if(($language_check == 'EN') ||  (empty($language_check))) { ?>
				<?php echo $basicinfo->phone; ?>
				<?php } else { ?>
				<?php  echo BanglaConverter::en2bn("$basicinfo->phone\n"); ?>
				<?php }?>.<br/>


<?php if(($language_check == 'EN') ||  (empty($language_check))) { ?>
				Or on the other hand on the off chance that you like, you can drop us a note using the form below.
				<?php } else { ?>
				অথবা অন্যদিকে আপনার পছন্দ মতো অফ অফ সুযোগটি আপনি নীচের ফর্মটি ব্যবহার করে আমাদের একটি নোট ফেলে দিতে পারেন।
				<?php }?>

<br/>
				</div>
				<div>&nbsp;</div>
				<div>&nbsp;</div>
				<div>&nbsp;</div>
				
				<div>
				 <?php if(!empty($errors)){ ?>
				<span style="color:#FF0000; font-size:16px;padding-bottom:20px;"><?php echo $errors; ?></span>
				<?php } else { ?>
				<?php }?>
				
                <div class="form_result"></div>
                <form method="post" action="<?php echo site_url('Contact/contactAction'); ?>" class="popup-form" id="contactForm" onSubmit="return submitContactForm();">
                  <div class="inputContainer">
                    <input type="text" id="senderName" class="required has-value" name="name" value="" required/>
                    <span class="input-placeholder">
					
					<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Name
				<?php } else if($language_check == 'BN') { ?>
				নাম
				<?php }?>
					</span> <span class="input-error"></span> <span class="input-description"></span>
                    <label id="senderName-error" class="error" for="senderName"></label>
                  </div>
                  <div class="inputContainer">
                    <input type="email" id="senderEmail" class="required has-value" name="email" value="" required/>
                    <span class="input-placeholder">
					
					<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Email 
				<?php } else if($language_check == 'BN') { ?>
				ইমেল
				<?php }?>
					</span> <span class="input-error"></span> <span class="input-description"></span>
                    <label id="senderEmail-error" class="error" for="senderEmail"></label>
                  </div>
                  <div class="inputContainer">
                    <input type="text" id="senderPhone" class="required has-value" name="mobile" value="" required/>
                    <span class="input-placeholder">
					
					<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Phone 
				<?php } else if($language_check == 'BN') { ?>
				ফোন
				<?php }?>
					</span> <span class="input-error"></span> <span class="input-description"></span>
                    <label id="senderPhone-error" class="error" for="senderPhone"></label>
                  </div>
				  <div class="inputContainer">
                    <input type="text" id="comments" class="required has-value" name="comments" value="" />
                    <span class="input-placeholder">
					
					<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Message
				<?php } else if($language_check == 'BN') { ?>
				বার্তা
				<?php }?>
					</span> <span class="input-error"></span> <span class="input-description"></span>
                    <label id="senderPhone-error" class="error" for="senderPhone"></label>
                  </div>
                  <div class="actions">
                    <button style="background:#ff6700; color:#FFFFFF;" type="submit" class="btn btn-primary pull-left" id="submitContactFormBtn" name="temp" value="login" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"> 
					
					
				<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Send
				<?php } else if($language_check == 'BN') { ?>
				পাঠান
				<?php }?>
					</button> &nbsp;  &nbsp; 
                  </div>
				  </form>
                  <div class="callUs"> 
				  
				  
                
              </div>
              
            </div>
			
			
			
          </section>
         <section id="">
	<div class="">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7381.5815281142295!2d91.80911932649553!3d22.3237516159996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd8b5353672d5%3A0x7e873374534df3f1!2sAgrabad%20Commercial%20Area%2C%20Chattogram!5e0!3m2!1sen!2sbd!4v1613667662420!5m2!1sen!2sbd"
        width="100%"
        height="450"
        frameborder="0"
        style="border:0"
        allowfullscreen></iframe>
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
