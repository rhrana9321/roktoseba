<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	 static $helper   = array('url', 'user_helper');
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
		
		$customer_auid   	 = $this->session->userdata('websitecusId');
		$data['userinfo']	= $this->M_cloud->find('signup_user', array('signId' => $customer_auid));
		$data['cateserchilist'] 	= $this->M_cloud->findAll('category_mange', 'up_down asc');
		$data['catagoriinfoList'] 	= $this->M_cloud->homecataWithsub('category_mange', array('status' => '1'), 'up_down asc');
		$data['basicinfo'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$data['language_check'] = $this->session->userdata('language_data');
		
		$this->load->view('Contactpage', $data);
	}
	
	
	
	public function  contactAction()
	{
				
	  $config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		 // 'smtp_user' => 'xxx@gmail.com', // change it to yours
		  //'smtp_pass' => 'xxx', // change it to yours
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1',
		  'wordwrap' => TRUE
		);
	   

		$name  = $this->input->post('name');
		$email = $this->input->post('email');
		$mobile = $this->input->post('mobile');
		$comments = $this->input->post('comments');
		
		
		$message  = "Name : ".$name."\r\n";
		$message .= "E-mail : ".$email."\r\n";
		$message .= "Phone : ".$mobile."\r\n";
		$message .= "Message : ".$comments;
		
		
		$baseinformation 		= $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$dtmail 				= $baseinformation->eamil;   
		$senderEmail      		= $email;
		$subject          		= $baseinformation->companyName;
		
		
		$this->email->from($senderEmail);
		$this->email->to($dtmail);   
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
		
   		redirect('home');
	
	}
	
	
	
	
	
}


?>