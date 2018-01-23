<?php
(defined('BASEPATH') or exit('No direct script access allowed!'));

/**
* 
*/
class Customer_model extends MY_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}

	function get_orders()
	{
		$queryString = '?email='.$this->session->userdata('email');
		// if (!empty($order_no)) $queryString .= '&order='.$order_no;
		
		$apiKey = $this->config->item('appKey');
		$URL = 'orders/'.$queryString;
		
		$this->load->library('requests/library/requests');
		$this->requests->register_autoloader();

		$my_url = $this->config->item('apiURL').$URL;
		$headers = array('X-API-KEY' => $apiKey);
		$options = array('verify' => false);
		
		$request = $this->requests->get($my_url, $headers, null);
		$response = json_decode($request->body);
		// echo "<pre>";print_r($response);die();
		// if (!empty($response->status)) return null;

		return $response;
	}
}
?>