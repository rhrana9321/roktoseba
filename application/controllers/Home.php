<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
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
		$data['DIstlist'] 	= $this->M_cloud->findAll('districts', 'name asc');
		$data['Upzillalist'] 	= $this->M_cloud->findAll('upazilas', 'name asc');
		$this->load->view('home', $data);
	}
	
	
	
	public function Search()
	{
		$customer_auid   	 				= $this->session->userdata('websitecusId');
		$data['userinfo']					= $this->M_cloud->find('signup_user', array('signId' => $customer_auid));
		$data['cateserchilist'] 			= $this->M_cloud->findAll('category_mange', 'catId desc');
		$data['catagoriinfoList'] 			= $this->M_cloud->homecataWithsub('category_mange', array('status' => '1'), 'category_name ASC');
		$data['basicinfo'] 					= $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		
		$blood_group 				 		= $this->input->post('blood_group');
		$s_district 				 		= $this->input->post('s_district');
		$s_upzilla 				 			= $this->input->post('s_upzilla');
		
		$where = [];
		if(!empty($blood_group)) $where['blood_group'] 	= $blood_group;
		if(!empty($s_district)) $where['district'] 		= $s_district;
		if(!empty($s_upzilla)) $where['upzilla'] 		= $s_upzilla;
		//print_r($where); die();
		$data['blood_group'] 		=  $blood_group;
		$data['User_tablelist'] 		= $this->M_cloud->categorylist('signup_user', $where, 'signId asc');
		$this->load->view('SearchPage', $data);
	}
	
	
	public function Plat_Search()
	{
		$customer_auid   	 				= $this->session->userdata('websitecusId');
		$data['userinfo']					= $this->M_cloud->find('signup_user', array('signId' => $customer_auid));
		$data['cateserchilist'] 			= $this->M_cloud->findAll('category_mange', 'catId desc');
		$data['catagoriinfoList'] 			= $this->M_cloud->homecataWithsub('category_mange', array('status' => '1'), 'category_name ASC');
		$data['basicinfo'] 					= $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		
		
		$status 				 			= 1;
		$blood_group 				 		= $this->input->post('blood_group2');
		$s_district 				 		= $this->input->post('district');
		$s_upzilla 				 			= $this->input->post('upzilla');
		
		
		$where = [];
		if(!empty($status)) $where['status'] 			= $status;
		if(!empty($blood_group)) $where['blood_group'] 	= $blood_group;
		if(!empty($s_district)) $where['district'] 		= $s_district;
		if(!empty($s_upzilla)) $where['upzilla'] 		= $s_upzilla;
		//print_r($where); die();
		$data['blood_group'] 		=  $blood_group;
		$data['User_tablelist'] 		= $this->M_cloud->categorylist('signup_user', $where, 'signId asc');
		$this->load->view('Search_twoPage', $data);
	}
	
	
	
	
	
	
	
}


?>