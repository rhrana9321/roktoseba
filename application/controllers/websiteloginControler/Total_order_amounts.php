<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Total_order_amounts extends CI_Controller {
	 static $helper   = array('url', 'websitelogin_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('m_websiteadmin', 'M_cloud', 'M_join'));
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('cart');
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
		
		$data['neworderlist'] = $this->M_cloud->findAll('order_info', 'orId desc');
		
		$data['adminuserinfo']	 = $this->M_cloud->find('superadmin', array('spId' => $auid));
		
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('websiteloginview/Total_order_amountsPage', $data);
	}
	
	
	public function New_Confirm()
	{
		$auid   	 = $this->session->userdata('websiteloginid');
		$data['usertype']    = $this->session->userdata('usertype');
		$data['success']     = $this->session->userdata('msg');
		$data['baseinformation'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$data['neworderlist'] = $this->M_cloud->findReportorder('order_info', array('status' => 'Confirm'), 'orId desc');
		$data['adminuserinfo']	 = $this->M_cloud->find('superadmin', array('spId' => $auid));
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('websiteloginview/New_ConfirmPage', $data);
	}
	
	
	public function Invoice_details($orId)
	{
		
		$data['baseinformation'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$data['orderinfo']  		= $this->M_cloud->find('order_info', array('orId' => $orId));
		$data['invuserinfo']  		= $this->M_cloud->find('signup_user', array('signId' => $data['orderinfo']->customer_id));
		$data['orderdeatisl'] 		= $this->M_join->orderDetails(array('order_id' => $orId));
		
		$this->load->view('websiteloginview/Invoice_details_Page', $data);
	}
	
	
	public function Invoice_edit($orId)
	{
		
		$data['baseinformation'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$data['product_tablelist'] = $this->M_cloud->findAll('webproduct_mange_table', 'wproid desc');
		$data['orderinfo']  		= $this->M_cloud->find('order_info', array('orId' => $orId));
		$data['orId'] = $orId;
		
		
		$orderdetailsinfo  		= $this->M_cloud->subcatproduct('order_details', array('order_id' => $orId), 'order_details_id asc');
		
		foreach($orderdetailsinfo as $v) {
			$data = array(
					'id'      => $v->product_id,
					'qty'     => $v->qun,
					'price'   =>  $v->prince,
					'buying_price'   =>  $v->prince,
					'name'    => abc
				);
			$this->cart->insert($data);
			$this->M_cloud->destroyAll('order_details', array('order_id' => $orId));
		}
		$data['baseinformation'] = $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$data['product_tablelist'] = $this->M_cloud->findAll('webproduct_mange_table', 'wproid desc');
		$data['orderinfo']  		= $this->M_cloud->find('order_info', array('orId' => $orId));
		$data['orId'] = $orId;
		
		$this->load->view('websiteloginview/Invoice_edit_Page', $data);
	}
	
	
	public function cartstore()
	{
		$wproid 			= $this->input->post('pro_id');
		$productdetails = $this->M_cloud->findbyidstock('webproduct_mange_table', array('wproid' => $wproid));
		$quntity_id 			= 1;
		$data = array(
				'id'      => $wproid,
				'qty'     => 1,
				'price'   => $productdetails->product_price,
				'buying_price'   => $productdetails->product_discount,
				'procode'    		=> $productdetails->procode,
				'name'    => 'abc',
			);
		$this->cart->insert($data);
	}
	
	
	public function updateCartItem()
	{
		$qty  = $this->input->post('qty');
		$row_id    = $this->input->post('row_id');
		
		$data = array( 'rowid' => $row_id,
		'qty' => $qty
		);
		
		$this->cart->update($data);
	}
	
	public function cartdelete() {
		$itemid = $this->input->post('itemid');
		$data = array(
			'rowid'   => $itemid,
			'qty'     => 0
		);
		$this->cart->update($data);
	}
	
	public function order_confirm()
	{
	
	   
		$order_id = $this->input->post('order_id');
		$customer_id = $this->input->post('customer_id');
		$basicinfo			= $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		
		$orderinfo  		= $this->M_cloud->find('order_info', array('orId' => $order_id));
		$shoping_amount = $this->cart->total();
		if($shoping_amount >= $basicinfo->delevery_free_limit){
		$delevery_cost = 0;
		} else {
		$delevery_cost = $basicinfo->delevery_charge;
		}
		$subtotal = $shoping_amount + $delevery_cost;
		$data1['total_amount'] 				= $this->cart->total();
		$data1['subtotal']     				=  $subtotal;
		$this->db->update('order_info', $data1, array('orId' => $order_id));
		
		
		
		 foreach ($this->cart->contents() as $items){ 
			$data2['order_id'] 		= $order_id;
			$data2['product_id'] 	= $items['id'];
			$data2['buying_price']  = $items['buying_price'];
			$data2['prince'] 		= $items['price'];
			$data2['qun'] 			= $items['qty'];
			$data2['total_amount']  = $items['subtotal'];
			$data2['custId']    	= $customer_id;
			$this->db->insert('order_details', $data2);
			 }
			 
		
		 	
		
		$this->cart->destroy();
		$this->session->set_userdata(array('confarm_order' => 'Your order has been successful. Please check your email, your order invoice has been sent.'));
		redirect('websiteloginControler/new_order');
	}
	
	public function delete($orId)
	{
		$where = array('orId' => $orId);
		$result 	= $this->M_cloud->tbWhRow('order_info', $where);
		$this->M_cloud->destroyAll('order_info', $where);
		
		redirect('websiteloginControler/new_order');
	}
	
	public function Confarm_order($orId)
	{
		$where = array('orId' => $orId);
		$result 	= $this->M_cloud->tbWhRow('order_info', $where);
		$this->M_cloud->destroyAll('order_info', $where);
		
		redirect('websiteloginControler/new_order/New_Confirm');
	}
	
	public function Complete_order($orId)
	{
		$where = array('orId' => $orId);
		$result 	= $this->M_cloud->tbWhRow('order_info', $where);
		$this->M_cloud->destroyAll('order_info', $where);
		
		redirect('websiteloginControler/order_completed');
	}
	
	
	
	public function webordersuccUpdate()
	{
	
	    $status  = $this->input->post('status');
	    $orId = $this->input->post('orId');
		$result 	= $this->M_cloud->tbWhRow('order_info', array('orId' => $orId));
	    $email  = $this->input->post('d_email');
		
    	if($status == 'Cancel'){
            $data['status']  = $this->input->post('status');
            $this->db->update('order_info', $data, array('orId' => $orId));
		    redirect('websiteloginControler/new_order'); 
    	} else if($status == 'Confirm'){
            $data['status']  = $this->input->post('status');
			$order_number			= $result->orId; 
    		$mobile = 88 .$result->d_phone;
			$text_place = 'has%20been%20successfully%20placed.'; 
			$text_space = '%20';
    		$text = 'Your%20order%20number:-'.$order_number .$text_space. $text_place;
    		$response = file_get_contents('https://api.mobireach.com.bd/SendTextMessage?Username=Bazar24&Password=Dhaka@2021&From=8801844502926&To='.$mobile.'&Message='.$text.'');
            $this->db->update('order_info', $data, array('orId' => $orId));
		    redirect('websiteloginControler/new_order');  
    	} else if($status == 'Pending'){
            $data['status']  = $this->input->post('status');
			$order_number			= $result->orId; 
            $this->db->update('order_info', $data, array('orId' => $orId));
		    redirect('websiteloginControler/new_order');  
    	} else if($status == 'Completed'){ 
			$data['status']  = $this->input->post('status');
			$order_number			= $result->orId;
            $this->db->update('order_info', $data, array('orId' => $orId));
		    redirect('websiteloginControler/new_order');  
		
		}
    
	}
	
}

?>