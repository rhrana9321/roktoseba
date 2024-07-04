<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_profileUpdate extends CI_Controller {
	 static $helper   = array('url', 'websitelogin_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_cloud', 'm_websiteadmin'));
		$this->load->helper('url');
		$this->load->library('session');
		//$this->load->library('form_validation'); 
		//$this->load->library('pagination');
		//$this->load->library('upload');
		//$this->load->library('email');
		isAuthenticate();
	}
	
	public function index()
	{
		$auid  	 			  = $this->session->userdata('websiteloginid');
		$data['usertype']         = $this->session->userdata('usertype');
		$data['baseinformation']  = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$data['adminuserinfo']	  = $this->M_cloud->find('website_adminlogin', array('webadId' => $auid));
		
		$data['totaluser']         = $this->M_cloud->totaluser('signup_user');
		$data['activeuser']        = $this->M_cloud->total_rows('signup_user', array('status' => 'Active'));
		$data['inactiveuser']      = $this->M_cloud->total_rows('signup_user', array('status' => 'Inactive'));
		$data['usertotalincome']   = $this->M_cloud->findAll('signup_user', 'signId asc');
		
		
				
		$this->load->view('websiteloginview/Admin_profileUpdatePage', $data);
	}
	
	public function profileEdit()
	{
	$auid   	 = $this->session->userdata('websiteloginid');
	
	$data['username']  = $this->input->post('username');
	$data['password'] = md5($this->input->post('password'));
	$this->db->update('website_adminlogin', $data, array('webadId' => $auid));
	redirect('websiteloginControler/dashboard');
	}
	
	
	
	
	
}


?>