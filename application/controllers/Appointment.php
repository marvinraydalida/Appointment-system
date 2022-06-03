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
        if (isset($_POST['submit'])) {
            $data = array(
                'secret' => "0xe05EC2f1d4f143605affD1A1BdA60Bc7c603DD23",
                'response' => $_POST['h-captcha-response']
            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://hcaptcha.com/siteverify");
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $responseData = json_decode($response);
            if ($responseData->success) {
                $this->Appointment_model->create();
            } else {
                echo 'Robot verification failed, please try again.';
            }
        }
    }
}
