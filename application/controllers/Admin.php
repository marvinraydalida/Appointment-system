<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('Appointment_model');
    }

    public function index()
    {   
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard');
    }
}
