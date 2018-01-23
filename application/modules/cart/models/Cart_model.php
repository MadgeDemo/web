<?php
(defined('BASEPATH') or exit('No direct script access allowed!'));

/**
* 
*/
class Cart_model extends MY_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}

	function get_cart($order_no = null)
	{
		$queryString = '?email='.$this->session->userdata('email');
		if (!empty($order_no)) $queryString .= '&order='.$order_no;
		
		$apiKey = $this->config->item('appKey');
		$URL = 'cart/'.$queryString;
		
		$this->load->library('requests/library/requests');
		$this->requests->register_autoloader();

		$my_url = $this->config->item('apiURL').$URL;
		$headers = array('X-API-KEY' => $apiKey);
		$options = array('verify' => false);
		
		$request = $this->requests->get($my_url, $headers, null);
		$response = json_decode($request->body);

		if ($response->status == false) return null;

		return $response->data;
	}

	function add_to_cart($service = null)
	{
		if (empty($service)) echo json_encode([
							'status' => false, 
							'message' => 'No service selected']);

		$data = ['email' => $this->session->userdata('email'), 'service' => $service];
		$apiKey = $this->config->item('appKey');
		$myURL = 'cart';
		
		return parent::APIcall($myURL,'POST',$data,$apiKey);
	}

	function checkout()
	{
		$data = ['email' => $this->session->userdata('email')];
		$apiKey = $this->config->item('appKey');
		$myURL = 'cart/checkout';

		return parent::APIcall($myURL, 'POST', $data, $apiKey);
	}
}
?>