<?php
(defined('BASEPATH')) or exit('No direct script access allowed!');

/**
* 
*/
class Auth_model extends MY_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}

	function get_Usertype($usertype=null)
	{
		$this->db->where('name',$usertype);
		$res = $this->db->get('usertype')->result_array();
		return $res[0]['ID'];
	}

	function sign_up($data=null)
	{
		return $this->db->insert('users',$data);
	}

	function authenticate($data=null)
	{
		// $this->db->where($data);
		// return $this->db->get('users');

		$data = array(
					'email'=>$data['email'],
					'password'=>$data['password']
				);

		$apiKey = $this->config->item('appKey');
		$myURL = 'users/login';
		
		$request = $this->APIcall($myURL,'POST',$data,$apiKey);
		
		return json_decode($request);
	}

	function register($data=null)
	{
		
		$apiKey = $this->config->item('appKey');
		$myURL = 'users/create';
		
		$request = $this->APIcall($myURL,'POST',$data,$apiKey);
		// echo "<pre>";print_r($request);die();
		return json_decode($request);
	}

	function finduser($data=null)
	{
		$data = array(
					'No'=>$data['No'],
					'role'=>$data['role']
				);

		$apiKey = $this->config->item('appKey');
		$myURL = "users/find/No/".$data['No']."/role/".$data['role'];
		
		$request = $this->APIcall($myURL,'GET',null,$apiKey);
		
		return json_decode($request);
	}

	function checkUser($data=null)
	{
		// if ($number==null) {
		// 	$this->db->where('email',$email);
		// }else {
		// 	$data = array('email'=>$email,'No'=>$number);
		// 	$this->db->where($data);
		// }
		
		// return $this->db->get('users');
		// echo "<pre>";print_r($data);die();
		$apiKey = $this->config->item('appKey');
		$myURL = "users/forgot";
		
		$request = $this->APIcall($myURL,'POST',$data,$apiKey);
		// echo "<pre>";print_r($request);die();
		return json_decode($request);
	}

	function activate($data=null)
	{
		// $condition = array(
		// 			'email' => $email,
		// 			'No' => $No
		// 		);
		// $this->db->where($condition);
		// return $this->db->update('users', array('firstTimeLogin'=>NULL));

		$apiKey = $this->config->item('appKey');
		$myURL = 'users/activate';
		
		$request = $this->APIcall($myURL,'POST',$data,$apiKey);
		// echo "<pre>";print_r($request);die();
		return json_decode($request);
	}

	function resetPassword($data)
	{
		$condition = array(
				"No" => $data['No'],
				"email" => $data['email']
			);
		$this->db->set('resetCode', $data['resetCode']);
		$this->db->where($condition);
		return $this->db->update('users');
	}

	function reset($data=null)
	{
		$apiKey = $this->config->item('appKey');
		$myURL = 'users/reset';
		
		$request = $this->APIcall($myURL,'POST',$data,$apiKey);
		return json_decode($request);

	}

	function getAdmin()
	{
		$this->db->where('usertype', 1);
		$admin = $this->db->get('users')->result();

		return $admin[0]->email;
	}

	function getSalesPeoples()
	{
		// $data = json_decode(file_get_contents(base_url('assets/services/data.json')));
		// $data = json_encode($data->data);
		$data = $this->salesPeople('02');
		
		return $data;
	}

	function items()
	{
		return $this->itemList();
	}

	function getthis()
	{
		parent::getODataXml("http://DESKTOP-DQO3OBA:8048/GLACIER-NAV15/OData/Company('SilverStone Tyres Ltd')/itemLedgerEntries?\$filter=Item_No eq '04850130000'");
	}
}