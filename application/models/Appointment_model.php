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

    public function viewAppointments() #Read
	{	
		$query = $this->db->query('	SELECT * FROM appointments where `status`= "pending" ');
		return $query->result();
	}

    public function viewAppointmentsAll() #Read
	{	
		$query = $this->db->query('	SELECT * FROM appointments');
		return $query->result();
	}

      public function viewSingleAppointment($id) #Read
	{	
		$query = $this->db->query('	SELECT * FROM appointments where appointmentID ='.$id);
		return $query->row();
	}

    public function acceptAppointment($id){ #Delete/Status
		$data = array(
			'status' => "accepted"
		);
		$this->db->where('appointmentID',$id);
		$this->db->update('appointments',$data);
	}

    public function declineAppointment($id){ #Delete/Status
		$data = array(
			'status' => "declined"
		);
		$this->db->where('appointmentID',$id);
		$this->db->update('appointments',$data);
	}
}

