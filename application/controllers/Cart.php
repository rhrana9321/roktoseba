<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart extends CI_Controller {
	 static $helper   = array('url', 'user_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_cloud', 'M_join'));
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->library('session');
		$this->load->library('form_validation');
		 $this->load->library('email');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cart');
		
	}
	
	
	
	public function store()
	{
		
		$wproid 			= $this->input->post('product_id');
		$productdetails = $this->M_cloud->findbyidstock('webproduct_mange_table', array('wproid' => $wproid));
		$quntity_id 			= 1;
		
		$data = array(
				'id'      => $wproid,
				'qty'     => $quntity_id,
				'price'   => $productdetails->product_price,
				'buying_price' => $productdetails->product_discount,
				'procode'  => $productdetails->procode,
				'name'   => $productdetails->product_name,
				'proimg' => $productdetails->proimage
			);
		$this->cart->insert($data);
		$this->load->view('cart_store_htmlPagebn', $data);
		
	}
	
	public function store2()
	{
		
		$wproid 			= $this->input->post('product_id');
		$productdetails = $this->M_cloud->findbyidstock('webproduct_mange_table', array('wproid' => $wproid));
		$quntity_id 			= $this->input->post('qty');
		
		$data = array(
				'id'      => $wproid,
				'qty'     => $quntity_id,
				'price'   => $productdetails->product_price,
				'buying_price' => $productdetails->product_discount,
				'procode'  => $productdetails->procode,
				'name'   => $productdetails->product_name,
				'proimg' => $productdetails->proimage
			);
		$this->cart->insert($data);
		$this->load->view('cart_store_htmlPagebn', $data);
		
	}
	
	
	
	public function cartdelete() {
		$row_id = $this->input->post('row_id');
		$data = array(
			'rowid'   => $row_id,
			'qty'     => 0
		);
		$this->cart->update($data);
		$this->load->view('cart_store_htmlPagebn', $data);
	}
	
	
	
	public function updateCartItem()
	{
		
		$qty  = $this->input->post('quantity');
		$row_id    = $this->input->post('row_id');
		
		$data = array('rowid' => $row_id,
		'qty' => $qty
		);
		
		$this->cart->update($data);
	 $this->load->view('cart_store_htmlPagebn', $data);
	}
	
	
	public function FindCartItemUpdate()
	{
		
		$quantity  			= $this->input->post('quantity');
		$product_id     = $this->input->post('product_id');
		$row_id    		= (md5($product_id)); 
		
		$data = array('rowid' => $row_id,
		'qty' => $quantity
		);
		
		$this->cart->update($data);
	 	$this->load->view('cart_store_htmlPagebn', $data);
	}
	
	
	
	
	public function updateCartItem2()
	{
		$row_id    = $this->input->post('row_id');
		$qty  = $this->input->post('qty');
		
		$data = array( 'rowid' => $row_id,
		'qty' => $qty
		);
		$this->cart->update($data);
		$this->load->view('cart_store_amountPagebn', $data);
	}
	
	
}


?>