<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_with_online extends CI_Controller {
	 static $helper   = array('url', 'websitecustomerlogin_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_cloud', 'M_join'));
		$this->load->helper('sslc_helper');
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->library('session');
		$this->load->library('Sslcommerz');
		//$this->load->library(array('cart'));
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cart');
		isAuthenticate();
		
	}
	
	
	
	public function request_api_hosted()
	{
		$this->load->helper('sslc_helper');
		$City_list          = $this->session->userdata('City_list');
		$Area_list          = $this->session->userdata('Area_list');
		$custId 			 = $this->session->userdata('websitecusId');
		$usertype 			 = $this->session->userdata('usertype');
		
		$userinfo	= $this->M_cloud->find('signup_user', array('signId' => $custId));
		$basicinfo			= $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
		$orderCheckinfo	= $this->M_cloud->find('order_info', array('customer_id' => $custId));
		
	    $shoping_amount = $this->cart->total();
		if($shoping_amount >= $basicinfo->delevery_free_limit){
		$delevery_cost = 0;
		} else {
		$delevery_cost = $basicinfo->delevery_charge;
		}
		$subtotal = $shoping_amount + $delevery_cost;
		
		
		
		if($this->input->get_post('placeorder'))
		{
			$post_data = array();
			$post_data['total_amount'] = $subtotal;
			$post_data['currency'] = "BDT";
			$post_data['tran_id'] = "SSLC".uniqid();
			$post_data['success_url'] = base_url()."success";
			$post_data['fail_url'] = base_url()."fail";
			$post_data['cancel_url'] = base_url()."cancel";
			$post_data['ipn_url'] = base_url()."ipn";
			# $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

			# EMI INFO
			// $post_data['emi_option'] = "1";
			// $post_data['emi_max_inst_option'] = "9";
			// $post_data['emi_selected_inst'] = "9";

			# CUSTOMER INFORMATION
			# CUSTOMER INFORMATION
			$post_data['cus_name'] = 'saiful';
			$post_data['cus_email'] = 'saifulbd943@mail.com';
			$post_data['cus_add1'] = 'Dhaka';
			$post_data['cus_city'] = 'Dhaka';
			$post_data['cus_state'] = 'Dhaka';
			$post_data['cus_postcode'] = '1100';
			$post_data['cus_country'] = 'bangladesh';
			$post_data['cus_phone'] = '01853951775';

			# SHIPMENT INFORMATION
			$post_data['ship_name'] = 'saiful';
			$post_data['ship_add1'] = 'Dhaka';
			$post_data['ship_city'] = 'Dhaka';
			$post_data['ship_state'] = 'Dhaka';
			$post_data['ship_postcode'] = '1100';
			$post_data['ship_country'] = 'bangladesh';

			# OPTIONAL PARAMETERS
			$post_data['value_a'] = "ref001";
			$post_data['value_b'] = "ref002";
			$post_data['value_c'] = "ref003";
			$post_data['value_d'] = "ref004";

			$post_data['product_profile'] = "physical-goods";
			$post_data['shipping_method'] = "YES";
			$post_data['num_of_item'] = "3";
			$post_data['product_name'] = "Computer,Speaker";
			$post_data['product_category'] = "Ecommerce";

			$this->load->library('session');

			$session = array(
				'tran_id' => $post_data['tran_id'],
				'amount' => $post_data['total_amount'],
				'currency' => $post_data['currency']
			);
			$this->session->set_userdata('tarndata', $session);

			//echo "<pre>";
			//print_r($post_data);
			if($this->sslcommerz->RequestToSSLC($post_data, SSLCZ_STORE_ID, SSLCZ_STORE_PASSWD))
			{
				echo "Pending";
				/***************************************
				# Change your database status to Pending.
				****************************************/
			}
		}
	}

	public function easycheckout_endpoint()
	{
		$tran_id = $_REQUEST['order'];
		$jsondata = json_decode($_REQUEST['cart_json'], true);

		$post_data = array();
		$post_data['total_amount'] = $jsondata['amount'];
		$post_data['currency'] = "USD";
		$post_data['tran_id'] = $tran_id;
		$post_data['success_url'] = base_url()."success";
		$post_data['fail_url'] = base_url()."fail";
		$post_data['cancel_url'] = base_url()."cancel";
		$post_data['ipn_url'] = base_url()."ipn";
		# $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

		# EMI INFO
		// $post_data['emi_option'] = "1";
		// $post_data['emi_max_inst_option'] = "9";
		// $post_data['emi_selected_inst'] = "9";

		# CUSTOMER INFORMATION
		$post_data['cus_name'] = $jsondata['cus_name'];
		$post_data['cus_email'] = $jsondata['email'];
		$post_data['cus_add1'] = $jsondata['address'];
		$post_data['cus_city'] = $jsondata['state'];
		$post_data['cus_state'] = $jsondata['state'];
		$post_data['cus_postcode'] = $jsondata['amount'];
		$post_data['cus_country'] = $jsondata['zip'];
		$post_data['cus_phone'] = $jsondata['phone'];

		# SHIPMENT INFORMATION
		$post_data['ship_name'] = $jsondata['cus_name'];
		$post_data['ship_add1'] = $jsondata['address'];
		$post_data['ship_city'] = $jsondata['state'];
		$post_data['ship_state'] = $jsondata['state'];
		$post_data['ship_postcode'] = $jsondata['zip'];
		$post_data['ship_country'] = $jsondata['country'];

		# OPTIONAL PARAMETERS
		$post_data['value_a'] = "ref001";
		$post_data['value_b'] = "ref002";
		$post_data['value_c'] = "ref003";
		$post_data['value_d'] = "ref004";

		$post_data['product_profile'] = "physical-goods";
		$post_data['shipping_method'] = "YES";
		$post_data['num_of_item'] = "3";
		$post_data['product_name'] = "Computer,Speaker";
		$post_data['product_category'] = "Ecommerce";

		$this->load->library('session');

		$session = array(
			'tran_id' => $post_data['tran_id'],
			'amount' => $post_data['total_amount'],
			'currency' => $post_data['currency']
		);
		$this->session->set_userdata('tarndata', $session);

		// echo "<pre>";
		// print_r($post_data);
		if($this->sslcommerz->EasyCheckout($post_data, SSLCZ_STORE_ID, SSLCZ_STORE_PASSWD))
		{
			echo "Pending";
			/***************************************
			# Change your database status to Pending.
			****************************************/
		}
	}

	public function success_payment()
	{
		$database_order_status = 'Pending'; // Check this from your database here Pending is dummy data,
		$sesdata = $this->session->userdata('tarndata');

		if(($sesdata['tran_id'] == $_POST['tran_id']) && ($sesdata['amount'] == $_POST['currency_amount']) && ($sesdata['currency'] == 'BDT'))
		{
			if($this->sslcommerz->ValidateResponse($_POST['currency_amount'], $sesdata['currency'], $_POST))
			{
				if($database_order_status == 'Pending')
				{
					/*****************************************************************************
					# Change your database status to Processing & You can redirect to success page from here
					******************************************************************************/
					
					$City_list          = $this->session->userdata('City_list');
					$Area_list          = $this->session->userdata('Area_list');
					$custId 			 = $this->session->userdata('websitecusId');
					$usertype 			 = $this->session->userdata('usertype');
					
					$userinfo	= $this->M_cloud->find('signup_user', array('signId' => $custId));
					$basicinfo			= $this->M_cloud->basicall('websitebasic_manage', 'bsId desc');
					$orderCheckinfo	= $this->M_cloud->find('order_info', array('customer_id' => $custId));
					
					$shoping_amount = $this->cart->total();
					if($shoping_amount >= $basicinfo->delevery_free_limit){
					$delevery_cost = 0;
					} else {
					$delevery_cost = $basicinfo->delevery_charge;
					}
					$subtotal = $shoping_amount + $delevery_cost;
					
					$data1['customer_id']  	  			= $custId;
					$maxmeberid   = $this->M_cloud->basicall('order_info', 'invoice_no desc');
            		$str = $maxmeberid->invoice_no + 1;
            		if(!empty($maxmeberid)){
            		$data1['invoice_no'] = $str;
            		} else{
            		$data1['invoice_no'] = '1001';	
            		}
					$data1['total_amount'] 				= $this->cart->total();
					$data1['subtotal']     				=  $subtotal;
					$data1['delevery_cost']       		= $delevery_cost;
					$data1['status']       				= 'Pending';
					$data1['TxID']	 					= $_POST['tran_id'];
					$data1['val_id']	 				= $_POST['val_id'];
					$data1['card_type']	 				= $_POST['card_type'];
					$data1['card_no']	 				= $_POST['card_no'];
					$data1['bank_tran_id']	 			= $_POST['bank_tran_id'];
					$data1['card_issuer']	 			= $_POST['card_issuer'];
					$data1['card_brand']	 			= $_POST['card_brand'];
					$data1['paymentdate'] 	 			= date('Y-m-d');
					$data1['payment_type'] 	 			= 'Online_payment';
					$data1['d_name']	 				= $userinfo->d_name;
					$data1['d_email']	 				= $userinfo->d_email;
					$data1['d_phone'] 	 				= $userinfo->d_phone;
					$data1['d_address'] 	 			= $userinfo->d_address;
					$data1['delevery_time']             = $userinfo->delevery_time;
					$data1['delevery_day']             = $userinfo->delevery_day;
					$data1['cdate_time']                = date('d-m-Y   h:i:sa ');
					
					if(empty($orderCheckinfo)){
					$data1['offer'] 	 			    = $basicinfo->offer;
					} else {
					$data1['offer'] 	 			    = 0;
					}
					
					$this->db->insert('order_info', $data1);
					$order_id_last = $this->db->insert_id();
					//$result = $this->M_cloud->basicall('order_info', 'orId DESC');
					
					 foreach ($this->cart->contents() as $items){ 
						$data2['order_id'] 		= $order_id_last;
						$data2['product_id'] 	= $items['id'];
						$data2['buying_price']  = $items['buying_price'];
						$data2['prince'] 		= $items['price'];
						$data2['qun'] 			= $items['qty'];
						$data2['total_amount']  = $items['subtotal'];
						$data2['custId']    	= $custId;
						$this->db->insert('order_details', $data2);
					}
					
					$de_cost_amount = $result->delevery_cost;
		$de_total   = $result->total_amount + $de_cost_amount;
		$des_amount = ($result->total_amount*$result->offer)/100;
		$dis_minac  = $result->total_amount-$des_amount;
		$dis_minac  = $result->total_amount-$des_amount;
		$grand_total = $dis_minac+$de_cost_amount;
            			$customerAddress = $this->M_cloud->find('signup_user', array('signId' => $custId));
            		    $cusEmail = $customerAddress->d_email;
            			$senderEmail 	 = $basicinfo->eamil;
            			$senderName 	 = $basicinfo->companyName;
            			$subject 		 = 'Customer Order Confirmation';
            			$mobile_number = 88 .$data1['d_phone'];
            $text = 'Welcome%20to%20Bazar24-7,Your%20order%20has%20been%20successful.';
            	$response = file_get_contents('https://api.mobireach.com.bd/SendTextMessage?Username=Bazar24&Password=Dhaka@2021&From=8801844502926&To='.$mobile_number.'&Message='.$text.'');
            			
            			$message = '<table width="800" align="center" cellpadding="0" cellspacing="0" style="background:#FFF">
  <tr>
    <td height="50" align="center" valign="middle" bgcolor="#000000"><span style="font-style: italic; font-size: 28px; color: #FFFFFF; text-align:center;">BAZAR 24-7</span></td>
  </tr>
  <tr>
    <td height="40" bgcolor="#CCCCCC" style="color:#333333; font-size:16px; font-weight:bold;">&nbsp; ORDER CONFIRMATION</td>
  </tr>
  <tr>
    <td height="40" bgcolor="#CCCCCC" style="color:#333333; font-size:16px; font-weight:bold;">&nbsp; Order Number-';
								$message .= $result->orId;
								$message .= '
								</td>
  </tr>
  
  <tr>
    <td height="40" bgcolor="#CCCCCC" style="color:#333333; font-size:16px; font-weight:bold;">&nbsp; Invoice Number-';
								$message .= $result->invoice_no;
								$message .= '
								</td>
  </tr>
  
  <tr>
    <td><table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" colspan="2" bgcolor="#f7f7f7">&nbsp; <strong>Billing Address</strong></td>
    <td height="30" colspan="2" bgcolor="#f7f7f7">&nbsp; <strong>Shipping Address</strong></td>
    </tr>
  <tr>
    <td width="70">&nbsp; Name</td>
    <td width="330">:&nbsp; ';
								$message .= $customerAddress->signName;
								$message .= '</td>
    <td width="70">&nbsp; Name</td>
    <td width="330">:&nbsp; ';
								$message .= $customerAddress->d_name;
								$message .= '</td>
  </tr>
  <tr>
    <td>&nbsp; Email</td>
    <td>:&nbsp; ';
								$message .= $customerAddress->signEmail;
								$message .= '</td>
    <td>&nbsp; Email</td>
    <td>:&nbsp; ';
								$message .= $customerAddress->d_email;
								$message .= '</td>
  </tr>
  <tr>
    <td>&nbsp; Phone</td>
    <td>:&nbsp; ';
								$message .= $customerAddress->signMobile;
								$message .= '</td>
    <td>&nbsp; Phone</td>
    <td>:&nbsp; ';
								$message .= $customerAddress->d_phone;
								$message .= '</td>
  </tr>
  
  <tr>
    <td>&nbsp; City</td>
    <td>:&nbsp; ';
								$message .= $City_list;
								$message .= '</td>
    <td>&nbsp; City</td>
    <td>:&nbsp; ';
								$message .= $City_list;
								$message .= '</td>
  </tr>
  
  <tr>
    <td>&nbsp; Area</td>
    <td>:&nbsp; ';
								$message .= $Area_list;
								$message .= '</td>
    <td>&nbsp; Area</td>
    <td>:&nbsp; ';
								$message .= $Area_list;
								$message .= '</td>
  </tr>
  
  <tr>
    <td>&nbsp; Address</td>
    <td>:&nbsp; ';
								$message .= $customerAddress->address;
								$message .= '</td>
    <td>&nbsp; Address</td>
    <td>:&nbsp; ';
								$message .= $customerAddress->d_address;
								$message .= '</td>
  </tr>
  
  
</table>
</td>
  </tr>
  <tr>   
    <td align="center" valign="top"><table width="800" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#dddddd" style="border-radius:0px; padding:0px; margin-top:5px">
        <tr>
          <td height="40" colspan="5" align="center" valign="middle" bgcolor="#dddddd" style="color:#003; font-size:18px; font-family:Comic Sans MS, cursive">Your Shopping Cart Details</td>
        </tr>
        <tr>
          <td height="30" align="left" valign="middle" bgcolor="#f6f6f6"><span style="font-size:14px">&nbsp;Products Name</span></td>
          <td width="120" height="30" align="left" valign="middle" bgcolor="#f6f6f6"><span style="font-size:14px">&nbsp;Code</span></td>
         
          <td width="71" height="30" align="left" valign="middle" bgcolor="#f6f6f6"><span style="font-size:14px">&nbsp;Qty</span></td>
          <td width="100" height="30" align="left" valign="middle" bgcolor="#f6f6f6"><span style="font-size:14px">&nbsp;Unit Price</span></td>
          <td width="100" height="30" align="right" valign="middle" bgcolor="#f6f6f6"><span style="font-size:14px">Total &nbsp;</span></td>
        </tr>
        ';
        
        
        $grandtotal = $this->cart->total();
        $total_amount = $this->cart->total();
       
        foreach ($this->cart->contents() as $items){ 
        $message .= '
        <tr>
          <td width="290" height="30" align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;<span style="font-size:13px;">';
            $message .= $items['name'];
          $message .= '</span></td>
          <td height="30" align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;<span style="font-size:13px;">';
            $message .= $items['procode'];
            $message .= '</span></td>
         
          <td height="30" align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;<span style="font-size:13px;">';
            $message .= $items['qty'];
            $message .= '</span></td>
          <td height="30" align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;<span style="font-size:13px;">';
            $message .= $items['price'];
            $message .= '</span></td>
          <td height="30" align="right" valign="middle" bgcolor="#FFFFFF"><span style="font-size:13px;">';
            $message .= $items['subtotal'];
          $message .= '</span> &nbsp;</td>
        </tr>
        ';
        }
        
        $message .= '
      </table>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="800" border="0" align="center" cellpadding="1" cellspacing="0">
        
		
		
        <tr>
          <td width="261" align="left" valign="middle">&nbsp;</td>
          <td width="196" align="center" valign="middle">&nbsp;</td>
          <td width="59" align="center" valign="middle">&nbsp;</td>
          <td width="174" height="25" align="left" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;"> Total Amount</td>
          <td width="100" align="right" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;"> '.$total_amount.'  &nbsp;</td>
        </tr>
		
		';  if($des_amount > 0){  $message .= '
		<tr>
          <td width="261" align="left" valign="middle">&nbsp;</td>
          <td width="196" align="center" valign="middle">&nbsp;</td>
          <td width="59" align="center" valign="middle">&nbsp;</td>
          <td width="174" height="25" align="left" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;"> Discount</td>
          <td width="100" align="right" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;"> '.$des_amount.'  &nbsp;</td>
        </tr>
        '; }  $message .='
		
		<tr>
          <td width="261" align="left" valign="middle">&nbsp;</td>
          <td width="196" align="center" valign="middle">&nbsp;</td>
          <td width="59" align="center" valign="middle">&nbsp;</td>
          <td width="174" height="25" align="left" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;"> Sub Total</td>
          <td width="100" align="right" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;"> '.$dis_minac.'  &nbsp;</td>
        </tr>
		
		
		<tr>
          <td width="261" align="left" valign="middle">&nbsp;</td>
          <td width="196" align="center" valign="middle">&nbsp;</td>
          <td width="59" align="center" valign="middle">&nbsp;</td>
          <td width="174" height="25" align="left" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;"> Delivery charge</td>
          <td width="100" align="right" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;"> '.$delevery_cost.' &nbsp;</td>
        </tr>
		<tr>
          <td width="261" align="left" valign="middle">&nbsp;</td>
          <td width="196" align="center" valign="middle">&nbsp;</td>
          <td width="59" align="center" valign="middle">&nbsp;</td>
          <td width="174" height="25" align="left" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;">Grand Total</td>
          <td width="100" align="right" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;"> '.$grand_total.'  &nbsp;</td>
        </tr>
        ';
        
        $message .= '
        <tr>
          <td align="left" valign="middle">&nbsp;</td>
          <td align="center" valign="middle">&nbsp;</td>
          <td align="center" valign="middle">&nbsp;</td>
          <td height="20" align="left" valign="middle">&nbsp;</td>
          <td align="right" valign="middle">&nbsp;</td>
        </tr>
      </table>
  </tr>
  <tr>
    <td height="50" align="center" valign="middle" bgcolor="#000000"><span style="font-style: italic; font-size: 14px; color: #FFFFFF; text-align:center;">
    <a href="http://bazar24-7/">www.bazar24-7.com </a></span></td>
  </tr>
</table>';
            			
            			$config = array(
            			'mailtype' => 'html',
            			'charset'  => 'utf-8',
            			'priority' => '1'
            			);
            			$this->email->initialize($config);	
            			$this->email->from($senderEmail, $senderName);
            			$this->email->to($cusEmail);
            			$this->email->cc('info@bazar24-7.com');
            			$this->email->subject($subject);
            			$this->email->message($message);
            			$this->email->send(); 
					
					
					
					$this->cart->destroy();
					$this->session->set_userdata(array('City_list' => $data1['d_city']));
					$this->session->set_userdata(array('Area_list' => $data1['d_area']));
					$this->session->set_userdata(array('confarm_order' => 'Your order has been successful. Please check your email, your order invoice has been sent.'));
					redirect('order_history');			
					
				}
				else
				{
					/******************************************************************
					# Just redirect to your success page status already changed by IPN.
					******************************************************************/
					echo "Just redirect to your success page";
				}
			}
		}
	}
	public function fail_payment()
	{
		$database_order_status = 'Pending'; // Check this from your database here Pending is dummy data,
		if($database_order_status == 'Pending')
		{
			/*****************************************************************************
			# Change your database status to FAILED & You can redirect to failed page from here
			******************************************************************************/
				redirect('Order_history/Fail');
		}
		else
		{
			/******************************************************************
			# Just redirect to your success page status already changed by IPN.
			******************************************************************/
			echo "Just redirect to your failed page";
		}	
	}
	public function cancel_payment()
	{
		$database_order_status = 'Pending'; // Check this from your database here Pending is dummy data,
		if($database_order_status == 'Pending')
		{
			/*****************************************************************************
			# Change your database status to CANCELLED & You can redirect to cancelled page from here
			******************************************************************************/
			redirect('Order_history/Cancel');
		}
		else
		{
			/******************************************************************
			# Just redirect to your cancelled page status already changed by IPN.
			******************************************************************/
			echo "Just redirect to your failed page";
		}
	}
	public function ipn_listener()
	{
		$database_order_status = 'Pending'; // Check this from your database here Pending is dummy data,
		$store_passwd = SSLCZ_STORE_PASSWD;
		if($ipn = $this->sslcommerz->ipn_request($store_passwd, $_POST))
		{
			if(($ipn['gateway_return']['status'] == 'VALIDATED' || $ipn['gateway_return']['status'] == 'VALID') && $ipn['ipn_result']['hash_validation_status'] == 'SUCCESS')
			{
				if($database_order_status == 'Pending')
				{
					echo $ipn['gateway_return']['status']."<br>";
					echo $ipn['ipn_result']['hash_validation_status']."<br>";
					/*****************************************************************************
					# Check your database order status, if status = 'Pending' then chang status to 'Processing'.
					******************************************************************************/
				}
			}
			elseif($ipn['gateway_return']['status'] == 'FAILED' && $ipn['ipn_result']['hash_validation_status'] == 'SUCCESS')
			{
				if($database_order_status == 'Pending')
				{
					echo $ipn['gateway_return']['status']."<br>";
					echo $ipn['ipn_result']['hash_validation_status']."<br>";
					/*****************************************************************************
					# Check your database order status, if status = 'Pending' then chang status to 'FAILED'.
					******************************************************************************/
				}
			}
			elseif ($ipn['gateway_return']['status'] == 'CANCELLED' && $ipn['ipn_result']['hash_validation_status'] == 'SUCCESS') 
			{
				if($database_order_status == 'Pending')
				{
					echo $ipn['gateway_return']['status']."<br>";
					echo $ipn['ipn_result']['hash_validation_status']."<br>";
					/*****************************************************************************
					# Check your database order status, if status = 'Pending' then chang status to 'CANCELLED'.
					******************************************************************************/
				}
			}
			else
			{
				if($database_order_status == 'Pending')
				{
					echo "Order status not ".$ipn['gateway_return']['status'];
					/*****************************************************************************
					# Check your database order status, if status = 'Pending' then chang status to 'FAILED'.
					******************************************************************************/
				}
			}
			echo "<pre>";
			print_r($ipn);
		}
	}
	
	
}
?>