<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_new_password extends CI_Controller {
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
		$data['catagoriinfoList'] 	= $this->M_cloud->homecataWithsub('category_mange', array('status' => '1'), 'up_down asc');
		$data['basicinfo'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		
		$data['eror_message']	 = $this->session->userdata('fgtpassalt');
		$this->session->set_userdata(array('fgtpassalt' => ''));
		
		$data['invalidUser'] = $this->session->userdata('invalidUser');
		$this->session->set_userdata(array('invalidUser' => ""));
		$data['language_check'] = $this->session->userdata('language_data');
		
		$this->load->view('web_new_passwordPage', $data);
	}
	
	
	public function webnewpasswordUpdate()
	{
		$data['userid']           = $this->session->userdata('usertype');
		$data['cateserchilist'] 	= $this->M_cloud->findAll('category_mange', 'catId desc');
		$data['catagoriinfoList'] 	= $this->M_cloud->homecataWithsub('category_mange', array('status' => '1'), 'catId DESC');
		$data['invalidUser'] = $this->session->userdata('invalidUser');
		$this->session->set_userdata(array('invalidUser' => ""));
		$data['verifycodelist']	 = $this->session->userdata('verifycode');
		$codelis	 = $this->session->userdata('verifycode');
		$new_password 			= md5($this->input->post('new_password'));
		
		$findpbgfroduct = $this->M_cloud->find('signup_user', array('verify_code' => $codelis));
		$data4['password'] = $new_password;
		$this->db->update('signup_user', $data4, array('verify_code' => $codelis));
		
		
		$customerList = $this->M_cloud->find('signup_user', array('verify_code' => $codelis));
		$data5['verify_code'] = '';
		$this->db->update('signup_user', $data5, array('verify_code' => $codelis));
		$this->session->set_userdata(array('verifycode' => ""));
		
		redirect('Sign_in');
	}
}


?>