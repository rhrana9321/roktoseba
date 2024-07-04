<!DOCTYPE HTML>
<html class="no-js" lang="en-US">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $basicinfo->title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url("roktosheba/assets/css/fontawesome-all.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("roktosheba/assets/css/bootstrap.min.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("roktosheba/assets/css/owl.theme.default.min.css"); ?>" media="all" />
<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css<?php echo base_url("roktosheba/assets/css/owl.theme.default.min.css"); ?>" media="all" />
<link rel="stylesheet" href="assets/css/normalize.css<?php echo base_url("roktosheba/assets/css/owl.theme.default.min.css"); ?>">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Xanh+Mono&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&amp;display=swap" rel="stylesheet">
<link href="<?php echo base_url("roktosheba/cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css"); ?>" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url("roktosheba/assets/css/default.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("roktosheba/assets/css/style.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("roktosheba/assets/css/responsive.css"); ?>" media="all" />

</head>
<body>

<div class="full-main">
  <div class="main-area">
    <!-- Start Header Area -->
	
	
    <?php $this->load->view("header_part"); ?>
	
	
	
	
    <div class="oxg_banner">
			<a href="tel:01765018344"><img src="assets/oxg.png" alt="oxg banner"></a>
			<a href="#"  class="oxg_close">X</a>
		</div>
		<header class="header2-area">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="table-heading"> 
							<h2>সহযোগী সংগঠনঃ</h2>
						</div>
					</div>  
				</div>
				<div class="row section_padding">
				<?php foreach($slidrerlist as $v) { ?>
										<div class="col-md-4">
						 <div class="info">
						 	<h2><a target="_blank" href="<?php echo $v->slider_title_bn; ?>"><?php echo $v->slider_title; ?></a></h2>
						 	<p><?php echo $v->mobile; ?></p>
						 </div>
					</div>
					<?php } ?>
										
										
										
				</div>	
			</div>
		</header>
  </div>
  <?php echo $this->load->view("footer"); ?>		
</div>
<script src="<?php echo base_url("roktosheba/assets/js/vendor/modernizr-3.5.0.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("roktosheba/assets/js/vendor/jquery-3.2.1.min.js"); ?>"></script>
<script src="<?php echo base_url("roktosheba/assets/js/popper.js"); ?>"></script>
<script src="<?php echo base_url("roktosheba/assets/js/bootstrap.min.js"); ?>"></script>
<script src="<?php echo base_url("roktosheba/assets/js/config.js"); ?>"></script>
<script src="<?php echo base_url("roktosheba/assets/js/util.js"); ?>"></script>
<script src="<?php echo base_url("roktosheba/assets/js/jquery.emojiarea.js"); ?>"></script>
<script src="<?php echo base_url("roktosheba/assets/js/emoji-picker.js"); ?>"></script>
<script src="<?php echo base_url("roktosheba/assets/js/owl.carousel.min.js"); ?>"></script>
<script src="<?php echo base_url("roktosheba/code.jquery.com/ui/1.12.1/jquery-ui.js"); ?>"></script>
<script src="<?php echo base_url("roktosheba/assets/js/html2canvas.min.js"); ?>"></script>
<script src="<?php echo base_url("roktosheba/assets/js/main.js"); ?>"></script>
<script src="<?php echo base_url("roktosheba/assets/js/inna.js"); ?>"></script>
<script>
		  $( function() {
		    $( "#birthday" ).datepicker({
		      changeMonth: true,
		      changeYear: true,
		      dateFormat: 'yy-mm-dd'
		    });
		  } );
		  </script>
<script>
        	$('.eye_btn').click(function(){
        		$('.hide_box').show();
        		return false;
        	});

        	$('#code').keyup(function(){
		      var code = $('#code').val();
		      var uid = $('#uid').val();
		        $.ajax({ 
		            'url':'ajaxRequest.php',
		            'type':'POST',
		            'data' : {
		                'code':code,
		                'uid':uid
		            }, 
		            'success': function(data3) {
		              $('#showN').html(data3);
		              $('.x_number').hide();
		          }

		        });
		    }); 
 

        </script>
<script src="<?php echo base_url("roktosheba/cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"); ?>"></script>
<script>
		$(document).ready(function() {
		   $('.district').select2();
		});
		</script>
</body>
</html>
