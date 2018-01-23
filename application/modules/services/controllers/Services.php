<?php
(defined('BASEPATH') or exit('No direct script access allowed!'));

/**
* 
*/
class Services extends MY_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		parent:: isLoggedIn();
		$this->load->model('services_model');
	}

	public function index()
	{

	}

	public function get_services()
	{
		return $this->services_model->get_services();
	}

}

?>