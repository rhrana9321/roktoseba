<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Joma extends CI_Controller {
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
		
		$data['category_tablelist'] = $this->M_cloud->findAll('joma_mange', 'catId desc');
		$data['Sebok_tablelist'] = $this->M_cloud->findAll('webproduct_mange_table', 'wproid desc');
		$data['adminuserinfo']	 = $this->M_cloud->find('superadmin', array('spId' => $auid));
		
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('websiteloginview/JomaPage', $data);
	}
	
	public function Shorting()
	{
		
		$data['baseinformation'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$pro_cat_id2 = $this->input->post('pro_cat_id2');
		
		$data['Nameablelist']  = $this->M_cloud->find('webproduct_mange_table', array('wproid' => $pro_cat_id2));
		$data['j_tablelist'] = $this->M_cloud->findReport('joma_mange', array('category_name' => $pro_cat_id2));
		$this->load->view('websiteloginview/Joma_short_ListPage', $data);
	}
	
	
	public function store()
	{
		
		$id 					= $this->input->post('id');
		$data['category_name']	= $this->input->post('category_name');
		$data['details']		= $this->input->post('details');
		$data['amounts']		= $this->input->post('amounts');
		$data['cdate']			= date("Y-m-d");
		
		
		if(!empty($id)){
			$where = array('catId' => $id);
			$productListEditInfo 	     = $this->M_cloud->tbWhRow('joma_mange', $where);
			$this->M_cloud->updateAll('joma_mange', $data, array('catId' => $id));
			$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
		}else{
			$this->M_cloud->save('joma_mange', $data);
			$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
		}
		redirect('websiteloginControler/Joma');
	}
		
	
		
	
	public function update()
	{
		
		$id = $this->input->post('id');
		$result = $this->M_cloud->find('joma_mange', array('catId' => $id));
		echo json_encode($result);
	}
		
	public function delete($catId)
	{
		$where = array('catId' => $catId);
		$result 	= $this->M_cloud->tbWhRow('joma_mange', $where);
		$this->M_cloud->destroyAll('joma_mange', $where);
		
		redirect('websiteloginControler/Joma');
	}
	
		
	
}

?>