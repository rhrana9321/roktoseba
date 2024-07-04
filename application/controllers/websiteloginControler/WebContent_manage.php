<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebContent_manage extends CI_Controller {
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
		$data['subcategory_tablelist'] = $this->M_cloud->findAll('subcategory_mange', 'subcatId desc');
		$data['product_tablelist'] = $this->M_cloud->findAll('webcontent_mange_table', 'web_con_id desc');
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('websiteloginview/webContent_managePage', $data);
	}
	
	public function store()
	{
		
		$id = $this->input->post('id');
		$data['menu_title']	= $this->input->post('menu_title');
		$data['menu_title_bn']	= $this->input->post('menu_title_bn');
		$data['menu_name']	= $this->input->post('menu_name');
		$data['prodetails']	= $this->input->post('prodetails');
		$data['prodetails_bn']	= $this->input->post('prodetails_bn');
		
		
		$agimage 			= $this->input->post('agImage');


		if(!empty($id)){
			
			if(!empty($agimage)){
				
				$imageunl = $this->M_cloud->find('webcontent_mange_table', array('web_con_id' => $id));
				
				if(!empty($imageunl->proimage)){
					unlink('uploads/'.$imageunl->proimage);
				}
				
				$data['proimage'] = $agimage;
				
			}
			
		$this->db->update('webcontent_mange_table', $data, array('web_con_id' => $id));
					
		} else {
			
			if(!empty($agimage)){
			$data['proimage'] = $agimage;
			}
			
			$this->db->insert('webcontent_mange_table', $data);
		}
		
		redirect('websiteloginControler/WebContent_manage');
	}
	
	
	
	public function update()
	{
		
		$id = $this->input->post('id');
		$result = $this->M_cloud->find('webcontent_mange_table', array('web_con_id' => $id));
		echo json_encode($result);
	}
		
	public function delete($web_con_id)
	{
		$where = array('web_con_id' => $web_con_id);
		$result 	= $this->M_cloud->tbWhRow('webcontent_mange_table', $where);
		$this->M_cloud->destroyAll('webcontent_mange_table', $where);
		
		redirect('websiteloginControler/WebContent_manage');
	}
	
		
	
}

?>