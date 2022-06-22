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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- TODO: -->
    <!-- Add modal for cancel confirmation message-->
    <!-- Add backend for cancel and rescehdule -->
    <!-- Change Email layout -->
    <!-- .env and deployment -->
    <div class="imagebg"> 
        <div class="blur">
            
        </div>
    </div>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3 border p-4 shadow bg-color">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading"><b>Important!</b></h4>
                    [1] Please arrive at the clinic at least 30 minutes in advance of your scheduled time. <br>
                    [2] Please provide an screenshot of the appointment email during your scheduled time.
                </div>
                
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
                <div class="row">
                    <?php if($status == "rescheduled") : ?>
                        <button type="submit" class="btn btn-danger col-sm-6">Cancel Appointment</button>  
                        <button type="submit" class="btn btn-success col-sm-6">Accept Appointment</button> 
                    <?php else : ?>
                        <button type="submit" class="btn btn-danger ">Cancel Appointment</button>  
                    <?php endif; ?>
                    
                </div>
			</div>
		</div>
	</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
