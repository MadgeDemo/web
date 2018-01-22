<?php
(defined('BASEPATH') or exit('No direct script access allowed!'));

/**
* 
*/
class Customers extends MY_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->isLoggedIn();
		$this->isCustomer();
		$this->load->model('customers_model');
		$this->data = array_merge($this->data,$this->load_libraries(array()));
		$this->data['page'] = 'Customers';
	}

	public function index()
	{
		$this->data['content_view'] = 'customers/ledger_view';
		
		$this->template2($this->data);
	}

	public function load_Ledger()
	{
		// $data = $this->customers_model->customerLedger();
		$data = $this->customers_model->getCustomerledger();
		// echo "<pre>";print_r($data);die();
		$table = '';
		foreach ($data as $key => $value) {
			$value = (object) $value;
			$table .= "<tr>";
            $table .= "<td>".$value->Posting_Date."</td>";
            $table .= "<td>".$value->Document_Type."</td>";
            $table .= "<td>".$value->Document_No."</td>";
            $table .= "<td>".$value->External_Document_No."</td>";
            $table .= "<td>".$value->Message_to_Recipient."</td>";
            $table .= "<td>".$value->Description."</td>";
            $table .= "<td>".$value->Currency_Code."</td>";
            $table .= "<td>".number_format(round($value->Original_Amount,2))."</td>";
            $table .= "<td>".number_format(round($value->Amount,2))."</td>";
            $table .= "<td>".$value->Payment_Method_Code."</td>";
            if ($value->Open == true) {
            	$table .= "<td><span class='label label-danger'>OPEN</span>";
            }else {
            	$table .= "<td><span class='label label-success'>CLOSED</span>";
            }
		}

		$data['thead'] = '
			<th>Posting Date</th>
			<th>Document Type</th>
			<th>Document No.</th>
			<th>External Document No.</th>
			<th>Message to Recepient</th>
			<th>Description</th>
			<th>Currency</th>
			<th>Original Amount</th>
			<th>Amount</th>
			<th>Payment Method</th>
			<th>Is Open</th>';
		$data['table'] = $table;
		$this->load->view('mycustomers_view', $data);
	}
}
?>