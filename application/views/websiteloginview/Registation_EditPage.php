<!DOCTYPE HTML>
<html class="no-js" lang="en-US">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $baseinformation->title; ?></title>
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
	
	
    <?php //$this->load->view("header_part"); ?>
	
	
	
	
    <header class="header-top-area">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="form-top"> 
							<h2>রেজিস্ট্রেশন ফরম</h2>
						</div>
					</div>
				</div>
				<div class="row section_padding">
					<div class="col-xl-12">
						<div class="form-start"> 
						<div style="color:#FF0000;"><?php echo $errors; ?></div>
							<form action="<?php echo site_url('websiteloginControler/Registation_View/Update_action');?>" method="POST"> 
											                    
			                     <input type="hidden" name="id" value="<?php echo $userinfo->signId; ?>" id="id" >
								  <div class="input_item">
                          <label for="name">নাম<span>*</span></label>
                          <input type="text" value="<?php echo $userinfo->signName; ?>" name="name" class="form-control" id="name" placeholder="নাম" />
                        </div>
                        <fieldset>
                        <legend>স্থায়ী ঠিকানা</legend>
                        <div class="form-group input_item"> 
										<label for="s_district">জেলা<span>*</span></label>
										<select name="s_district" class="form-control custom-select"  id="s_district" required>
											<option value="">বাছাই করুন  জেলা</option>
										<?php foreach($DIstlist as $dv1){ ?>
											<option <?php if ($userinfo->s_district == $dv1->id) { echo 'selected'; } ?> value="<?php echo $dv1->id; ?>"><?php echo $dv1->bn_name; ?></option>
											<?php } ?>
										</select>
									</div>
						<div class="form-group input_item"> 
										<label for="s_district">উপজেলা <span>*</span></label>
										<?php $results_d = $this->M_cloud->tbWhRow('upazilas', array('id' => $userinfo->s_upzilla)); ?>
										<select name="s_upzilla" class="form-control custom-select"  id="upzillaListv" required>
											<option value="<?php echo $userinfo->s_upzilla; ?>"><?php echo $results_d->bn_name; ?></option>
										
										</select>
									</div>
                        <div class="input_item">
                          <label for="s_address">ঠিকানা<span>*</span></label>
                          <input type="text" name="s_address" class="form-control" value="<?php echo $userinfo->s_address; ?>" id="s_address" placeholder="ঠিকানা" value="মেঘনা" required>
                        </div>
                        </fieldset>
                        <fieldset>
                        <legend>বর্তমান ঠিকানা </legend>
                        <div class="form-group input_item"> 
										<label for="district">জেলা<span>*</span></label>
										<select name="district" class="form-control custom-select"  id="district" required>
										<option value="">বাছাই করুন  জেলা</option>
										<?php foreach($DIstlist as $dv){ ?>
											<option <?php if ($userinfo->district == $dv->id) { echo 'selected'; } ?> value="<?php echo $dv->id; ?>"><?php echo $dv->bn_name; ?></option>
											<?php } ?>
										</select>
									</div>
						<div class="form-group input_item"> 
										<label for="district">উপজেলা<span>*</span></label>
										<?php $results_d2 = $this->M_cloud->tbWhRow('upazilas', array('id' => $userinfo->s_upzilla)); ?>
										<select name="upzilla" class="form-control custom-select"  id="s_upzillaListv" required>
										<option value="<?php echo $userinfo->upzilla; ?>"><?php echo $results_d2->bn_name; ?></option>
										
										</select>
									</div>
                        <div class="input_item">
                          <label for="address">ঠিকানা<span>*</span></label>
                          <input type="text" name="address" value="<?php echo $userinfo->address; ?>" class="form-control" id="address" placeholder="ঠিকানা" value="মেঘনা" required>
                        </div>
                        </fieldset>
                        <div class="input_item">
                          <label for="address"> ইমেইল </label>
                          <input type="text" value="<?php echo $userinfo->signEmail; ?>" name="email" class="form-control" id="address" placeholder="ইমেইল " />
                        </div>
						<div class="input_item mobile_update">
									<label for="mobile">মোবাইল নাম্বার ( ইংরেজি )<span>*</span></label>
									<input type="number" name="mobile" class="form-control"  value="<?php echo $userinfo->signMobile; ?>" id="mobile" placeholder="মোবাইল নাম্বার" maxlength="11" required>
									<span class="white"></span>
								<span style="color:#FF0000;" class="ckmail"></span>
								</div>
                        <div class="input_item">
                          <div class="custom-control custom-radio">
                            <input type="radio" id="male" <?php if($userinfo->gender=='male'){ echo "checked=checked";}  ?> name="gender" class="custom-control-input"  value="male">
                            <label class="custom-control-label" for="male">পুরুষ</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="female" <?php if($userinfo->gender=='female'){ echo "checked=checked";}  ?> value="female" name="gender" class="custom-control-input" >
                            <label class="custom-control-label" for="female">নারী</label>
                          </div>
                        </div>	
								
								
								<div class="input_item">
									<label for="birthday2">জন্ম তারিখঃ<span>*</span></label>
									<input type="date" name="birthday" value="<?php echo $userinfo->birthday; ?>" class="form-control" id="birthday2" placeholder="জন্ম তারিখ" autocomplete="off">
								</div>
								
								<label for="countingD">সর্বশেষ রক্ত দানের তারিখ<span>*</span></label>
								<div class="select_date_area">
								
                              <div class="single_date_item">
                                <select name="last_day" class="form-control"  id="">
                                  <option value="<?php echo $userinfo->last_day; ?>"><?php echo $userinfo->last_day; ?></option>
								  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                  <option value="13">13</option>
                                  <option value="14">14</option>
                                  <option value="15">15</option>
                                  <option value="16">16</option>
                                  <option value="17">17</option>
                                  <option value="18">18</option>
                                  <option value="19">19</option>
                                  <option value="20">20</option>
                                  <option value="21">21</option>
                                  <option value="22">22</option>
                                  <option value="23">23</option>
                                  <option value="24">24</option>
                                  <option value="25">25</option>
                                  <option value="26">26</option>
                                  <option value="27">27</option>
                                  <option value="28">28</option>
                                  <option value="29">29</option>
                                  <option value="30">30</option>
                                  <option value="31">31</option>
                                </select>
                              </div>
                              <div class="single_date_item">
                                <select name="last_month" class="form-control"  id="">
								  <option value="01" <?php if ($userinfo->last_month == '1') { echo 'selected'; } ?> >January</option>
                                  <option value="02" <?php if ($userinfo->last_month == '2') { echo 'selected'; } ?> >February</option>
                                  <option value="03" <?php if ($userinfo->last_month == '3') { echo 'selected'; } ?> >March</option>
                                  <option value="04" <?php if ($userinfo->last_month == '4') { echo 'selected'; } ?> >April</option>
                                  <option value="05" <?php if ($userinfo->last_month == '5') { echo 'selected'; } ?> >May</option>
                                  <option value="06" <?php if ($userinfo->last_month == '6') { echo 'selected'; } ?> >June</option>
                                  <option value="07" <?php if ($userinfo->last_month == '7') { echo 'selected'; } ?> >July</option>
                                  <option value="08" <?php if ($userinfo->last_month == '8') { echo 'selected'; } ?> >August</option>
                                  <option value="09" <?php if ($userinfo->last_month == '9') { echo 'selected'; } ?> >September</option>
                                  <option value="10" <?php if ($userinfo->last_month == '10') { echo 'selected'; } ?> >October</option>
                                  <option value="11" <?php if ($userinfo->last_month == '11') { echo 'selected'; } ?> >November</option>
                                  <option value="12" <?php if ($userinfo->last_month == '12') { echo 'selected'; } ?> >December</option>
                                </select>
                              </div>
                              <div class="single_date_item">
                                <select name="last_year" class="form-control"  id="">
                                  <option  value="<?php echo $userinfo->last_year; ?>"><?php echo $userinfo->last_year; ?></option>
								  <option  value="2017">2017</option>
                                  <option  value="2018">2018</option>
                                  <option  value="2019">2019</option>
                                  <option  value="2020">2020</option>
                                  <option selected value ="2021">2021</option>
                                </select>
                              </div>
                            </div>
								<div class="form-group input_item"> 
									<label for="district">রক্তের  গ্রুপ<span>*</span></label>
									<select name="blood_group" class="form-control custom-select"  id="blood_group">
										<option value="<?php echo $userinfo->blood_group; ?>"><?php echo $userinfo->blood_group; ?></option>
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

								<div class="input_item">
									<label for="password">পাসওয়ার্ড<span>*</span></label>
									<input type="password" name="password" class="form-control" id="password" placeholder="পাসওয়ার্ড">
								</div>
								<div class="input_item">
									<label for="cnfpassword"> কনফার্ম পাসওয়ার্ড<span>*</span></label>
									<input type="password" name="confirm_password" class="form-control" id="cnfpassword" placeholder="কনফার্ম পাসওয়ার্ড">
								</div>
								<div class="submit " > 
									<input type="submit" class="abc" name="register_button" value="রেজিস্ট্রেশন" />
								</div>
								  
							</form>
							
							<div class="row"> 
								<div class="col-xl-12"> 
									<div class="bottom_text_area">
										<div class="text_area"> 
											<a href=""><p>পাসওয়ার্ড ভুলে গেলে যোগাযোগ করুন</p></a>
										</div>
										<div class="requeryment_area">
											<ul>
												<li>১.রোগীর ব্যাপারে বিস্তারিত জেনে নিশ্চিত হয়ে রক্ত দিন  </li>
												<li>২.প্রতিবার রক্তদানের পর করে তারিখ পরিবর্তন করে দিন বা  যোগাযোগ  করুন  </li>
												<li>৩. রোগি দেখে রক্তদান করুন। অবশ্যই রোগির নিকট উপস্থিত রোগির আত্মীয়ের সাথে কথা বলে জানিয়ে দিন যে আপনি স্বেচ্ছায় এবং বিনামূল্যে রক্তদান করছেন। যাতে দালাল, আত্মীয় সেজে কিংবা তৃতীয় পক্ষের কেউ দুর্নীতি করতে না পারে।</li>
												<li>৪.আপনার সংগঠনের নাম দেখতে চাইলে আমাদের সাথে যোগাযোগ করুন  </li>
												
											</ul>
										</div>	
									
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
  </div>

  <?php //echo $this->load->view("footer"); ?>		
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
<script>
$("#mobile").on('keyup', function(){
		var mobile = $(this).val();
		var cruneturl  = "<?php echo site_url('Sign_up/checkemail'); ?>";
		$.ajax({
			url:cruneturl,
			type:"POST",
			data:{mobile:mobile},
			success:function(data){
				if(data == 1){
				$(".ckmail").text("Mobile number already exists. please try again.");
				$(".abc").attr('disabled', 'disabled');
				return false;
				} else {
				$(".ckmail").text("");
				$(".abc").removeAttr('disabled', 'disabled');
				}
			}
		});
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
