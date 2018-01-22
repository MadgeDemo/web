<?php
(defined('BASEPATH')) or exit('No script access allowed!');

/**
* 
*/
class Users extends MY_Controller
{
	function __construct()
	{
		parent:: __construct();
		$this->isLoggedIn();
		$this->isAdmin();
		$this->load->model('users_model');
		$this->data = array_merge($this->data,$this->load_libraries(array()));
		$this->data['page'] = 'Administration';
	}

	function index()
	{
		$this->data['content_view'] = 'users/users_view2';
		$this->data['usr'] = 'active';
		$this->data['manage'] = 'active';
		$table = '';
		$count = 0;

		$users = $this->users_model->get_users();
		// echo "<pre>";print_r($users);die();
		foreach ($users as $key => $value) {
			if ($value->status == 1 || $value->status == '1') {
				$status = '<span class="label label-primary">Active</span>';
				$action = "<a href='javascript:void(0)' onclick='alterStatus(".json_encode($value->ID).",0)'>Deactivate</a>";
			} else {
				$status = '<span class="label label-danger">Inactive</span>';
				$action = "<a href='javascript:void(0)' onclick='alterStatus(".json_encode($value->ID).",1)'>Activate</a>";
			}
			$count++;
			$table .= "<tr>";
			$table .= "<td>".$count."</td>";
			$table .= "<td>".$value->No."</td>";
			$table .= "<td>".$value->firstName."</td>";
			$table .= "<td>".$value->middleName."</td>";
			$table .= "<td>".$value->lastName."</td>";
			$table .= "<td>".$value->email."</td>";
			$table .= "<td>".$value->role."</td>";
			$table .= "<td><center>".$status."</center></td>";
			$table .= "<td>".$action."</td>";
			$table .= "</tr>";
			//<a href='javascript:void(0)' onclick='view_User_Details(".json_encode($value->ID).")'>View</a> 
		}
        $this->data['users'] = $table;

        $this->template2($this->data);
	}

	function administrators()
	{
		$this->data['content_view'] = 'users/admin_view2';
		$this->data['usr'] = 'active';
		$this->data['add'] = 'active';
        $table = '';
		$count = 0;

		$admins = $this->users_model->get_admins();
		// echo "<pre>";print_r($admins);die(); 
		foreach ($admins as $key => $value) {
			if ($value->status == 1 || $value->status == '1') {
				$status = '<span class="label label-primary">Active</span>';
				$action = "<a href='javascript:void(0)' onclick='alterStatus(".json_encode($value->ID).",0)'>Deactivate</a>";
			} else {
				$status = '<span class="label label-danger">Inactive</span>';
				$action = "<a href='javascript:void(0)' onclick='alterStatus(".json_encode($value->ID).",1)'>Activate</a>";
			}
			$count++;
			$table .= "<tr>";
			$table .= "<td>".$count."</td>";
			$table .= "<td>".$value->No."</td>";
			$table .= "<td>".$value->firstName."</td>";
			$table .= "<td>".$value->middleName."</td>";
			$table .= "<td>".$value->lastName."</td>";
			$table .= "<td>".$value->email."</td>";
			$table .= "<td>".$value->createdBy."</td>";
			$table .= "<td>".$value->role."</td>";
			$table .= "<td><center>".$status."</center></td>";
			$table .= "<td>".$action."</td>";
			$table .= "</tr>";
			//<a href='javascript:void(0)' onclick='view_User_Details(".json_encode($value->ID).")'>View</a> 
		}
        $this->data['admins'] = $table;

        $table2 = '';
        $count = 0;
        $employees = $this->users_model->get_employees();

        foreach ($employees as $key => $value) {
			if ($value->status == 1 || $value->status == '1') {
				$status = '<span class="label label-primary">Active</span>';
			} else {
				$status = '<span class="label label-danger">Inactive</span>';
			}
			$action = "<a href='javascript:void(0)' onclick='upgradeStatus(".json_encode($value->ID).",1)'>Upgrade</a>";
			$count++;
			$table2 .= "<tr>";
			$table2 .= "<td>".$count."</td>";
			$table2 .= "<td>".$value->No."</td>";
			$table2 .= "<td>".$value->firstName."</td>";
			$table2 .= "<td>".$value->middleName."</td>";
			$table2 .= "<td>".$value->lastName."</td>";
			$table2 .= "<td>".$value->email."</td>";
			$table2 .= "<td>".$value->role."</td>";
			$table2 .= "<td><center>".$status."</center></td>";
			$table2 .= "<td>".$action."</td>";
			$table2 .= "</tr>";
			//<a href='javascript:void(0)' onclick='view_User_Details(".json_encode($value->ID).")'>View</a> 
		}
        $this->data['employees'] = $table2;

        $this->template2($this->data);
	}

	function change_status()
	{
		$data = array(
					'ID' => $this->input->post('id'),
					'status' => $this->input->post('status')
				);
		$update = $this->users_model->change_status($data);

		echo json_encode($update);
	}

	function upgrade_status()
	{
		$data = array(
				'ID' => $this->input->post('id'),
				'usertype' => $this->input->post('role')
			);
		$upgrade = $this->users_model->upgrade_status($data);

		echo json_encode($upgrade);
	}

	// function add()
	// {
	// 	$this->data['content_view'] = 'users/add_view';
	// 	$this->data['usr'] = 'active';
	// 	$this->data['add'] = 'active';
		
 //        // $this->data['inventory'] = $table;

 //        $this->admin_template($this->data);
	// }

	// function register()
	// {
	// 	if (!isset($_POST)) {
	// 		$resp = array(
	// 				"message" => "No input information provided",
	// 				"status" => 3
	// 			);
	// 	} else {
	// 		$firstTimeLoiginID = rand(0,9999);
	// 		$password = $this->config->item('conti-partner');
	// 		$data = array(
	// 				"firstName" => $this->input->post('fName'),
	// 				"middleName" => $this->input->post('mName'),
	// 				"lastName" => $this->input->post('lName'),
	// 				"email" => $this->input->post('email'),
	// 				"password" => sha1($this->config->item('salt_phrase').$password.$this->config->item('hash_phrase')),
	// 				"usertype" => 3,
	// 				"firstTimeLogin" => $firstTimeLoiginID
	// 			);

	// 		$check = $this->users_model->checkIfExists($data['email']);
	// 		if ($check) {
	// 			$resp = array(
	// 				"message" => "User already exists",
	// 				"status" => 1
	// 			);
	// 		} else {
	// 			$register = $this->users_model->register($data);
	// 			if ($register) {
	// 				$send = $this->sendEmail($data['email'],$password,$firstTimeLoiginID);
	// 				if ($send) {
	// 					$resp = array(
	// 						"message" => "User successfully registered",
	// 						"status" => 0
	// 					);
	// 				} else {
	// 					$resp = array(
	// 						"message" => "User registered, but login details were not sent to the user.",
	// 						"status" => 4
	// 					);
	// 				}
	// 			} else {
	// 				$resp = array(
	// 					"message" => "An error occured while registering the user please try again later",
	// 					"status" => 1
	// 				);
	// 			}
	// 		}
	// 	}

	// 	echo json_encode($resp);
	// }

	// function test()
	// {
	// 	$this->data['content_view'] = 'users/users_view2';
	// 	$this->data['usr'] = 'active';
	// 	$this->data['manage'] = 'active';
	// 	$table = '';
	// 	$count = 0;

	// 	$users = $this->users_model->get_users();
	// 	// echo "<pre>";print_r($users);die();
	// 	foreach ($users as $key => $value) {
	// 		if ($value->status == 1 || $value->status == '1') {
	// 			$status = '<span class="label label-primary">Active</span>';
	// 			$action = "<a href='javascript:void(0)' onclick='alterStatus(".json_encode($value->ID).",0)'>Deactivate</a>";
	// 		} else {
	// 			$status = '<span class="label label-danger">Inactive</span>';
	// 			$action = "<a href='javascript:void(0)' onclick='alterStatus(".json_encode($value->ID).",1)'>Activate</a>";
	// 		}
	// 		$count++;
	// 		$table .= "<tr>";
	// 		$table .= "<td>".$count."</td>";
	// 		$table .= "<td>".$value->No."</td>";
	// 		$table .= "<td>".$value->firstName."</td>";
	// 		$table .= "<td>".$value->middleName."</td>";
	// 		$table .= "<td>".$value->lastName."</td>";
	// 		$table .= "<td>".$value->email."</td>";
	// 		$table .= "<td>".$value->role."</td>";
	// 		$table .= "<td><center>".$status."</center></td>";
	// 		$table .= "<td>".$action."</td>";
	// 		$table .= "</tr>";
	// 		//<a href='javascript:void(0)' onclick='view_User_Details(".json_encode($value->ID).")'>View</a> 
	// 	}
 //        $this->data['users'] = $table;
	// 	$this->template2($this->data);
	// }

	function hide()
	{
		echo "<pre>";print_r($this->session->all_userdata());die();
	}

}
?>