<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AuthenticationPatient extends CI_Model {

	public function __construct(){	
		parent::__construct();
		if (!$this->session->has_userdata('authenticatedAppointment')){
			$this->session->set_flashdata('appointmentError','Please Login First');
			redirect('Appointment/viewAppointmentVerify');
		}
	}

}
