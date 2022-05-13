<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Register');
		// Baguhin, palitan kung anong homepage ni user
		// if ($this->session->has_userdata('authenticated')){
		// 	$this->session->set_flashdata('logout','Please logout first'); 
		// 	redirect('Admin/Dashboard');
		// }
	}

	public function index()
	{
		$this->load->view('registration');
	}

	public function register(){
		if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname'])){
			$this->Register->insertData();
			// redirect('Admin/students');
		}
	
	}


}
