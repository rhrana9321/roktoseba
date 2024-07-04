<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo base_url("frontend/left_menu/mtree.css"); ?>" rel="stylesheet" type="text/css">
<title><?php echo $basicinfo->title; ?></title>
<link rel="stylesheet" href="<?php echo base_url("frontend/css/bootstrap.min.css"); ?>">
<script src="<?php echo base_url("frontend/js/jquery.min.js"); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url("frontend/css/font-awesome.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("frontend/css_2/muhibullah.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("frontend/css_2/muhibullah1.css"); ?>">
<link href="https://fonts.googleapis.com/css?family=Rokkitt" rel="stylesheet">
<?php $this->load->view("cssjsLink"); ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
.rightnav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 99999999;
    top: 0;
    right: 0;
    background-color: #FFFFFF;
	border:2px #fdd670 solid;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
	margin-top:70px;
}



.rightnav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
    color:#FFFFFF;
}
.closebtn:hover {
    color: #CCCCCC;
    text-decoration:none;
}
.sidenav1 {
    color: #FFFFFF;
	font-size:16px;
	text-align:center;
	background:#009933;
	padding-top:5px;
	padding-bottom:5px;
    text-decoration:none;
}

@media screen and (max-height: 576px) {
  .rightnav {padding-top: 15px;}
  .rightnav a {font-size: 18px;}
  
  
}
</style>
</head>
<body>
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
<div class="container-fluid">
   <?php $this->load->view("header_part"); ?>
  <div class="row" style="padding-top:55px;">
     <div class="col-md-2 hidden-sm  hidden-xs sidenav" style="padding-left:0px;">
			
			<div id="jquery-accordion-menu" class="jquery-accordion-menu" style="padding-top:10px; padding-right:14px;">
				<ul>
					<li class="active"><a style="color:#000000; border:none;" href="<?php echo site_url("Offer");?>">Offer Products <input style="background:#FFFFFF; border:1px #fdd670 solid; padding-top:1px; padding-left:5px; padding-right:5px; padding-bottom:1px;" name="" value="<?php echo $this->M_cloud->countdbrows('webproduct_mange_table', array('Offer' => 'Offer')); ?>" type="button"></a></li>
					<li class=""><a style="color:#000000; border:none;" href="<?php echo site_url("home/product_request");?>"> Product Request </a></li>
					<?php foreach($catagoriinfoList as $mcv){?>
					<li><a style="color:#000000; border:none;" class="" href="<?php echo site_url("Category/index/" .$mcv->catId); ?>"><img style="height:25px;" src="<?php echo base_url("uploads/".$mcv->proimage1); ?>"/> <?php echo $mcv->category_name; ?> </a>
						<ul class="submenu">
						<?php 
						foreach($mcv->subcat as $scv){
						$sub_sub_catagoriinfoList	= $this->M_cloud->subcatproduct('sub_to_sub_category_mange', array('sub_category_id' => $scv->subcatId), 'subsubcatId ASC');
						?>
							<li><a  href="<?php echo site_url("SubCategory/index/" .$scv->subcatId); ?>"style="color:#000000; border:none;"><?php echo $scv->sub_category_name; ?> </a>
								<ul class="submenu">
									<?php foreach($sub_sub_catagoriinfoList as $sscv){?>
									<li><a style="color:#000000;"  href="<?php echo site_url("SubToSubCategory/index/" .$sscv->subsubcatId); ?>" class=""><?php echo $sscv->sub_to_sub_category_name; ?> </a></li>
									<?php } ?>
								</ul>
							</li>
							<?php } ?>
						</ul>
					</li>
					 <?php } ?>
				</ul>
			</div>
    </div>
    <div class="col-md-10 col-sm-12 col-xs-12 main category_Bysub_category subcategory_Bysub_subcategory search_product_Value subsubcategory_Bysub_subcategory"  style="padding-left:20px; padding-right:0px; min-height:700px; border-left:1px #ecc766 solid;">
      <div style="border-left:1px #ecc766 solid; height:100%; min-height:700px;">
        
        <div class="row" align="" style="padding-top:50px; margin-left:0px;">
				  <div class="col-md-12">
				  <h3 class="white-text" style="font-size:18px;"> Order Fail</h3>
				   <hr class="hr-light">
				   <h3 class="white-text" style="font-size:18px; font-weight:bold;"> Transaction Faild</h3>
				  </div>
				</div>
        
		 <?php $this->load->view("header_part"); ?>
        <?php $cart_total_value = $this->cart->total(); ?>
        <style>
			.sccoler_cart{
    max-height: 450px;
    overflow-y: scroll; 
}
			</style>
        <div class="row cart-box" id="Normal" style="margin-left:0px; margin-right:0px;">
			  <ul class="nav navbar-nav">
				<li class="dropdown"> <a style="background:#ff686e; border:2px #fbd46f solid;" onClick="openNav()" class="draggable dropdown-toggle btn btn-primary btn-circle btn-xl" data-toggle="dropdown" role="button" aria-expanded="false"> <span style="color:#FFFFFF; padding-top:10px;" class="glyphicon glyphicon-shopping-cart"></span></a> <span  class="cart-items-count"><span class="notification-counter cart_row_amount">
				  <?php 	if($language_valueList =='English'){ ?>
				  BDT-<?php echo $cart_total_value; ?>
				  <?php } else { ?>
				  BDT-<?php echo $cart_total_value; ?>
				  <?php } ?>
				  </span></span> </li>
			  </ul>
			</div>
		<!--Cart Nav start-->		
	<div id="mySidenav" class="rightnav">
		  <a href="javascript:void(0)" style="color:#000000;" class="closebtn" onClick="closeNav()">&times;</a>
		  <div class="sidenav1">Your shopping lists</div>
		  <div class="cart_html_view_list sccoler_cart">
		  
			<table class="table table-condensed">
			
			<tbody>
			 <?php $rows = $this->cart->contents(); 
		  	if(!empty($rows)) { ?>
			   <?php 
			   foreach ($this->cart->contents() as $items): 
			   $pro_price = $items['price']; 
	$total_pro_price = $items['subtotal'];
			   ?>
			  <tr style="border-bottom:1px #fee29b solid;">
				<td><img style="height:50px; padding-top:10px;" src="<?php echo base_url("uploads/".$items['proimg']); ?>"></td>
				<td style=""><?php echo $items['name']; ?></td>
				<td style="padding-top:15px;">
				 
				   <input type="text" style="width:60px;" name="qty" data-id="<?php echo $items['rowid']; ?>" class="form-control cartupdate cartupdate2" value="<?php echo $items['qty']; ?>" id="qty" placeholder="qty" required>
				  </td>
				<td style="padding-top:25px;"><?php 	if($language_valueList =='English'){ ?>
            						    <?php echo $total_pro_price; ?>
            						    <?php } else { ?>
            						   <?php echo $total_pro_price; ?>
            						    <?php } ?></td>
				<td style="padding-top:20px;"><i data-id="<?php echo $items['rowid']; ?>" style="font-size:24px; text-align:center; color:#000000;" class="fa fa-times deletecart" aria-hidden="true"></i></td>
			  </tr>
			  
			 
			  <?php endforeach; ?> 
			  <tr style="border:1px #fee29b solid; margin-top:20px; color:#FFFFFF;">
				<td colspan="3" style="color:#000000; text-align:center; background:#ff8182; font-weight:bold;">
				<?php $customerid  = $this->session->userdata('websitecusId'); if(empty($customerid)) { ?>	
				<a style="color:#FFFFFF; font-size:16px;" href="<?php echo site_url("Sign_in");?>">Checkout</a>
				<?php } else { ?>
				<a style="color:#FFFFFF; font-size:16px;" href="<?php echo site_url("Bulid_and_shipping");?>">Checkout</a>
				<?php } ?>
				</td>
				<td colspan="3" style="color:#FFFFFF; text-align:center; background:#e04f54; font-weight:bold;">
				<?php 
				$rows = $this->cart->contents();
				$cart_total_value = $this->cart->total();
				$cart_bn_total = BanglaConverter::en2bn("$cart_total_value\n");
				 ?>
				<?php 	if($language_valueList =='English'){ ?>
				BDT-<?php echo $cart_total_value; ?>
				<?php } else { ?>
				 	BDT-<?php echo $cart_total_value; ?>
				<?php } ?>
				</td>
			  </tr>
			  <?php } else { ?>
			<th style="width:20%;"><img style="height:300px;" src="<?php echo base_url("frontend/image/enptycart.png"); ?>" class="img-responsive" alt=""></th>
			<?php } ?>
			</tbody>
		  </table>
		  
		  </div>
		  
			  
			
		</div>
		<!--Cart Nav end-->			
	
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script src='http://cdnjs.cloudflare.com/ajax/libs/velocity/0.2.1/jquery.velocity.min.js'></script>
<script src="<?php echo base_url("frontend/left_menu/mtree.js"); ?>"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5efd5e7c4a7c6258179bba77/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "300px";
		$("#Normal").addClass("hide");
    }
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
		$("#Normal").removeClass("hide");
    }

<!--- Password view eys start --->
     $(".reveal3").mousedown(function() {
        $(".pwd3").replaceWith($('.pwd3').clone().attr('type', 'text'));
    })
    .mouseup(function() {
        $(".pwd3").replaceWith($('.pwd3').clone().attr('type', 'password'));
    })
    .mouseout(function() {
        $(".pwd3").replaceWith($('.pwd3').clone().attr('type', 'password'));
    });
<!--- Password view eys end --->
</script>
<script>

$('.category_click').on('click', function(e){
		var category_id = $(this).attr('category-id');
		//alert(category_id);
		var urlmgs = "<?php echo site_url("home/category_id_by_subcat");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{category_id:category_id},
			success:function(data){
				$(".category_Bysub_category").html(data);
			}
		});
		e.preventDefault();
	});
	
$('.subcategory_click').on('click', function(e){
		var subcategory_id = $(this).attr('subcategory-id');
		//alert(subcategory_id);
		var urlmgs = "<?php echo site_url("home/subcategory_id_by_product");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{subcategory_id:subcategory_id},
			success:function(data){
				$(".subcategory_Bysub_subcategory").html(data);
			}
		});
		e.preventDefault();
	});


$(".header_search_keyup").on('keyup', function() {
	var header_search_value = $(this).val();
	$.ajax({
		url : "<?php echo site_url('home/headerserchPro'); ?>",
		type : "POST",
		dataType : 'html',
		data : {header_search_value:header_search_value},
		success : function(data) {
			$(".search_product_Value").html(data);
		}
	});
	
});

$('.subsubcategory_click').on('click', function(e){
		var subsubcategory_id = $(this).attr('subsubcategory-id');
		var urlmgs = "<?php echo site_url("home/subsubcategory_id_by_product");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{subsubcategory_id:subsubcategory_id},
			success:function(data){
				$(".subsubcategory_Bysub_subcategory").html(data);
			}
		});
		e.preventDefault();
	});


$(".body_search_keyup").on('keyup', function() {
	var header_search_value = $(this).val();
	$.ajax({
		url : "<?php echo site_url('home/bodyserchPro'); ?>",
		type : "POST",
		dataType : 'html',
		data : {header_search_value:header_search_value},
		success : function(data) {
			$(".search_product_Value").html(data);
		}
	});
	
});

$("#confirmPassword").on('keyup', function(){
		var password = $("#password").val();
		var confirmPassword = $("#confirmPassword").val();
		
		if(confirmPassword == ""){
		$(".meg").text("");
			} else {
			
			if(password == confirmPassword){
				$(".meg").text("");
				$(".abc").removeAttr('disabled', 'disabled');
			} else {
				$(".meg").text("পাসওয়ার্ড এবং পুনরায় টাইপ পাসওয়ার্ড মেলে না!");
				$(".abc").attr('disabled', 'disabled');
				return false;
			}
		}
	});

</script> 
 <script type="text/javascript">	

$('.language_click').on('click', function(){
		var language_id = $(this).attr('language-id');
		
		if(language_id =='English'){
		var urlmgs = "<?php echo site_url("home/language_insert");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{language_id:language_id},
			success:function(data){
			 window.location.href = home;    
			}
		}); 
		    
		} else {
		    
		   var urlmgs = "<?php echo site_url("home/language_insert");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{language_id:language_id},
			success:function(data){
			    location.reload();
			}
		});  
		    
		}
		
});



	$(window).load(function(){
		$("#<?php echo $language_valueList; ?>").trigger('click');
	});
</script>

<script>


$('.cartupdate').on('change', function(){
		var row_id = $(this).attr("data-id");
		var qty = $(this).val();
		//alert(qty);
		var urlmgs = "<?php echo site_url('Cart/updateCartItem'); ?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{row_id:row_id, qty:qty},
			success:function(data){
				$(".cart_html_view_list").html(data);
				
			}
		});
		
		var urlmgs2 = "<?php echo site_url('Cart/updateCartItem2'); ?>";
		$.ajax({
			url:urlmgs2,
			type:"POST",
			data:{row_id:row_id, qty:qty},
			success:function(data){
				$(".cart_row_amount").html(data);
			}
		});
		e.preventDefault();
	});



$('.deletecart').on('click', function(e){
		var row_id = $(this).attr("data-id");
		var urlmgs = "<?php echo site_url("Cart/cartdelete");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{row_id:row_id},
			success:function(data){
				$(".cart_html_view_list").html(data);
			}
		});
		e.preventDefault();
});

$('.deletecart').on('click', function(e){
		var row_id = $(this).attr("data-id");
		var urlmgs = "<?php echo site_url("Cart/cartdelete2");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{row_id:row_id},
			success:function(data){
				$(".cart_row_amount").html(data);
			}
		});
		e.preventDefault();
});


$('.cart_store').on('click', function(e){
		var product_id = $(this).attr('product-id');
		var quntity_id = $(this).attr('quntity-id');
		var urlmgs = "<?php echo site_url("Cart/store");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{product_id:product_id, quntity_id:quntity_id},
			success:function(data){
				$(".cart_row_amount").html(data);
			}
		});
		e.preventDefault();
	});
	
$('.cart_store').on('click', function(e){
		var product_id = $(this).attr('product-id');
		var quntity_id = $(this).attr('quntity-id');
		var urlmgs = "<?php echo site_url("Cart/store2");?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{product_id:product_id, quntity_id:quntity_id},
			success:function(data){
				$(".cart_html_view_list").html(data);
			}
		});
		e.preventDefault();
});
	

</script>

