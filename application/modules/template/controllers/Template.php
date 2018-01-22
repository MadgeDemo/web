<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
* 
*/
class Template extends MY_Controller
{
	
	public function index($data)
	{
		$this->load_template($data);
	}

	public function auth_template($data)
	{
		$this->load->view('atemplate_view2',$data);
	}

	public function auth_template2($data)
	{
		$this->load->view('atemplate_view',$data);
	}
	
	public function load_template($data)
	{
		$this->load->view('template_view',$data);
	}

	public function load_template2($data)
	{
		$this->load->view('template_view2',$data);
	}

	public function backend_template($data)
	{
		$this->load->view('btemplate_view',$data);
	}

	
}
?>