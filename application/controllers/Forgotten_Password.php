<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotten_Password extends CI_Controller {
	 static $helper   = array('url', 'websitecustomerlogin_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_cloud', 'M_join'));
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('upload');
		$this->load->library('cart');
		//isAuthenticate();
		
	}
	
	public function index()
	{
		$data['userid']             = $this->session->userdata('usertype');
		$data['userid']             = $this->session->userdata('auid');
		$data['cateserchilist'] 	= $this->M_cloud->findAll('category_mange', 'up_down asc');
		$data['catagoriinfoList'] 	= $this->M_cloud->homecataWithsub('category_mange', array('status' => '1'), 'up_down asc');
		$data['basicinfo']          = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$data['success_msg']	    = $this->session->userdata('accountsucc');
		$this->session->set_userdata(array('accountsucc' => ''));
		
		
		$data['eror_message']	 = $this->session->userdata('fgtpassalt');
		$this->session->set_userdata(array('fgtpassalt' => ''));
		
		$data['invalidUser'] = $this->session->userdata('invalidUser');
		$this->session->set_userdata(array('invalidUser' => ""));
		
		$data['language_check'] = $this->session->userdata('language_data');
		
		$this->load->view('Forgotten_PasswordPage', $data);
	}
	
	
	
	public function forgottenPasswordAction()
	{
		
		$email   = $this->input->post('email');
		$result   = $this->M_cloud->tbWhRow('signup_user', array('signEmail' => $email));
		$basicinfo = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		
		if($result){
			$verify  = time()+1;
			$data['password']  = md5($verify);
			$this->db->update('signup_user', $data, array('signEmail' => $email));
			
				$senderEmail 	 = $basicinfo->eamil;
				$senderName 	 = $basicinfo->companyName;;
				$subject 		 = 'Security Code';
				
				$message = "Your Security Code is : ".$verify;
				
				$this->email->from($senderEmail);
				$this->email->to($email);   
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->send();
			
			$this->session->set_userdata(array('mailsend' => 'Your password has been emailed, please check your email inbox'));		
			redirect('Sign_in/logout');
		
		} else {
		
		$this->session->set_userdata(array('fgtpassalt' => 'Your email address is Wrong!'));
		redirect('Forgotten_Password');
		}
	}
	
	
}


?>