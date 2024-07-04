<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webproduct_manage extends CI_Controller {
	 static $helper   = array('url', 'websitelogin_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('m_websiteadmin', 'M_cloud', 'm_join'));
		$this->load->helper('url');
		$this->load->library('session');
		//$this->load->library('form_validation'); 
		$this->load->library('pagination');
		$this->load->library('upload');
		isAuthenticate();
	}
	
	public function index($onset = 0)
	{
		$data['onset_row']     = $onset;
		$auid   	 					= $this->session->userdata('websiteloginid');
		$data['admininfo']				= $this->M_cloud->find('website_adminlogin', array('webadId' => $auid));
		$data['usertype']    = $this->session->userdata('usertype');
		$data['success']     = $this->session->userdata('msg');
		$data['baseinformation'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$data['adminuserinfo']	 = $this->M_cloud->find('superadmin', array('spId' => $auid));
		$data['category_tablelist'] = $this->M_cloud->findAll('category_mange', 'catId desc');
		$data['subcategory_tablelist'] = $this->M_cloud->findAll('subcategory_mange', 'subcatId desc');
		$data['Subsubcategory_tablelist'] = $this->M_cloud->findAll('sub_to_sub_category_mange', 'subsubcatId desc');
		
		$data['product_tablelist'] = $this->M_cloud->tbOn5ObyResult('webproduct_mange_table', $onset, 'wproid desc');
		$data['onset'] 			= $onset;
		$config['base_url'] 	= base_url('websiteloginControler/webproduct_manage/index');
		$config['total_rows'] 	= $this->M_cloud->tbRowCount50('webproduct_mange_table', 'wproid asc');
		$config['uri_segment'] 	= 4;
		$config['per_page'] 	= 30;
		$config['num_links'] 	= 4;
		$config['first_link']	= 'First';
		$config['last_link'] 	= 'Last';
		$config['prev_link']	= 'Prev';
		$config['next_link'] 	= 'Next';
		$this->pagination->initialize($config);
		
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('websiteloginview/webproduct_managePage', $data);
	}
	
	
	public function CityWisearea()
	{
		$cate_id = $this->input->post('cate_id');
		$data['subcategory_tablelist'] =  $this->M_cloud->findReport('subcategory_mange', array('category_id' => $cate_id));
		$this->load->view('websiteloginview/AreaListShow', $data);
	}
	
	public function Show_now()
	{
		
		$pro_cat_id2 				= $this->input->post('pro_cat_id2');
		$quntity 				= $this->input->post('quntity2');
		$where = [];
		if(!empty($pro_cat_id2)) $where['pro_cat_id'] = $pro_cat_id2;
		if(!empty($quntity)) $where['quntity'] = $quntity;
		$data['product_tablelist'] 		= $this->M_cloud->subcatproduct('webproduct_mange_table', $where, 'wproid asc');
		$this->load->view('websiteloginview/Shorting_product_ListPage', $data);
	}
	
	public function store()
	{
		
		$id = $this->input->post('id');
		$data['pro_cat_id']			= $this->input->post('pro_cat_id');
		$data['product_name']		= $this->input->post('product_name');
		$data['procode']			= $this->input->post('procode');
		$data['prodetails']			= $this->input->post('prodetails');
		$data['status']  			= $this->input->post('status');
		$data['product_kg_liter_dos']		= $this->input->post('product_kg_liter_dos');
		$data['product_kg_liter_dos_bn']		= $this->input->post('product_kg_liter_dos_bn');
		$data['quntity']		= $this->input->post('quntity');
		
		$proimage 					= $this->input->post('proimage');
    	
		
		if(!empty($id)){
			
			if(!empty($proimage)){
				$where = array('wproid' => $id);
				$result = $this->M_cloud->find('webproduct_mange_table', $where);	
				if(!empty($result->slide_image)){
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
				$this->create_thumbnail($uploadData['file_name'], '150', '140');
				$this->create_thumbnail_two($uploadData['file_name'], '600', '450');
			}
			
			
			
			
			$this->M_cloud->updateAll('webproduct_mange_table', $data, array('wproid' => $id));
			$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
		}else{
		
		
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
				$this->create_thumbnail($uploadData['file_name'], '150', '140');
				$this->create_thumbnail_two($uploadData['file_name'], '600', '450');
			}
			
			$this->M_cloud->save('webproduct_mange_table', $data);
			$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
		}
		redirect('websiteloginControler/webproduct_manage');
	}
	
	function create_thumbnail($fileName, $width, $height)
	{
		$this->load->library('image_lib');
		$config['image_library']  = 'gd2';
		$config['source_image']   = './uploads/'. $fileName;
		$config['maintain_ratio'] = FALSE;
		$config['width']          = $width;
		$config['height']         = $height;
		$config['new_image']      = './uploads/thumb/'. $fileName;
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
		$config['new_image']      = './uploads/FB/'. $fileName;
		$this->image_lib->initialize($config);
		
		if(!$this->image_lib->resize())
		{
			echo $this->image_lib->display_errors();
		}
	}
	
	
	
	public function update()
	{
		
		$id = $this->input->post('id');
		$result = $this->M_cloud->find('webproduct_mange_table', array('wproid' => $id));
		echo json_encode($result);
	}
		
	public function delete($wproid)
	{
		$where = array('wproid' => $wproid);
		$result 	= $this->M_cloud->tbWhRow('webproduct_mange_table', $where);
		$this->M_cloud->destroyAll('webproduct_mange_table', $where);
		
		redirect('websiteloginControler/webproduct_manage');
	}
	
	
	public function multi_delete()
	{
		$customer_id 					= $this->input->post('searchIDs');
		foreach($customer_id as $key => $val){
		 	$row = $this->M_cloud->find('webproduct_mange_table', array('wproid'=>$customer_id[$key]));
			$this->db->delete('webproduct_mange_table', array('wproid' => $row->wproid));
		}
	}
	
	
	public function subcateidsubcat()
	{
		$pro_cat_id = $this->input->post('pro_cat_id');
		$subCategoryfdfdList = $this->M_cloud->findReport('subcategory_mange', array('category_id' => $pro_cat_id));
		
		echo
		"<option> --- Select Sub Category Name ---</option>";
		foreach($subCategoryfdfdList as $v)
		{
			echo '<option value="' . $v->subcatId . '">' . $v->sub_category_name . '</option>';
        }
		echo
		"</select>";
	}
	
	public function Subsubcateidsubcat()
	{
		$pro_sub_id = $this->input->post('pro_sub_id');
		$subCategoryfdfdList = $this->M_cloud->findReport('sub_to_sub_category_mange', array('sub_category_id' => $pro_sub_id));
		
		echo
		"<option> --- Select Sub To Sub Category Name ---</option>";
		foreach($subCategoryfdfdList as $v)
		{
			echo '<option value="' . $v->subsubcatId . '">' . $v->sub_to_sub_category_name . '</option>';
        }
		echo
		"</select>";
	}
	
	
	
	public function subcateidsubcat_two()
	{
		$pro_cat_id = $this->input->post('pro_cat_id');
		$subsubCategoryfdfdList = $this->M_cloud->findReport('sub_to_sub_category_mange', array('category_id' => $pro_cat_id));
		
		echo
		"<select class='form-control' name='sub_sub_id' id='sub_sub_id' tabindex='2' required>
		  <option> --- Select Sub To Sub Category Name ---</option>";
		
		foreach($subsubCategoryfdfdList as $ssv)
		{
			echo '<option value="' . $ssv->subsubcatId . '">' . $ssv->sub_to_sub_category_name . '</option>';
        }
		echo
		"</select>";
	}
	
}

?>