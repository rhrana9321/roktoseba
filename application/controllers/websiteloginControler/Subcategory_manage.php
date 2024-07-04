<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory_manage extends CI_Controller {
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
		
		$data['baseinformation'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$data['category_tablelist'] = $this->M_cloud->findAll('category_mange', 'catId desc');
		$data['subcategory_tablelist'] 		= $this->m_join->subCategory_M();
		$data['adminuserinfo']	 = $this->M_cloud->find('superadmin', array('spId' => $auid));
		
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('websiteloginview/subcategory_managePage', $data);
	}
	
	public function store()
	{
		
		$id = $this->input->post('id');
		$data['category_id']	= $this->input->post('category_id');
		$data['sub_category_name']	= $this->input->post('sub_category_name');
		$data['sub_category_name_bn']	= $this->input->post('sub_category_name_bn');
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
			$where = array('subcatId' => $id);
			$productListEditInfo 	     = $this->M_cloud->tbWhRow('subcategory_mange', $where);
			
			if(!empty($productListEditInfo->proimage) && file_exists('uploads/'.$productListEditInfo->proimage) && !empty($proimage))
			{					
			unlink('uploads/'.$productListEditInfo->proimage);
			}
			if(!empty($productListEditInfo->proimage1) && file_exists('uploads/'.$productListEditInfo->proimage1) && !empty($proimage1))
			{					
			unlink('uploads/'.$productListEditInfo->proimage1);
			}
			
			
			$config['upload_path']   = './uploads';
			$config['allowed_types'] = 'jpg|png|jpeg|gif|pdf';
			$config['max_size']			= '10000';
			$config['file_name']		= time();
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('proimage'))
			{
				$uploadData = $this->upload->data();
				$uploaded_photo  = $uploadData['file_name'];
				$data['proimage'] = $uploaded_photo;
				$this->create_thumbnail_three($uploadData['file_name'], '1024', '250');
			}
			
			if($this->upload->do_upload('proimage1'))
			{
				$uploadData = $this->upload->data();
				$uploaded_photo  = $uploadData['file_name'];
				$data['proimage1'] = $uploaded_photo;
				$this->create_thumbnail($uploadData['file_name'], '180', '200');
			}
			
			$this->M_cloud->updateAll('subcategory_mange', $data, array('subcatId' => $id));
			$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
		}else{
		
		
			$data['proimage']     = $proimage;
			$data['proimage1']    = $proimage1;
			
			
			$config['upload_path'] 		= './uploads';
			$config['allowed_types'] = 'jpg|png|jpeg|gif|pdf';
			$config['max_size']			= '10000';
			$config['file_name']		= time();
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('proimage'))
			{
				$uploadData = $this->upload->data();
				$uploaded_photo  = $uploadData['file_name'];
				$data['proimage'] = $uploaded_photo;
				$this->create_thumbnail_three($uploadData['file_name'], '1024', '250');
			}
			
			if($this->upload->do_upload('proimage1'))
			{
				$uploadData = $this->upload->data();
				$uploaded_photo  = $uploadData['file_name'];
				$data['proimage1'] = $uploaded_photo;
				$this->create_thumbnail($uploadData['file_name'], '180', '200');
			}
			$this->M_cloud->save('subcategory_mange', $data);
			$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
		}
		redirect('websiteloginControler/subcategory_manage');
	}
	
	
	function create_thumbnail($fileName, $width, $height)
	{
		$this->load->library('image_lib');
		$config['image_library']  = 'gd2';
		$config['source_image']   = './uploads/'. $fileName;
		$config['maintain_ratio'] = FALSE;
		$config['width']          = $width;
		$config['height']         = $height;
		$config['new_image']      = './uploads/Subcategory_icon_image/'. $fileName;
		$this->image_lib->initialize($config);
		
		if(!$this->image_lib->resize())
		{
			echo $this->image_lib->display_errors();
		}
	}
	
	
	
	function create_thumbnail_three($fileName, $width, $height)
	{
		$this->load->library('image_lib');
		$config['image_library']  = 'gd2';
		$config['source_image']   = './uploads/'. $fileName;
		$config['maintain_ratio'] = FALSE;
		$config['width']          = $width;
		$config['height']         = $height;
		$config['new_image']      = './uploads/Subcategory_banner_image/'. $fileName;
		$this->image_lib->initialize($config);
		
		if(!$this->image_lib->resize())
		{
			echo $this->image_lib->display_errors();
		}
	}
		
	
	public function update()
	{
		
		$id = $this->input->post('id');
		$result = $this->M_cloud->find('subcategory_mange', array('subcatId' => $id));
		echo json_encode($result);
	}
		
	public function delete($subcatId)
	{
		$where = array('subcatId' => $subcatId);
		$result 	= $this->M_cloud->tbWhRow('subcategory_mange', $where);
		$this->M_cloud->destroyAll('subcategory_mange', $where);
		
		redirect('websiteloginControler/subcategory_manage');
	}
	
		
	
}

?>