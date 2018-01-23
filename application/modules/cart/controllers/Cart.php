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

	public function add()
	{
		$service = $this->input->post('service');
		// echo $service;die();
		if (empty($service)) echo json_encode([
							'status' => false, 
							'message' => 'No service selected']);

		echo $this->cart_model->add_to_cart($service);
	}

	public function checkout()
	{
		$resp = json_decode($this->cart_model->checkout());
		if ($resp->status == false) redirect('customer');

		$data['amount'] = $resp->data;

		$this->load->view('instructions', $data);
	}
}
?>