<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subsubcategory_manage extends CI_Controller {
	 static $helper   = array('url', 'websitelogin_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('m_websiteadmin', 'M_cloud', 'm_join'));
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation'); 
		$this->load->library('pagination');
		$this->load->library('upload');
		isAuthenticate();
	}
	
	public function index()
	{
		$auid   	 = $this->session->userdata('websiteloginid');
		$data['usertype']    = $this->session->userdata('usertype');
		$data['success']     = $this->session->userdata('msg');
		
		$data['baseinformation'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$data['category_tablelist'] = $this->M_cloud->findAll('category_mange', 'catId desc');
		$data['subsubcategory_tablelist'] 		= $this->M_cloud->findAll('sub_to_sub_category_mange', 'subsubcatId desc');
		$data['subcategory_tablelist'] = $this->M_cloud->findAll('subcategory_mange', 'subcatId desc');
		$data['adminuserinfo']	 = $this->M_cloud->find('superadmin', array('spId' => $auid));
		
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('websiteloginview/subsubcategory_managePage', $data);
	}
	
	public function store()
	{
		
		$id = $this->input->post('id');
		$data['category_id']	= $this->input->post('category_id');
		$data['sub_category_id']	= $this->input->post('sub_category_id');
		$data['sub_to_sub_category_name']	= $this->input->post('sub_to_sub_category_name');
		$data['sub_to_sub_category_name_bn']	= $this->input->post('sub_to_sub_category_name_bn');
		$data['status']  	= $this->input->post('status');
		
		$proimage 			= $this->input->post('proimage');
		$proimage1		    		= $this->input->post('proimage1');


		if(!empty($proimage)){
			$data['proimage'] = $proimage;
		} 
		if(!empty($proimage1)){
			$data['proimage1'] = $proimage1;
		}
		
		if(!empty($id)){
			$where = array('subsubcatId' => $id);
			$productListEditInfo 	     = $this->M_cloud->tbWhRow('sub_to_sub_category_mange', $where);
			
			if(!empty($productListEditInfo->proimage) && file_exists('uploads/'.$productListEditInfo->proimage) && !empty($proimage))
			{					
			unlink('uploads/'.$productListEditInfo->proimage);
			}
			if(!empty($productListEditInfo->proimage1) && file_exists('uploads/'.$productListEditInfo->proimage1) && !empty($proimage1))
			{					
			unlink('uploads/'.$productListEditInfo->proimage1);
			}
			
			$this->M_cloud->updateAll('sub_to_sub_category_mange', $data, array('subsubcatId' => $id));
			$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
		}else{
			$this->M_cloud->save('sub_to_sub_category_mange', $data);
			$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
		}
		redirect('websiteloginControler/subsubcategory_manage');
	}
		
	
	public function update()
	{
		
		$id = $this->input->post('id');
		$result = $this->M_cloud->find('sub_to_sub_category_mange', array('subsubcatId' => $id));
		echo json_encode($result);
	}
	
	
	
	public function subcateidsubcat()
	{
		$category_id = $this->input->post('category_id');
		$subCategoryfdfdList = $this->M_cloud->findReport('subcategory_mange', array('category_id' => $category_id));
		//print_r($subCategoryfdfdList);
		echo
		"<select class='form-control' name='sub_category_id' id='sub_category_id' tabindex='2' required>
		  <option> --- Select Sub Category Name ---</option>";
		
		foreach($subCategoryfdfdList as $v)
		{
			echo '<option value="' . $v->subcatId . '">' . $v->sub_category_name . '</option>';
        }
		
		echo
		"</select>";
	}
	
		
	public function delete($subsubcatId)
	{
		$where = array('subsubcatId' => $subsubcatId);
		$result 	= $this->M_cloud->tbWhRow('sub_to_sub_category_mange', $where);
		$this->M_cloud->destroyAll('sub_to_sub_category_mange', $where);
		
		redirect('websiteloginControler/subsubcategory_manage');
	}
	
		
	
}

?>