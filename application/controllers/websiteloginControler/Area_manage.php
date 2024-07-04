<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area_manage extends CI_Controller {
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
		$data['city_tablelist'] = $this->M_cloud->findAll('city_mange', 'city_id desc');
		$data['category_tablelist'] = $this->M_cloud->findAll('area_mange', 'area_id desc');
		$data['adminuserinfo']	 = $this->M_cloud->find('superadmin', array('spId' => $auid));
		
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('websiteloginview/Area_managePage', $data);
	}
	
	public function store()
	{
		
		$id = $this->input->post('id');
		$data['city_name']	= $this->input->post('city_name');
		$data['area_name']	= $this->input->post('area_name');
		
		
		if(!empty($id)){
			$where = array('area_id' => $id);
			$productListEditInfo 	     = $this->M_cloud->tbWhRow('area_mange', $where);
			$this->M_cloud->updateAll('area_mange', $data, array('area_id' => $id));
			$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
		}else{
			$this->M_cloud->save('area_mange', $data);
			$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
		}
		redirect('websiteloginControler/Area_manage');
	}
		
	
		
	
	public function update()
	{
		$id = $this->input->post('id');
		$result = $this->M_cloud->find('area_mange', array('area_id' => $id));
		echo json_encode($result);
	}
		
	public function delete($area_id)
	{
		$where = array('area_id' => $area_id);
		$result 	= $this->M_cloud->tbWhRow('area_mange', $where);
		$this->M_cloud->destroyAll('area_mange', $where);
		
		redirect('websiteloginControler/Area_manage');
	}
	
		
	
}

?>