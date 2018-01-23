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

	public function orders()
	{
		$data['cart'] = $this->cart->get_cart();
		$orders = $this->customer_model->get_orders();
		if ($orders->status == false) {$data['orders'] = null;}else {$data['orders'] = $orders->data;}
		
		// echo "<pre>";print_r($data['orders']);die();
		$this->load->view('orders_view',$data);
	}

	public function get_customer_cart()
	{
		$cart = $this->cart->get_cart();
		$li = "";
		foreach ($cart as $key => $value) {
			$li .= "<li class='dropdown' style='margin:1em;'>".$value->name." <strong>Ksh.".$value->value."</strong></li>";
		}
		$li .= "<li class='dropdown' style='margin:1em;'><a href=".base_url('cart/checkout')."><button class='btn btn-success'>Checkout</button></a></li>";
		echo json_encode($li);
	}
}
?>