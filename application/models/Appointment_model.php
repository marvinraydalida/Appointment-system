<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment_model extends CI_Model {

    public function __construct(){	
		$this->load->database();
	}

    public function create(){
        $data = array(
            'name' => $_POST['name'],
            'age' => $_POST['age'],
            'gender' => $_POST['gender'],
            'address' => $_POST['address'],
            'contactNum' => $_POST['contactNum'],
            'email' => $_POST['email'],
            'date' => $_POST['date'],
            'time' => $_POST['time'],
			'dateRequested' => date('d-m-y'),
			'status' => 'pending'
        );

        $this->db->insert('appointments',$data);
        unset($_POST);

		$this->db->set('appointmentTicket', $this->db->insert_id() . date('d-m-y'));
        $this->db->where('appointmentID', $this->db->insert_id());
        $this->db->update('appointments');

        $this->session->set_flashdata('successRequest','Appointment request has been sent.');

		redirect('Appointment');
    }
}
