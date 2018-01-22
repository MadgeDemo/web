<?php
(defined('BASEPATH')) or exit('No direct script access allowed!');

/**
* 
*/
class Items_model extends MY_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}

	function getInventory()
	{
		// $data = json_decode(file_get_contents(base_url('assets/services/data.json')));
		// $data = json_encode($data->data);
		// $data = $this->itemList();

		// return $data;
		
		$apiKey = 'w44o8s0o4w8scocg0koos0g4g488c8wgwokccogk';
		$myURL = 'inventory/items';
		
		$request = $this->APIcall($myURL,'GET',NULL,$apiKey);
		$request = $request;
		// echo "<pre>";print_r((array)$request);die();
		return $request;
	}

	function getUniqueInventory()
	{
		$data = json_decode(file_get_contents(base_url('assets/services/unique.json')));

		return $data->data;
	}

	function getUniqueItemLedger($itemNo){
		$apiKey = 'w44o8s0o4w8scocg0koos0g4g488c8wgwokccogk';
		$myURL = 'inventory/ledger/No/'.$itemNo;
		
		$request = $this->APIcall($myURL,'GET',NULL,$apiKey);
		$request = $request;
		// echo "<pre>";print_r((array)$request);die();
		return $request;
	}
}
?>