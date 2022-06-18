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
        $this->load->view('appointment');
    }

    public function appointment()
    {
        if (isset($_POST['submit'])) {

            $postdata = http_build_query(
                array(
                    'secret' => "0x94247ea2F22707663c228f7A81a4256065f04653",
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
                    'secret' => "0x94247ea2F22707663c228f7A81a4256065f04653",
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
                    $data = $this->Appointment_model->viewAppointmentDetails();
                    echo json_encode($data);
                }
                else{
                    $this->session->set_flashdata('appointmentError','Invalid Appointment Code'); 
                    redirect('Appointment/viewAppointmentVerify');
                }
            } else {
                echo 'Robot verification failed, please try again.';
            }
        }
    }

   
}
