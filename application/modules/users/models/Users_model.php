<?php
(defined('BASEPATH')) or exit('No direct script access allowed!');

/**
* 
*/
class Users_model extends MY_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}

	function get_users()
	{
		$sql = "select 
					users.ID, 
					users.`No`, 
					users.firstName, 
					users.middleName, 
					users.lastName, 
					users.email, 
					users.`status`, 
					usertype.name as `role` 
				from users 
				left join usertype on users.usertype = usertype.ID 
				where usertype.ID <> '1'
				group by usertype.name order by usertype.ID desc";

		return $this->db->query($sql)->result();
	}

	function get_admins()
	{
		$sql = "select 
					users.ID, 
					users.`No`, 
					users.firstName, 
					users.middleName, 
					users.lastName, 
					users.email, 
					users.createdBy, 
					users.`status`, 
					usertype.name as `role` 
				from users 
				left join usertype on users.usertype = usertype.ID 
				where usertype.ID = '1'
				order by usertype.ID desc";

		return $this->db->query($sql)->result();
	}

	function get_employees()
	{
		$sql = "select 
					users.ID, 
					users.`No`, 
					users.firstName, 
					users.middleName, 
					users.lastName, 
					users.email, 
					users.createdBy, 
					users.`status`, 
					usertype.name as `role` 
				from users 
				left join usertype on users.usertype = usertype.ID 
				where usertype.ID = '2' and users.status = '1'
				group by usertype.name order by usertype.ID desc";

		return $this->db->query($sql)->result();
	}

	function checkIfExists($email){
		$this->db->where('email', $email);
		return $this->db->get('users')->result();
	}

	function register($data)
	{
		return $this->db->insert('users', $data);
	}

	function change_status($data)
	{
		$this->db->where('ID', $data['ID']);
		$this->db->set('status', $data['status']);
		return $this->db->update('users');
	}

	function upgrade_status($data)
	{
		$this->db->where('ID', $data['ID']);
		$this->db->set('usertype', $data['usertype']);
		$this->db->set('createdBy', $this->session->userdata('semail'));
		return $this->db->update('users');
	}
}