<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sendEmail extends CI_Model {
    public function __construct(){	
        $this->load->library('phpmailer_lib');
	}
    public function sendAccepted($email, $message){
       
         // Create instance of phpmailer
         $mail = $this->phpmailer_lib->load();

         // Set Mailer to use SMTP
         $mail -> isSMTP();
 
         // Define SMTP Host
         $mail -> Host = "smtp.gmail.com";
 
         // Enable SMTP Authentication
         $mail -> SMTPAuth = "true";
 
         // Set type of encryption (ssl/tls)
         $mail -> SMTPSecure = "tls";
 
         // Set Port to connect to STMP
         $mail -> Port = "587";
 
         // Set Email Credentials
 
         $mail -> Username = $_ENV['SMTP_USER'];
         $mail -> Password = $_ENV['SMTP_PASS'];
 
         // Set Email Subject
         $mail -> Subject = "Appointment Request Notice";
 
         // Set Sender Email
         $mail -> setFrom("CerilloDentalMedicine@gmail.com", "Cerillo House of Dental Medicine");
 
         // Enable HTML
         $mail -> isHTML(true);
 
         // Add Recipient
         $mail -> addAddress($email);
 
         // Send Email
         $mail -> MsgHTML($message);

         $mail_error = $mail->ErrorInfo;
         if(!$mail->send()){
             return $mail_error;
         }else{
             return 1;
         }
    }

    public function sendDeclined($email, $message){
       
        // Create instance of phpmailer
        $mail = $this->phpmailer_lib->load();

        // Set Mailer to use SMTP
        $mail -> isSMTP();

        // Define SMTP Host
        $mail -> Host = "smtp.gmail.com";

        // Enable SMTP Authentication
        $mail -> SMTPAuth = "true";

        // Set type of encryption (ssl/tls)
        $mail -> SMTPSecure = "tls";

        // Set Port to connect to STMP
        $mail -> Port = "587";

        // Set Email Credentials

        $mail -> Username = $_ENV['SMTP_USER'];
        $mail -> Password = $_ENV['SMTP_PASS'];

        // Set Email Subject
        $mail -> Subject = "Appointment Request Notice";

        // Set Sender Email
        $mail -> setFrom("CerilloDentalMedicine@gmail.com", "Cerillo House of Dental Medicine");

        // Enable HTML
        $mail -> isHTML(true);

        // Add Recipient
        $mail -> addAddress($email);

        // Send Email
        $mail -> MsgHTML($message);

        $mail_error = $mail->ErrorInfo;
        if(!$mail->send()){
            return $mail_error;
        }else{
            return 1;
        }
   }

   public function sendResched($email, $message){
       
    // Create instance of phpmailer
    $mail = $this->phpmailer_lib->load();

    // Set Mailer to use SMTP
    $mail -> isSMTP();

    // Define SMTP Host
    $mail -> Host = "smtp.gmail.com";

    // Enable SMTP Authentication
    $mail -> SMTPAuth = "true";

    // Set type of encryption (ssl/tls)
    $mail -> SMTPSecure = "tls";

    // Set Port to connect to STMP
    $mail -> Port = "587";

    // Set Email Credentials

    $mail -> Username = $_ENV['SMTP_USER'];
    $mail -> Password = $_ENV['SMTP_PASS'];

    // Set Email Subject
    $mail -> Subject = "Appointment Request Notice";

    // Set Sender Email
    $mail -> setFrom("CerilloDentalMedicine@gmail.com", "Cerillo House of Dental Medicine");

    // Enable HTML
    $mail -> isHTML(true);

    // Add Recipient
    $mail -> addAddress($email);

    // Send Email
    $mail -> MsgHTML($message);

    $mail_error = $mail->ErrorInfo;
    if(!$mail->send()){
        return $mail_error;
    }else{
        return 1;
    }
}
public function sendCancelled($email, $message){
       
    // Create instance of phpmailer
    $mail = $this->phpmailer_lib->load();

    // Set Mailer to use SMTP
    $mail -> isSMTP();

    // Define SMTP Host
    $mail -> Host = "smtp.gmail.com";

    // Enable SMTP Authentication
    $mail -> SMTPAuth = "true";

    // Set type of encryption (ssl/tls)
    $mail -> SMTPSecure = "tls";

    // Set Port to connect to STMP
    $mail -> Port = "587";

    // Set Email Credentials

    $mail -> Username = $_ENV['SMTP_USER'];
    $mail -> Password = $_ENV['SMTP_PASS'];

    // Set Email Subject
    $mail -> Subject = "Appointment Request Notice";

    // Set Sender Email
    $mail -> setFrom("CerilloDentalMedicine@gmail.com", "Cerillo House of Dental Medicine");

    // Enable HTML
    $mail -> isHTML(true);

    // Add Recipient
    $mail -> addAddress($email);

    // Send Email
    $mail -> MsgHTML($message);

    $mail_error = $mail->ErrorInfo;
    if(!$mail->send()){
        return $mail_error;
    }else{
        return 1;
    }
}
  
}


