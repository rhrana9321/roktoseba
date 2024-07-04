<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Platelet extends CI_Controller {
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
		//isAuthenticate();
		
	}
	
	public function index()
	{
	
		$data['userid']           = $this->session->userdata('usertype');
		$data['userid']           = $this->session->userdata('auid');
		$data['cateserchilist'] 	= $this->M_cloud->findAll('category_mange', 'up_down asc');
		
		$data['DIstlist'] 	= $this->M_cloud->findAll('districts', 'name asc');
		$data['Upzillalist'] 	= $this->M_cloud->findAll('upazilas', 'name asc');
		
		
		
		$data['catagoriinfoList'] 	= $this->M_cloud->homecataWithsub('category_mange', array('status' => '1'), 'up_down asc');
		$data['basicinfo'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$data['success_msg']	 = $this->session->userdata('accountsucc');
		$this->session->set_userdata(array('accountsucc' => ''));
		$data['language_check'] = $this->session->userdata('language_data');
		$data['errors'] = $this->session->userdata('errors');
		$this->session->set_userdata(array('errors' => ""));
		
		$this->load->view('PlateletPage', $data);
	}
	
	public function checkemail()
	{
		$mobile = $this->input->post('mobile');
		$result = $this->M_cloud->tbWhRow('signup_user', array('signMobile' => $mobile));
		if($result){
			echo true;
		} else {
			echo false;
		}
	}
	
	
	
	
	
	
	
	
	
	public function S_upzillaList()
	{
		$s_district 					= $this->input->post('s_district');
		$dividsiondealerck				= $this->M_cloud->findReport('upazilas', array('district_id' => $s_district));
		foreach($dividsiondealerck as $v)
		{
			echo '<option value="' . $v->id . '">' . $v->bn_name . '</option>';
		}
		
	}
	
	public function S_upzillaList2()
	{
		$district 					= $this->input->post('district');
		$dividsiondealerck				= $this->M_cloud->findReport('upazilas', array('district_id' => $district));
		foreach($dividsiondealerck as $v)
		{
			echo '<option value="' . $v->id . '">' . $v->bn_name . '</option>';
		}
		
	}
	
	
	
	public function Sing_up_action()
	{
		$mobile		= $this->input->post('mobile');
		$result = $this->M_cloud->find('signup_user', array('signMobile' => $mobile));
		if(empty($result)){
			$data['signName']		= $this->input->post('name');
			$data['s_district'] 	= $this->input->post('s_district');
			$data['s_address']		= $this->input->post('s_address');
			$data['district']		= $this->input->post('district');
			$data['address'] 		= $this->input->post('address');
			$data['signEmail'] 		= $this->input->post('email');
			$data['signMobile'] 	= $this->input->post('mobile');
			$data['blood_group']	= $this->input->post('blood_group');
			$data['last_day']		= $this->input->post('last_day');
			$data['s_upzilla']		= $this->input->post('s_upzilla');
			$data['upzilla']		= $this->input->post('upzilla');
			$data['last_month'] 	= $this->input->post('last_month');
			$data['last_year'] 		= $this->input->post('last_year');
			$data['last_donate_date'] = $data['last_year'].'-'. $data['last_month'] .'-'. $data['last_day'];
			$data['gender'] 		= $this->input->post('gender');
			$data['birthday']		= $this->input->post('birthday');
			$data['password'] 		= md5($this->input->post('password'));
			$data['signDate'] 		= date("Y-m-d");
			$data['status'] 		= 1;
		
			$this->db->insert('signup_user', $data);
			$this->session->set_userdata(array('accountsucc' => 'Your account created successfully.'));
			redirect('Sign_in');
		} else {
		 	$this->session->set_userdata(array('errors' => 'Mobile number  already exists!'));
		 	redirect('Platelet');  
		}
	}
}


?>