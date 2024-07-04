<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title><?php if(($language_check == 'EN') || (empty($language_check))) { ?><?php echo $basicinfo->title; ?><?php } else if($language_check == 'BN') { ?><?php echo $basicinfo->title_bn; ?><?php } ?></title>
<!--Favicon Icon-->
<link rel="shortcut icon" href="<?php echo base_url("frontend/css/favicon.ico"); ?>" type="image/x-icon">
<link rel="icon" href="<?php echo base_url("frontend/css/favicon.ico"); ?>" type="image/x-icon">
<!--Stylesheet-->
<link rel="stylesheet" href="<?php echo base_url("frontend/css/bootstrap.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("frontend/cdn_link/styles.css"); ?>" media="all"/>
<link rel="stylesheet" href="<?php echo base_url("frontend/cdn_link/custom_zazabar.css"); ?>" media="all"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url("frontend/cdn_link/jquery.validate.min.js?v=1.0"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("frontend/cdn_link/jquery.maskedinput.js?v=1.0"); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url("frontend/cdn_link/intlTelInput.css"); ?>">
<script type="text/javascript" src="<?php echo base_url("frontend/cdn_link/intlTelInput.js"); ?>"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
var equalheight = function ( container ) {

    var currentTallest = 0,
        currentRowStart = 0,
        rowDivs = new Array(),
        $el,
        topPosition = 0;
    $( container ).each( function () {

        $el = $( this );
        $( $el ).height( 'auto' )
        topPostion = $el.position().top;

        if ( currentRowStart != topPostion ) {
            for ( currentDiv = 0; currentDiv < rowDivs.length; currentDiv++ ) {
                rowDivs[ currentDiv ].height( currentTallest );
            }
            rowDivs.length = 0;
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push( $el );
        } else {
            rowDivs.push( $el );
            currentTallest = ( currentTallest < $el.height() ) ? ( $el.height() ) : ( currentTallest );
        }
        for ( currentDiv = 0; currentDiv < rowDivs.length; currentDiv++ ) {
            rowDivs[ currentDiv ].height( currentTallest );
        }
    } );
}
var change_status = function(){
    if($('input[name=flipswitch]').prop('checked') == false){
         var lang = 'বাং';
    }else{
         var lang = 'EN';
    }
    $.ajax({
        type: "POST",
        url: "submit/language_submit.php",
        data: 'lang='+lang,
        success: function(data) {
            $('.lang_res').html(data);
        }
    });
}    
var moneyKeyPress = function(k) {
    return k > 47 && k < 58 || k == 44 || k == 46 || k == 0 || k == 8 || k == 9 || k == 37 || k == 39;
}
var signout = function(){
            location.replace('logout');
        }
function updateURL(href,hasSubMenu) {
    if(hasSubMenu == 0){
        $('.subcat-all').hide();
    }
    var url = href.split('/').pop();
    window.history.pushState(url, url, url);

    $(".landingPage2").html('<center><img src="images/please_wait_animation.gif" alt="Lo..."></center>');

    $.ajax({
        url	:	"action.php?href="+href,
        method:	"POST",
        data	:	{category:1},
        success	:	function(data){
            $(".landingPage2").html(data);
            $("#footer").hide();
            $(".cs-copyright").hide();
        }
    })
    
} 
function showOfferProducts(href,hasSubMenu) {
    if(hasSubMenu == 0){
        $('.subcat-all').hide();
    }

    var url = href.split('/').pop();

    window.history.pushState(url, url, url);

    $(".landingPage2").html('<center><img src="images/please_wait_animation.gif" alt="Loading..."></center>');

    $.ajax({
        url	:	"offer.php?href="+href,
        method:	"POST",
        data	:	{category:1},
        success	:	function(data){
            $(".landingPage2").html(data);
            $("#footer").hide();
            $(".cs-copyright").hide();
        }
    })
    
}
function showBannerProducts(href,hasSubMenu) {
    if(hasSubMenu == 0){
        $('.subcat-all').hide();
    }

    var url = href.split('/').pop();

    window.history.pushState(url, url, url);

    $(".landingPage2").html('<center><img src="images/please_wait_animation.gif" alt="Loading..."></center>');


    $.ajax({
        url	:	"brand.php?href="+href,
        method:	"POST",
        data	:	{category:1},
        success	:	function(data){
            $(".landingPage2").html(data);
            $("#footer").hide();
            $(".cs-copyright").hide();
        }
    })

}
$(document).keypress(function(event){
	
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){

        var value = $('#search_term_string').val();
        search(value);
	}

});    
function search_submit(){
    var value = $('#search_term_string').val();
    search(value);
 
}    
function search(value) {
    if(value != ''){
        
    
        $('.subcat-all').hide();

        var href = 'https://nitaiganj.com/'+value;

        $(".landingPage2").html('<center><img src="images/please_wait_animation.gif" alt="Loading..."></center>');

        $.ajax({
            url	:	"search.php?q="+value,
            method:	"POST",
            data	:	{category:1},
            success	:	function(data){
                $(".landingPage2").html(data);
                $("#footer").hide();
                $(".cs-copyright").hide();
            }
        })
        
    }
    
}
$(window).on('popstate', function() {

    location.reload();
});
if (performance.navigation.type == 2) {

    location.reload();
}

var show_submenu = function(cid,href){
    $('.subcat-all').hide();
    $('.levelcid-'+cid).show();

    var url = href.split('/').pop();
    window.history.pushState(url, url, url);

    $(".landingPage2").html('<center><img src="images/please_wait_animation.gif" alt="Loading..."></center>');

    $.ajax({
        url	:	"action.php?href="+href,
        method:	"POST",
        data	:	{category:1},
        success	:	function(data){
            $(".landingPage2").html(data);
            $("#footer").hide();
            $(".cs-copyright").hide();
        }
    });
}    


var add_to_bag_edit = function(prod_id,qty){
	var div_id = $('#prod_'+prod_id);
	
	$(div_id).addClass('isInCart');


	$(div_id).find('.addText').hide();
	$(div_id).find('.cart_increser').show();
	
	$(div_id).find('.productQuantityZero').hide();
	$(div_id).find('.productQuantityEditor').show();

	$('.popQuantityEditor').show();
	$('.popBuyNowButton').hide();

	
	$('#buyNowButtons').show();
	
		
	$('.emptyCart').hide();
	$('.fullCart').show();

}    
</script>
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

.area_city {
    width:200px!important;
}
.area_city_bu {
    width:100px!important;
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

@media screen and (max-height: 438px) {
  .rightnav {padding-top: 15px;}
  .rightnav a {font-size: 18px;}
  .area_city {width:100px!important;}
  
}
</style>
<style>

.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(<?php echo base_url('images/please_wait_animation.gif');?>) center no-repeat #fff;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
 $(window).on('load', function () {
  $(".se-pre-con").fadeOut("slow");
});
</script>
<script>
	$(function() {
        $('.lazy').lazy();
    });
	</script>
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

