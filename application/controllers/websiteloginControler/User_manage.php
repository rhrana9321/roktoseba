<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_manage extends CI_Controller {
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
		
		$data['slider_tablelist'] = $this->M_cloud->subcatproduct('website_adminlogin', array('type' => 'user'), 'webadId asc');
		$data['adminuserinfo']	 = $this->M_cloud->find('superadmin', array('spId' => $auid));
		
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('websiteloginview/User_managePage', $data);
	}
	
	public function store()
	{
		
		$id = $this->input->post('id');
		$data['username']	= $this->input->post('username');
		$data['password']  	= md5($this->input->post('password'));
		$data['re_type_password']  	= $this->input->post('password');
		$data['status']  	= 1;
		$data['type']  		= 'user';
		
		$data['Basic']			= $this->input->post('Basic');
		$data['basic_list']  	= $this->input->post('basic_list');
		$data['basic_edit']		= $this->input->post('basic_edit');

		$data['User']			= $this->input->post('User');
		$data['user_list']  	= $this->input->post('user_list');
		$data['user_add']		= $this->input->post('user_add');
		$data['user_edit']  	= $this->input->post('user_edit');
		$data['user_delete']	= $this->input->post('user_delete');
		
		
		$data['pro_add']			= $this->input->post('pro_add');
		$data['add_add']			= $this->input->post('add_add');
		$data['Add_list']  	= $this->input->post('Add_list');
		$data['Add_edit']		= $this->input->post('Add_edit');
		$data['Add_Delete']  	= $this->input->post('Add_Delete');

		
		
		$data['Slider']			= $this->input->post('Slider');
		$data['slider_list']  	= $this->input->post('slider_list');
		$data['slider_add']		= $this->input->post('slider_add');
		$data['slider_edit']  	= $this->input->post('slider_edit');
		$data['slider_delete']	= $this->input->post('slider_delete');
		
		
		$data['How_to_order']		= $this->input->post('How_to_order');
		$data['How_to_order_list']  = $this->input->post('How_to_order_list');
		$data['How_to_order_add']	= $this->input->post('How_to_order_add');
		$data['How_to_order_edit']  = $this->input->post('How_to_order_edit');
		$data['How_to_order_delete']= $this->input->post('How_to_order_delete');
		
		
		$data['Content']		= $this->input->post('Content');
		$data['Content_list']  	= $this->input->post('Content_list');
		$data['Content_add']	= $this->input->post('Content_add');
		$data['Content_edit']  	= $this->input->post('Content_edit');
		$data['Content_delete']	= $this->input->post('Content_delete');
		
		
		$data['Category']		= $this->input->post('Category');
		$data['Category_list']  = $this->input->post('Category_list');
		$data['Category_add']	= $this->input->post('Category_add');
		$data['Category_edit']  = $this->input->post('Category_edit');
		$data['Category_delete']= $this->input->post('Category_delete');
		
		
		$data['subCategory']		= $this->input->post('subCategory');
		$data['subCategory_list']  	= $this->input->post('subCategory_list');
		$data['subCategory_add']	= $this->input->post('subCategory_add');
		$data['subCategory_edit']  	= $this->input->post('subCategory_edit');
		$data['subCategory_delete']	= $this->input->post('subCategory_delete');
		
		$data['SubsubCategory']		= $this->input->post('SubsubCategory');
		$data['SubsubCategory_list']= $this->input->post('SubsubCategory_list');
		$data['SubsubCategory_add']	= $this->input->post('SubsubCategory_add');
		$data['SubsubCategory_edit'] = $this->input->post('SubsubCategory_edit');
		$data['SubsubCategory_delete']= $this->input->post('SubsubCategory_delete');
		
		
		$data['Product']			= $this->input->post('Product');
		$data['Product_list']  		= $this->input->post('Product_list');
		$data['Product_add']		= $this->input->post('Product_add');
		$data['Product_edit']  		= $this->input->post('Product_edit');
		$data['Product_delete']		= $this->input->post('Product_delete');
		
		
		$data['New_Order']			= $this->input->post('New_Order');
		$data['New_Order_list']  	= $this->input->post('New_Order_list');
		$data['New_Order_edit']		= $this->input->post('New_Order_edit');
		$data['New_Order_delete']  	= $this->input->post('New_Order_delete');
		$data['New_Order_view']		= $this->input->post('New_Order_view');
		
		
		$data['Coupons']			= $this->input->post('Coupons');
		$data['Coupons_list']  		= $this->input->post('Coupons_list');
		$data['Coupons_add']		= $this->input->post('Coupons_add');
		$data['Coupons_edit']  		= $this->input->post('Coupons_edit');
		$data['Coupons_delete']		= $this->input->post('Coupons_delete');
		
		
		$data['Order_Confirm']			= $this->input->post('Order_Confirm');
		$data['Order_Confirm_list']  	= $this->input->post('Order_Confirm_list');
		$data['Order_Confirm_View']		= $this->input->post('Order_Confirm_View');
		$data['Order_Confirm_delete']  	= $this->input->post('Order_Confirm_delete');
		
		
		$data['Order_Completed']		= $this->input->post('Order_Completed');
		$data['Order_Completed_list']  	= $this->input->post('Order_Completed_list');
		$data['Order_Completed_View']	= $this->input->post('Order_Completed_View');
		$data['Order_Completed_delete'] = $this->input->post('Order_Completed_delete');
		
		$data['Register']			= $this->input->post('Register');
		$data['Register_list']  	= $this->input->post('Register_list');
		$data['Register_delete']	= $this->input->post('Register_delete');
		
		
		
		
		$agimage 			= $this->input->post('agImage');


		if(!empty($id)){
			
			if(!empty($agimage)){
				
				$imageunl = $this->M_cloud->find('website_adminlogin', array('webadId' => $id));
				
				if(!empty($imageunl->proimage)){
					unlink('uploads/'.$imageunl->proimage);
				}
				
				$data['proimage'] = $agimage;
				
			}
			
		$this->db->update('website_adminlogin', $data, array('webadId' => $id));
					
		} else {
			
			if(!empty($agimage)){
			$data['proimage'] = $agimage;
			}
			
			$this->db->insert('website_adminlogin', $data);
		}
		
		redirect('websiteloginControler/User_manage');
	}
	
	
	
	public function update()
	{
		
		$id = $this->input->post('id');
		$result = $this->M_cloud->find('website_adminlogin', array('webadId' => $id));
		echo json_encode($result);
	}
		
	public function delete($webadId)
	{
		$where = array('webadId' => $webadId);
		$result 	= $this->M_cloud->tbWhRow('website_adminlogin', $where);
		$this->M_cloud->destroyAll('website_adminlogin', $where);
		
		redirect('websiteloginControler/User_manage');
	}
	
		
	
}

?>