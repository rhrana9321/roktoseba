<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_Arrival extends CI_Controller {
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
	
	public function index($onset =0)
	{
		
		$customer_auid   	 		= $this->session->userdata('websitecusId');
		$data['userinfo']			= $this->M_cloud->find('signup_user', array('signId' => $customer_auid));
		$data['cateserchilist'] 	= $this->M_cloud->findAll('category_mange', 'up_down asc');
		$data['catagoriinfoList'] 	= $this->M_cloud->homecataWithsub('category_mange', array('status' => '1'), 'up_down asc');
		$data['basicinfo'] 			= $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		
		
		$data['subcategoryByproductList'] = $this->M_cloud->tbOn25ObyResult('webproduct_mange_table', array('new_arrival'=> 'new_arrival'), $onset, 'wproid desc');
		$data['onset'] 			= $onset;
		$config['base_url'] 	= base_url('New_Arrival/index');
		$config['total_rows'] 	= $this->M_cloud->tbRowCount('webproduct_mange_table', array('new_arrival'=> 'new_arrival'));
		$config['uri_segment'] 	= 3;
		$config['per_page'] 	= 20;
		$config['num_links'] 	= 3;
		$config['first_link']	= 'First';
		$config['last_link'] 	= 'Last';
		$config['prev_link']	= 'Prev';
		$config['next_link'] 	= 'Next';
		$this->pagination->initialize($config);
		
		$data['language_check'] = $this->session->userdata('language_data');
		
		
		$this->load->view('New_Arrivalpage', $data);
	}
	
	
	
}


?>