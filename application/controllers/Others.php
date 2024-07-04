<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Others extends CI_Controller {
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
	
	public function index($othermenu)
	{
		$data['userid']           = $this->session->userdata('auid');
		$data['cateserchilist'] 	= $this->M_cloud->findAll('category_mange', 'up_down asc');
		$data['catagoriinfoList'] 	= $this->M_cloud->homecataWithsub('category_mange', array('status' => '1'), 'up_down asc');
		$data['basicinfo'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		
		$data['otherlist'] 	= $this->M_cloud->findbyidstock('webcontent_mange_table', array('menu_name' => $othermenu));
		$data['language_check'] = $this->session->userdata('language_data');
		
		$this->load->view('OthersPage', $data);
	}
	
	
}


?>