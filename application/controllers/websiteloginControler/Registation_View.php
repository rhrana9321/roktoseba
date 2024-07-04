<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registation_View extends CI_Controller {
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
	
	public function Show_now()
	{
		
		$status 				= $this->input->post('status');
		$blood_group 			= $this->input->post('blood_group');
		
		$district 				= $this->input->post('s_district');
		$upzilla 			= $this->input->post('upzillaListv');
		
		$where = [];
		if(!empty($status)) $where['status'] = $status;
		if(!empty($blood_group)) $where['blood_group'] = $blood_group;
		if(!empty($district)) $where['district'] = $district;
		if(!empty($upzilla)) $where['upzilla'] = $upzilla;
		
		$data['registationview'] 		= $this->M_cloud->subcatproduct('signup_user', $where, 'signId asc');
		$this->load->view('websiteloginview/Sodosho_product_ListPage', $data);
	}
	
	public function index()
	{
		$auid   	 = $this->session->userdata('websiteloginid');
		$data['usertype']    = $this->session->userdata('usertype');
		$data['success']     = $this->session->userdata('msg');
		$data['baseinformation'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$data['neworderlist'] = $this->M_cloud->findReportorder('order_info', array('status' => 'Pending'), 'orId desc');
		$data['adminuserinfo']	 = $this->M_cloud->find('superadmin', array('spId' => $auid));
		$data['registationview'] = $this->M_cloud->findAll('signup_user', 'signId desc');
		$data['DIstlist'] 	= $this->M_cloud->findAll('districts', 'name asc');
		$data['Upzillalist'] 	= $this->M_cloud->findAll('upazilas', 'name asc');
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('websiteloginview/Registation_ViewPage', $data);
	}
	
	public function edit($signId)
	{
		$auid   	 				= $this->session->userdata('websiteloginid');
		$data['usertype']    		= $this->session->userdata('usertype');
		$data['success']     		= $this->session->userdata('msg');
		$data['baseinformation'] 	= $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$data['neworderlist'] 		= $this->M_cloud->findReportorder('order_info', array('status' => 'Pending'), 'orId desc');
		$data['adminuserinfo']	 	= $this->M_cloud->find('superadmin', array('spId' => $auid));
		$data['DIstlist'] 	= $this->M_cloud->findAll('districts', 'name asc');
		$data['Upzillalist'] 	= $this->M_cloud->findAll('upazilas', 'name asc');
		
		$data['userinfo']			= $this->M_cloud->find('signup_user', array('signId' => $signId));
		$this->load->view('websiteloginview/Registation_EditPage', $data);
	}
	
	public function Update_action()
	{
			
			$current_date = date("Y-m-d");
			$id		= $this->input->post('id');
			$userinfo			= $this->M_cloud->find('signup_user', array('signId' => $id));
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
			$data['signDate'] 		= date("Y-m-d");
			$data['last_day']		= $this->input->post('last_day');
			$data['last_month'] 	= $this->input->post('last_month');
			$data['last_year'] 		= $this->input->post('last_year');
			$data['last_donate_date'] = $data['last_year'].'-'. $data['last_month'] .'-'. $data['last_day'];
			
			$password 		= ($this->input->post('password'));
			if(!empty($password)){
			$data['password'] 		= md5($this->input->post('password'));
			}
			if($userinfo->last_donate_date == $data['last_donate_date']){
			$data['counting_donate'] 		= $userinfo->counting_donate;
			} else {
			$data['counting_donate'] 		= $userinfo->counting_donate +1;
				// record start
				$data2['customer_id'] 		= $id;
				$data2['cdate'] 			= $data['last_donate_date'];
				$data2['blood_group']		= $data['blood_group'];
				$this->db->insert('donate_record_mange_table', $data2);
				// record End
			}
			$this->db->update('signup_user', $data, array('signId' => $id));
			
			
			
			
			
			$this->session->set_userdata(array('accountsucc' => 'Your account created successfully.'));
			redirect('websiteloginControler/Registation_View');
		
	}
	
	
	
	
	public function delete($signId)
	{
		$where = array('signId' => $signId);
		$result 	= $this->M_cloud->tbWhRow('signup_user', $where);
		$this->M_cloud->destroyAll('signup_user', $where);
		
		redirect('websiteloginControler/Registation_View');
	}
	
	
	
	
	public function income_details($referral_id)
	{
		
		
		$data['baseinformation'] = $this->M_cloud->basicall('basic_manage', 'bsId desc');
		$data['orderinfo']  		= $this->M_cloud->find('order_info', array('orId' => $orId));
		$data['invuserinfoList']  	= $this->M_cloud->findReport('reffarel_income_report', array('income_login_id' => $referral_id));
		$data['myincomeList']  	= $this->M_cloud->whereOederbyRow('reffarel_income_report', array('income_login_id' => $referral_id));
		$data['orderdeatisl'] 		= $this->M_join->orderDetails(array('order_id' => $orId));
		
		$this->load->view('websiteloginview/income_details_Page', $data);
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