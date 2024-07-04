<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('agentlogin')) 
{
	function agentlogin()
	{
		$_CI = &get_instance();
		
		$userid		 	 = $_CI->input->post('agEmail');
		$UserPass		 = $_CI->input->post('password');
		
		$pass_md5		 = md5($UserPass);
		
		$UserDetails	 = $_CI->M_superadmin->agentloginmodel('agent_manage', $userid);
		
		if( !empty($UserDetails) && $UserDetails->password == $pass_md5){
			
			$auid = $UserDetails->agId;
			$usertype = $UserDetails->usertype;
			
			setUserData($auid, $usertype);
			redirect('agentpanel/dashboard');
		 
		} else {
			$_CI->session->set_userdata(array('invalidUser' => 'Email and password does not match!'));
			redirect('agentlogin');
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
			'auid'    	=> $auid, 'usertype' => $usertype
		);
		$_CI->session->set_userdata($userData);
	}
}



if ( ! function_exists('getUserName'))
{
	function getUserName()
	{
		$_CI = &get_instance();
		return $_CI->session->userdata('auid');
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
			redirect('agentlogin');	
		} else {
			return true;	
		}
	}
}





if ( ! function_exists('agentlogout'))
{

		

	function agentlogout()
	{
		invalidUserData();
		if(!isActiveUser()){
			redirect('agentlogin');
		}
	}
	
	

}


// ------------------------------------------------------------------------
/* End of file authentication_helper.php */
/* Location: ./application/helpers/authentication_helper.php */