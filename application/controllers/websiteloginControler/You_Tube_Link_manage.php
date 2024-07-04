<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class You_Tube_Link_manage extends CI_Controller {
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
		
		$data['baseinformation'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		
		$data['slider_tablelist'] = $this->M_cloud->findAll('you_tube_link_mange', 'sliId asc');
		$data['adminuserinfo']	 = $this->M_cloud->find('superadmin', array('spId' => $auid));
		
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('websiteloginview/You_Tube_Link_managePage', $data);
	}
	
	public function store()
	{
		
		$id = $this->input->post('id');
		$data['slider_title']	= $this->input->post('slider_title');
		$data['status']  	= $this->input->post('status');
		$agimage 			= $this->input->post('agImage');


		if(!empty($id)){
			
			if(!empty($agimage)){
				
				$imageunl = $this->M_cloud->find('you_tube_link_mange', array('sliId' => $id));
				
				if(!empty($imageunl->proimage)){
					unlink('uploads/'.$imageunl->proimage);
				}
				
				$data['proimage'] = $agimage;
				
			}
			
		$this->db->update('you_tube_link_mange', $data, array('sliId' => $id));
					
		} else {
			
			if(!empty($agimage)){
			$data['proimage'] = $agimage;
			}
			
			$this->db->insert('you_tube_link_mange', $data);
		}
		
		redirect('websiteloginControler/You_Tube_Link_manage');
	}
	
	
	
	public function update()
	{
		
		$id = $this->input->post('id');
		$result = $this->M_cloud->find('you_tube_link_mange', array('sliId' => $id));
		echo json_encode($result);
	}
		
	public function delete($sliId)
	{
		$where = array('sliId' => $sliId);
		$result 	= $this->M_cloud->tbWhRow('you_tube_link_mange', $where);
		$this->M_cloud->destroyAll('you_tube_link_mange', $where);
		
		redirect('websiteloginControler/You_Tube_Link_manage');
	}
	
		
	
}

?>