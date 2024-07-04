<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('webloadmin')) 
{
	function webloadmin()
	{
		$_CI = &get_instance();
		
		$userid		 	 = $_CI->input->post('username');
		$UserPass		 = $_CI->input->post('password');
	
		$pass_md5		 = md5($UserPass);
		
		 $UserDetails	 = $_CI->m_websiteadmin->findBymanageName(array('username'=>$userid));
		
		if( !empty($UserDetails) && $UserDetails->password == $pass_md5){
			
			$auid = $UserDetails->webadId;
			$usertype = $UserDetails->username;
			
			setUserData($auid, $usertype);
			redirect('websiteloginControler/dashboard');
		 
		} else {
			$_CI->session->set_userdata(array('invalidUser' => 'Username and password does not match!'));
			redirect('websitelogin');
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
			'websiteloginid'    	=> $auid, 'usertype' => $usertype
		);
		$_CI->session->set_userdata($userData);
	}
}



if ( ! function_exists('getUserName'))
{
	function getUserName()
	{
		$_CI = &get_instance();
		return $_CI->session->userdata('websiteloginid');
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
			redirect('websitelogin');	
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
			redirect('websitelogin');
		}
	}
	
	

}


// ------------------------------------------------------------------------
/* End of file authentication_helper.php */
/* Location: ./application/helpers/authentication_helper.php */