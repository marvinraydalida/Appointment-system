<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Model {

	public function __construct(){	
		$this->load->database();
	}

	public function insertData()
	{	
			$this->db->select('*');
			$this->db->from('user_details');
			$this->db->where('name',$_POST['name']);
			// $this->db->where('firstname',$_POST['firstname']);
			// $this->db->where('lastname',$_POST['lastname']);
			$query=$this->db->get();
			if($query->num_rows()<=0){
                if($_POST['password'] == $_POST['confirmpassword']){
                    $data = array(
                        'userID' => NULL,
                        'username' =>$_POST['username'],
                        'password' => password_hash($_POST['password'],PASSWORD_DEFAULT),
						'name' => $_POST['firstname'] . $_POST['lastname'],
                        //'firstname' => $_POST['firstname'],
                        //'lastname' => $_POST['lastname'],
                        //'email' => $_POST['email'],
                        //'status' => 1
                    );
                    $this->db->insert('user_details',$data);
                    unset($_POST);
                    $this->session->set_flashdata('successAddingUser','Added user account successfully');
                }
				else{
                    $this->session->set_flashdata('errorAddingUser','Passwords do not match');
                }
			}
			else{	
				$this->session->set_flashdata('errorAddingUser','Error: user account exists');	
			}	
            redirect('Register');
	}

	// public function viewData()
	// {
	// 	$query = $this->db->query('SELECT * FROM teacher_accounts');
	// 	return $query->result();
	// }

	// public function viewAllData()
	// {
	// 	$query = $this->db->query('SELECT * FROM teacher_accounts');
	// 	return $query->result_array();
	// }

	// public function getData($id)
	// {	
	// 	$query = $this->db->query('	SELECT admin_accounts.adminNumber, teacher_accounts.* 
	// 								FROM teacher_accounts 
	// 								LEFT JOIN admin_accounts 
	// 								ON teacher_accounts.creatorID = admin_accounts.adminID 
	// 								WHERE teacher_accounts.teacherID ='.$id);
	// 	return $query->row();
	// }

	


	// public function updateData($id)
	// {
	// 	$data = array(
	// 		'firstname' => $_POST['firstname'],
	// 		'lastname' => $_POST['lastname'],
	// 		'middlename' => $_POST['middlename'],
	// 		'extname' => $_POST['extname'],
	// 		'phonenum' => $_POST['phonenum'],
	// 		'email' => $_POST['email'],
	// 		# Add Year Level
	// 	);
	// 	$this->db->where('teacherID',$id);
	// 	$this->db->update('teacher_accounts',$data);
		
	// }

	// public function deactivateData($id){
	// 	$data = array(
	// 		'status' => 0
	// 	);
	// 	$this->db->where('teacherID',$id);
	// 	$this->db->update('teacher_accounts',$data);
	// }

	// public function reactivateData($id){
	// 	$data = array(
	// 		'status' => 1
	// 	);
	// 	$this->db->where('teacherID',$id);
	// 	$this->db->update('teacher_accounts',$data);
	// }


    

	
}