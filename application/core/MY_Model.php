<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	function APIcall($url, $method='GET', $data=NULL, $apiKey=NULL)
	{
		$this->load->library('requests/library/requests');
		$this->requests->register_autoloader();

		$my_url = $this->config->item('apiURL').$url;
		$headers = array('X-API-KEY' => $apiKey);
		$options = array('verify' => false);
		// echo($my_url);
		if ($method == 'GET') {
			$request = $this->requests->get($my_url, $headers, $data);
		} else if ($method == 'POST') {
			$request = $this->requests->post($my_url, $headers, $data);
		} else if ($method == 'PUT') {
			$request = $this->requests->put($my_url, $headers, $data);
		}
		// $my_url = '';
		return $request->body;
	}
	
	function resolve_month($month)
	{
		switch ($month) {
			case 1:
				$value = 'Jan';
				break;
			case 2:
				$value = 'Feb';
				break;
			case 3:
				$value = 'Mar';
				break;
			case 4:
				$value = 'Apr';
				break;
			case 5:
				$value = 'May';
				break;
			case 6:
				$value = 'Jun';
				break;
			case 7:
				$value = 'Jul';
				break;
			case 8:
				$value = 'Aug';
				break;
			case 9:
				$value = 'Sep';
				break;
			case 10:
				$value = 'Oct';
				break;
			case 11:
				$value = 'Nov';
				break;
			case 12:
				$value = 'Dec';
				break;
			default:
				$value = NULL;
				break;
		}

		return $value;

	}
}
?>