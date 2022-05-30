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
        $this->load->view('templates/sidebar');
        $this->load->view('adminAppointment');

        // echo $_GET['date'];
    }

    public function sendEmailAccepted($id)
    {
        $this->Appointment_model->acceptAppointment($id);
        $this->load->library('email');
        $this->load->config('email');
        $this->email->set_mailtype("html");

        $data = $this->Appointment_model->viewSingleAppointment($id);
        $message = '<!DOCTYPE><html><head></head><body><h1>Good day! Naaccept na yung appointment mong bwakanangshit ka, 
        eto details mong kupal ka:
        </h1><p> Name:' . $data->name . '</p>
        <p> Age:' . $data->age . '</p>
        <p> Sex:' . $data->sex . '</p>
        <p> Address:' . $data->address . '</p>
        <p> Contact:' . $data->contact . '</p>
        <p> Email:' . $data->email . '</p>
        <p> Date of appointment:' . date("m/d/Y", strtotime($data->date)) . '</p>
        <p> Time of appointment:' . date('h:i a', strtotime($data->time)) . '</p></body></html>';
        $this->email->from($this->config->item('smtp_user'));
        $this->email->to($data->email);

        $this->email->subject('Email Test');
        $this->email->message($message);
        if ($this->email->send()) {
            echo ("Email sent");
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
        $message = '<!DOCTYPE><html><head></head><body><h1>Good day! Declined yung appointment mong bwakanangshit ka, 
        eto details mong kupal ka:
        </h1><p> Name:' . $data->name . '</p>
        <p> Age:' . $data->age . '</p>
        <p> Sex:' . $data->sex . '</p>
        <p> Address:' . $data->address . '</p>
        <p> Contact:' . $data->contact . '</p>
        <p> Email:' . $data->email . '</p>
        <p> Date of appointment:' . date("m/d/Y", strtotime($data->date)) . '</p>
        <p> Time of appointment:' . date('h:i a', strtotime($data->time)) . '</p></body></html>';
        $this->email->from($this->config->item('smtp_user'));
        $this->email->to($data->email);

        $this->email->subject('Email Test');
        $this->email->message($message);
        if ($this->email->send()) {
            echo ("Email sent");
            redirect('Admin');
        } else {
            show_error($this->email->print_debugger());
        }
    }
}
