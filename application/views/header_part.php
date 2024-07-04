
<section class="header-area" style="z-index:0!important;">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-md-4">
            <div class="logo_area">
              <h2> <a href="<?php echo site_url('');?>">
                <img src="<?php echo base_url("uploads/". $basicinfo->proimage); ?>" alt="" /> </a></h2>
            </div>
            <div class="nav_icon">
              <a class="nav-bars" href="#">Menu</a> </div>
          </div>
          <div class="col-xl-8 col-md-8">
            <div class="header_menu_area">
              <ul>
                <li><a class="active" href="<?php echo site_url('');?>" >হোম</a></li>
                <li><a href="<?php echo site_url('Platelet');?>">প্লাটিলেট</a></li>
                <li><a href="<?php echo site_url('');?>">থ্যালাসেমিয়া</a></li>
                <li><a href="<?php echo site_url('Sohojogi');?>">সহযোগী সংগঠন</a></li>
                <li><a href="<?php echo site_url('');?>">ব্লগ</a></li>
				<?php $customerid  = $this->session->userdata('websitecusId'); if(empty($customerid)) { ?>
                <li><a href="<?php echo site_url('Sign_in');?>">লগইন </a></li>
                <li><a href="<?php echo site_url('Sign_up');?>">রেজিস্ট্রেশন</a></li>
				<?php } else { ?>
				<li><a href="<?php echo base_url("Dashboard");?>">প্রোফাইল </a></li>
                <li><a href="<?php echo base_url("Sign_in/logout");?>">লগ আউট</a></li>
				<?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>