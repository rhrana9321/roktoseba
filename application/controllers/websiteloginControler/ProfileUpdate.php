<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileUpdate extends CI_Controller {
	 static $helper   = array('url', 'authentication_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_superadmin', 'M_cloud'));
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
		
		
		$data['admininfo']	= $this->M_cloud->find('superadmin', array('spId' => $data['auid']));
		
		$data['baseinformation'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		
		//$this->session->set_userdata(array('msg' => ''));
		$this->load->view('adminpanel/profilePage', $data);
	}
	
	public function profileEdit()
	{
	$auid   	 = $this->session->userdata('auid');
	
	$data['username']  = $this->input->post('username');
	$this->db->update('superadmin', $data, array('spId' => $auid));
	
	redirect('adminpanel/profileUpdate');
	}
	
	
	
	
	public function changepass()
	{
		$data['password'] = md5($this->input->post('password'));
		$auid   	 = $this->session->userdata('auid');
		
		$this->db->update('superadmin', $data, array('spId' => $auid));
		
		redirect('adminlogin/logout');
	}
	
	public function checkpass()
	{
		$oldpass = md5($this->input->post('ollpass'));
		$auid   	 = $this->session->userdata('auid');
		$result   = $this->M_cloud->find('superadmin', array('spId' => $auid, 'password' => $oldpass));
		if($result){
			echo true;
		} else {
			echo false;
		}
	
	}
	
	
	
	
	
	public function forgotpasscheck()
	{
		$email   = $this->input->post('email');
		
			$password  = time()+1;
			$data  = md5($password);
			$this->db->update('superadmin', 'spId');
			
				$senderEmail 	 = 'mdsawkathossain1@gmail.com';
				$senderName 	 = '1MG';
				$subject 		 = 'Change password';
				
				$message   = $password;
				$this->email->from($senderEmail, $senderName);
				$this->email->to($email);	
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->send();
			
		
		redirect('userLogin/logout');
		
	
	}
	
	
	
}


?>