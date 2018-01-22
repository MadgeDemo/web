<?php
(defined('BASEPATH') or exit('No direct script access allowed!'));

/**
* 
*/
class Auth_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function authenticate($email = null, $password = null)
	{
		if (empty($email) || empty($password)) return false;
		
		$data = ['email' => $email, 'password' => $password];
		$apiKey = $this->config->item('appKey');
		$myURL = 'users/login';
		
		$request = json_decode(parent::APIcall($myURL,'POST',$data,$apiKey));

		if ($request->status == false) return false;
		
		return $request->data;
	}

	public function register($data = null)
	{
		if (empty($data)) return false;

		$apiKey = $this->config->item('appKey');
		$myURL = 'users/create';
		
		$request = json_decode(parent::APIcall($myURL,'POST',$data,$apiKey));

		if ($request->status == false) return false;
		
		return $request->data;
	}
}
?>