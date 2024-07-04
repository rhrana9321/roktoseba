<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
	    $current_date 		= date("Y-m-d");
		$auid  	 			  = $this->session->userdata('websiteloginid');
		$adminuserinfo	= $this->M_cloud->find('website_adminlogin', array('webadId' => $auid));
		$data['baseinformation']  = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		/*$data['recent_order']        = $this->M_cloud->total_rows('order_info', array('paymentdate' => $current_date, 'status' => 'Pending'));
		$data['recent_delevery']        = $this->M_cloud->total_rows('order_info', array('paymentdate' => $current_date, 'status' => 'Completed'));
		$data['recent_user']        = $this->M_cloud->total_rows('signup_user', array('signDate' => $current_date));
		$data['usertype']         = $this->session->userdata('usertype');
		
		$data['adminuserinfo']	  = $this->M_cloud->find('superadmin', array('spId' => $auid));
		
		$data['totaluser']         = $this->M_cloud->totaluser('signup_user');
		$data['activeuser']        = $this->M_cloud->total_rows('signup_user', array('status' => 'Active'));
		$data['inactiveuser']      = $this->M_cloud->total_rows('signup_user', array('status' => 'Inactive'));
		$data['usertotalincome']   = $this->M_cloud->findAll('signup_user', 'signId asc');*/
		
		//$data['Total_Order_AmountsList'] 			= $this->M_cloud->Total_Order_Amounts_M('order_info', 'orId asc');
				
		$this->load->view('websiteloginview/dashboard', $data);
	}
	
	
	
	
	
	
	
}


?>