<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	static $model 	 = array();
	static $helper   = array('form');
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model(self::$model);
		$this->load->helper(self::$helper);
		$this->load->library('upload');
	}
	
	public function index($type = 0)
	{	
		$output = array();

		if($type == 'comlogo') {
		$config = array('upload_path' => './uploads/company_logo/');
		$fileLocation = "uploads/company_logo/";
		}
		
		else if($type == 'agImage') {
		$config = array('upload_path' => './uploads/');
		$fileLocation = "uploads/";
		}
		else if($type == 'proimage') {
		$config = array('upload_path' => './uploads/');
		$fileLocation = "uploads/";
		}
		else if($type == 'proimage1') {
		$config = array('upload_path' => './uploads/');
		$fileLocation = "uploads/";
		}
		
		else if($type == 'proimage2') {
		$config = array('upload_path' => './uploads/');
		$fileLocation = "uploads/";
		}
		
		
		else if($type == 'userImage') {
		$config = array('upload_path' => './uploads/');
		$fileLocation = "uploads/";
		}
		
		else if($type == 'auImage') {
		$config = array('upload_path' => './uploads/');
		$fileLocation = "uploads/";
		}
		
		else  {
			$config = array('upload_path' => './uploads/', 'max_size' => '200');
			$fileLocation = "uploads/";
		}

		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['file_name'] 	 = time();

		$this->upload->initialize($config);

		if($this->upload->do_upload('attachment')) {
			$uploadData = $this->upload->data();
			$output['status'] = 'success';
			$output['fileLocation'] = $fileLocation.$uploadData['file_name'];
			$output['fileName'] 	= $uploadData['file_name'];
		} else {
			$output['status'] = 'failed';
			$output['message'] = $this->upload->display_errors('', '');
		}

		echo json_encode($output);
	}


	public function remove($type = 0)
	{	
		$fileName = $this->input->post('attachment');
		
		if($type == 'comlogo') {
			$fileLink = 'uploads/company_logo/'.$fileName;
		}
		
		else if($type == 'agImage') {
			$fileLink = 'uploads/'.$fileName;
		}
		
		else if($type == 'userImage') {
			$fileLink = 'uploads/'.$fileName;
		}
		
		else if($type == 'auImage') {
			$fileLink = 'uploads/'.$fileName;
		}
		
		else if($type == 'proimage2') {
			$fileLink = 'uploads/'.$fileName;
		}
			else if($type == 'proimage1') {
			$fileLink = 'uploads/'.$fileName;
		}
			else if($type == 'proimage') {
			$fileLink = 'uploads/'.$fileName;
		}
		
		
		unlink($fileLink);
	}
	
	
	


}