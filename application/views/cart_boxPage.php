<style>

.cart-box{
position: fixed;
bottom: 50%;
right: 30px;
width: 48px;
height: 48px;
z-index: 2147483000;
cursor: pointer;
background-position: 50%;
}

.btn-circle {
width: 30px;
height: 30px;
text-align: center;
padding: 6px 0;
font-size: 12px;
line-height: 1.428571429;
border-radius: 15px;
}
.btn-circle.btn-lg {
width: 50px;
height: 50px;
padding: 10px 16px;
font-size: 18px;
line-height: 1.33;
border-radius: 25px;
}
.btn-circle.btn-xl {
width: 70px;
height: 80px;
padding: 10px 16px;
font-size: 28px;
line-height: 1.33;
border-radius: 5px;
}
.cart-items-count{
position:relative;
display:flex;
text-align:center;
justify-content: center;
top:-20px;
left:15px;
}

.notification-counter {   
position: absolute;
left: 8px;
background-color: rgb(255 103 0);
color: #fff;
border-radius: 3px;
padding: 1px 3px;
font: 8px Verdana;
}

@media only screen and (max-width: 500px) {

.cart-items-count{
position:relative;
display:flex;
text-align:center;
justify-content: center;
top:-20px;
}

}


</style>
<div class="row cart-box" id="Normal" style="margin-left:0px; margin-right:0px;z-index:1;">
<ul class="nav navbar-nav" style="-webkit-box-shadow: 2px 7px 18px -4px rgba(0,0,0,0.75);
-moz-box-shadow: 2px 7px 18px -4px rgba(0,0,0,0.75);
box-shadow: 2px 7px 18px -4px rgba(0,0,0,0.75);">
<li class="dropdown"> <a style="background:#FF6700; border:2px #FF6700 solid;" onClick="open_cart_panel()" class="draggable dropdown-toggle btn btn-primary btn-circle btn-xl cart_box_check_first" data-toggle="dropdown" role="button" aria-expanded="false"> 
<span style="color:#FFFFFF; padding-top:10px;"><i class="fa fa-shopping-bag" aria-hidden="true"></i></span>
</a> <span  class="cart-items-count">
<span class="notification-counter" style="font-weight:bold; font-size:9px;">

<span class="cart_row_amountList">
<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
<?php echo $rows = count($this->cart->contents()); ?>
<?php } else { ?>
<?php 
$rows = count($this->cart->contents());
echo BanglaConverter::en2bn("$rows\n");?>
<?php }?>
</span>  
<?php if(($language_check == 'EN') || (empty($language_check))) { ?>
ITEMS
<?php } else if($language_check == 'BN') { ?>
টি পণ্য
<?php } ?>
</span></span> 
</li>
</ul>
</div>
