<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Appointment Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href=<?php echo base_url("assets/css/stylesViewAppointment.css") ?> rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


	<script src="https://js.hcaptcha.com/1/api.js?hl=en" async defer></script>
</head>

<body>
	
    <div class="imagebg"> 
        <div class="blur">
            
        </div>
    </div>
	<div class="container">
        <?php if($this->session->flashdata('appointmentError')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('appointmentError'); ?>
                <button type="button" class="btn-close close" data-bs-dismiss="alert"></button>
            </div>
            <?php $this->session->unset_userdata ('appointmentError'); ?>
        <?php endif; ?>
		<div class="row">
			<div class="col-md-5 offset-md-4 border p-4 shadow bg-white">
				<div class="col-12">
                    <img class="logo" src="<?php echo site_url("assets/image/logo.jpg") ?>" alt="">
					<div class="subtitle">To view or cancel your appointment request, please input <b>Appointment
							Ticket</b>
						and <b>Email Address</b> of your current appointment and click the <b>View Details Button</b>
					</div>

				</div>
				<form action="<?php echo site_url('Appointment/viewAppointment') ?>" method="POST">
					<div class="form">
						<div class="input-container ic2">
							<input id="username" name="appointmentTicket" required class="input" type="text" placeholder=" " />
							<div class="cutTicket"></div>
							<label for="username" class="placeholder"><i class="fa-solid fa-ticket"> </i>  Appointment
								Ticket</label>
						</div>
						<div class="input-container ic2">
							<input id="password" name="email" required class="input" type="email" placeholder=" " />
							<div class="cutEmail "></div>
							<label for="password" class="placeholder"><i class="fa-solid fa-at"></i> Email</>
						</div>
						<div class="input-container ic2">
							<div class="h-captcha" data-sitekey="6ad65b76-24e9-4e8b-8e89-0a480ed2c8b8"></div>
						</div>
						<button type="submit" name="submit" class="submit btn-primary">View Details</button>
					</div>
				</form>
			</div>
		</div>
	</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
