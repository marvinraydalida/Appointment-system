<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Login extends CI_Model {

    public function __construct(){	
		$this->load->database();
		date_default_timezone_set('Asia/Manila');
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
			
			if(password_verify($_POST['password'],$row->password)){
				if($row->status == 1){
					$data = array(
						'userID' => $row->userID,
						'action' => '[Admin] '.$row->name.' logged in',
						'happenedAt' => date("Y-m-d h:i:s")
					);
					$this->db->insert('logs',$data);
					return $query->row();
				}
				else {
					$this->session->set_flashdata('loginerror','Account is deactivated'); 
					return NULL;
				}
			}
				
			else{
				$this->session->set_flashdata('loginerror','Invalid Username or Password'); 
				return NULL;
			}
		}	
		else {
			$this->session->set_flashdata('loginerror','Account not found'); 
			return NULL;
		}
			
	}

	public function logout(){
		$data = array(
            'userID' => $this->session->userdata('auth_user')['userID'],
			'action' => '[Admin] '.$this->session->userdata('auth_user')['name'].' logged out',
			'happenedAt' => date("Y-m-d h:i:s")
        );
        $this->db->insert('logs',$data);
		$this->session->unset_userdata('authenticated');
		$this->session->unset_userdata('auth_user');
	}
}
