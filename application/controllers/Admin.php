<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Appointment_model');
    }

    public function index()
    {   
        $data['appointments'] = $this->Appointment_model->viewAppointments();
        $data['rowcount'] = count($this->Appointment_model->viewAppointments());
        $this->load->view('templates/sidebar');
		$this->load->view('dashboard',$data);
    }

    public function acceptAppointment($id){
        $this->Appointment_model->acceptAppointment($id);
        redirect('Admin');
    }

    public function declineAppointment($id){
        $this->Appointment_model->declineAppointment($id);
        redirect('Admin');
    }
}
