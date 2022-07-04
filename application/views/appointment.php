<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href=<?php echo site_url("assets/css/stylesSetAppointment.css") ?> rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://js.hcaptcha.com/1/api.js?hl=en" async defer></script>
</head>

<body>
<div class="container register">
                <div class="row">
                    <div class="col-md-5 register-left">
                        <img src="<?php echo site_url("assets/image/logo.jpg") ?>" alt=""/>
                        <h1>CERILLO HOUSE OF DENTAL MEDICINE</h1>
                         <i><h4>More than just a smile</h4></i>

                    </div>
                    <div class="col-md-7 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h2 class="register-heading">Appointment Form</h2>
                                <div class="row register-form">
                   <form action="<?php echo site_url('Appointment/appointment') ?>" method="POST">
                    <div class="row g-2">
                        <div class="col-md-12">
                            <input type="text" name="name" required class="form-control" placeholder="Full Name">
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="age" min="7" required class="form-control" placeholder="Age">
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" name="gender" required>
                                <option selected value="male">Male</option>
                                <option value="female">Female</option>   
                            </select>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="address" required class="form-control" placeholder="Address">
                        </div>
                        <div class="col-md-12">
                            <input type="tel" name="contactNum" pattern="[0][9][0-9]{9}" required class="form-control" placeholder="Contact number">
                        </div>
                        <div class="col-md-12">
                            <input type="email" name="email" required class="form-control" placeholder="Enter Email">
                        </div>

                        <div class="col-md-6">
                            <input id="date_picker" type="date" name="date"  min="<?php echo date('Y-m-d', strtotime( date('Y-m-d')." +1 days"));?>"  required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <input  type="time" name="time" min="08:00" max="17:00" required class="form-control">
                        </div>
                        <div class="col-12">
                            <select class="form-select" name="service">
                                <option selected hidden >Select Service</option>
                                <option value="Tooth Extraction">Tooth Extraction</option>
                                <option value="Odontectomy">Odontectomy</option>
                                <option value="Apicoectomy">Apicoectomy</option>
                                <option value="Crown Lengthening">Crown Lengthening</option>
                                <option value="Oral Surgery">Oral Surgery</option>
                                <option value="Oral Prophylaxis">Oral Prophylaxis</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                        <div class="h-captcha" data-sitekey="6ad65b76-24e9-4e8b-8e89-0a480ed2c8b8"></div>
                        </div>
                        <div class="col-12 mt-3">                        
                            <button type="submit" name="submit" class="btn btn-primary float-end">Book Appointment</button>
                            <button type="button" onclick="location.href='<?php echo site_url() ?>'" class="btn btn-outline-secondary float-end me-2">Back to home</button>
                        </div>
                        
                    </div>
                </form>
                                </div>   
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</body>

</html>

