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
		$this->load->model('customer_model');
		$this->load->module('services');
		$this->load->module('cart');
	}

	public function index()
	{
		$data['services'] = $this->services->get_services();
		$data['cart'] = $this->cart->get_cart();

		$this->load->view('customer_view', $data);
	}
}
?>