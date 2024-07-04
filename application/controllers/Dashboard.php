<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	 static $helper   = array('url', 'websitecustomerlogin_helper');
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
		$data['accountsucc']	 = $this->session->userdata('accountsucc');
		$this->session->set_userdata(array('accountsucc' => ''));
		$data['invalidUser'] = $this->session->userdata('invalidUser');
		$this->session->set_userdata(array('invalidUser' => ""));
		$data['DIstlist'] 	= $this->M_cloud->findAll('districts', 'name asc');
		$data['Upzillalist'] 	= $this->M_cloud->findAll('upazilas', 'name asc');
		
		$this->load->view('myAccountPage', $data);
	}
	
	
	
	public function account_update()
	{
		$data['language_check'] = $this->session->userdata('language_data');
		$customer_auid   	 = $this->session->userdata('websitecusId');
		$data['userinfo']	= $this->M_cloud->find('signup_user', array('signId' => $customer_auid));
		$data['cateserchilist'] 	= $this->M_cloud->findAll('category_mange', 'up_down asc');
		$data['catagoriinfoList'] 	= $this->M_cloud->homecataWithsub('category_mange', array('status' => '1'), 'up_down asc');
		$data['basicinfo'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$data['success_msg']	 = $this->session->userdata('accountsucc');
		$this->session->set_userdata(array('accountsucc' => ''));
		$data['invalidUser'] = $this->session->userdata('invalidUser');
		$this->session->set_userdata(array('invalidUser' => ""));
		$this->load->view('account_updatePage', $data);
	}
	
	
	public function InfoUpdate()
	{
		$customer_auid   	 = $this->session->userdata('websitecusId');
		$data['signName']		= $this->input->post('name');
		$data['s_district'] 	= $this->input->post('s_district');
		$data['s_address']		= $this->input->post('s_address');
		$data['district']		= $this->input->post('district');
		$data['address'] 		= $this->input->post('address');
		$data['s_upzilla']		= $this->input->post('s_upzilla');
			$data['upzilla']		= $this->input->post('upzilla');
		$data['signEmail'] 		= $this->input->post('email');
		$data['signMobile'] 	= $this->input->post('mobile');
		$data['gender'] 		= $this->input->post('gender');
		$this->db->update('signup_user', $data, array('signId' => $customer_auid));
		$this->session->set_userdata(array('accountsucc' => 'Update successfully.'));
		redirect('Dashboard');
	}
	
	public function InfoDonateUpdate()
	{
		$customer_auid   	 = $this->session->userdata('websitecusId');
		$data['last_day']		= $this->input->post('last_day');
		$data['last_month'] 	= $this->input->post('last_month');
		$data['last_year'] 		= $this->input->post('last_year');
		$data['last_donate_date'] = $data['last_year'].'-'. $data['last_month'] .'-'. $data['last_day'];
		$this->db->update('signup_user', $data, array('signId' => $customer_auid));
		
		$this->session->set_userdata(array('accountsucc' => 'Update successfully.'));
		redirect('Dashboard');
	}
	
	public function PlatiUpdate()
	{
		$customer_auid   	 = $this->session->userdata('websitecusId');
		$data['status'] 	 = 1;
		$this->db->update('signup_user', $data, array('signId' => $customer_auid));
		redirect('Dashboard');
	}
	
	public function Plati_removeUpdate()
	{
		$customer_auid   	 = $this->session->userdata('websitecusId');
		$data['status'] 	 = 0;
		$this->db->update('signup_user', $data, array('signId' => $customer_auid));
		redirect('Dashboard');
	}
	
	
	
}


?>