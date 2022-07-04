<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Appointment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Appointment_model');
        $this->load->helper('captcha');
    }

    public function index()
    {
        $this->load->view('Appointment');
    }

    public function appointment()
    {
        if (isset($_POST['submit'])) {

            $postdata = http_build_query(
                array(
                    'secret' => $_ENV['CAPTCHA_SECRET'],
                    'response' => $_POST['h-captcha-response']
                )
            );
            $opts = array(
                'http' =>
                array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $postdata
                )
            );
            $context = stream_context_create($opts);
            $result = file_get_contents('https://hcaptcha.com/siteverify', false, $context);
            $responseData = json_decode($result);
            if ($responseData->success) {
                $this->Appointment_model->create();
                $this->load->view('successfullAppointment');
            } else {
                echo 'Robot verification failed, please try again.';
            }
        }
    }

    public function viewAppointmentVerify(){
        $this->load->view('viewAppointment');
    }

    public function viewAppointment()
    {
        if (isset($_POST['submit'])) {

            $postdata = http_build_query(
                array(
                    'secret' => $_ENV['CAPTCHA_SECRET'],
                    'response' => $_POST['h-captcha-response']
                )
            );
            $opts = array(
                'http' =>
                array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $postdata
                )
            );
            $context = stream_context_create($opts);
            $result = file_get_contents('https://hcaptcha.com/siteverify', false, $context);
            $responseData = json_decode($result);
            if ($responseData->success) {
                if($this->Appointment_model->viewAppointmentDetails()!=NULL){
                    redirect('Appointment/viewAppointmentVerified');
                }
                else{
                    $this->session->set_flashdata('appointmentError','Invalid Appointment Code'); 
                    redirect('Appointment/viewAppointmentVerify');
                }
            } else {
                $this->session->set_flashdata('appointmentError','Captcha verification failed'); 
                redirect('Appointment/viewAppointmentVerify');
            }
        }
    }

    public function viewAppointmentVerified() {
        $this->load->model('AuthenticationPatient');
        $data = $this->Appointment_model->viewSingleAppointment($this->session->userdata('auth_patient')['appointmentID']);
        $this->load->view('PatientAppointmentDetails',$data);
    }

    public function cancel($id){
        $this->Appointment_model->cancelAppointment($id);
        redirect('Appointment/viewAppointmentVerified');
    }
   
    public function acceptReschedule($id){
        $this->Appointment_model->acceptedRescheduleAppointment($id);
        redirect('Appointment/viewAppointmentVerified');
    }
}
