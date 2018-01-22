<?php
(defined('BASEPATH') or exit('No direct script access allowed!'));

/**
* 
*/
class Customers_model extends MY_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}

	public function customerLedger(){
		$webServiceUrl = webServiceUrl; 
		$client = new SoapClient($webServiceUrl);
		try {
			$res = $client->getCustomersLedger(array('custNo' => $this->session->userdata('sNo')));
		} catch (SoapFault $e) {
			$res = "Error: {$e->faultstring}";
		}
		
		$data = json_decode($res->getCustomersLedgerResult);

		return $data;
	}

	public function getCustomerledger()
	{
		$customerNo = $this->session->userdata('sNo');
		return $this->getODataJson($this->config->item('custLegdEntService')."&\$filter=Customer_No eq '$customerNo'");
	}
}
?>