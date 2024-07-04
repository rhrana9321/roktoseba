<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor_View extends CI_Controller {
	 static $helper   = array('url', 'websitelogin_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('m_websiteadmin', 'M_cloud'));
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
		$cdate = date('Y-m-d');
		$data['baseinformation'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		
		$data['total_visitor'] = $this->M_cloud->incomeinfo('visitor_count',  array('cdate' => $cdate), 'visitor_id desc');
		
		$data['adminuserinfo']	 = $this->M_cloud->find('superadmin', array('spId' => $auid));
		
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('websiteloginview/Visitor_ViewPage', $data);
	}
	
	public function store()
	{
		
		$id = $this->input->post('id');
		$data['category_name']	= $this->input->post('category_name');
		$data['cat_icon']  	= $this->input->post('cat_icon');
		$data['status']  	= 1;
		$proimage 			= $this->input->post('proimage');
		$proimage1		    		= $this->input->post('proimage1');


		if(!empty($proimage)){
			$data['proimage'] = $proimage;
		} 
		if(!empty($proimage1)){
			$data['proimage1'] = $proimage1;
		}
		
		if(!empty($id)){
			$where = array('catId' => $id);
			$productListEditInfo 	     = $this->M_cloud->tbWhRow('category_mange', $where);
			
			if(!empty($productListEditInfo->proimage) && file_exists('uploads/'.$productListEditInfo->proimage) && !empty($proimage))
			{					
			unlink('uploads/'.$productListEditInfo->proimage);
			}
			if(!empty($productListEditInfo->proimage1) && file_exists('uploads/'.$productListEditInfo->proimage1) && !empty($proimage1))
			{					
			unlink('uploads/'.$productListEditInfo->proimage1);
			}
			
			$this->M_cloud->updateAll('category_mange', $data, array('catId' => $id));
			$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
		}else{
			$this->M_cloud->save('category_mange', $data);
			$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
		}
		redirect('websiteloginControler/category_manage');
	}
		
	
		
	
	public function update()
	{
		
		$id = $this->input->post('id');
		$result = $this->M_cloud->find('category_mange', array('catId' => $id));
		echo json_encode($result);
	}
		
	public function delete($catId)
	{
		$where = array('catId' => $catId);
		$result 	= $this->M_cloud->tbWhRow('category_mange', $where);
		$this->M_cloud->destroyAll('category_mange', $where);
		
		redirect('websiteloginControler/category_manage');
	}
	
		
	
}

?>