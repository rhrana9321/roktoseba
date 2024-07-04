<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_details extends CI_Controller {
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
	
	public function index($wproid)
	{
		
		$customer_auid   	 = $this->session->userdata('websitecusId');
		$data['userinfo']	= $this->M_cloud->find('signup_user', array('signId' => $customer_auid));
		$data['cateserchilist'] 	= $this->M_cloud->findAll('category_mange', 'up_down asc');
		$data['catagoriinfoList'] 	= $this->M_cloud->homecataWithsub('category_mange', array('status' => '1'), 'up_down asc');
		$data['productinfoList'] 	= $this->M_cloud->findAll('webproduct_mange_table', 'wproid desc');
		$data['basicinfo'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		
		$data['productdetailslist'] 	= $this->M_cloud->findbyidstock('webproduct_mange_table', array('wproid' => $wproid));
		$data['productdetailslistcategory'] 	= $this->M_cloud->findbyidstock('category_mange', array('catId' => $data['productdetailslist']->pro_cat_id));
		$data['productdetailslistsubcategory'] 	= $this->M_cloud->findbyidstock('subcategory_mange', array('subcatId' => $data['productdetailslist']->pro_sub_id));
		$data['categry_det_id']     = $data['productdetailslist']->pro_cat_id;
		$data['language_check'] = $this->session->userdata('language_data');
		
		$this->load->view('Product_detailsPage', $data);
	}
	
	
}

?>