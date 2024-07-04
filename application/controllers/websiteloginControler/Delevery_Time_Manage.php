<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delevery_Time_Manage extends CI_Controller {
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
		
		$data['category_tablelist'] = $this->M_cloud->findAll('delevery_time_mange', 'delevery_time_id asc');
		$data['adminuserinfo']	 = $this->M_cloud->find('superadmin', array('spId' => $auid));
		
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('websiteloginview/Delevery_Time_ManagePage', $data);
	}
	
	public function store()
	{
		
		$id = $this->input->post('id');
		$data['name']	= $this->input->post('name');
		
		
		if(!empty($id)){
			$where = array('delevery_time_id' => $id);
			$productListEditInfo 	     = $this->M_cloud->tbWhRow('delevery_time_mange', $where);
			$this->M_cloud->updateAll('delevery_time_mange', $data, array('delevery_time_id' => $id));
			$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
		}else{
			$this->M_cloud->save('delevery_time_mange', $data);
			$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
		}
		redirect('websiteloginControler/Delevery_Time_Manage');
	}
		
	
		
	
	public function update()
	{
		
		$id = $this->input->post('id');
		$result = $this->M_cloud->find('delevery_time_mange', array('delevery_time_id' => $id));
		echo json_encode($result);
	}
		
	public function delete($delevery_time_id)
	{
		$where = array('delevery_time_id' => $delevery_time_id);
		$result 	= $this->M_cloud->tbWhRow('delevery_time_mange', $where);
		$this->M_cloud->destroyAll('delevery_time_mange', $where);
		
		redirect('websiteloginControler/Delevery_Time_Manage');
	}
	
		
	
}

?>