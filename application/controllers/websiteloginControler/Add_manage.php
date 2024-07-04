<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class add_manage extends CI_Controller {
	 static $helper   = array('url', 'websitelogin_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('m_websiteadmin', 'M_cloud', 'm_join'));
		$this->load->helper('url');
		$this->load->library('session');
		//$this->load->library('form_validation'); 
		//$this->load->library('pagination');
		//$this->load->library('upload');
		isAuthenticate();
	}
	
	public function index()
	{
		$auid   	 = $this->session->userdata('auid');
		$data['usertype']    = $this->session->userdata('usertype');
		$data['success']     = $this->session->userdata('msg');
		
		$data['baseinformation'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$data['slider_tablelist'] = $this->M_cloud->findAll('slider_mange', 'sliId asc');
		$data['adminuserinfo']	 = $this->M_cloud->find('superadmin', array('spId' => $auid));
		$data['category_tablelist'] = $this->M_cloud->findAll('category_mange', 'catId desc');
		$data['product_tablelist'] = $this->M_cloud->findAll('add_mange_table', 'add_id desc');
		
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('websiteloginview/add_managePage', $data);
	}
	
	
	
	
	
	
	public function store()
	{
		
		$id = $this->input->post('id');
		
		$data['url_add'] 		= $this->input->post('url_add');
		$data['type'] 		= $this->input->post('type');
		
		$proimage 			= $this->input->post('proimage');
		$proimage1		    		= $this->input->post('proimage1');


		if(!empty($proimage)){
			$data['proimage'] = $proimage;
		} 
		if(!empty($proimage1)){
			$data['proimage1'] = $proimage1;
		}
		
		
		if(!empty($id)){
			$where = array('add_id' => $id);
			$productListEditInfo 	     = $this->M_cloud->tbWhRow('add_mange_table', $where);
			
			if(!empty($productListEditInfo->proimage) && file_exists('uploads/'.$productListEditInfo->proimage) && !empty($proimage))
			{					
			unlink('uploads/'.$productListEditInfo->proimage);
			}
			if(!empty($productListEditInfo->proimage1) && file_exists('uploads/'.$productListEditInfo->proimage1) && !empty($proimage1))
			{					
			unlink('uploads/'.$productListEditInfo->proimage1);
			}
			
			$this->M_cloud->updateAll('add_mange_table', $data, array('add_id' => $id));
			$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
		}else{
			$this->M_cloud->save('add_mange_table', $data);
			$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
		}
		redirect('websiteloginControler/add_manage');
	}
	
	
	
	public function update()
	{
		
		$id = $this->input->post('id');
		$result = $this->M_cloud->find('add_mange_table', array('add_id' => $id));
		echo json_encode($result);
	}
		
	public function delete($add_id)
	{
		$where = array('add_id' => $add_id);
		$result 	= $this->M_cloud->tbWhRow('add_mange_table', $where);
		$this->M_cloud->destroyAll('add_mange_table', $where);
		
		redirect('websiteloginControler/add_manage');
	}
	
	
	
	
	
	
}

?>