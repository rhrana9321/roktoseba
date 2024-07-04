<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sohojogi extends CI_Controller {
	 static $helper   = array('url', 'user_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_cloud', 'M_join'));
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->library('session');
		//$this->load->library(array('cart'));
		$this->load->library('form_validation');
		 $this->load->library('email');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cart');
		//isAuthenticate();
		
	}
	
	public function index()
	{
		
		$customer_auid   	 = $this->session->userdata('websitecusId');
		$data['userinfo']	= $this->M_cloud->find('signup_user', array('signId' => $customer_auid));
		$data['cateserchilist'] 	= $this->M_cloud->findAll('category_mange', 'up_down asc');
		$data['slidrerlist'] = $this->M_cloud->findAll('slider_mange', 'sliId asc');
		$data['catagoriinfoList'] 	= $this->M_cloud->homecataWithsub('category_mange', array('status' => '1'), 'up_down asc');
		$data['newinfoList'] 	= $this->M_cloud->abc('webproduct_mange_table', array('new_arrival' => 'new_arrival'), 'wproid desc');
		$data['basicinfo'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$data['order_tablelist'] = $this->M_cloud->findAll('how_to_order_mange', 'sliId asc');
		$data['AddLeft']	= $this->M_cloud->find('add_mange_table', array('type' => 'Left'));
		$data['AddRight']	= $this->M_cloud->find('add_mange_table', array('type' => 'Right'));
		$data['language_check'] = $this->session->userdata('language_data');
		$this->load->view('SohojogiPage', $data);
	}
	
	public function EN_insert()
	{
		$en_data  			= $this->input->post('en_data');
		$this->session->set_userdata(array('language_data' => $en_data));
	}
	
	public function BN_insert()
	{
		$bn_data  			= $this->input->post('bn_data');
		$this->session->set_userdata(array('language_data' => $bn_data));
		
	}
	
	public function Coupon_apply()
	{
		$txtPassportNumber  = $this->input->post('txtPassportNumber');
		$current_date 		= date("Y-m-d");
		$CodeCheck			= $this->M_cloud->find('coupons_table', array('coupons_code' => $txtPassportNumber, 'Status' => 'Enabled', 'Date_End >=' => $current_date));
		$code  				= $CodeCheck->discount;
		$type  				= $CodeCheck->cou_type;
		$cou_coupons_code  	= $CodeCheck->coupons_code;
		
		$data['code']  		= $CodeCheck->discount;
		$this->session->set_userdata(array('Coupon_amount' => $code));
		$this->session->set_userdata(array('CouAmount_type' => $type));
		$this->session->set_userdata(array('cou_coupons_code' => $cou_coupons_code));
		
		$this->load->view('cart_store_htmlPagebn', $data);
	}
	
	
	public function headerserchPro()
	{
		
		$language_check = $this->session->userdata('language_data');
		$header_search_value 				 = $this->input->post('header_search_value');
		$data['header_search_value']		 = $header_search_value;
		$data['headersearchingproductList']  = $this->M_cloud->allproductsearchweb($header_search_value);
		
		echo "<ul class='box-results anyClass' style='position: absolute; left: 0px; top: 38px; text-align:left; padding-left:10px;'>";
		
		if(!empty($data['headersearchingproductList'])){
    		
            foreach($data['headersearchingproductList'] as $v)
            { 
                if($language_check == 'BN'){
				$product_name5 = str_replace(' ', '-', $v->url);
                echo "<li style='padding:5px; font-size:16px;color:#0F0F0F;'><a style='text-decoration:none;' href='". site_url("Product_details/index/" .$v->wproid) ."'><span class='title_name'>  &nbsp; &nbsp; &nbsp;".$v->product_name_bn."</span> </a></li>";
				} else {
				$product_name5 = str_replace(' ', '-', $v->url);
                echo "<li style='padding:5px; font-size:16px;color:#0F0F0F;'><a style='text-decoration:none;' href='". site_url("Product_details/index/" .$v->wproid) ."'><span class='title_name'>  &nbsp; &nbsp; &nbsp;".$v->product_name."</span> </a></li>";
				}
				
            } 

        } else  {
            
            echo "<li style='padding:5px; font-size:16px;color:#0F0F0F;'><a style='text-decoration:none;' href='#'><span class='title_name'>  &nbsp; &nbsp; &nbsp;No results found.</span> </a></li>";   
        
            
        }
		echo '</ul>';
	
	}
	
	public function Search()
	{
		
		$customer_auid   	 = $this->session->userdata('websitecusId');
		$data['userinfo']	= $this->M_cloud->find('signup_user', array('signId' => $customer_auid));
		$data['cateserchilist'] 	= $this->M_cloud->findAll('category_mange', 'catId desc');
		$data['catagoriinfoList'] 	= $this->M_cloud->homecataWithsub('category_mange', array('status' => '1'), 'category_name ASC');
		$data['basicinfo'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$header_search_value 				 = $this->input->post('header_search_value');
		$data['header_search_value']		 = $header_search_value;
		$data['headersearchingproductList']  = $this->M_cloud->allproductsearchweb($header_search_value);
		$data['language_check'] = $this->session->userdata('language_data');
		$this->load->view('SearchPage', $data);
	}
	
	
	
	
}


?>