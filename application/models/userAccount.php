<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class userAccount extends CI_Model {

	public function __construct(){	
		$this->load->database();
	}

	public function insertData()
	{	
			$this->db->select('*');
			$this->db->from('user_details');
			$this->db->where('username',$_POST['username']);
			$this->db->where('name',$_POST['name']);

			$query=$this->db->get();
			if($query->num_rows()<=0){
                $data = array(
                    'userID' => NULL,
                    'username' =>$_POST['username'],
                    'password' => password_hash($_POST['password'],PASSWORD_DEFAULT),
					'name' => $_POST['name'],
                    'status' => 1
                );
                $this->db->insert('user_details',$data);
                unset($_POST);
                $this->session->set_flashdata('successAddingUser','Added user account successfully');
			}
			else{	
				$this->session->set_flashdata('errorAddingUser','Error: user account exists');	
			}	
           
	}

	public function viewData()
	{
		$query = $this->db->query('SELECT * FROM user_details');
		return $query->result();
	}


	public function getData($id)
	{	
		$query = $this->db->query('SELECT * FROM user_details');
		return $query->row();
	}


	public function updateData($id)
	{
		$query = $this->db->query('SELECT * FROM user_details WHERE `userID`='.$id);
		$query=$query->row();
		if(password_verify($_POST['oldpassword'],$query->password)){
			
					$data = array(
						'username' =>$_POST['username'],
						'password' => password_hash($_POST['newpassword'],PASSWORD_DEFAULT),
						'name' => $_POST['name'],
						'status' => 1
					);
					$this->db->where('userID',$id);
					$this->db->update('user_details',$data);
					$this->session->set_flashdata('successAdmin',"Password changed successfully"); 
			}
		else{
			 $this->session->set_flashdata('adminError','Incorrect Old Password'); 
		} 	
	}

	public function deactivateData($id){
		$data = array(
			'status' => 0
		);
		$this->db->where('userID',$id);
		$this->db->update('user_details',$data);
	}

	public function reactivateData($id){
		$data = array(
			'status' => 1
		);
		$this->db->where('userID',$id);
		$this->db->update('user_details',$data);
	}

	
}