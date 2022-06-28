<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Login extends CI_Model {

    public function __construct(){	
		$this->load->database();
	}

    public function login(){
		$data = array(
			'username' => $_POST['username'], // admin
			// 'password' => $_POST['password']
		);	
		$this->db->select('*'); // select all data
		$this->db->from('user_details'); // from table name
		$this->db->where($data); // where check condition 
		$query= $this->db->get();
		if($query->num_rows()!=0){
			// return $query->row();
			$row = $query->row();
			if(password_verify($_POST['password'],$row->password))
				return $query->row();
			else
				return NULL;
		}	
		else 
			return NULL;
	}
}
