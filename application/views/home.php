<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href=<?php echo site_url("assets/css/home.css") ?> rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <title>Home</title>
</head>

<body>
    <header>
        <nav>
            <h1>CERILLO HOUSE OF DENTAL </br> MEDICINE</h1>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#service">Service offered</a></li>
                <li><a href="#about">About us</a></li>
            </ul>
        </nav>
        <div id="text-container">
            <h1>More than just a </br>smile</h1>
            <button><a href="Appointment">Book an appointment</a></button>
        </div>
        <img src="<?php echo site_url("assets/image/person-smile.png") ?>" alt="">
    </header>

    <section id="service">
        <h1 id="service-title">Dental Services</h1>
        <p>Each of our patients are eligible for this personalized service. Schedule yours today, and we promise you’ll leave our clinic well-informed and confident that your health is in the best of hands.</p>
        <div id="service-container">
            <div class="service-card">
                <div class="card-image" style="background-image: url('https://springmedo.com/wp-content/uploads/2022/02/oral-surgery.jpg');"></div>
                <div class="card-details">
                    <h1>Dental Surgery</h1>
                    <ul>
                        <li>Tooth Extraction</li>
                        <li>Odontectomy</li>
                        <li>Apicoectomy</li>
                        <li>Oral Surgery</li>
                        <li>Crown Lengthening</li>
                    </ul>
                </div>
            </div>
            <div class="service-card">
                <div class="card-image" style="background-image: url('https://static.wixstatic.com/media/2d6f58_da084a561e454b3f8a0865997de1eeae~mv2.jpg/v1/fill/w_692,h_540,fp_0.66_0.50,q_85,usm_0.66_1.00_0.01,enc_auto/2d6f58_da084a561e454b3f8a0865997de1eeae~mv2.jpg');"></div>
                <div class="card-details">
                    <h1>ORAL PROPHYLAXIS</h1>
                    <p>Oral Prophylaxis, or Teeth Cleaning as we know it, is a type of oral care which involves the cleaning of teeth to prevent tooth decay, gum disease, and other dental problems. It is also effective in the removal of food debris, teeth stains, and dental plaque.</p>
                </div>
            </div>
            <div class="service-card">
                <div class="card-image" style="background-image: url('https://static.wixstatic.com/media/2d6f58_84b8a620276343eda322cb0f3ee177c0~mv2.jpg/v1/fill/w_660,h_440,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/55446985_648246272297200_518229148476584.jpg');"></div>
                <div class="card-details">
                    <h1>ORTHODONTIC TREATMENT</h1>
                    <p>Orthodontic treatment is a way of straightening or moving teeth, to improve the appearance of the teeth and how they work. It can also help to look after the long-term health of your teeth, gums and jaw joints, by spreading the biting pressure over all your teeth.</p>
                </div>
            </div>
            <div class="service-card">
                <div class="card-image" style="background-image: url('https://static.wixstatic.com/media/2d6f58_46dcb7e1d152446083ae2f3631806405~mv2.jpg/v1/fill/w_660,h_440,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/54423240_314242525950973_439465633879844.jpg');"></div>
                <div class="card-details">
                    <h1>Other Services</h1>
                    <ul>
                        <li>Permanent filling</li>
                        <li>Desensitizer application</li>
                        <li>Periodontal (Gum) treatment</li>
                        <li>Teeth whitening</li>
                        <li>Root Canal therapy</li>
                        <li>Prosthetic Dentistry</li>
                        <li>Nightguard/Mouthguard</li>
                        <li>TMJ Treatment</li>
                        <li>Dental Implant</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- https://springmedo.com/wp-content/uploads/2022/02/oral-surgery.jpg -->

    <section id="about">
        <h1>Contact Us!</h1>
        <h2>We’re here for you when you need us!</h2>
        <p>2nd flr. Don francisco tan gana bldg. National highway, Balibago, <br> Sta.rosa, Laguna and 2nd flr. Umerez building, GMA Cavite</p>
        <p>cerillodental@gmail.com</p>
        <p>09999999999</p>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1933.1286846082355!2d121.1056886032872!3d14.296473310725103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d8490ec6d2f9%3A0x9cc830abb3d064e1!2sCerillo%20house%20of%20dental%20medicine!5e0!3m2!1sen!2sph!4v1654371849026!5m2!1sen!2sph" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <footer>
        <div id="icon-container">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
        </div>
    </footer>
</body>

</html>