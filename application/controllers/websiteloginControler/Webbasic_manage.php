<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webbasic_manage extends CI_Controller {
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
		$this->load->library('upload');
		isAuthenticate();
	}
	
	public function index()
	{
		$auid   	 = $this->session->userdata('websiteloginid');
		$data['usertype']    = $this->session->userdata('usertype');
		$data['success']     = $this->session->userdata('msg');
		$data['basicinfo'] = $this->M_cloud->findAll('websitebasic_manage', 'bsId desc');
		$data['baseinformation'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$data['slider_tablelist'] = $this->M_cloud->findAll('slider_mange', 'sliId asc');
		$data['adminuserinfo']	 = $this->M_cloud->find('superadmin', array('spId' => $auid));
		$data['category_tablelist'] = $this->M_cloud->findAll('category_mange', 'catId desc');
		$data['subcategory_tablelist'] = $this->M_cloud->findAll('subcategory_mange', 'subcatId desc');
		$data['product_tablelist'] 		= $this->m_join->prosubCategory_M();
		
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('websiteloginview/webbasic_managePage', $data);
	}
	
	public function store()
	{
		
		$id 							= $this->input->post('id');
		$data['title']	    			= $this->input->post('title');
		$data['companyName']	    	= $this->input->post('companyName');
		$data['website']				= $this->input->post('website');
		$data['phone']	    			= $this->input->post('phone');
		$data['hotline']	    		= $this->input->post('hotline');
		$data['eamil']					= $this->input->post('eamil');
		$data['addres']	    			= $this->input->post('addres');
		$data['bkash_short_details']	= $this->input->post('bkash_short_details');
		$data['about_us']	    		= $this->input->post('about_us');
		$data['payment_process']		= $this->input->post('payment_process');
		$proimage 						= $this->input->post('proimage');
		$proimage1		    			= $this->input->post('proimage1');


		if(!empty($proimage)){
			$data['proimage'] = $proimage;
		} 
		if(!empty($proimage1)){
			$data['proimage1'] = $proimage1;
		}
		
		
		if(!empty($id)){
			$where = array('bsId' => $id);
			$productListEditInfo 	     = $this->M_cloud->tbWhRow('websitebasic_manage', $where);
			
			if(!empty($productListEditInfo->proimage) && file_exists('uploads/'.$productListEditInfo->proimage) && !empty($proimage))
			{					
			unlink('uploads/'.$productListEditInfo->proimage);
			}
			if(!empty($productListEditInfo->proimage1) && file_exists('uploads/'.$productListEditInfo->proimage1) && !empty($proimage1))
			{					
			unlink('uploads/'.$productListEditInfo->proimage1);
			}
			
			$this->M_cloud->updateAll('websitebasic_manage', $data, array('bsId' => $id));
			$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
		}else{
			$this->M_cloud->save('websitebasic_manage', $data);
			$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
		}
		redirect('websiteloginControler/webbasic_manage');
	}
	
	
		
	public function update()
	{
		
		$id = $this->input->post('id');
		$result = $this->M_cloud->find('websitebasic_manage', array('bsId' => $id));
		echo json_encode($result);
	}
		
	public function delete($bsId)
	{
		$where = array('bsId' => $bsId);
		$result 	= $this->M_cloud->tbWhRow('websitebasic_manage', $where);
		$this->M_cloud->destroyAll('websitebasic_manage', $where);
		
		redirect('websiteloginControler/webbasic_manage');
	}
	
		
	
}

?>