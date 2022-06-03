<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Appointment_model');
        $this->load->model('userAccount');
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
        $data['appointments'] = $this->Appointment_model->viewAppointmentPerTime($date, $status);
        $data['accepted'] = $this->Appointment_model->countAccepted();
        $data['pending'] = $this->Appointment_model->countPending();
        $data['cancelled'] = $this->Appointment_model->countCancelled();

        $this->load->view('templates/sidebar');
        $this->load->view('adminAppointment',$data);

    }

    public function account()
    {
        $data['accounts'] = $this->userAccount->viewData();
        $this->load->view('templates/sidebar');
        $this->load->view('adminAccount',$data);
    }

    public function addAdminAccount(){
        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirmpassword'])){
            $this->userAccount->insertData();
            redirect("Admin/Account");
        }
    }

    public function editAdminAccount(){
        if(isset($_POST['username']) && isset($_POST['newpassword']) && isset($_POST['confirmpassword'])){
            $this->userAccount->updateData($_POST['userID']);
            redirect("Admin/Account");
        }
    }

    public function activateAccount($id){
        $this->userAccount->reactivateData($id);
        redirect("Admin/Account");
    }

    public function deactivateAccount($id){
        $this->userAccount->deactivateData($id);
        redirect("Admin/Account");
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
        $message = $this->load->view('templates/email_templateAccepted', $data, TRUE);
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
        $message = $this->load->view('templates/email_templateDeclined', $data, TRUE);
        $this->email->subject('Email Test');
        $this->email->message($message);

        if ($this->email->send()) {
            redirect('Admin');
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function sendEmailCancelled($id)
    {
        $this->Appointment_model->cancelAppointment($id);
        $this->load->library('email');
        $this->load->config('email');
        $this->email->set_mailtype("html");

        $data = $this->Appointment_model->viewSingleAppointment($id);

        $this->email->from($this->config->item('smtp_user'));
        $this->email->to($data->email);
        $message = $this->load->view('templates/email_templateCancelled', $data, TRUE);
        $this->email->subject('Email Test');
        $this->email->message($message);

        if ($this->email->send()) {
            redirect('Admin/Appointment?date=' . $_GET['date'] . '&status=' . $_GET['status']);
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function sendEmailRescheduled()
    {
        $this->Appointment_model->rescheduleAppointment();
        $this->load->library('email');
        $this->load->config('email');
        $this->email->set_mailtype("html");

        $data['appointment'] = $this->Appointment_model->viewSingleAppointment($_POST['appointmentID']);
        $data['time'] = $_POST['time'];
        $data['date'] = $_POST['date'];
        $this->email->from($this->config->item('smtp_user'));
        $this->email->to($data['appointment']->email);
        $message = $this->load->view('templates/email_templateResched', $data, TRUE);
        $this->email->subject('Reschedule notice');
        $this->email->message($message);
        $this->load->view('templates/email_templateResched', $data);
        if ($this->email->send()) {

            if(isset($_GET['status']) && isset($_GET['date'])){
                redirect('Admin/Appointment?date=' . $_GET['date'] . '&status=' . $_GET['status']);
            }
            else{
                redirect('Admin');
            }  
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function acceptedEmailReschedule($id)
    {
        $this->Appointment_model->acceptedRescheduleAppointment($id);
    }
}
