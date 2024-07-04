<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends CI_Controller {
	 static $helper   = array('url', 'user_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_cloud', 'M_superadmin'));
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper('download');
		$this->load->helper('file');
		 $autoload['libraries'] = array();
		//$this->load->library('pagination');
		$this->load->library('upload');
		//$this->load->library('cart');
		isAuthenticate();
		
	}
	
	
	public function index()
	{
	
	  $userid           		= $this->session->userdata('auid');	
	  $data['userid']           = $this->session->userdata('usertype');
	  
	  $data['userinfolist']		= $this->M_cloud->find('signup_user', array('signId' => $userid));
	  $data['usersponsorlist']	= $this->M_cloud->find('signup_user', array('userName' => $data['userinfolist']->sponsorId));
	 
	  $data['bankinfo']         = $this->M_cloud->find('bank_information', array('userId' => $userid));
	 
	 $data['tranpasword']	= $this->M_cloud->findReport('tran_password', array('userid' => $userid));

	 $data['sendcompose']	= $this->M_cloud->findReport('user_compose', array('toId' => $userid));
	 
	  $this->load->view('inboxPage', $data);
	
	}
	

	
	
	
	
	
}

?>