<?php
(defined('BASEPATH') or exit('No direct script access allowed!'));

/**
* 
*/
class Auth extends MY_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('auth_model');
	}

	public function index()
	{
		$this->load->view('auth/auth_view');
	}

	public function signup()
	{
		$this->load->view('auth/signup_view');
	}

	public function verify()
	{
		$email = trim($this->input->post('email'));
		$password = trim($this->input->post('password'));

		if (empty($email) || empty($password)) {
			$this->session->set_flashdata(['error_message' => 'Missing username or password']);
			redirect('auth');
		}

		$data = $this->auth_model->authenticate($email, $password);
		if ($data == false) {
			$this->session->set_flashdata(['error_message' => 'Wrong username or password']);
			redirect('auth');
		}

		$sessionData = [
						'email' => $data->email,
						'name' => $data->name,
						'usertype' => $data->usertype[0]->id,
						'isLoggedIn' => true
						];
		$this->session->set_userdata($sessionData);

		parent::redirect();

	}

	public function register()
	{
		$name = $this->input->post('name');
		$email = trim($this->input->post('email'));
		$phone = trim($this->input->post('phone'));
		$password = trim($this->input->post('password'));
		$confirm_password = trim($this->input->post('confirm_password'));

		if (empty($name) || empty($phone) || empty($email) || empty($password)) {
			$this->session->set_flashdata(['error_message' => 'Missing personal information']);
			redirect('auth/signup');
		}
		$registerData = ['name' => $name, 
						'email' => $email, 
						'phone' => $phone, 
						'password' => $password, 
						'confirm_password' => $confirm_password,
						'type' => 2];
		$data = $this->auth_model->register($registerData);

		if ($data == false) {
			$this->session->set_flashdata(['error_message' => 'An error occured during registration']);
			redirect('auth/signup');
		}

		$this->session->set_flashdata(['success_message' => 'Registration successful']);
		redirect('auth');
	}
}
?>