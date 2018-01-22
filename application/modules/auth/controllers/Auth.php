<?php
(defined('BASEPATH')) or exit('No direct script access allowed!');

/**
* 
*/
class Auth extends MY_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->data	= array_merge($this->data,$this->load_libraries(array('auth')));
		$this->load->model('auth_model');
	}

	public function index()
	{
		$this->data['content_view'] = 'auth/auth_view';
		$this->data['menu'] = FALSE;
		// echo "<pre>";print_r($this->data);
		$this->auth_template($this->data);
	}

	public function signup()
	{
		$this->data['content_view'] = 'auth/signup_view';

		$this->auth_template($this->data);
	}

	function authenticate()
	{
		$data = array(
				'email' => trim($this->input->post('email')),
				'password' => $this->input->post('password')
				);
		// print_r($data);die();
		$resp = $this->auth_model->authenticate($data);
		$data = $resp;
		if ($data->status == 1) {
			$this->session->set_userdata((array) $data->data);
		}
		echo json_encode($resp);
	}

	function findUser()
	{
		$data = array(
					'role' => $this->input->post('role'),
					'No' => $this->input->post('RegNo')
				);
		$customer = NULL;
		$data = $this->auth_model->finduser($data);

		echo json_encode($data);
	}

	function register()
	{
		if ($this->input->post('type') == 'customer') {
			$type = 2;
		} else {
			$type = 1;
		}
		// echo "<pre>";print_r($_POST);die();
		$No = $this->input->post('user');
		$email = $this->input->post('email');
		$password = $this->input->post('pass');
		$data = array(
				"No"			 => $No,
				"email" 		 => $email,
				"password" 		 => $password,
				"type"		 => $type);
		$resp = $this->auth_model->register($data);
		
		// echo "<pre>";print_r($resp);die();
		// if ($this->auth_model->checkUser($email)->result()) {
		// 	$resp = array(
		// 			"message" => "User already exists! Proceed to <a href='".base_url()."'>Login</a>",
		// 			"status" => 0);
		// } else {
		// 	$res = $this->auth_model->sign_up($data);
		// 	$send = $this->sendEmail($data['email'],$data['firstTimeLogin']);
			
		// 	if ($res) {
		// 		if ($send) {
		// 			$resp = array(
		// 				"message" => "Successfully Registered<br />Please check your email for the reset code!",
		// 				"status" => 1,
		// 				"data" => array('email' => $email, 'No' => $No, 'type' => $type)
		// 				);
		// 		} else {
		// 			$resp = array(
		// 				"message" => "Registration was successfull but an error occured while contacting your mail server.<br />Please contact the administrator via the email ".$this->auth_model->getAdmin()." for assistance!",
		// 				"status" => 2,
		// 				"data" => array('email' => $email, 'No' => $No, 'type' => $type)
		// 				);
		// 		}
		// 	} else {
		// 		$resp = array(
		// 				"message" => "Registration Failed. Try again later!",
		// 				"status" => 0
		// 				);
		// 	}
		// }
		
		echo json_encode($resp);
	}

	function activate()
	{
		$No = $this->input->post('No');
		$type = $this->input->post('type');
		$email = $this->input->post('email');
		$code = $this->input->post('code');

		$update = $this->auth_model->activate(array('email'=>$email,'No'=>$No,'code'=>$code,'type'=>$type));
		$resp = $update;
		
		$this->session->set_userdata((array)$resp->data);
		// echo "<pre>";print_r($resp);die();

		echo json_encode($resp);
	}

	function forgot()
	{
		$data = array(
			'email' => $this->input->post('email'),
			'number'=> $this->input->post('number'));

		$resp = $this->auth_model->checkUser($data);
		// print_r($_POST);die();
		// if (!isset($_POST)) {
		// 	$resp = array(
		// 			"message" => "Incorrect information provided",
		// 			"status" => 0
		// 		);
		// } else {
		// 	$email = $this->input->post('email');
		// 	$number = $this->input->post('number');

		// 	$checkUser = $this->auth_model->checkUser($email,$number)->result();
		// 	if ($checkUser) {
		// 		$resetCode = rand(0,99999);
		// 		$data = array(
		// 				"email" => $email,
		// 				"No" => $number,
		// 				"resetCode" => $resetCode
		// 			);
				
		// 		$update = $this->auth_model->resetPassword($data);
		// 		if ($update) {
		// 			$send = $this->sendResetEmail($email,$resetCode);
		// 			if ($send) {
		// 				$resp = array(
		// 					"message" => "Account successfully updated. A reset code has been sent to your email.",
		// 					"status" => 1
		// 				);
		// 			} else {
		// 				$resp = array(
		// 					"message" => "Account successfully updated with an error sending the reset code. Try again later!",
		// 					"status" => 2
		// 				);
		// 			}
		// 		} else {
		// 			$resp = array(
		// 				"message" => "An error occured while reseting the account",
		// 				"status" => 0
		// 			);
		// 		}
				
		// 	} else {
		// 		$resp = array(
		// 			"message" => "No user exists with the provided details",
		// 			"status" => 0
		// 		);
		// 	}
			
		// 	// $data = array();
		// }
		echo json_encode($resp);
	}

	function reset()
	{
		$data = array(
					'reset' => $this->input->post('reset'),
					'password' => $this->input->post('password')
				);

		$reset = $this->auth_model->reset($data);
		// echo "<pre>";print_r($reset);die();
		if ($reset->status == 1) {
			$user = array(
					"sNo"			=> $reset->data[0]->No,
					"semail" 		=> $reset->data[0]->email,
					"suser"			=> $reset->data[0]->usertype,
					"sisLoggedIn"	=> TRUE
					);
					$this->session->set_userdata($user);
		}

		echo json_encode($reset);
	}

	function sendResetEmail($userEmail=NULL,$resetCode=NULL)
		{
			
			//SEND USER EMAIL
				$reciepientemail = $userEmail;
				$sendersEmail = 'silverstonecustomerportal@gmail.com';
				$sendersEmailPass = 'abc123**';
				
				$message = "Hello,<br/>
				A reset password request has been received fro you account. 
				Use the reset code below to login.<br/><br/>

				Reset Code: ".$resetCode."<br/>
				Username: ".$reciepientemail."<br/>
				Link: http://hzapps.silverstone.co.ke:8089/silverstonecustomerportal/login/employeelogin <br/>
				Local Link: http://10.10.10.139/sscustomerportal/ (use this if you are accessing the site from a device in the silverstone network)

				Regards,<br/>
				Silverstone Customer Portal.";

				$FromFName = "Silverstone";
				$FromLName = "Customer Portal";
				$subject = "Welcome to the Silverstone Customer Portal";

				return $this->phpMailerSendMail($reciepientemail,$sendersEmail,$sendersEmailPass,$message,$FromFName,$FromLName,$subject);
		}

	function test()
	{
		// $data = $this->auth_model->getSalesPeoples();
		$data = $this->auth_model->getUserInfoNav('C0000000050');

		echo "<pre>";print_r(json_decode($data));die();
	}

	function test2(){
		echo "<pre>";print_r($this->auth_model->items());
	}

	function test3()
	{
		$this->auth_model->getthis();
	}
}
?>