<!DOCTYPE HTML>
<html class="no-js" lang="en-US">
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

<div id="preloader"></div>
<!-- End Preloader Area -->
<div class="full-main">
  <div class="main-area">
    <!-- Start Header Area -->
     <?php $this->load->view("header_part"); ?>
    <!-- End Header Area -->
    <div class="my-account-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
		  
		  <?php if($userinfo->status == 1){ ?>
            <div class="platelet_alert">
              <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>আপনি কি প্লাটিলেট ডোনার হতে নাম বাদ দিতে চান?</strong> <br>
                <form action="<?php echo site_url('Dashboard/Plati_removeUpdate');?>" method="POST">
                  <button type="submit" name="no_platelet" class="btn btn-danger"><i class="fa fa-check"></i> হ্যা চাই</button>
                </form>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
              </div>
            </div>
			<?php } else { ?>
			<div class="platelet_alert">
              <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>আপনি কি প্লাটিলেট ডোনার হতে ইচ্ছুক?</strong> <br>
                <form action="<?php echo site_url('Dashboard/PlatiUpdate');?>" method="POST">
                  <button type="submit" name="yes_platelet" class="btn btn-success"><i class="fa fa-check"></i> হ্যা ইচ্ছুক</button>
                </form>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
              </div>
            </div>
			<?php } ?>
			
			
			<?php if(!empty($accountsucc)){ ?>
			<div class="platelet_alert">
              <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong><?php echo $accountsucc; ?></strong> <br>
                
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
              </div>
            </div>
			<?php } ?>
			
			
			
          </div>
          <div class="col-md-12">
            <div class="profile-area">
              <div class="row">
                <div class="col-md-3">
                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical"> <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Last Donate Date</a> <a class="nav-link " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Edit Profile</a> <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Change Password</a> </div>
                </div>
                <div class="col-md-9">
                  <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                      <form action="<?php echo site_url('Dashboard/InfoUpdate'); ?>" method="POST">
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
                        <input class="btn btn-primary" type="submit" name="update_profile" value="Update Profile" />
                      </form>
                    </div>
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                      <form action="<?php echo site_url('Dashboard/InfoDonateUpdate'); ?>" method="POST">
                        <div class="date_top_text">
                          <div class="input_item">
                            <label for="countingD">সর্বশেষ রক্ত দানের তারিখ<span>*</span></label>
							<?php
							$dateObj   				= DateTime::createFromFormat('!m', $userinfo->last_month);
							$monthName 				= $dateObj->format('F');
							?>
							
                            <p>Current Date : <?php echo $userinfo->last_day; ?>/<?php echo $monthName; ?>/<?php echo $userinfo->last_year; ?></p>
                            <br>
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
								  <option value="1" <?php if ($userinfo->last_month == '1') { echo 'selected'; } ?> >January</option>
                                  <option value="2" <?php if ($userinfo->last_month == '2') { echo 'selected'; } ?> >February</option>
                                  <option value="3" <?php if ($userinfo->last_month == '3') { echo 'selected'; } ?> >March</option>
                                  <option value="4" <?php if ($userinfo->last_month == '4') { echo 'selected'; } ?> >April</option>
                                  <option value="5" <?php if ($userinfo->last_month == '5') { echo 'selected'; } ?> >May</option>
                                  <option value="6" <?php if ($userinfo->last_month == '6') { echo 'selected'; } ?> >June</option>
                                  <option value="7" <?php if ($userinfo->last_month == '7') { echo 'selected'; } ?> >July</option>
                                  <option value="8" <?php if ($userinfo->last_month == '8') { echo 'selected'; } ?> >August</option>
                                  <option value="9" <?php if ($userinfo->last_month == '9') { echo 'selected'; } ?> >September</option>
                                  <option value="10" <?php if ($userinfo->last_month == '10') { echo 'selected'; } ?> >October</option>
                                  <option value="11" <?php if ($userinfo->last_month == '11') { echo 'selected'; } ?> >November</option>
                                  <option value="12" <?php if ($userinfo->last_month == '12') { echo 'selected'; } ?> >December</option>
                                </select>
                              </div>
                              <div class="single_date_item">
                                <select name="last_year" class="form-control"  id="">
                                  <option  value="2017">2017</option>
                                  <option  value="2018">2018</option>
                                  <option  value="2019">2019</option>
                                  <option  value="2020">2020</option>
                                  <option selected value ="2021">2021</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <input class="btn btn-primary" type="submit" name="update_last_donate" value="Update Donate Date" />
                      </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                      <form action="<?php echo site_url('Password_change/Pass_update'); ?>" method="POST">
                        <div class="input_item">
                          <label for="password">Old Password<span>*</span></label>
                          <input type="password" name="oldpass" class="form-control" id="oldpass" />
                        </div>
                        <div class="input_item">
                          <label for="cnfpassword">New Password<span>*</span></label>
                          <input type="password" name="password" class="form-control" id="cnfpassword" />
                        </div>
                        <div class="input_item">
                          <label for="cmnfpassword">Confirm New Password<span>*</span></label>
                          <input type="password" name="confirm_password" class="form-control" id="cmnfpassword" />
						  <span style="color:#FF0000;" class="cnfmeg"></span>
                        </div>
                        <input type="submit" class="btn btn-primary abc" name="change_password" value="Change Password" />
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <?php echo $this->load->view("footer"); ?>	
</div>
<!-- Js Files -->
<!-- modernizr -->
<script src="<?php echo base_url("roktosheba/assets/js/vendor/modernizr-3.5.0.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("roktosheba/assets/js/vendor/jquery-3.2.1.min.js"); ?>"></script>
<script src="<?php echo base_url("roktosheba/assets/js/popper.js"); ?>"></script>
<script src="<?php echo base_url("roktosheba/assets/js/bootstrap.min.js"); ?>"></script>
<script src="<?php echo base_url("roktosheba/assets/js/config.js"); ?>"></script>
<script src="<?php echo base_url("roktosheba/assets/js/util.js"); ?>"></script>
<script src="<?php echo base_url("roktosheba/assets/js/jquery.emojiarea.js"); ?>"></script>
<script src="<?php echo base_url("roktosheba/assets/js/emoji-picker.js"); ?>"></script>
<script src="<?php echo base_url("roktosheba/assets/js/owl.carousel.min.js"); ?>"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script>
		$(document).ready(function() {
		   $('.district').select2();
		});
		</script>
<script>
$("#cmnfpassword").on('keyup', function(){
		var cnfpassword = $("#cnfpassword").val();
		var cmnfpassword = $("#cmnfpassword").val();
		if(cmnfpassword == ""){
		$(".cnfmeg").text("");
			} else {
			if(cnfpassword == cmnfpassword){
				$(".cnfmeg").text("");
				$(".abc").removeAttr('disabled', 'disabled');
			} else {
				$(".cnfmeg").text("Password and confirm password do not match!");
				$(".abc").attr('disabled', 'disabled');
				return false;
			}
		}
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
