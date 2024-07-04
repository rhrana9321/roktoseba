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
    <!-- End Header Area -->
    <div class="oxg_banner"> <a href="tel:01765018344"><img src="<?php echo base_url("roktosheba/assets/oxg.png"); ?>" alt="oxg banner"></a> <a href="#"  class="oxg_close">X</a> </div>
    <!-- Start Search Area -->
    <section class="header_search_area">
      <div class="container">
        <div class="header_content_area">
          <div class="row section_padding home_search_area" >
            <div class="col-md-6 platelet-left-header">
              <h2><?php echo $basicinfo->companyName; ?> খুঁজুন  ....</h2>
              <hr>
              <form action="<?php echo site_url('Home/Search');?>" method="POST">
                <div class="form-group">
                  <div class="select_grouph_area">
                    <select name="blood_group" class="form-control custom-select"  id="blood_group">
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
                      <option value="O+">O+</option>
                      <option value="O-">O-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                    </select>
                  </div>
                </div>
                <div class="form-group input_item"> 
										<select name="s_district" class="form-control custom-select"  id="s_district" required>
											<option value="">বাছাই করুন  জেলা</option>
										<?php foreach($DIstlist as $dv1){ ?>
											<option value="<?php echo $dv1->id; ?>"><?php echo $dv1->bn_name; ?></option>
											<?php } ?>
										</select>
									</div>
				<div class="form-group input_item"> 
										<select name="s_upzilla" class="form-control custom-select"  id="upzillaListv" required>
											<option value="">বাছাই করুন  উপজেলা</option>
										
										</select>
									</div>
                <div class="form-group">
                  <div class="search_button">
                    <!-- <input name="send" value="খুঁজুন" name="search_button" type="submit"> -->
                    <button type="submit" name="search_button"><i class="fa fa-search"></i> <span>খুঁজুন</span></button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-6">
              <div class="platelet-left-header">
                <h2>প্লাটিলেট - রক্তবন্ধু খুঁজুন ....</h2>
                <hr>
                <div class="plat-form-area">
                  <form action="<?php echo site_url('Home/Plat_Search');?>" method="POST">
                    <div class="form-group">
                      <div class="select_grouph_area">
                        <select name="blood_group2" class="form-control custom-select" id="blood_group">
                          <option value="A+">A+</option>
                          <option value="A-">A-</option>
                          <option value="B+">B+</option>
                          <option value="B-">B-</option>
                          <option value="O+">O+</option>
                          <option value="O-">O-</option>
                          <option value="AB+">AB+</option>
                          <option value="AB-">AB-</option>
                        </select>
                      </div>
                    </div>
                   <div class="form-group input_item"> 
						<select name="district" class="form-control custom-select"  id="district" required>
						<option value="">বাছাই করুন  জেলা</option>
						<?php foreach($DIstlist as $dv){ ?>
							<option value="<?php echo $dv->id; ?>"><?php echo $dv->bn_name; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group input_item"> 
						<select name="upzilla" class="form-control custom-select"  id="s_upzillaListv" required>
						<option value="">বাছাই করুন  উপজেলা</option>
						
						</select>
					</div>
                    <div class="form-group search_button">
                      <button type="submit"   name="search_button"><i class="fa fa-search"></i> <span>খুঁজুন</span></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Search Area -->
    <div class="container">
      <div class="row">
        <div class="col-md-12"> <br>
          <script async src="../pagead2.googlesyndication.com/pagead/js/f.txt"></script>
          <!-- Roktobondhu -->
          <ins class="adsbygoogle"
					     style="display:block"
					     data-ad-client="ca-pub-4331100589850935"
					     data-ad-slot="5393622206"
					     data-ad-format="auto"
					     data-full-width-responsive="true"></ins>
          <script>
					     (adsbygoogle = window.adsbygoogle || []).push({});
					</script>
        </div>
      </div>
    </div>
    <!-- Start services Area  -->
    <section class="services-area">
      <div class="container">
        <div class="row section_padding">
          <div class="col-xl-12 col-md-12">
            <div class="services_chat_area text-center"> <a href="<?php echo site_url('Sign_up');?>"><?php echo $basicinfo->companyName; ?> হতে রেজিস্ট্রেশন করুন</a> </div>
            <br>
            <div class="platelet-header-right text-center">
              <p>প্লাটিলেট ডোনার হতে চাইলে &nbsp; <a href="<?php echo site_url('Platelet');?>" class="btn btn-rounded btn-success"> রেজিস্ট্রেশন করুন</a></p>
              
            </div>
			
          </div>
         
        </div>
      
        <div class="row">
          <div class="col-md-12"> <br>
            <script async src="../pagead2.googlesyndication.com/pagead/js/f.txt"></script>
            <!-- Roktobondhu -->
            <ins class="adsbygoogle"
							     style="display:block"
							     data-ad-client="ca-pub-4331100589850935"
							     data-ad-slot="5393622206"
							     data-ad-format="auto"
							     data-full-width-responsive="true"></ins>
            <script>
							     (adsbygoogle = window.adsbygoogle || []).push({});
							</script>
          </div>
        </div>
        <div class="row home_card_area">
          <div class="col-md-5">
            <div class="home_card_left">
              <h1><?php echo $basicinfo->companyName; ?> ব্লাড কার্ড </h1>
              <p>এখনি ডাউনলোড করে ফেলুন আপনার কার্ডটি </p>
              <a href="#" class="btn btn-rounded btn-success">কার্ড তৈরি করুন</a> <br>
              <br>
              <br>
              <p>কিভাবে কার্ড তৈরি করব?</p>
              <a href="#" target="_blank" class="btn btn-rounded btn-danger">ভিডিও টি দেখুন </a> </div>
          </div>
          <div class="col-md-7">
            <div class="bloodCard">
              <div id="card" class="zoom-out">
                <div class="c_header">
                  <div class="c_header_left c_avatar"> <img  src="<?php echo base_url("roktosheba/assets/images/avatar.png"); ?>" alt=" "/> </div>
                  <div class="c_group">A+</div>
                  <div class="c_header_left c_header_right"> <img src="<?php echo base_url("uploads/". $basicinfo->proimage); ?>" alt="logo"> </div>
                </div>
                <div class="c_details">
                  <h4><span id="c_o_name"><?php echo $basicinfo->companyName; ?></span></h4>
                  <p><b>Blood Group: </b><span id="c_o_blood">A+</span></p>
                  <p><b>Mobile: </b><span id="c_o_mobile">017xxxxxxxx</span></p>
                  <p><b>Address: </b><span id="c_o_address">xxxxxx, Bangladesh.</span></p>
                </div>
                <div class="c_footer">
                  <p><?php echo $basicinfo->website; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Calender download -->
        <div class="row">
          <div class="col-md-6">
            <div class="calender_right"> <img src="<?php echo base_url("roktosheba/assets/Calender.png"); ?>" alt="Roktobondhu Calender"> </div>
          </div>
          <div class="col-md-6">
            <div class="calender_left">
              <div class="home_card_left">
                <h1><?php echo $basicinfo->companyName; ?> ক্যালেন্ডার ২০২১</h1>
                <p>২০২১ সালের ক্যালেন্ডার PDF ও PNG ফরমেটে। প্রিন্ট করে বাড়িতে, অফিসে, প্রতিষ্ঠানে লাগিয়ে দিন।</p>
                <p>মন চাইলে কাউকে উপহার দিন! রক্তদানের আহ্বান ছড়িয়ে দিন।</p>
                <a style="margin-bottom:15px;"  href="#" target="_blank" class="btn btn-rounded btn-info">PNG Download</a> <br>
                <a href="#" target="_blank" class="btn btn-rounded btn-info">PDF Download</a> <br>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </section>
    
        
    <section class="socila_area">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="social_area">
              <ul>
                <li><a href="#"> <img src="<?php echo base_url("roktosheba/assets/images/fb.jpg"); ?>" alt="" /></a></li>
                <li class="last_item"><a href="#"><img src="<?php echo base_url("roktosheba/assets/images/play.png"); ?>" alt="" /></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
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
		
$("#s_district").on('change', function(){
	var s_district = $(this).val();
	var cruneturl  = "<?php echo site_url('Sign_up/S_upzillaList'); ?>";
		$.ajax({
			url:cruneturl,
			type:"POST",
			data:{s_district:s_district},
			success:function(data){
				$("#upzillaListv").html(data);
			}
		});
});   

$("#district").on('change', function(){
	var district = $(this).val();
	var cruneturl  = "<?php echo site_url('Sign_up/S_upzillaList2'); ?>";
		$.ajax({
			url:cruneturl,
			type:"POST",
			data:{district:district},
			success:function(data){
				$("#s_upzillaListv").html(data);
			}
		});
});
</script>
</body>
</html>
