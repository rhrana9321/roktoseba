<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Websitelogin extends CI_Controller {
	 static $helper   = array('url', 'websitelogin_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('m_websiteadmin', 'M_cloud'));
		$this->load->helper('url');
		$this->load->library('session');
		//$this->load->library('form_validation');
		//$this->load->library('pagination');
		//$this->load->library('upload');
		//isAuthenticate();
	}
	
	public function index()
	{
		$data['invalidUser'] = $this->session->userdata('invalidUser');
		$this->session->set_userdata(array('invalidUser' => ""));
		
		$data['baseinformation'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$this->load->view('websiteloginview/login_page', $data);
	}
	
	
	
	
	
	public function webadmin()
	{
		
		webloadmin();
		
	}
	
	
	public function logout()
	{

		logoutUser();
		
		
	}
	
	
	
}


?>