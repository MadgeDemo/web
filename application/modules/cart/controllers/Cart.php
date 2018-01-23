<?php
(defined('BASEPATH') or exit('No direct script access allowed!'));

/**
* 
*/
class Cart extends MY_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		parent:: isLoggedIn();
		parent:: isCustomer();
		$this->load->model('cart_model');
	}

	public function index()
	{

	}

	public function get_cart($order_no = null)
	{
		if (empty($order_no)) $order_no = null;

		return $this->cart_model->get_cart($order_no);
	}
}
?>