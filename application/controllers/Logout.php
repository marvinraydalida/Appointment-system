<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct() {
        parent:: __construct();
		$this->load->model('Authentication');
		$this->load->model('User_Login');
    }

	public function index(){
		$this->User_Login->logout();
		redirect('Login');
	}
}
