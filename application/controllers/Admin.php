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
        $this->load->view('dashboard', $data);
    }

    public function appointment()
    {
        $date =  $_GET['date'];
        $status = $_GET['status'];
        $data['appointments'] = $this->Appointment_model->viewAppointmentPerTime($date,$status);
        $data['accepted'] = $this->Appointment_model->countAccepted();
        $data['pending'] = $this->Appointment_model->countPending();
        $data['cancelled'] = $this->Appointment_model->countCancelled();

        $this->load->view('templates/sidebar');
        $this->load->view('adminAppointment',$data);

        
    }

    public function sendEmailAccepted($id)
    {
        $this->Appointment_model->acceptAppointment($id);
        $this->load->library('email');
        $this->load->config('email');
        $this->email->set_mailtype("html");

        $data = $this->Appointment_model->viewSingleAppointment($id);
       
        $this->email->from($this->config->item('smtp_user'));
        $this->email->to($data->email);
        $message = $this->load->view('templates/email_templateAccepted',$data,TRUE);
        $this->email->subject('Email Test');
        $this->email->message($message);
        if ($this->email->send()) {
             redirect('Admin');
            
         } else {
            show_error($this->email->print_debugger());
        }
    }
    
    public function sendEmailDeclined($id)
    {
        $this->Appointment_model->declineAppointment($id);
        $this->load->library('email');
        $this->load->config('email');
        $this->email->set_mailtype("html");

        $data = $this->Appointment_model->viewSingleAppointment($id);
       
        $this->email->from($this->config->item('smtp_user'));
        $this->email->to($data->email);
        $message = $this->load->view('templates/email_templateDeclined',$data,TRUE);
        $this->email->subject('Email Test');
        $this->email->message($message);
        $this->load->view('templates/email_templateDeclined',$data);
        if ($this->email->send()) {
             redirect('Admin');
            
         } else {
            show_error($this->email->print_debugger());
        }
    }
}
