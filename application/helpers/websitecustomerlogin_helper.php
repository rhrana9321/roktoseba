<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('websiteadmin')) 
{
	function websiteadmin()
	{
		$_CI = &get_instance();
		
		$userid		 	 = $_CI->input->post('email');
		$UserPass		 = $_CI->input->post('password');
		$pass_md5		 = md5($UserPass);
		
		
		
		
		$rows = $_CI->cart->contents();
		
		$UserDetails	 = $_CI->M_cloud->find('signup_user', array('signMobile'=>$userid));
		
		
		
		
		if( !empty($UserDetails) && $UserDetails->password == $pass_md5){
			
			$auid 		= $UserDetails->signId;
			$usertype 	= $UserDetails->signMobile;
			setUserData($auid, $usertype);
			
			if(!empty($rows)){
				redirect('Bulid_and_shipping');
			}else{
			    redirect('dashboard');
			}
		 
		} else {
			$_CI->session->set_userdata(array('invalidUser' => 'Incorrect User and Password!'));
			redirect('Sign_in');
		}
		
		
		
	}
}


// TO SET DATA IN UserName SESSION FIELD
if ( ! function_exists('setUserData'))
{
	function setUserData($auid, $usertype)
	{
		$_CI = &get_instance();
		$userData	= array(
			'websitecusId'    	=> $auid, 'usertype' => $usertype
		);
		$_CI->session->set_userdata($userData);
	}
}



if ( ! function_exists('getUserName'))
{
	function getUserName()
	{
		$_CI = &get_instance();
		return $_CI->session->userdata('websitecusId');
	}
}


if ( ! function_exists('invalidUserData'))
{
	function invalidUserData()
	{
		setUserData(NULL,NULL);
	}
}


if ( ! function_exists('isActiveUser'))
{
	function isActiveUser()
	{
		return getUserName() != NULL;
	}
}



if ( ! function_exists('isAuthenticate'))
{
	function isAuthenticate()
	{
		if(!isActiveUser()) {
			redirect('Sign_in');	
		} else {
			return true;	
		}
	}
}





if ( ! function_exists('logoutUser'))
{

		

	function logoutUser()
	{
		invalidUserData();
		if(!isActiveUser()){
			redirect('Sign_in');
		}
	}
	
	

}


// ------------------------------------------------------------------------
/* End of file authentication_helper.php */
/* Location: ./application/helpers/authentication_helper.php */