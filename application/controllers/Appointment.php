<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Appointment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Appointment_model');
    }

    public function index()
    {
        $this->load->view('appointment');
    }

    public function appointment()
    {
        $this->Appointment_model->create();
        
    }

   
}
