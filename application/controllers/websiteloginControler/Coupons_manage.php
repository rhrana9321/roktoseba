<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupons_manage extends CI_Controller {
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
		$data['product_tablelist'] = $this->M_cloud->findAll('coupons_table', 'cou_id desc');
		
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('websiteloginview/Coupons_managePage', $data);
	}
	
	
	
	
	
	public function store()
	{
		
		$id 					= $this->input->post('id');
		$data['coupons_name'] 	= $this->input->post('coupons_name');
		$data['coupons_code'] 	= $this->input->post('coupons_code');
		$data['cou_type'] 		= $this->input->post('cou_type');
		$data['discount'] 		= $this->input->post('discount');
		$data['Date_Start'] 	= $this->input->post('Date_Start');
		$data['Date_End'] 		= $this->input->post('Date_End');
		$data['Status'] 		= $this->input->post('Status');
		
		if(!empty($id)){
			$where = array('cou_id' => $id);
			$productListEditInfo 	     = $this->M_cloud->tbWhRow('coupons_table', $where);
			$this->M_cloud->updateAll('coupons_table', $data, array('cou_id' => $id));
			$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
		}else{
			$this->M_cloud->save('coupons_table', $data);
			$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
		}
		redirect('websiteloginControler/Coupons_manage');
	}
	
	
	public function update()
	{
		
		$id = $this->input->post('id');
		$result = $this->M_cloud->find('coupons_table', array('cou_id' => $id));
		echo json_encode($result);
	}
		
	public function delete($cou_id)
	{
		$where = array('cou_id' => $cou_id);
		$result 	= $this->M_cloud->tbWhRow('coupons_table', $where);
		$this->M_cloud->destroyAll('coupons_table', $where);
		redirect('websiteloginControler/Coupons_manage');
	}
	
	
	
	
	
	
}

?>