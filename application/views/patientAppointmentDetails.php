<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href=<?php echo base_url("assets/css/stylesPatientViewAppointment.css") ?> rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <section id="modal-container">
            <div id="cancel-modal">    
                <button class="modal-close" id="modal-close">X</button>

                <h1>Are you sure you want to cancel the appointment?</h1>
                <div id="cancel-button-container">
                    <!-- Wrap nalang sa form to para ma submit -->
                    <button onclick="location.href='<?php echo base_url('Appointment/cancel');?>/<?php echo $appointmentID ?>'"  id="cancel-appointment-btn">Yes</button>
                    <button>No</button>
                    <!--  -->
                </div>
            </div>
    </section>
    <div class="imagebg">
        <div class="blur">

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 border p-4 shadow bg-color">
                <?php if($status != "cancelled") : ?>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading"><b>Important!</b></h4>
                        [1] Please arrive at the clinic at least 30 minutes in advance of your scheduled time. <br>
                        [2] Please provide an screenshot of the appointment email during your scheduled time.
                    </div>
                <?php endif; ?>   
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Name:</h5>
                        <h3><b><?php echo $name?></b></h3>
                    </div>
                    <?php if($status == "accepted") : ?>
                    <div class="col-sm-6 accepted">
                        <h5>Status:</h5>
                        <h3><b>Accepted</b></h3>
                    </div>
                    <?php elseif($status == "pending") : ?>
                    <div class="col-sm-6 pending">
                        <h5>Status:</h5>
                        <h3><b>Pending</b></h3>
                    </div>
                    <?php elseif($status == "reschedule pending") : ?>
                    <div class="col-sm-6 pending">
                        <h5>Status:</h5>
                        <h3><b>Reschedule Pending</b></h3>
                    </div>
                    <?php else: ?>
                    <div class="col-sm-6 cancelled">
                        <h5>Status:</h5>
                        <h3><b>Cancelled</b></h3>
                    </div>
                    <?php endif; ?>

                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <h5>Age:</h5>
                        <h3><b><?php echo $age?></b></h3>
                    </div>
                    <div class="col-sm-6 text-capitalize">
                        <h5>Gender:</h5>
                        <h3><b><?php echo $gender?></b></h3>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-sm-8">
                        <h5>Appointment ticket no:</h5>
                        <h3><b><?php echo $appointmentTicket?></b></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <h5>Schedule:</h5>
                        <h3><b><?php echo $date?> at <?php echo $time?></b></h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <h5>Service:</h5>
                        <h3><b><?php echo $service?></b></h3>
                    </div>
                </div>
                            
                <br>
                <div class="row d-flex justify-content-around">
                    <?php if($status == "reschedule pending") : ?>
                        
                        <button id="cancel-request-btn" class="cancel-request-btn submit btn btn-danger col-sm-4">Cancel Request</button>
                        
                        <button type="submit" onclick="location.href='<?php echo site_url('Appointment/acceptReschedule');?>/<?php echo $appointmentID ?>'" class="btn submit btn-success col-sm-4 ">Accept Reschedule</button>
                        
                    <?php elseif ($status == "accepted") : ?>
                        
                        <button id="cancel-request-btn" class="cancel-request-btn btn submit btn-danger col-sm-4">Cancel Request</button>
                        
                        <button class="btn submit btn-primary col-sm-4" onclick="location.href='<?php echo site_url('Appointment/viewAppointmentVerify');?>'">Back</button>
                        
                       
                    <?php else : ?>
                        <button class="btn btn-primary col-sm-4" onclick="location.href='<?php echo site_url('LogoutAppointment');?>'">Back</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url("assets/javascript/modalPatient.js") ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>