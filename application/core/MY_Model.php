<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	//Specific User info
	public function getUserInfoNav($custNo){
		$webServiceUrl = webServiceUrl; 
		
		$client = new SoapClient($webServiceUrl);
		try {
			$res = $client->getSpecificCustomer(array("custNo"=>$custNo));
		} catch (SoapFault $e) {
		    $res = "Error: {$e->faultstring}";
		}
		// print_r($res);die();
		return $res->getSpecificCustomerResult;
	}
	//Specific User info

	//Specific Employee info
	public function getEmployeeInfoNav($empNo){
		$webServiceUrl = webServiceUrl; 
		
		$client = new SoapClient($webServiceUrl);
		try {
			$res = $client->getSpecificEmployee(array("empNo"=>$empNo));
		} catch (SoapFault $e) {
		    $res = "Error: {$e->faultstring}";
		}

		return $res->getSpecificEmployeeResult;
	}
	//Specific Employee info

	//getItemList
	public function itemList(){
		$webServiceUrl = webServiceUrl; 
		$client = new SoapClient($webServiceUrl);
		try {
			$res = $client->getItemCard();
		} catch (SoapFault $e) {
			$res = "Error: {$e->faultstring}";
		}
		// echo "<pre>";print_r($res);die();
		$items = json_decode($res->getItemCardResult);

		try {
			$res = $client->getItemInventories();
		} catch (SoapFault $e) {
			$res = "Error: {$e->faultstring}";
		}

		$ledger = json_decode($res->getItemInventoriesResult);

		$data = array();
		foreach ($items as $key => $value1) {
			foreach ($ledger as $key => $value2) {
				if ($value2->No == $value1->No) {
					$data[] = array(
								"Key" => $value1->Key,
								"No" => $value1->No,
					            "Description" => $value1->Description,
					            "Unit_Price" => $value1->Unit_Price,
					            "Reserved_Quantity" => $value1->Reserved_Quantity,
					            "Inventory" => $value2->inventory,
					            "Brand" => $value1->Brand,
					            "RIM" => $value1->RIM,
					            "Pattern" => $value1->Pattern,
					            "Category" => $value1->Category
					        );
				}
			}
		}
		
		return $data;
	}
	//getItemList

	//get sales people 
	public function salesPeople($saleNo){
		$client = new SoapClient(webServiceUrl);
		try{
			$res = $client->getSpecificSales(array("salesNo"=>$saleNo));
		} catch (SoapFault $e) {
			$res = "Error: {$e->faultstring}";
		}
		// print_r($res);die();
		return $res->getSpecificSalesResult;
	}
	//get sales people

	//getUniqueItem
	public function getUniqueItemMC($itemNo){
		$webServiceUrl = webServiceUrl; 
		$client = new SoapClient($webServiceUrl);
		try {
			$res = $client->getSpecificItem(array("itemNo"=>$itemNo));
		} catch (SoapFault $e) {
		    return "Error: {$e->faultstring}";
		    die();
		}
		return $res;	
	}
	//getUniqueItem

	//registration of customers
	public function checkCustomerAccess($custNo){
		$webServiceUrl = webServiceUrl; 
		$client = new SoapClient($webServiceUrl);
		try {
			$res = $client->checkCustomerAccess(array("custNo"=>$custNo));
		} catch (SoapFault $e) {
		    $res = "Error: {$e->faultstring}";
		    //$res = 3;
		}
		return $res;
	}
	//registration of customers

	//getItemLedger
	public function getUniqueItemLedger3($itemNo){
		$webServiceUrl = webServiceUrl; 
		
		$client = new SoapClient($webServiceUrl);
		try {
			$res = $client->getLedgerEntries(array("itemNo"=>$itemNo));
		} catch (SoapFault $e) {
		    $res = "Error: {$e->faultstring}";
		    //$res = 3;
		}
		// echo "<pre>";print_r($res);die();
		return $res->getLedgerEntriesResult;
	}

	//getItemLedger
	public function getTest($bookmarkKey=NULL,$fetchSize=0,$search=NULL){
		$webServiceUrl = webServiceUrl; 
		
		$client = new SoapClient($webServiceUrl);
		try {
			$res = $client->getTest(array("bookmarkKey"=>$bookmarkKey,"fetchSize"=>$fetchSize,"search"=>$search));
		} catch (SoapFault $e) {
		    $res = "Error: {$e->faultstring}";
		    //$res = 3;
		}
		// echo "<pre>";print_r($res);die();
		return $res->getTestResult;
	}

	public function getItemCount($search=NULL)
	{
		$client = new SoapClient(webServiceUrl);
		try {
			$res = $client->getCountItems(array("search"=>$search));
		} catch (SoapFault $e) {
			$res = "Error: {$e->faultstring}";
		}
		return $res->getCountItemsResult;
	}

	//getItemLedger
	public function getTest2(){
		$webServiceUrl = webServiceUrl; 
		
		$client = new SoapClient($webServiceUrl);
		try {
			$res = $client->getTest2();
		} catch (SoapFault $e) {
		    $res = "Error: {$e->faultstring}";
		    //$res = 3;
		}
		// echo "<pre>";print_r($res);die();
		return $res->getTest2Result;
	}

	function APIcall($url, $method='GET', $data=NULL, $apiKey=NULL)
	{
		$this->load->library('requests/library/requests');
		$this->requests->register_autoloader();

		$my_url = $this->config->item('apiURL').$url;
		$headers = array('X-API-KEY' => $apiKey);
		$options = array('verify' => false);

		if ($method == 'GET') {
			$request = $this->requests->get($my_url, $headers, $data);
		} else if ($method == 'POST') {
			$request = $this->requests->post($my_url, $headers, $data);
		} else if ($method == 'PUT') {
			$request = $this->requests->put($my_url, $headers, $data);
		}
		
		return $request->body;
	}

	function getKeys()
	{
		$keys = array();
		$data = $this->itemList();
		// echo "<pre>";print_r($data);die();
		foreach ($data as $key => $value) {
			$value = (object) $value;
			$keys[] = $value->Key;
		}
		return $keys;
	}

	function getOData($uri=NULL,$type)
	{
		$usr = $this->config->item('curlUsername');
		$pwd = $this->config->item('curlPassword');

		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, $uri); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_NTLM); 
		curl_setopt($ch, CURLOPT_USERPWD, "$usr:$pwd");
		curl_setopt($ch, CURLOPT_VERBOSE, true);
		$fp = fopen(APPPATH.'logs/errorlog.txt', 'w');
		curl_setopt($ch, CURLOPT_STDERR, $fp);
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
		        'Connection: Keep-Alive',    
		        'Accept: application/variant_div(left, right).epg.vrt.be.playlist_1.1+xml',          
		        'Content-Type: application/json; charset=utf-8'
		]);   

		$response = json_decode(curl_exec($ch), true);
		// echo "<pre>";var_dump(curl_getinfo($ch));
		// die();
		// Close handle
		curl_close($ch);
		// echo "<pre";print_r($response);die();
		return $response;
	}

	function getODataJson($uri=NULL,$filter=NULL)
	{
		$uri = str_replace(" ", "%20", $uri);
		$uri = str_replace("'", "%27", $uri);
		
		// echo "<pre>";print_r($uri);die();
		if ($filter != NULL) {
			$uri = $uri."?$filter=".$filter[0]." eq '".$filter[1]."'";
		}
		
		$response = self::getOData($uri, 'json');
		return $response['value'];
	}

	function getODataXml($uri=NULL,$filter=NULL)
	{
		if ($filter != NULL) {
			$uri = $uri."?$filter=".$filter[0]." eq '".$filter[1]."'";
		}
		// echo "<pre>";die($uri);
		$response = self::getOData($uri, 'xml');

		echo "<pre>";print_r($response);die();
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