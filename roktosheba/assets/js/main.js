$(window).on("load",function (){
	// Preloader
	$('#preloader').fadeOut('slow',function(){$(this).remove();});
	
}); 
$(document).ready(function(){

	$('.oxg_close').click(function(){
		$('.oxg_banner').hide();
		return false;
	});



	$('#btn-yes').click(function(){
		$('.yes-form').show();
		$('.no-form').hide();
		return false;
	});

	$('#btn-no').click(function(){
		$('.no-form').show();
		$('.yes-form').hide();
		return false;
	});

	
	// Mobile Menu
	
	$('.nav_icon').click(function(){
		$('.header_menu_area ul').slideToggle(1000);
	});
	
	// Client Carousel
	
	$('.Associate_organization_bottom').owlCarousel({
		loop:true,
		items:4,
		autoplay:true,
		nav:true,
		navText:['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
		margin:60,
	    responsive:{
        0:{
            items:1
        }, 
		500:{
            items:2
        },
       768:{
            items:3
        },
		1200:{
            items:4
        }
    }
	});
  
	
	
	
	
  
});