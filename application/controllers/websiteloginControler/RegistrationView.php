<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrationView extends CI_Controller {
	 static $helper   = array('url', 'authentication_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_superadmin', 'M_cloud','M_join'));
		$this->load->helper('url');
		$this->load->library('session');
		//$this->load->library('form_validation'); 
		//$this->load->library('pagination');
		//$this->load->library('upload');
		isAuthenticate();
	}
	
	public function index()
	{
		
		$data['auid']   	 = $this->session->userdata('websiteloginid');
		$data['usertype']    = $this->session->userdata('usertype');
		$data['success']     = $this->session->userdata('msg');
		
		$data['registrationViewlist'] = $this->M_cloud->findAll('signup_form', 'regId desc');
		
		//$data['appointmentViewlist'] = $this->M_join->appointmentView('signup_form');
		
		$data['baseinformation'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		
		$this->load->view('adminpanel/registrationViewPage', $data);
	}
	
	
	public function delete($comid)
	{
		$where = array('regId' => $comid);
		$result 	= $this->M_cloud->find('signup_form', $where);
		
		$this->M_cloud->destroyAll('signup_form', $where);
		
		redirect('adminpanel/registrationView');
	}
	
	
	
	
	
}


?>