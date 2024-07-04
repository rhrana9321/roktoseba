<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_completed extends CI_Controller {
	 static $helper   = array('url', 'websitelogin_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('m_websiteadmin', 'M_cloud', 'M_join'));
		$this->load->helper('url');
		$this->load->library('session');
		//$this->load->library('form_validation'); 
		//$this->load->library('pagination');
		//$this->load->library('upload');
		isAuthenticate();
	}
	
	public function index()
	{
		$auid   	 = $this->session->userdata('websiteloginid');
		$data['usertype']    = $this->session->userdata('usertype');
		$data['success']     = $this->session->userdata('msg');
		
		$data['baseinformation'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		
		$data['neworderlist'] = $this->M_cloud->findReportorder('order_info', array('status' => 'Completed'), 'orId desc');
		
		$data['adminuserinfo']	 = $this->M_cloud->find('superadmin', array('spId' => $auid));
		
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('websiteloginview/Order_completedPage', $data);
	}
	
	
	
	
	
	public function Invoice_details($orId)
	{
		
		$data['orderinfo']  		= $this->M_cloud->find('order_info', array('orId' => $orId));
		$data['invuserinfo']  		= $this->M_cloud->find('website_customer_registation', array('cus_reg_id' => $data['orderinfo']->customer_id));
		$data['orderdeatisl'] 		= $this->M_join->orderDetails(array('order_id' => $orId));
		
		$this->load->view('websiteloginview/Invoice_details_Page', $data);
	}
	
	
	
	public function webordersuccUpdate()
	{
	
	$data['status']  = $this->input->post('status');
	$orId = $this->input->post('orId');
	
	$this->db->update('order_info', $data, array('orId' => $orId));
	
	redirect('websiteloginControler/new_order');
	}
	
}

?>