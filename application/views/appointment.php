<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href=<?php echo base_url("assets/css/stylesLogin.css") ?> rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- Pansamantala lamang -->
    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: start;
        }
    </style>

    <script src="https://js.hcaptcha.com/1/api.js?hl=en" async defer></script>
</head>

<body>
    <form action="Appointment/appointment" method="POST">
        <label>Name</label>
        <input type="text" name="name" required>

        <label>Age</label>
        <input type="number" name="age" required>

        <label>Sex</label>
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <label>Address</label>
        <input type="text" name="address" required>

        <label>Contact</label>
        <input type="number" name="contactNum" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Date</label>
        <input type="date" name="date" required>

        <label>Time</label>
        <input type="time" name="time" min="08:00" max="17:00" required>
        <div class="h-captcha" data-sitekey="6ad65b76-24e9-4e8b-8e89-0a480ed2c8b8"></div>
        <input type="submit" name = "submit" value = "submit">
    </form>


    <?= $this->session->flashdata('Appointment Request sent'); ?>
</body>

</html>