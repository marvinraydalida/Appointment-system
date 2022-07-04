<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href=<?php echo site_url("assets/css/successfullAppointment.css") ?> rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 shadow p-5 text-center bg-color">
                <i class="fa-solid fa-circle-check sizing"></i>
                <h2>Appointment request sent!</h2>
                <br>
                <h5>We've reserved your time and appointment details is sent in your email, but your appointment has <br><b>not been confirmed yet</b> by
                    Cerillo House of Dental Medicine</h5>
                    <br>
                <h5>Your Appointment will be confirmed during operating hours <br> and we will notify you at <b>email ng clinic</b></h5>
                <br>
                <button onclick="location.href='<?php echo site_url('Appointment/viewAppointmentVerify');?>'" class="btn btn-primary design">View Application Details</button>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>