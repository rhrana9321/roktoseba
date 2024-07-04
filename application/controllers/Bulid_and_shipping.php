<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bulid_and_shipping extends CI_Controller {
	 static $helper   = array('url', 'websitecustomerlogin_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_cloud', 'M_join'));
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->library('session');
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
		$data['language_check'] = $this->session->userdata('language_data');
		
		$this->session->set_userdata(array('place_login' => ''));
		$this->session->set_userdata(array('signMobile' => ''));
		$this->session->set_userdata(array('password' => ''));
		
		$data['success_msg']	 = $this->session->userdata('accountsucc');
		$this->session->set_userdata(array('accountsucc' => ''));
		
		$data['Error_meslist']	 = $this->session->userdata('Error_mes');
		$this->session->set_userdata(array('Error_mes' => ''));
		
		
		$data['invalidUser'] = $this->session->userdata('invalidUser');
		$this->session->set_userdata(array('invalidUser' => ""));
		
		
		$this->load->view('Bulid_and_shippingPage', $data);
	}
	
	public function Address_Update()
	{
	
	$customer_auid   	 = $this->session->userdata('websitecusId');
	
	$data['address']  = $this->input->post('address');
	$data['d_name']  = $this->input->post('d_name');
	$data['d_email']  = $this->input->post('d_email');
	$data['d_address']  = $this->input->post('d_address');
	$data['d_phone']  = $this->input->post('d_phone');
	$data['delevery_day']  = $this->input->post('delevery_day');
	$data['delevery_time']  = $this->input->post('delevery_time');
	
	$this->db->update('signup_user', $data, array('signId' => $customer_auid));
	redirect('Payment_process');
	
	}
	
}


?>