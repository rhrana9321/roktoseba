<!DOCTYPE html>
<html class="en theme-grocery needs-cover">
<head>
<meta property="fb:app_id" content="130695877742511">
<meta property="fb:pages" content="433659713676324">
<meta property="og:site_name" content="zazabar.com">
<meta property="og:title" content="<?php echo $productdetailslist->product_name; ?>">
<meta property="og:description" content="">
<meta property="og:url" content="https://zazabar2.intellixbd.com/Product_details/index/4">
<meta property="og:type" content="website">
<meta property="og:image" content="https://zazabar2.intellixbd.com/uploads/FB/<?php echo $productdetailslist->proimage;?>">
<?php $this->load->view("cssjsLink"); ?>
<style>
/* styles unrelated to zoom */
* { border:0; margin:0; padding:0; }
 { position:absolute; top:3px; right:28px; color:#555; font:bold 13px/1 sans-serif;}

/* these styles are for the demo, but are not required for the plugin */
.zoom {
	display:inline-block;
	position: relative;
}

/* magnifying glass icon */
.zoom:after {
	content:'';
	display:block; 
	width:33px; 
	height:33px; 
	position:absolute; 
	top:0;
	right:0;
	background:url(icon.png);
}

.zoom img {
	display: block;
}

.zoom img::selection { background-color: transparent; }

#ex2 img:hover { cursor: url(grab.cur), default; }
#ex2 img:active { cursor: url(grabbed.cur), default; }
</style>
<script src='<?php echo base_url("frontend/js/jquery.zoom.js"); ?>'></script>
<script>
$(document).ready(function(){
$('#ex1').zoom();
$('#ex2').zoom();
$('#ex3').zoom();		 
$('#ex4').zoom();
});
</script>
</head>
<body class="" id="body">


<div id="page">
  <div class="app catalog navOpen theme navBtn">
   
     <?php $this->load->view("header_part"); ?>

        <div class="landingPage2">
         
          <div class="mainContainer">
            <section id="product-categories" class="categoryTiles">
			<div class="row" style="padding-top:20px; padding-bottom:20px;">
				<div  style="font-size:16px; padding-top:10px; padding-bottom:10px; padding-left:10px; background:#E3282C; color:#FFFFFF;">
				
				
				<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
			 Product Details > <?php echo $productdetailslistcategory->category_name; ?> > <?php echo $productdetailslistsubcategory->sub_category_name; ?> > <?php echo $productdetailslist->product_name; ?>
			<?php } else if($language_check == 'BN') { ?>
			পণ্যের বিবরণ > <?php echo $productdetailslistcategory->category_name_bn; ?> > <?php echo $productdetailslistsubcategory->sub_category_name_bn; ?> > <?php echo $productdetailslist->product_name_bn; ?>
			<?php } ?>
				</div>
					
				</div>
            <div class="row">
					<div class="col-md-4">
						
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><span class='zoom' id='ex1'>
		<img class="img-responsive" src='<?php echo base_url("uploads/".$productdetailslist->proimage); ?>' width='300' height='300' alt='<?php echo $productdetailslist->product_name; ?>'/>
	</span></div>
						  <div class="tab-pane " id="pic-2">
						  
						  <span class='zoom' id='ex2'>
		<img class="img-responsive" src='<?php echo base_url("uploads/".$productdetailslist->proimage1); ?>' width='350' height='350' alt='<?php echo $productdetailslist->product_name; ?>'/>
	</span>
							
							</div>
						  <div class="tab-pane" id="pic-3"><span class='zoom' id='ex3'>
		<img class="img-responsive" src='<?php echo base_url("uploads/".$productdetailslist->proimage2); ?>' width='350' height='350' alt='<?php echo $productdetailslist->product_name; ?>'/>
	</span></div>
						
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						 <?php if (!empty($productdetailslist->proimage)) {?>
						  <li><a data-target="#pic-1" data-toggle="tab" style="border:2px #FCF4EE solid; padding:3px;"><img class="lazy" data-src="<?php echo base_url('images/please_wait_animation.gif');?>" style="height:95px; width:102px;" src="<?php echo base_url("uploads/".$productdetailslist->proimage); ?>" /></a></li>
						   <?php } ?>
						  <?php if (!empty($productdetailslist->proimage1)) {?>
						  <li><a data-target="#pic-2" data-toggle="tab" style="border:2px #FCF4EE solid; padding:3px;"><img class="lazy" data-src="<?php echo base_url('images/please_wait_animation.gif');?>" style="height:95px;width:102px;" src="<?php echo base_url("uploads/".$productdetailslist->proimage1); ?>" /></a></li>
						  <?php } ?>
						   <?php if (!empty($productdetailslist->proimage2)) {?>
						  <li><a data-target="#pic-3" data-toggle="tab" style="border:2px #FCF4EE solid; padding:3px;"><img class="lazy" data-src="<?php echo base_url('images/please_wait_animation.gif');?>" style="height:95px;width:102px;" src="<?php echo base_url("uploads/".$productdetailslist->proimage2); ?>" /></a></li>
						   <?php } ?>
						</ul>
						
					</div>
					
					<div class="col-md-6">
						<div><h4 style="font-size:18px;" class="product-title">
						
						 <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
						 <?php echo $productdetailslist->product_name; ?>
						<?php } else if($language_check == 'BN') { ?>
						<?php echo $productdetailslist->product_name_bn; ?>
						<?php } ?>
						</h4></div>
						
						
						<input type="hidden" required name="product_id" id="product_id"   value="<?php echo $productdetailslist->wproid; ?>" />
						<div><h4 style="font-size:16px; padding-top:15px;" class="product-title">৳-
						
						 <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
						 <?php echo $productdetailslist->product_price; ?>
						<?php } else if($language_check == 'BN') { ?>
						<?php echo BanglaConverter::en2bn("$productdetailslist->product_price\n"); ?>
						<?php } ?>
					
						</h4></div>
						<div><h4 style="font-size:15px; padding-top:15px;" class="product-title">
						
						  <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
						 <?php echo $productdetailslist->product_kg_liter_dos; ?>
						<?php } else if($language_check == 'BN') { ?>
						<?php echo $productdetailslist->product_kg_liter_dos_bn; ?>
						<?php } ?>
						
						</h4></div>
						
						
						<div><h4 style="font-size:15px; padding-top:15px;" class="product-title">
						
						 <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
						 Code : <?php echo $productdetailslist->procode; ?>
						<?php } else if($language_check == 'BN') { ?>
						 কোড  : <?php echo $productdetailslist->procode; ?>
						<?php } ?>
						</h4></div>
						<div style="padding-top:10px;">
						
						<style>
													.quantity-selector{min-width:auto!important;padding:0 10px}.form_qty_d{display:inline-block;vertical-align:middle;padding-left:0px;line-height:30px}.form_qty_d .inline{position:relative;float:right;line-height:30px}input.quantity-selector{width:35px;height:30px;text-align:center;-webkit-appearance:none;-moz-appearance:none;-ms-appearance:none;border:1px solid #949292;padding:0;border-radius:0;line-height:30px}.items{display:block;width:15px;height:15px;cursor:pointer;background:url("<?php echo base_url().'assets/img/plus-minus.png'; ?>") no-repeat #444}@media (max-width:568px){.items{display:none}}.items:hover{background-color:#346fbf}.items.reduced{background-position:2px -47px}.items.increase{background-position:2px 2px}
												</style>
						<div class="form_qty_d">
							<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
							<?php  $qty_d_value_rows = 1; ?>
							<?php } else if($language_check == 'BN') { ?>
							<?php  $amou = 1; ?>
							<?php $qty_d_value_rows = BanglaConverter::en2bn("$amou\n"); ?>
							<?php } ?>
						
						
							<input type="hidden" id="qty" readonly style="width:80px;" name="quantity" value="1" max="20" class="quantity-selector">
							<input type="text" id="quantity_final" readonly style="width:80px;" name="quantity_final" value="<?php echo $qty_d_value_rows; ?>" max="20" class="quantity-selector">
							<div class="inline">
								<div class="increase items pro_de_class" onClick="var result = document.getElementById('qty'); var qty = result.value; var max = result.max; if( !isNaN( qty ) &amp;&amp; qty < +max ) result.value++; return false;"></div>
								<div class="reduced items pro_de_minclass" onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty > 1 ) result.value--; return false;"></div>
							</div>
						</div>
						
						</div>
						<div class="action" style="padding-top:20px;">
						   <button style="background:#FFFFFF; color:#000000; border:1px #FF0000 solid;" type="button" class="btn btn-danger cart_store">
						   
						   
						    <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
			 <img style="height:20px;" src="<?php echo base_url('resource/hicon.png');?>"/> ADD TO CART
			<?php } else if($language_check == 'BN') { ?>
			<img style="height:20px;" src="<?php echo base_url('resource/hicon.png');?>"/> ব্যাগে যোগ
			<?php } ?>
						   
						   </button> <button style="background:#FF0000; color:#FFFFFF;" type="button" class="btn btn-danger"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
						</div>
						<div class="row" style="padding-top:10px;padding-left:13px;"> 
						
						<div class="addthis_inline_share_toolbox_1vnw"></div>
						</div>
					</div>
				</div>
			<div class="row" style="padding-top:20px;">
					<div class="col-md-12">
						<ul class="nav nav-tabs">
					<li class="active"><a style="font-size:18px;color:#000000;font-weight:bold;" data-toggle="tab" href="#home">Product Summary</a></li>
				  </ul>
				<div class="tab-content">
				  
					<div id="home" class="tab-pane fade in active">
					  <div style="padding-top:20px;border:1px #CDCDCD solid;padding:10px;font-size:16px;">
					 
					  <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
			 <?php echo $productdetailslist->prodetails; ?>
			<?php } else if($language_check == 'BN') { ?>
			 <?php echo $productdetailslist->prodetails_bn; ?>
			<?php } ?>
					  
					  </div>
					</div>
					<div id="menu1" class="tab-pane fade">
					 <div style="padding-top:20px;border:1px #CDCDCD solid;padding:10px;font-size:16px;">
					 ddfgdfgfd
						  </div>
					</div>
					
					
				  </div>
					</div>
					
					
					
				</div>
            </section>
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
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5fd84c9b17dc3003"></script>
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
		var product_id = $('#product_id').val();
		var qty = $('#qty').val();
		$("#loader").css("display", "block");
		
		var urlmgs = "<?php echo site_url('Cart/store2');?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{product_id:product_id,qty:qty},
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
	
	
	$('.pro_de_class').on('click', function(e){
		var qty = $('#qty').val();
			if(language_check=='BN'){
				totalCarttdd = engToBanglaConvert2(qty);
				$("#quantity_final").val(totalCarttdd);
			} else {
				$("#quantity_final").val(qty);
			}
		});
		
		$('.pro_de_minclass').on('click', function(e){
		var qty = $('#qty').val();
			
			if(language_check=='BN'){
				totalCarttdd = engToBanglaConvert2(qty);
				$("#quantity_final").val(totalCarttdd);

			} else {
				$("#quantity_final").val(qty);
			}
		
		});
	
	function engToBanglaConvert2(number){
        var engBangArray = {'0':'০','1':'১','2':'২','3':'৩','4':'৪','5':'৫','6':'৬','7':'৭','8':'৮','9':'৯'};
        var numberLength  = number.toString().length;
        var numberToString = number.toString();
        var engToBangla = [];
        for (var i = 0; i<= numberLength - 1; i++) {
            engToBangla.push(engBangArray[numberToString[i]]);
        }
        return engToBangla.join('');
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
					$(".cart_row_amountList").html(totalCartt);
                } else {
					$(".cart_row_amountList").html(totalCart);
				}
				open_cart_panel();
				$("#loader").css("display", "none");
			}
		});
		e.preventDefault();
	}
	
	function myFunctionPlus(k){
		var row_id = $('#'+k).attr("data-id");
		var data_qty = $('#'+k).attr("data_qty");
		var quantity = +data_qty+1;
		$("#loader").css("display", "block");
		
		var urlmgs = "<?php echo site_url("Cart/updateCartItem");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{row_id:row_id,quantity:quantity},
			success:function(data){
				$(".cart_html_view_list").html(data);
				open_cart_panel();
				$("#loader").css("display", "none");
			}
		});
		e.preventDefault();
	}
	
	
	function myFunctionMinus(L){
		var row_id = $('#'+L).attr("data-id");
		var data_qty = $('#'+L).attr("data_qty");
		var quantity = data_qty-1;
		$("#loader").css("display", "block");
		
		var urlmgs = "<?php echo site_url("Cart/updateCartItem");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{row_id:row_id,quantity:quantity},
			success:function(data){
				$(".cart_html_view_list").html(data);
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
