<?php
(defined('BASEPATH') or exit('No direct script access allowed!'));

/**
* 
*/
class Services_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function get_services()
	{
		$apiKey = $this->config->item('appKey');
		$myURL = 'service';
		
		$request = json_decode(parent::APIcall($myURL,'GET',null,$apiKey));

		return $request->services;
	}
}