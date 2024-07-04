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
			background-color: #E3282C;
			padding: 8px 16px !important;
			border-radius : 0px !important;
		}
		.pagi a:hover {
			color: white;
			border: 1px solid #FFFFFF;
			background-color: #E3282C;
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
<!-- Load Facebook SDK for JavaScript -->

<!-- Your customer chat code -->

<div id="page">
  <div class="app catalog navOpen theme navBtn">
    <?php $this->load->view("header_part"); ?>
   
        <div class="landingPage2">
          <section id="how-to-order-theme"> <br>
            <img src="<?php echo base_url("uploads/Subcategory_banner_image/".$subcatagorinameList->proimage); ?>" alt="" class="img-responsive">
			<br/>
			
			
			<ol class="breadcrumb">
                 <li itemprop="itemListElement"  class="crumb">
				 	<a href="#" class="catalogCategoryBox"><span itemprop="name">
					
					<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
					<?php echo $catagorinameList->category_name; ?> > <?php echo $subcatagorinameList->sub_category_name; ?>
					<?php } else if($language_check == 'BN') { ?>
					<?php echo $catagorinameList->category_name_bn; ?> > <?php echo $subcatagorinameList->sub_category_name_bn; ?>
					<?php }?>
					
					</span></a>
                 </li>
				
            </ol>
			
			
			
          </section>
         
          
          
          <link rel="stylesheet" href="<?php echo base_url("frontend/cdn_link/jquery.bxslider.css?v=1.03"); ?>">
          <script src="<?php echo base_url("frontend/cdn_link/jquery.bxslider.min.js"); ?>"></script>
          <script>
			$(function(){
				$('.bxslider').bxSlider({
					mode: 'fade',
					captions: false,
					infiniteLoop: true,
					auto: true,
					controls: false
				});
			});
			</script>
          <section class="bodyWrapper">
            <div class="categorySection miscCategorySection onlyMiscCategorySection">
              <div class="productPane">
                <div class="initialLabel">
                  <div class="" align="left" style="margin-left:0px; padding-top:10px; padding-left:10px; padding-bottom:10px; font-size:14px; font-weight:bold; padding-right:10px;">
				<div class="col-md-4" style="border-top:1px #9a9a9a solid; padding-bottom:10px;"></div>
				<div class="col-md-3" align="center" style="font-size:16px;"><h2 class="heading" style="font-size:16px;">
				
					<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
					<?php echo $subcatagorinameList->sub_category_name; ?>
					<?php } else if($language_check == 'BN') { ?>
					<?php echo $subcatagorinameList->sub_category_name_bn; ?>
					<?php }?>
				</h2></div>
				<div class="col-md-5" style="border-top:1px #9a9a9a solid;"></div>
			</div>
                </div>
				<?php  
				foreach($subcategoryByproductList as $sppro) {
				$Cart_row_id = (md5($sppro->wproid));
				if(array_key_exists($Cart_row_id, $this->cart->contents())){
					$cart_id_check = $this->cart->contents()[$Cart_row_id]['id'];
					$cart_qut_check = $this->cart->contents()[$Cart_row_id]['qty'];
					$cart_qut_and_price_check = $this->cart->contents()[$Cart_row_id]['price'];
					$Total_qut_and_price_check = ($cart_qut_check*$cart_qut_and_price_check);
				}
				?>
				
				 <div class="product new_arrival_box" id="prod_<?php echo $sppro->wproid; ?>" data-prodname="<?php if(($language_check == 'EN') || (empty($language_check))) { ?><?php echo $sppro->product_name; ?><?php } else if($language_check == 'BN') { ?><?php echo $sppro->product_name_bn; ?><?php }?>" data-weight="1" data-weight_unit="Pcs" data-qty="0" data-price="<?php echo $sppro->product_price; ?>" data-thumbnail="<?php echo base_url("uploads/thumb/".$sppro->proimage); ?>">
                  <div class="imageWrapper">
                    <div class="imageWrapperWrapper"> <img class="lazy" data-src="<?php echo base_url('images/sspinner.gif');?>" src="<?php echo base_url("uploads/thumb/".$sppro->proimage); ?>"> </div>
                    <div class="name"> 
					<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
					<?php echo $sppro->product_name; ?>
					<?php } else if($language_check == 'BN') { ?>
					<?php echo $sppro->product_name_bn; ?>
					<?php }?>
					</div>
                    <div class="subText">
					<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
					<?php echo $sppro->product_kg_liter_dos; ?>
					<?php } else if($language_check == 'BN') { ?>
					<?php echo $sppro->product_kg_liter_dos_bn; ?>
					<?php }?>
					 </div>
                    <div class="price"> <span>৳ </span>
					
					 <span style="<?php if(($language_check == 'BN')) { ?> display:none; <?php } ?>" class="productPrice_<?php echo $sppro->wproid; ?>"><?php echo $sppro->product_price; ?></span> 
					 <span style="<?php if(($language_check == 'EN') || (empty($language_check))) { ?> display:none;<?php } ?>" class="productPrice_<?php echo $sppro->wproid; ?>">
					  		<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
							<?php echo $sppro->product_price; ?> 
							<?php } else if($language_check == 'BN') { ?>
							<?php  echo BanglaConverter::en2bn("$sppro->product_price\n"); ?>
							<?php } ?>
					 </span> 
					 
					</div>
                    <div class="overlay text">
                      <div class="cart_increser Delete_Hide_Show_TextContainer_<?php echo $sppro->wproid; ?>" style="<?php if($cart_id_check == $sppro->wproid){ ?> <?php }else { ?> display:none;<?php } ?>">
                        <section class="actionItems">
                          <p class="total"><span>৳ </span>
						  
						  <span style="<?php if(($language_check == 'BN')) { ?> display:none;<?php } ?>" class="priceByProduct_<?php echo $sppro->wproid; ?>">
						  
						 <?php  if(empty($Total_qut_and_price_check)){ ?><?php echo $sppro->product_price; ?><?php } else { ?><?php echo $Total_qut_and_price_check; ?><?php }?>
						  
						  </span>
						  
						  <span style="<?php if(($language_check == 'EN') || (empty($language_check))) { ?> display:none;<?php } ?>" class="priceByProduct_Bn_<?php echo $sppro->wproid; ?>">
						  <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
							<?php echo $sppro->product_price; ?> 
							<?php } else if($language_check == 'BN') { ?>
							<?php  if(empty($Total_qut_and_price_check)){ ?><?php  echo BanglaConverter::en2bn("$sppro->product_price\n"); ?><?php } else { ?><?php  echo BanglaConverter::en2bn("$Total_qut_and_price_check\n"); ?><?php }?>
							
							<?php } ?>
						  </span>
						  </p>
                          <div>
						  
						  
                            <p class="minusQuantity remove" dty-id="1" product-id="<?php echo $sppro->wproid; ?>" data-prodid="<?php echo $sppro->wproid; ?>" data-price="<?php echo $sppro->product_price; ?>" data-qqty="1">–</p>
                            
							<p class="QuantityTextContainer quantity">
							<span style="<?php if(($language_check == 'BN')) { ?> display:none;<?php } ?>" class="QuantityTextContainer_<?php echo $sppro->wproid; ?>">
							<?php  if(empty($cart_qut_check)){ ?>1<?php } else { ?><?php echo $cart_qut_check; ?><?php }?>
							</span>
							<span style="<?php if(($language_check == 'EN')) { ?> display:none;<?php } ?>" class="QuantityTextContainer_bn_<?php echo $sppro->wproid; ?>">
							<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
							<?php  if(empty($cart_qut_check)){ ?>1<?php } else { ?><?php echo $cart_qut_check; ?><?php }?>
							<?php } else if($language_check == 'BN') { ?>
							<?php  if(empty($cart_qut_check)){ ?>১<?php } else {?><?php  echo BanglaConverter::en2bn("$cart_qut_check\n"); ?><?php }?>
							<?php } ?>
							</span>
							
							</p>
                            <p class="plusQuantity add cart_store" data-prodid="<?php echo $sppro->wproid; ?>" product-id="<?php echo $sppro->wproid; ?>">+</p>
                          </div>
                        </section>
                        <p class="inBag">
						<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
						in cart
						<?php } else if($language_check == 'BN') { ?>
						টি ব্যাগে
						<?php } ?>
						</p>
                      </div>
                      <p style="<?php if($cart_id_check == $sppro->wproid){ ?> display:none; <?php }else { ?> <?php } ?>" class="addText cart_store Delete_Show_Hide_TextContainer_<?php echo $sppro->wproid; ?>"  product-id="<?php echo $sppro->wproid; ?>" onClick="add_to_bag(<?php echo $sppro->wproid; ?>,1)">
					  <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
						Add to Shopping Bag 
						<?php } else if($language_check == 'BN') { ?>
						 বাজারের <br/> ব্যাগে যোগ করুন
						<?php }?>
						</p>
                      <span class="productDetailsBtn" data-prodid="<?php echo $sppro->wproid; ?>"> <a href="<?php echo site_url("Product_details/index/" .$sppro->wproid); ?>"
                           class="btnShowDetails"> <span>
						   <?php if(($language_check == 'EN') || (empty($language_check))) { ?>
							Details
							<?php } else if($language_check == 'BN') { ?>
							বিস্তারিত
							<?php }?>
						   </span> <span> &gt;</span> </a> <a href="<?php echo site_url("Product_details/index/" .$sppro->wproid); ?>" class="btnShowDetailsIcon">
                      <svg width="24px" height="24px"
                             style="fill:#e1e1e1;stroke:#e1e1e1;display:inline-block;vertical-align:middle;"
                             version="1.1" viewBox="0 0 100 100">
                        <path d="m50 5c-24.898 0-45 20.102-45 45s20.102 45 45 45 45-20.102 45-45-20.102-45-45-45zm7.1016 70c0 2.1992-1.8984 4.1016-4.1016 4.1016h-6.1992c-2.1992 0-4.1016-1.8984-4.1016-4.1016v-26.199c0-2.3008 1.8984-4.1016 4.1016-4.1016h6.1992c2.1992 0 4.1016 1.8984 4.1016 4.1016zm-7.2031-37.102c-4.6016 0-8.3984-3.8008-8.3984-8.5 0-4.6992 3.8008-8.5 8.3984-8.5 4.6992 0 8.5 3.8008 8.5 8.5 0 4.7031-3.7969 8.5-8.5 8.5z"></path>
                      </svg>
                      </a> </span> </div>
                  </div>
                  <span class="productDetailsBtn" data-prodid="<?php echo $sppro->wproid; ?>"> <a href="javascript:void(0);" class="btnShowDetails"> <span>Details</span> <span> &gt;</span> </a> <a href="javascript:void(0);" class="btnShowDetailsIcon">
                  <svg width="24px" height="24px"
                     style="fill:#e1e1e1;stroke:#e1e1e1;display:inline-block;vertical-align:middle;" version="1.1"
                     viewBox="0 0 100 100">
                    <path d="m50 5c-24.898 0-45 20.102-45 45s20.102 45 45 45 45-20.102 45-45-20.102-45-45-45zm7.1016 70c0 2.1992-1.8984 4.1016-4.1016 4.1016h-6.1992c-2.1992 0-4.1016-1.8984-4.1016-4.1016v-26.199c0-2.3008 1.8984-4.1016 4.1016-4.1016h6.1992c2.1992 0 4.1016 1.8984 4.1016 4.1016zm-7.2031-37.102c-4.6016 0-8.3984-3.8008-8.3984-8.5 0-4.6992 3.8008-8.5 8.3984-8.5 4.6992 0 8.5 3.8008 8.5 8.5 0 4.7031-3.7969 8.5-8.5 8.5z"></path>
                  </svg>
                  </a> </span>
				  
				  
				 <!-- Start job-->
				  
                  <section class="productQuantityZero addButtonWrapper border-radius-small cart_store Delete_Show_Hide_TextContainer_<?php echo $sppro->wproid; ?>" onClick="add_to_bag(<?php echo $sppro->wproid; ?>,1)" product-id="<?php echo $sppro->wproid; ?>" style="<?php if($cart_id_check == $sppro->wproid){ ?> display:none;<?php }else { ?> <?php } ?>">
                    <p class="buyText ">
					<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
					<img src="<?php echo base_url('resource/hicon.png');?>"/> Add to Bag
					<?php } else if($language_check == 'BN') { ?>
					<img src="<?php echo base_url('resource/hicon.png');?>"/> ব্যাগে যোগ
					<?php }?>
					
					</p>
                  </section>
				  <div class="productQuantityEditor addButtonWrapper border-radius-small Delete_Hide_Show_TextContainer_<?php echo $sppro->wproid; ?>" style="<?php if($cart_id_check == $sppro->wproid){ ?> <?php }else { ?> display:none;<?php } ?>">
                    <button class="minusQuantity remove" product-id="<?php echo $sppro->wproid; ?>" data-prodid="<?php echo $sppro->wproid; ?>" data-price="<?php echo $sppro->product_price; ?>" data-qqty="1">– </button>
                    <div class="QuantityTextContainer">
					
					<span style="<?php if(($language_check == 'BN')) { ?> display:none;<?php } ?>" class="QuantityTextContainer_<?php echo $sppro->wproid; ?>">
					
							<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
							<?php  if(empty($cart_qut_check)){ ?>1<?php } else { ?><?php echo $cart_qut_check; ?><?php }?>
							<?php } else if($language_check == 'BN') { ?>
							<?php  if(empty($cart_qut_check)){ ?>১<?php } else {?><?php  echo BanglaConverter::en2bn("$cart_qut_check\n"); ?><?php }?>
							<?php } ?>
					
					
					</span>
					<span style="<?php if(($language_check == 'EN')) { ?> display:none;<?php } ?>" class="QuantityTextContainer_bn_<?php echo $sppro->wproid; ?>">
					
					<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
					
					<?php } else if($language_check == 'BN') { ?>
					<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
							<?php  if(empty($cart_qut_check)){ ?>1<?php } else { ?><?php echo $cart_qut_check; ?><?php }?>
							<?php } else if($language_check == 'BN') { ?>
							<?php  if(empty($cart_qut_check)){ ?>১<?php } else {?><?php  echo BanglaConverter::en2bn("$cart_qut_check\n"); ?><?php }?>
							<?php } ?>
					<?php } ?>
					</span>
					
					<span> </span><span>
					<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
					in cart
					<?php } else if($language_check == 'BN') { ?>
					টি ব্যাগে
					<?php } ?>
					</span> </div>
                    <button class="plusQuantity cart_store" product-id="<?php echo $sppro->wproid; ?>" data-prodid="<?php echo $sppro->wproid; ?>">+ </button>
                  </div>
				  
				  <!-- End job-->
                </div>
				<?php } ?>
               
              </div>
			  <div id="page" style="padding-bottom:100px;">
					<ul class="pagination-sm list-inline text-center">
						<li class="pagi"><?php echo $this->pagination->create_links(); ?></li>
					</ul>
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
