<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href=<?php echo base_url("assets/css/sidebar.css") ?> rel="stylesheet">


    <?php 
        date_default_timezone_set('Asia/Manila');
        $request_uri = explode('/', $_SERVER['REQUEST_URI'],1);
        $date = date('Y-m-d');
    ?>

    <?php if (strcasecmp($_SERVER['REQUEST_URI'], "/Appointment-system/Admin") == 0) : ?>
        <link href=<?php echo base_url("assets/css/dashboard.css") ?> rel="stylesheet">
    <?php elseif (strcasecmp($_SERVER['REQUEST_URI'], $request_uri[0]) == 0) : ?>
        <link href=<?php echo base_url("assets/css/adminAppointment.css") ?> rel="stylesheet">
    <?php endif; ?>



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


</head>

<body>
    <section id="sidebar">
        <div id="link-container">
            <a href="<?php echo site_url('Admin') ?>"><i class="fa-solid fa-house-medical"></i> Home</a>
            <a href="<?php echo site_url('Admin/Appointment') . '?date=' . $date . '&status=accepted'?>"><i class="fa-solid fa-calendar-check"></i> Appointments</a>
            <a href=""><i class="fa-solid fa-user-pen"></i> Account</a>
            <a href=""><i class="fa-solid fa-file-lines"></i> Logs</a>
        </div>
    </section>