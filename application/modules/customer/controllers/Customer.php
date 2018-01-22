<?php
(defined('BASEPATH') or exit('No direct script access allowed'));

/**
* 
*/
class Customer extends MY_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		parent:: isLoggedIn();
		parent:: isCustomer();
	}

	public function index()
	{
		$this->load->view('customer_view');
	}
}
?>