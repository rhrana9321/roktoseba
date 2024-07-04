<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Id_verify extends CI_Controller {
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
		$data['success_msg']	 = $this->session->userdata('accountsucc');
		$this->session->set_userdata(array('accountsucc' => ''));
		
		$data['verifycodeList'] = $this->session->userdata('verifierror');
		$this->session->set_userdata(array('verifierror' => ""));
		
		$data['mailsendList'] = $this->session->userdata('mailsend');
		$this->session->set_userdata(array('mailsend' => ""));
		
		$data['language_check'] = $this->session->userdata('language_data');
		
		$this->load->view('Id_verifyPage', $data);
	}
	
	
	
	
	
}


?>