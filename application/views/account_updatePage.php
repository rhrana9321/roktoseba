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
		<div class="topicPage">
			<div class="loaded">
                                <h1 style="padding-bottom:20px;">
								 <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				  Edit Profile
				<?php } else if($language_check == 'BN') { ?>
				এডিট প্রোফাইল
				<?php }?>
								</h1>

				 <form id="myLogin" method="post" action="<?php echo site_url('Dashboard/InfoUpdate'); ?>">
    <div class="inputContainer">
        <input type="text" id="usrFullName" class="required has-value" name="usrFullName" required value="<?php echo $userinfo->signName; ?>">
        <span class="input-placeholder">
		  <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				 Full Name :
				<?php } else if($language_check == 'BN') { ?>
				পুরো নাম :
				<?php }?>
		</span>
        <span class="input-error"></span>
        <span class="input-description"></span>
        <label id="usrFullName-error" class="error" for="usrFullName"></label>
    </div>

    <div class="inputContainer">
        <input type="text" id="usrAddress" class="required has-value" name="usrAddress" required value="<?php echo $userinfo->address; ?>">
        <span class="input-placeholder">
		 <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				 Address :
				<?php } else if($language_check == 'BN') { ?>
				ঠিকানা:
				<?php }?>
		</span>
        <span class="input-error"></span>
        <span class="input-description"></span>
        <label id="usrFullName-error" class="error" for="usrAddress"></label>
    </div>
	
	 <div class="inputContainer">
	         <div style="padding-bottom:10px;font-size:22px;color:#4F7838;" class="">
			 <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Email :
				<?php } else if($language_check == 'BN') { ?>
				ইমেল:
				<?php }?>
			 </div>
         <input type="email" id="usrEmail" class="" name="usrEmail" required value="<?php echo $userinfo->signEmail; ?>">
        <span class="input-error"></span>
        <span class="input-description"></span>
        <label id="usrFullName-error" class="error" for="usrAddress"></label>
    </div>
	
	
	
   <!-- <div class="inputContainer">
        <input type="text" id="usrPostalCode" class="has-value" name="usrPostalCode" value="">
        <span class="input-placeholder">Postal Code</span>
        <span class="input-error"></span>
        <span class="input-description"></span>
        <label id="usrFullName-error" class="error" for="usrPostalCode"></label>
    </div>
    <div class="inputContainer">
        <input type="text" id="usrCity" class="required has-value" name="usrCity" value="">
        <span class="input-placeholder">City</span>
        <span class="input-error"></span>
        <span class="input-description"></span>
        <label id="usrFullName-error" class="error" for="usrCity"></label>
    </div>
    <div class="inputContainer">
        <input type="text" id="usrState" class="has-value" name="usrState" value="">
        <span class="input-placeholder">State</span>
        <span class="input-error"></span>
        <span class="input-description"></span>
        <label id="usrFullName-error" class="error" for="usrState"></label>
    </div>-->
    
    <div class="inputContainer">
        <input type="text" id="usrPhone" class="required has-value" required name="usrPhone" value="<?php echo $userinfo->signMobile; ?>" readonly>
        <span class="input-placeholder">
		 <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Phone :
				<?php } else if($language_check == 'BN') { ?>
				ফোন:
				<?php }?>
		</span>
        <span class="input-error"></span>
        <span class="input-description"></span>
        <label id="usrPhone-error" class="error" for="usrPhone"></label>
    </div>
    <div class="actions">
        <button type="submit"
                class="btn btn-primary pull-left"
                id="idsubmitDataLogIn"
                name="temp"
                value="login"
                data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"> 
				<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
				Update
				<?php } else if($language_check == 'BN') { ?>
				আপডেট 
				<?php }?>
				
        </button>
    </div>
</form>

                <div class="clearfix"></div>
                <br>
                <br>
			</div>
		</div>
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
		var urlmgs = "<?php echo site_url('Home/Coupon_apply');?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{txtPassportNumber:txtPassportNumber},
			success:function(data){
				$(".cart_html_view_list").html(data);
				open_cart_panel();
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
			}
		});
		
		
		e.preventDefault();
	});

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
					$(".cart_row_amountList").html(totalCartt);
                } else {
					$(".cart_row_amountList").html(totalCart);
				}
				open_cart_panel();
			}
		});
		e.preventDefault();
	}
	
	function myFunctionPlus(k){
		var row_id = $('#'+k).attr("data-id");
		var data_qty = $('#'+k).attr("data_qty");
		var quantity = +data_qty+1;
		
		var urlmgs = "<?php echo site_url("Cart/updateCartItem");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{row_id:row_id,quantity:quantity},
			success:function(data){
				$(".cart_html_view_list").html(data);
				open_cart_panel();
			}
		});
		e.preventDefault();
	}
	
	
	function myFunctionMinus(L){
		var row_id = $('#'+L).attr("data-id");
		var data_qty = $('#'+L).attr("data_qty");
		var quantity = data_qty-1;
		var urlmgs = "<?php echo site_url("Cart/updateCartItem");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{row_id:row_id,quantity:quantity},
			success:function(data){
				$(".cart_html_view_list").html(data);
				open_cart_panel();
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

$(document).on("click", '.productDetailsBtn', function() {
  var prodid = $(this).data('prodid');
  $("#modal_dialog").html('<div class="mui"> <div class="authDialogs"> <div class="ModalDialogContainer"> <div class="ModalDialog"> <img src="images/loader.gif" class="img-responsive" alt="Loader"> </div> </div> </div> </div>');
    $("#modal_dialog").load('product_details.php?productID='+prodid);
  $("#body").addClass('hiddenOverflow');
});
$(document).on("click", '#productDetailsCloseBtn', function() {
    $("#modal_dialog").html('');
  $("#body").removeClass('hiddenOverflow');
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
$("#Normal").hide();

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
	$("#Normal").show();


  $('.emptyFooter').hide();

  $('.theme-grocery').removeClass('sc-fullscreen');

  $(".theme").removeClass('shoppingCartIsExpanded');

  $('.everythingElseWrapper').attr('style', 'padding-right: 0px');

  $(".cart").show();
}


</script>
</body>
</html>
