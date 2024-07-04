<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class payment_with_cash extends CI_Controller {
	 static $helper   = array('url', 'websitecustomerlogin_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_cloud', 'M_join'));
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->library('session');
		//$this->load->library(array('cart'));
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('cart');
		isAuthenticate();
		
	}
	
	
	
	public function order_confirm()
	{
	
	    date_default_timezone_set('Asia/Dhaka');
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
		
		$maxmeberid   = $this->M_cloud->basicall('order_info', 'invoice_no desc');
		$str = $maxmeberid->invoice_no + 1;
		if(!empty($maxmeberid)){
		$data1['invoice_no'] = $str;
		} else{
		$data1['invoice_no'] = '1001';	
		}
		
		$Coupon_amount_check = $this->session->userdata('Coupon_amount');
		$CouAmount_type_check = $this->session->userdata('CouAmount_type');
		$Cocou_code_check = $this->session->userdata('cou_coupons_code');
		$data1['coupons_code'] 				= $Cocou_code_check;
		$data1['coupon_type'] 				= $CouAmount_type_check;
		$data1['coupon_amount']     		=  $Coupon_amount_check;
		
		$data1['customer_id']  	  			= $custId;
		$data1['total_amount'] 				= $this->cart->total();
		$data1['subtotal']     				=  $subtotal;
		$data1['delevery_cost']       		= $delevery_cost;
		$data1['status']       				= 'Pending';
		$data1['paymentdate'] 	 			= date('Y-m-d');
		$data1['payment_type'] 	 			= 'Cash';
		$data1['d_name']	 				= $userinfo->d_name;
		$data1['d_email']	 				= $userinfo->d_email;
		$data1['d_phone'] 	 				= $userinfo->d_phone;
		$data1['d_address'] 	 			= $userinfo->d_address;
		$data1['cdate_time']                = date('d-m-Y   h:i:sa ');
		
		
		if(empty($orderCheckinfo)){
		$data1['offer'] 	 			    = $basicinfo->offer;
		} else {
		$data1['offer'] 	 			    = 0;
		}

		$this->db->insert('order_info', $data1);
		$last_id = $this->db->insert_id();
		
		$result = $this->M_cloud->basicall('order_info', 'orId DESC');
		
		 foreach ($this->cart->contents() as $items){ 
			$data2['order_id'] 		= $result->orId;
			$data2['product_id'] 	= $items['id'];
			$data2['buying_price']  = $items['buying_price'];
			$data2['prince'] 		= $items['price'];
			$data2['qun'] 			= $items['qty'];
			$data2['total_amount']  = $items['subtotal'];
			$data2['custId']    	= $custId;

			$this->db->insert('order_details', $data2);
		
			 }
		
		$order_code = $result->coupons_code;
		
		if($result->coupon_type == 'Percentage'){
			
			$protik = '%';
			$order_amount_per = ($result->coupon_amount);
			$Final_order_amount_per = ($result->total_amount*$order_amount_per)/100;
			$SubFinal_order_amount_per = ($result->total_amount-$Final_order_amount_per);
			
			$LastFinal_order_amount_per = ($SubFinal_order_amount_per)+$result->delevery_cost;
	
		} else if($result->coupon_type == 'Fixed Amount'){
			$protik = ' ';
			$order_amount_per = ($result->coupon_amount);
			$Final_order_amount_per = ($result->total_amount-$result->coupon_amount);
			$SubFinal_order_amount_per = ($result->total_amount-$Final_order_amount_per);
			$LastFinal_order_amount_per = ($SubFinal_order_amount_per)+$result->delevery_cost;

			
		} else {
			$protik = ' ';
			$order_amount_per = 0;
			$Final_order_amount_per = ($result->total_amount);
			$SubFinal_order_amount_per = ($result->total_amount);
			$LastFinal_order_amount_per = ($result->total_amount)+$result->delevery_cost;
			
		}
			 
		$de_cost_amount = $result->delevery_cost;
		$de_total   = $result->total_amount + $de_cost_amount;
		$des_amount = ($result->total_amount*$result->offer)/100;
		$dis_minac  = $result->total_amount-$des_amount;
		$dis_minac  = $result->total_amount-$des_amount;
		$grand_total = $dis_minac+$de_cost_amount;
		$current_date_time = date('d/m/Y h:i:s a', time());
		$site_logo =  site_url('').'uploads'.'/'.$basicinfo->proimage;
		
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
    <td height="40" bgcolor="#FFFFFF" style="color:#333333; font-size:16px; font-weight:bold;">&nbsp; 
	<img class="theme_logo"src="'.$site_logo.'">
	</td>
  </tr>
  <tr>
    <td height="30" bgcolor="#f7f7f7" style="color:#333333; font-size:13px; font-weight:bold;">&nbsp; ORDER CONFIRMATION</td>
  </tr>
  <tr>
    <td height="30" bgcolor="#f7f7f7" style="color:#333333; font-size:13px; font-weight:bold;">&nbsp; Order Date Time - ';
								$message .= $current_date_time;
								$message .= '
								</td>
  </tr>
  
  <tr>
    <td height="30" bgcolor="#f7f7f7" style="color:#333333; font-size:13px; font-weight:bold;">&nbsp; Invoice Number - ';
								$message .= $result->invoice_no;
								$message .= '
								</td>
  </tr>
  
  <tr>
    <td><table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" colspan="2" bgcolor="#FFFFFF" style="border-left: 1px solid #DDDDDD;">&nbsp; <strong>Billing Address</strong></td>
    <td height="30" colspan="2" bgcolor="#FFFFFF" style="border-right: 1px solid #DDDDDD;">&nbsp; <strong>Shipping Address</strong></td>
    </tr>
  <tr>
    <td width="70" style="border-left: 1px solid #DDDDDD;">&nbsp; Name</td>
    <td width="330">:&nbsp; ';
								$message .= $customerAddress->signName;
								$message .= '</td>
    <td width="70">&nbsp; Name</td>
    <td width="330" style="border-right: 1px solid #DDDDDD;">:&nbsp; ';
								$message .= $customerAddress->d_name;
								$message .= '</td>
  </tr>
  <tr>
    <td style="border-left: 1px solid #DDDDDD;">&nbsp; Email</td>
    <td>:&nbsp; ';
								$message .= $customerAddress->signEmail;
								$message .= '</td>
    <td>&nbsp; Email</td>
    <td style="border-right: 1px solid #DDDDDD;">:&nbsp; ';
								$message .= $customerAddress->d_email;
								$message .= '</td>
  </tr>
  <tr>
    <td style="border-left: 1px solid #DDDDDD;">&nbsp; Phone</td>
    <td>:&nbsp; ';
								$message .= $customerAddress->signMobile;
								$message .= '</td>
    <td>&nbsp; Phone</td>
    <td style="border-right: 1px solid #DDDDDD;">:&nbsp; ';
								$message .= $customerAddress->d_phone;
								$message .= '</td>
  </tr>
  
  
  <tr>
    <td style="border-left: 1px solid #DDDDDD;">&nbsp; Address</td>
    <td>:&nbsp; ';
								$message .= $customerAddress->address;
								$message .= '</td>
    <td>&nbsp; Address</td>
    <td style="border-right: 1px solid #DDDDDD;">:&nbsp; ';
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
          <td width="261" align="left" valign="middle" style="border-left: 1px solid #DDDDDD;">&nbsp;</td>
          <td width="196" align="center" valign="middle">&nbsp;</td>
          <td width="59" align="center" valign="middle">&nbsp;</td>
          <td width="174" height="25" align="left" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;"> Total Amount</td>
          <td width="100" align="right" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;border-right: 1px solid #DDDDDD;"> '.$total_amount.'  &nbsp;</td>
        </tr>
		
		';  if($order_amount_per > 0){  $message .= '
		<tr>
          <td width="261" align="left" valign="middle" style="border-left: 1px solid #DDDDDD;">&nbsp;</td>
          <td width="196" align="center" valign="middle">&nbsp;</td>
          <td width="59" align="center" valign="middle">&nbsp;</td>
          <td width="174" height="25" align="left" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;">('.$order_code.') Discount '.$protik.'</td>
          <td width="100" align="right" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;border-right: 1px solid #DDDDDD;"> '.$order_amount_per.'  &nbsp;</td>
        </tr>
        '; }  $message .='
		
		<tr>
          <td width="261" align="left" valign="middle" style="border-left: 1px solid #DDDDDD;">&nbsp;</td>
          <td width="196" align="center" valign="middle">&nbsp;</td>
          <td width="59" align="center" valign="middle">&nbsp;</td>
          <td width="174" height="25" align="left" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;"> Sub Total</td>
          <td width="100" align="right" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;border-right: 1px solid #DDDDDD;"> '.$SubFinal_order_amount_per.'  &nbsp;</td>
        </tr>
		
		
		<tr>
          <td width="261" align="left" valign="middle" style="border-left: 1px solid #DDDDDD;">&nbsp;</td>
          <td width="196" align="center" valign="middle">&nbsp;</td>
          <td width="59" align="center" valign="middle">&nbsp;</td>
          <td width="174" height="25" align="left" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;"> Delivery charge</td>
          <td width="100" align="right" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;border-right: 1px solid #DDDDDD;"> '.$delevery_cost.' &nbsp;</td>
        </tr>
		<tr>
          <td width="261" align="left" valign="middle" style="border-left: 1px solid #DDDDDD;">&nbsp;</td>
          <td width="196" align="center" valign="middle">&nbsp;</td>
          <td width="59" align="center" valign="middle">&nbsp;</td>
          <td width="174" height="25" align="left" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;">Grand Total</td>
          <td width="100" align="right" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;border-right: 1px solid #DDDDDD;"> '.$LastFinal_order_amount_per.'  &nbsp;</td>
        </tr>
        ';
        
        $message .= '
        <tr>
          <td align="left" colspan="5" valign="middle" bgcolor="#F7F7F7" style="border-left: 1px solid #DDDDDD;border-right: 1px solid #DDDDDD;">&nbsp;Order Payment Details</td>
        </tr>
		 <tr>
          <td align="left" colspan="5" valign="middle" bgcolor="#F7F7F7" style="border-left: 1px solid #DDDDDD;border-right: 1px solid #DDDDDD;">&nbsp;Order Payment Cash</td>
        </tr>

		<tr>
          <td align="left" colspan="5" valign="middle" bgcolor="#F7F7F7" style="border-left: 1px solid #DDDDDD;border-right: 1px solid #DDDDDD;">&nbsp;Amounts : '.$LastFinal_order_amount_per.'</td>
        </tr>

      </table>
  </tr>
  <tr>
    <td height="50" align="center" valign="middle" bgcolor="#ED1C24"><span style="font-style: italic; font-size: 14px; color: #FFFFFF; text-align:center;">
    <a style="color: #FFFFFF;text-decoration:none;" href="'.$basicinfo->website.'">'.$basicinfo->website.'</a></span></td>
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
				$this->email->cc($basicinfo->eamil);
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->send();
		 
		$this->cart->destroy();
		$this->session->set_userdata(array('cou_coupons_code' => ""));
		$this->session->set_userdata(array('Coupon_amount' => ""));
		$this->session->set_userdata(array('CouAmount_type' => ""));
		$this->session->set_userdata(array('confarm_order' => 'Your order has been successful. Please check your email, your order invoice has been sent.'));
		redirect('order_history');
	
	}
	
	
}
?>