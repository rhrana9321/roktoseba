<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_method extends CI_Controller {
	 static $helper   = array('url', 'websitecustomerlogin_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_cloud', 'M_join'));
		$this->load->helper('url');
		$this->load->helper('sslc_helper');
		$this->load->helper('text');
		$this->load->library('session');
		//$this->load->library(array('cart'));
		$this->load->library('form_validation');
		 $this->load->library('email');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cart');
		isAuthenticate();
		
	}
	
	public function index()
	{
		$customer_auid   	 = $this->session->userdata('websitecusId');
		
		$data['userinfo']	= $this->M_cloud->find('signup_user', array('signId' => $customer_auid));
		$data['cateserchilist'] 	= $this->M_cloud->findAll('category_mange', 'up_down asc');
		$data['catagoriinfoList'] 	= $this->M_cloud->homecataWithsub('category_mange', array('status' => '1'), 'up_down asc');
		$data['basicinfo'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$data['orderCheckinfo']	= $this->M_cloud->find('order_info', array('customer_id' => $customer_auid));
		$data['success_msg']	 = $this->session->userdata('accountsucc');
		$this->session->set_userdata(array('accountsucc' => ''));
		$data['invalidUser'] = $this->session->userdata('invalidUser');
		$this->session->set_userdata(array('invalidUser' => ""));
		$data['language_check'] = $this->session->userdata('language_data');
	    $payment_name 		= $this->input->post('payment_name');
		if($payment_name == 'ONLINE_PAYMENT'){
		$this->load->view('Payment_methodonlinePage', $data);
		} else if($payment_name == 'OFFLINE_PAYMENT'){
		$this->load->view('Payment_methodPage', $data);
		}
	}
	
	
	public function InfoUpdate()
	{
	$customer_auid   	 = $this->session->userdata('websitecusId');
	$data['signName']  = $this->input->post('signName');
	$data['address']  = $this->input->post('address');
	$data['signMobile']  = $this->input->post('signMobile');
	
	$this->db->update('signup_user', $data, array('signId' => $customer_auid));
	
	redirect('dashboard');
	}
	
	
	
	
	
}


?>