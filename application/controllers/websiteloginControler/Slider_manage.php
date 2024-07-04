<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_manage extends CI_Controller {
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
		
		$data['slider_tablelist'] = $this->M_cloud->findAll('slider_mange', 'sliId asc');
		$data['adminuserinfo']	 = $this->M_cloud->find('superadmin', array('spId' => $auid));
		
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('websiteloginview/sliderPage', $data);
	}
	
	public function store()
	{
		
		$id = $this->input->post('id');
		$data['slider_title']	= $this->input->post('slider_title');
		$data['slider_title_bn']	= $this->input->post('slider_title_bn');
		$data['status']  	= $this->input->post('status');
		$data['mobile']  	= $this->input->post('mobile');
		$proimage 			= $this->input->post('proimage');


		if(!empty($id)){
			
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
			
		$this->db->update('slider_mange', $data, array('sliId' => $id));
					
		} else {
			
			$data['proimage']     = $proimage;
			
			
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
			$this->db->insert('slider_mange', $data);
		}
		
		redirect('websiteloginControler/slider_manage');
	}
	
	
	function create_thumbnail_three($fileName, $width, $height)
	{
		$this->load->library('image_lib');
		$config['image_library']  = 'gd2';
		$config['source_image']   = './uploads/'. $fileName;
		$config['maintain_ratio'] = FALSE;
		$config['width']          = $width;
		$config['height']         = $height;
		$config['new_image']      = './uploads/Slider_image/'. $fileName;
		$this->image_lib->initialize($config);
		
		if(!$this->image_lib->resize())
		{
			echo $this->image_lib->display_errors();
		}
	}
	
	
	public function update()
	{
		
		$id = $this->input->post('id');
		$result = $this->M_cloud->find('slider_mange', array('sliId' => $id));
		echo json_encode($result);
	}
		
	public function delete($sliId)
	{
		$where = array('sliId' => $sliId);
		$result 	= $this->M_cloud->tbWhRow('slider_mange', $where);
		$this->M_cloud->destroyAll('slider_mange', $where);
		
		redirect('websiteloginControler/slider_manage');
	}
	
		
	
}

?>