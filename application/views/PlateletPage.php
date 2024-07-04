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
	
	
	
	
    <header class="platelet-header-area">
			<div class="container">
				<div class="row">
					<div class="col-xl-6">
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
					<div class="col-md-6">
						<div class="platelet-header-right">
							<p>প্লাটিলেট ডোনার হতে চাইলে &nbsp; <a href="#platelet_form" class="btn btn-rounded btn-success"> রেজিস্ট্রেশন করুন</a></p>
							
							<br> 
							<p>পুরাতুন রক্তবন্ধু প্লাটিলেট দিতে চাইলে লগইন করে </p>
							<a href="<?php echo site_url('Dashboard');?>" class="btn  btn-rounded btn-danger ">প্রোফাইল আপডেট করুন</a>
						</div>
					</div>
				</div>
				
			</div>
		</header>
		<div class="container">
			<div class="row">
				<div class="col-md-12"> 
					<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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

					<br>
				</div>
			</div> 
		</div> 

		<div class="thala-page-area">
			<div class="container">
				<div class="row section_padding">
					<div class="col-md-12">
						<div class="thera-left"> 
							<div class="form-area thara-register-form">
								<div class="form-top"> 
									<h2>একটু জেনে নিন...</h2>
								</div> 
								<div class="form-start">
									 <p>যারা শুধু প্লাটিলেট/অণুচক্রিকা প্রদান করেন আমরা জানি ১৫ দিন পরপর প্লাটিলেট দেয়া যায়। কিন্তু আমাদের আবহাওয়া পরিবেশ ও খাদ্যাভ্যাস এবং জীবনাচরণের ভিত্তিতে মাসে ১ বার দেয়াই উত্তম। সে হিসেবে রক্তবন্ধুতে ৩০ দিন পরপর প্লাটিলেট দিতে প্রস্তুত প্লাটিলেট দাতাদের লিস্টে দেখানো হবে। ৩০ দিনের কম হলে নাম কাটা অবস্থায় দেখা যাবে। তবে কারো শরীর স্বাস্থ্য ভালো হলে এবং খুব জরুরি রোগির ক্ষেত্রে ১৫-২০ দিন পরই চাইলে দিতে পারেন। <b> ঢাকা, কুমিল্লা, সিলেট ও চট্টগ্রাম</b> এর বাইরে যেহেতু এফেরেসিস এর মাধ্যমে শুধু প্লাটিলেট দেয়ার সুযোগ নেই তাই আপাতত এই চারটি জেলা যুক্ত করা হলো। আশেপাশের জেলার যারা এই চারটি লোকেশনে প্লাটিলেট দিতে পারবেন তারাও রেজিস্ট্রেশন করুন। প্রতিবার প্লাটিলেট দেয়ার পর লগইন করে তারিখ আপডেট করে দিবেন।  অন্যকোন জেলায় এফেরেসিস মেশিনের মাধ্যমে শুধু প্লাটিলেট/অণুচক্রিকা নেয়ার ব্যবস্থা চালু হলে আমাদের জানাবেন, আমরা সেই জেলা যুক্ত করে দিবো।

									 	<br><br> <b>প্লাটিলেট ডোনারের যোগ্যতাঃ</b> বয়স কমপক্ষে ১৮, ওজন ৬০ কেজি ও ভেইন বা রগ স্পষ্ট/ তুলনামূলক মোটা হতে হবে।</p>
									 	<p>হিমোগ্লোবিন কমপক্ষে ১২.৫ ও প্লাটিলেট কাউন্ট ন্যূনতম ২,২০,০০০ (দুই লক্ষ বিশ হাজার) হতে হবে। যা হাসপাতালে চেক করে নেয়া হবে।</p>
									 	<br>
									 	<div class="buttons text-center">
									 		<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#plateletModal">বিস্তারিত জানতে ক্লিক করুন</a>
									 	</div>

										<!-- Modal -->
										<div class="modal  fade" id="plateletModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog modal-lg">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLabel">একটু জেনে নিন...</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										      	<p>রক্তে অনেক উপাদান থাকে। প্লাটিলেট রক্তের একটা উপাদান মাত্র। <br> 
										প্লাটিলেট বা অণুচক্রিকা রক্তের একটি গুরুত্বপূর্ণ কণিকা, যা রক্ত জমাট বাঁধার জন্য জরুরি। রক্তে স্বাভাবিক প্লাটিলেটের সংখ্যা হলো প্রতি ঘন মিমি রক্তে দেড় লাখ থেকে সাড়ে চার লাখ। নানা কারণেই এর সংখ্যা কমে আসতে পারে, আর তখন রক্তক্ষরণের ঝুঁকি যায় বেড়ে। যেমন প্লাটিলেট এক লাখের কম হলে অস্ত্রোপচার না করারই সিদ্ধান্ত নেওয়া হয়। কেননা কাটা-ছেঁড়া হলে রক্তক্ষরণ বন্ধ করা কঠিন হয়। প্লাটিলেট ২০ হাজারের নিচে নেমে এলে কোনো আঘাত ছাড়াই রক্তক্ষরণ হতে পারে, যেমন নাক বা দাঁতের মাড়িতে রক্তপাত, মলের সঙ্গে রক্ত ইত্যাদি। প্লাটিলেট ১০ হাজারের নিচে চলে গেলে দেহের ভেতরের অঙ্গপ্রত্যঙ্গ যেমন অন্ত্র, মস্তিষ্ক, কিডনিতে রক্তক্ষরণ হতে পারে।</p> <br>
										<p>সাধারনত ৪জন ডোনার থেকে ১ব্যাগ প্লাটিলেট করে, কিন্তু এখন উন্নত প্রযুক্তি কল্যাণে ১জন ডোনার থেকেই ১ব্যাগ প্লাটিলেট বের করা যায়।
										যে জন্য এফেরোসিস মেশিন বা প্লাটিলেট মেশিন দ্বারা এক জন ডোনারের কাছ থেকে ২৫০মিলির মতো ব্লাড নিয়ে মেশিনে প্রসেসিং করে প্লাটিলেট বের করে ব্লাডের বাকী অংশ টুকু আবার ডোনারের শরীরে পুশ ব্যাক করে দেয়। এই ভাবে ৬/৭বার করে। প্রতি ধাপে ১০-১৫মি সময় লাগে। মোট ১ ঘন্টা বা ১ ঘন্টা ১৫-২০মি সময় লাগে। (বিদ্রঃ মেশিন ভেদে সিস্টেম একটু আলাদা হয়)</p>
										<br>
										<p>কিন্তু প্লাটিলেট দিলে ১০-১৫ দিন পর আবার সে প্লাটিলেট দিতে পারে, কারন অণুচক্রিকা ছাড়া অন্য কিছু নেয়া হয়না। আর অণুচক্রিকার জীবন কাল ৩দিন যা ২/৩ দিনেই শরীরে ব্যাক করে। আরও একটা ব্যাপার হল প্লাটিলেট ডোনার একাই ৪জন ডোনারের কাজ করছে। এতে বাকী ৩ জন ডোনার অন্য রোগী কে বাচাঁতে পারবে।
										ডেঙ্গুরোগের আক্রান্তদের, ক্যান্সারের রোগিদের শুধু প্লাটিলেট বেশি লাগে৷ 
										তবে শুধু প্লাটিলেট এফেরেসিস মেশিন আছে এমন নির্দিষ্ট  কিছু হাসপাতাল ছাড়া সবখানে দেয়া যায় না।</p>
										<br>

										<ul>
											<li>(i) শুধু প্লাটিলেট দেয়ার ১৫-২০ দিন পর পুনরায় শুধু প্লাটিলেট কিংবা পুরো ব্যাগ রক্ত দিতে পারবেন।</li>
											<li>(ii) একবার whole blood অর্থাৎ পুরো ব্যাগ (৪৫০ মি.লি) রক্ত দিলে, আবার ৪ মাস পর রক্ত দিতে পারবেন। এবং শুধু প্লাটিলেট দিতে হলেও এক্ষেত্রে ৪ মাস বা ১২০ দিনই  অপেক্ষা করতে হবে। অর্থাৎ <span style="color:red;">একবার হোল ব্লাড দিলেই কমপক্ষে ১২০ দিন অপেক্ষা করতে হবে।</span></li>
											<li>(iii) যদি শুধুই প্লাটিলেট দেন, তবে ১৫-২০ দিন বা ১ মাস পরপর দিতে পারবেন।</li>
											<li><b>শুধু প্লাটিলেট দাতাদের আমরা মাসে একবার প্লাটিলেট দেয়ার পরামর্শ দিচ্ছি।</b></li>
										</ul>








										      </div>
										     
										    </div>
										  </div>
										</div>
										<!-- End Modal -->
 
								</div>
							</div>
						</div>
					</div> 
				</div>	
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-12"> 
					<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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

					<br>
				</div>
			</div> 
		</div> 
 
		<header class="header-top-area" id="platelet_form">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="form-top"> 
							<h2>প্লাটিলেট ডোনার রেজিস্ট্রেশন ফরম</h2>
						</div>
					</div>
				</div>
				<div class="row section_padding">
					<div class="col-xl-12">
						<div class="form-start"> 
						<div style="color:#FF0000;"><?php echo $errors; ?></div>
							<form action="<?php echo site_url('Platelet/Sing_up_action');?>" method="POST"> 
											                    
			                     
								<div class="input_item">
									<label for="name">নাম<span>*</span></label>
									<input type="text" name="name" class="form-control" id="name" placeholder="নাম" required>
								</div>
								<fieldset>
									<legend>স্থায়ী ঠিকানা</legend>
									<div class="form-group input_item"> 
										<label for="s_district">জেলা<span>*</span></label>
										<select name="s_district" class="form-control custom-select"  id="s_district" required>
											<option value="">বাছাই করুন  জেলা</option>
										<?php foreach($DIstlist as $dv1){ ?>
											<option value="<?php echo $dv1->id; ?>"><?php echo $dv1->bn_name; ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group input_item"> 
										<label for="s_district">উপজেলা <span>*</span></label>
										<select name="s_upzilla" class="form-control custom-select"  id="upzillaListv" required>
											<option value="">বাছাই করুন  উপজেলা</option>
										
										</select>
									</div>
									<div class="input_item">
										<label for="s_address">ঠিকানা<span>*</span></label>
										<input type="text" name="s_address" class="form-control" id="s_address" placeholder="ঠিকানা" required>
									</div> 
								</fieldset>

								<fieldset>
									<legend>বর্তমান ঠিকানা </legend>
									<div class="form-group input_item"> 
										<label for="district">জেলা<span>*</span></label>
										<select name="district" class="form-control custom-select"  id="district" required>
										<option value="">বাছাই করুন  জেলা</option>
										<?php foreach($DIstlist as $dv){ ?>
											<option value="<?php echo $dv->id; ?>"><?php echo $dv->bn_name; ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group input_item"> 
										<label for="district">উপজেলা<span>*</span></label>
										<select name="upzilla" class="form-control custom-select"  id="s_upzillaListv" required>
										<option value="">বাছাই করুন  উপজেলা</option>
										
										</select>
									</div>
									<div class="input_item">
										<label for="address">ঠিকানা<span>*</span></label>
										<input type="text" name="address" class="form-control" id="address" placeholder="ঠিকানা" required>
									</div> 
								</fieldset>

								<div class="input_item">
									<label for="address">ইমেইল  ঠিকানা (যদি থাকে)</label>
									<input type="text" name="email" class="form-control" id="address" placeholder="ইমেইল " />
								</div>
								<div class="input_item mobile_update">
									<label for="mobile">মোবাইল নাম্বার ( ইংরেজি )<span>*</span></label>
									<input type="number" name="mobile" class="form-control" id="mobile" placeholder="মোবাইল নাম্বার" maxlength="11" required>
									<span class="white"></span>
								<span style="color:#FF0000;" class="ckmail"></span>
								</div>
								
								
								<div class="form-group input_item"> 
									<label for="district">রক্তের  গ্রুপ<span>*</span></label>
									<select name="blood_group" class="form-control custom-select"  id="district">
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
								
								
								<div class="date_top_text">
									<div class="input_item">
										<label for="countingD">সর্বশেষ রক্ত দানের তারিখ<span>*</span></label>
										
										<div class="select_date_area">
											<div class="single_date_item">
												<select name="last_day" class="form-control custom-select"  id=""> 
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
												<select name="last_month" class="form-control custom-select"  id=""> 
													<option value="1">January</option>
													<option value="2">February</option>
													<option value="3">March</option>
													<option value="4">April</option>
													<option value="5">May</option>
													<option value="6">June</option>
													<option value="7">July</option>
													<option value="8">August</option>
													<option value="9">September</option>
													<option value="10">October</option>
													<option value="11">November</option>
													<option value="12">December</option>
												</select>
											</div>
											
											<div class="single_date_item">
												<select name="last_year" class="form-control custom-select"  id=""> 
													<option  value="2017">2017</option>
													<option  value="2018">2018</option>
													<option  value="2019">2019</option>
													<option  value="2020">2020</option>
													<option selected value="2021">2021</option>
											    </select>
											</div>
										</div>	
									</div>	
								</div>	
								
								<div class="input_item">
									<div class="custom-control custom-radio">
										<input type="radio" id="male" name="gender" class="custom-control-input"  value="male" checked>
										<label class="custom-control-label" for="male">পুরুষ</label>
									</div>
									<div class="custom-control custom-radio">
										  <input type="radio" id="female" value="female" name="gender" class="custom-control-input">
										  <label class="custom-control-label" for="female">নারী</label>
									</div>
									<span><small>নারী ডোনারদের ফোন নম্বর গোপন রাখা হবে।</small></span>
								</div>
								<div class="input_item">
									<label for="birthday2">জন্ম তারিখঃ<span>*</span></label>
									<input type="date" name="birthday" class="form-control" id="birthday2" placeholder="জন্ম তারিখ" autocomplete="off">
								</div>

								<div class="input_item">
									<label for="password">পাসওয়ার্ড<span>*</span></label>
									<input type="password" name="password" class="form-control" id="password" placeholder="পাসওয়ার্ড" required>
								</div>
								<div class="input_item">
									<label for="cnfpassword"> কনফার্ম পাসওয়ার্ড<span>*</span></label>
									<input type="password" name="confirm_password" class="form-control" id="cnfpassword" placeholder="কনফার্ম পাসওয়ার্ড" required>
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
