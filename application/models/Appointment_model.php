<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment_model extends CI_Model {

    public function __construct(){	
		$this->load->database();
		date_default_timezone_set('Asia/Manila');
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
			'service' => $_POST['service'],
			'status' => 'pending'
        );

        $this->db->insert('appointments',$data);
        unset($_POST);

		$this->db->set('appointmentTicket', $this->db->insert_id() . date('d-m-y'));
        $this->db->where('appointmentID', $this->db->insert_id());
        $this->db->update('appointments');

    }

	public function viewAllLogs($date,$action){
		if($action == "All"){
			$query = $this->db->query('	SELECT *
				FROM logs  
				LEFT JOIN user_details ON logs.userID = user_details.userID
				WHERE `date` ="'.$date.'"
				ORDER BY `time` ASC ');
		}
		else{
			$query = $this->db->query('	SELECT *
				FROM logs  
				LEFT JOIN user_details ON logs.userID = user_details.userID
				WHERE `date` ="'.$date.'"
				AND `action` = "'.$action.'"
				ORDER BY `time` ASC ');
		}
		
		return $query->result();
	}

    public function viewAppointments() #Read
	{	
		$date_now = date("Y-m-d");
		$query = $this->db->query('	SELECT * FROM appointments where `status`= "pending" AND `date`>CURDATE()');
		$queryb = $this->db->query('UPDATE appointments SET `status`= "cancelled" WHERE `date`<= CURDATE()');
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
		$query = $this->db->query('	SELECT * FROM appointments where `appointmentID` = ' . $id);
		$query =$query->row();
		$data = array(
			'userID' => $this->session->userdata('auth_user')['userID'],
			'action' => 'Accepted',
			'details' => 'Accepted Appointment with ticket # '.$query->appointmentTicket.' successfully',
			'date' => date("Y-m-d"),
			'time' => date("H:i:s")
		);
        $this->db->insert('logs',$data);
	}

    public function declineAppointment($id){ #Delete/Status
		
		$data = array(
			'status' => "declined"
		);
		$this->db->where('appointmentID',$id);
		$this->db->update('appointments',$data);
		$query = $this->db->query('	SELECT * FROM appointments where `appointmentID` = ' . $id);

		$data = array(
			'userID' => $this->session->userdata('auth_user')['userID'],
			'action' => 'Declined',
			'details' => 'Declined Appointment with ticket # '.$query->appointmentTicket.' successfully',
			'date' => date("Y-m-d"),
			'time' => date("H:i:s")
		);
        $this->db->insert('logs',$data);
	}

	public function cancelAppointment($id){ #Delete/Status
		$data = array(
			'status' => "cancelled"
		);
		$this->db->where('appointmentID',$id);
		$this->db->update('appointments',$data);
		$query = $this->db->query('	SELECT * FROM appointments where `appointmentID` = ' . $id);
		$query = $query->row();
		$data = array(
			'userID' => $this->session->userdata('auth_user')['userID'],
			'action' => 'Cancelled',
			'details' => 'Cancelled Appointment with ticket # '.$query->appointmentTicket.' successfully',
			'date' => date("Y-m-d"),
			'time' => date("H:i:s")
		);
        $this->db->insert('logs',$data);
	}

	public function countPending(){ 
		$query = $this->db->query('	SELECT * FROM appointments 
									where `status`= "pending" 
									AND `date` >= CURDATE()');
		return $query->num_rows();
	}

	public function countAccepted(){ 
		$query = $this->db->query('	SELECT * FROM appointments 
									where `status`= "accepted" 
									AND `date` >= CURDATE()');
		return $query->num_rows();
	}

	public function countCancelled(){
		$query = $this->db->query('	SELECT * FROM appointments
									where `status`= "cancelled" 
									AND `date` >= CURDATE()');
		return $query->num_rows();
	}

	public function viewAppointmentPerTime($date,$status){
		$query = $this->db->query('	SELECT * FROM appointments 
									where `date`="'.$date.'" 
									AND `status`="'.$status.'" 
									ORDER BY `time` ASC');
		return $query->result();
	}

	public function rescheduleAppointment(){
		$data = array(
			"rescheduledDate" => $_POST["date"],
			"rescheduledTime" => $_POST["time"],
			"status" => "reschedule pending"
		);
		$this->db->where('appointmentID',$_POST['appointmentID']);
		$this->db->update('appointments',$data);
		$query = $this->db->query('	SELECT * FROM appointments where `appointmentID` = ' . $_POST['appointmentID']);
		$query = $query->row();
		$data = array(
			'userID' => $this->session->userdata('auth_user')['userID'],
			'action' => 'Rescheduled',
			'details' => 'Rescheduled Appointment with ticket # '.$query->appointmentTicket.' successfully',
			'date' => date("Y-m-d"),
			'time' => date("H:i:s")
		);
        $this->db->insert('logs',$data);
	}

	public function acceptedRescheduleAppointment($id){
		$query = $this->db->query("SELECT * FROM appointments WHERE appointmentID =".$id);
		$query = $query->row();
		$data=array(
			"time" => $query->rescheduledTime,
			"date" => $query->rescheduledDate,
			"rescheduledDate" => NULL,
			"rescheduledTime" => NULL,
			"status" => "accepted"
		);
		$this->db->where('appointmentID',$id);
		$this->db->update('appointments',$data);
		unset($_POST);
	}

	public function checkTicket(){
		$query = $this->db->query('	SELECT * FROM appointments where `appointmentTicket`='.$_POST["appointmentTicket"]);
		return $query->num_rows();
	}

	public function countNextWeekRecords(){
		$NextWeekData = array();
		$AcceptedNextWeek = array();
		$CancelledNextWeek = array();
		$RequestNextWeek = array();
		$WeeklyDay = array();
		$DataToday = array();
		$dateCounter= new DateTime('tomorrow');	
		for($counter = 0; $counter < 7; $counter++){
			$queryAccepted = $this->db->query('	SELECT * FROM appointments where `date` = "'.$dateCounter->format('Y-m-d').'" AND `status`= "accepted"');
			$queryCancelled = $this->db->query('SELECT * FROM appointments where `date` = "'.$dateCounter->format('Y-m-d').'" AND `status`= "cancelled"');
			$queryRequest = $this->db->query('	SELECT * FROM appointments where `date` = "'.$dateCounter->format('Y-m-d').'" AND `status`= "pending"');
			$totalCountAccepted =  $queryAccepted->num_rows();
			$totalCountCancelled =  $queryCancelled->num_rows();
			$totalCountRequest =  $queryRequest->num_rows();
			array_push($AcceptedNextWeek,$totalCountAccepted);
			array_push($CancelledNextWeek,$totalCountCancelled);
			array_push($RequestNextWeek,$totalCountRequest);
			array_push($WeeklyDay,$dateCounter->format('m/d/y'));
			$dateCounter = $dateCounter->modify('+1 day');
		}
		$todayAccepted = $this->db->query('	SELECT * FROM appointments where `date` = "'.date('Y-m-d').'" AND `status`= "accepted"');
		$todayCancelled = $this->db->query('SELECT * FROM appointments where `date` = "'.date('Y-m-d').'" AND `status`= "cancelled"');
		array_push($DataToday,$todayAccepted->num_rows(),$todayCancelled->num_rows());
		array_push($NextWeekData,$DataToday,$AcceptedNextWeek,$CancelledNextWeek,$RequestNextWeek,$WeeklyDay);
		return $NextWeekData;
	}

	public function viewAppointmentDetails(){
		$query = $todayAccepted = $this->db->query('SELECT * FROM appointments where 
													appointmentTicket = "'.$_POST['appointmentTicket'].'" 
													AND email="'.$_POST['email'].'"');

		$data = $query->row();											
		if($query->num_rows()>0){
			$auth_patientdetails = [
				'appointmentID' => $data->appointmentID,
				// 'time_added'  =>  $data->timeAdded
			];
			$this->session->set_userdata('auth_patient',$auth_patientdetails);
			$this->session->set_userdata('authenticatedAppointment',"1");
			return 1;
		}
		else{
			return NULL; 
		}
	}

	public function cancel($id){
		$data=array(
			"status" => "cancelled"
		);
		$this->db->where('appointmentID',$id);
		$this->db->update('appointments',$data);
	}
}



