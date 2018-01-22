<?php
defined('BASEPATH') or exit('No direct access allowed!');

/**
* 
*/
class Employees extends MY_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->isLoggedIn();
		// $this->load->model('customers_model');
		$this->data = array_merge($this->data,$this->load_libraries(array()));
		$this->data['page'] = 'Employee';
	}

	public function index()
	{
		$this->data['content_view'] = 'employees/mycustomers_view';

		$this->template2($this->data);
	}

	function myCustomers()
	{
		$this->data['content_view'] = 'employees/mycustomers_view';

		$this->template2($this->data);
	}
}
?>