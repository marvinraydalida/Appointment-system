<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Login');
		// Baguhin, palitan kung anong homepage ni user
		// if ($this->session->has_userdata('authenticated')){
		// 	$this->session->set_flashdata('logout','Please logout first'); 
		// 	redirect('Admin/Dashboard');
		// }
	}

	public function index()
	{
		$this->load->view('loginpage');
	}

	public function login(){
		$data = $this->User_Login->login();
			if($data != NULL){ 
				$auth_userdetails = [
					'userID' => $data->userID,
					'username' => $data->username,
					'password'=> $data->password,
					'firstname' =>  $data->firstname,
					'lastname' =>  $data->lastname,
					'email' =>  $data->email,
					'time_added'  =>  $data->timeAdded
				];
				$this->session->set_userdata('auth_user',$auth_userdetails);
				$this->session->set_userdata('authenticated',"1");
				$this->session->set_flashdata('success','Login Succesfully');
				redirect('UserDetails'); //Remove
			}
			else{
				$this->session->set_flashdata('loginerror','Invalid Username or Password'); 
				redirect('Login');
			}
	}

	
}
