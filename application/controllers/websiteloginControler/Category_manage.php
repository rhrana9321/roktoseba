<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_manage extends CI_Controller {
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
		$this->load->library('upload');
		isAuthenticate();
	}
	
	public function index()
	{
		$auid   	 = $this->session->userdata('websiteloginid');
		$data['usertype']    = $this->session->userdata('usertype');
		$data['success']     = $this->session->userdata('msg');
		$data['baseinformation'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$data['category_tablelist'] = $this->M_cloud->findAll('category_mange', 'up_down asc');
		$data['adminuserinfo']	 = $this->M_cloud->find('superadmin', array('spId' => $auid));
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('websiteloginview/category_managePage', $data);
	}
	
	public function store()
	{
		
		$id = $this->input->post('id');
		$data['category_name']	= $this->input->post('category_name');
		$data['category_name_bn']	= $this->input->post('category_name_bn');
		$data['cat_icon']  	= $this->input->post('cat_icon');
		$data['status']  	= 1;
		$proimage 					= $this->input->post('proimage');
    	$proimage1		    		= $this->input->post('proimage1');
		
		
		if(empty($id)){
			$maxmeberid   = $this->M_cloud->basicall('category_mange', 'up_down desc');
			$str = $maxmeberid->up_down + 1;
			if(!empty($maxmeberid)){
			$data['up_down'] = $str ;
			} else{
			$data['up_down'] = '1';	
			}
		}


		if(!empty($proimage)){
			$data['proimage'] = $proimage;
		} 
		if(!empty($proimage1)){
			$data['proimage1'] = $proimage1;
		}
		
		if(!empty($id)){
			
			if(!empty($proimage)){
			$where = array('catId' => $id);
			$productListEditInfo 	     = $this->M_cloud->tbWhRow('category_mange', $where);
				if(!empty($result->proimage)){
					unlink("uploads/".$result->proimage);
				}
			 		$data['proimage']    = $proimage;
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
				$this->create_thumbnail($uploadData['file_name'], '20', '20');
				$this->create_thumbnail_two($uploadData['file_name'], '180', '200');
			}
			
			
			$this->M_cloud->updateAll('category_mange', $data, array('catId' => $id));
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
				$this->create_thumbnail($uploadData['file_name'], '20', '20');
				$this->create_thumbnail_two($uploadData['file_name'], '180', '200');
			}
			
			
			$this->M_cloud->save('category_mange', $data);
			$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
		}
		redirect('websiteloginControler/category_manage');
	}
		
	function create_thumbnail($fileName, $width, $height)
	{
		$this->load->library('image_lib');
		$config['image_library']  = 'gd2';
		$config['source_image']   = './uploads/'. $fileName;
		$config['maintain_ratio'] = FALSE;
		$config['width']          = $width;
		$config['height']         = $height;
		$config['new_image']      = './uploads/Category_icon_image/'. $fileName;
		$this->image_lib->initialize($config);
		
		if(!$this->image_lib->resize())
		{
			echo $this->image_lib->display_errors();
		}
	}
	
	function create_thumbnail_two($fileName, $width, $height)
	{
		$this->load->library('image_lib');
		$config['image_library']  = 'gd2';
		$config['source_image']   = './uploads/'. $fileName;
		$config['maintain_ratio'] = FALSE;
		$config['width']          = $width;
		$config['height']         = $height;
		$config['new_image']      = './uploads/Category_image/'. $fileName;
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
		$config['new_image']      = './uploads/Category_banner_image/'. $fileName;
		$this->image_lib->initialize($config);
		
		if(!$this->image_lib->resize())
		{
			echo $this->image_lib->display_errors();
		}
	}
		
	
	public function update()
	{
		
		$id = $this->input->post('id');
		$result = $this->M_cloud->find('category_mange', array('catId' => $id));
		echo json_encode($result);
	}
		
	public function delete($catId)
	{
		$where = array('catId' => $catId);
		$result 	= $this->M_cloud->tbWhRow('category_mange', $where);
		$this->M_cloud->destroyAll('category_mange', $where);
		redirect('websiteloginControler/category_manage');
	}
	
	public function Up()
	{
		$id 			= $this->input->post('id');
		
		$result 	= $this->M_cloud->tbWhRow('category_mange', array('catId' => $id));
		$Up['up_down']  	= $result->up_down;
		$this->M_cloud->updateAll('category_mange', $Up, array('catId' => $id));
		
		
		$Up_two['up_down']  	= $result->up_down;
		$this->M_cloud->updateAll('category_mange', $Up_two, array('catId' => $id));
		
		
		//redirect('websiteloginControler/category_manage');
	}
	
	public function updown()
	{
		$id = $this->input->post('id');
		$up_down = $this->input->post('up_down');
		
		$up_down_row 	= $this->M_cloud->tbWhRow('category_mange', array('up_down' => $up_down));
		$id_row 		= $this->M_cloud->tbWhRow('category_mange', array('catId' => $id));
		
		$data1['up_down'] = $id_row->up_down;
		$this->db->update('category_mange', $data1, array('up_down' => $up_down));
		
		$data2['up_down'] = $up_down;
		$this->db->update('category_mange', $data2, array('catId' => $id));
	
		
		$data['category_tablelist'] = $this->M_cloud->findAll('category_mange', 'up_down asc');
		redirect('websiteloginControler/category_manage');
	}
		
	
}

?>