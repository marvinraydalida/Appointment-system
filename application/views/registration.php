<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href=<?php echo base_url("assets/css/stylesRegister.css")?> rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
	<form action="<?php echo site_url('Registration/register') ?>" method="POST">

		<div class="form">
			<div class="title">Register</div>
			<div class="input-container ic2">
				<input id="firstname" name ="firstname" required class="input" type="text" pattern="[A-Za-z\s]+" oninvalid="setCustomValidity('Please enter on alphabets only. ')" placeholder=" " />
				<div class="cut"></div>
				<label for="firstname" class="placeholder"><i class="fas fa-id-card icon"></i> First Name</label>
			</div>
			<div class="input-container ic2">
				<input id="lastname" name ="lastname"  required   class="input" type="text"  pattern="[A-Za-z\s]+" oninvalid="setCustomValidity('Please enter on alphabets only. ')" placeholder=" " />
				<div class="cut"></div>
				<label for="lastname" class="placeholder"><i class="far fa-id-card icon"></i> Last Name</>
			</div>
			<div class="input-container ic2">
				<input id="email" name ="email"  required   class="input" type="email" placeholder=" " />
				<div class="cut"></div>
				<label for="lastname" class="placeholder"><i class="fas fa-envelope icon"></i></i> Email Address</>
			</div>
			<div class="input-container ic2">
				<input id="username"  name ="username"  required  class="input" type="text" placeholder=" " />
				<div class="cut"></div>
				<label for="username" class="placeholder"><i class="fas fa-user icon"></i> Username</>
			</div>
			<div class="input-container ic2">
				<input id="password" name ="password"  required  class="input" minlength=8 type="password" placeholder=" " />
				<div class="cut"></div>
				<label for="password" class="placeholder"><i class="fas fa-lock icon"></i> Password</>
			</div>
			<div class="input-container ic2">
				<input id="confirmpassword" name ="confirmpassword"  required  minlength=8 class="input" type="password" placeholder=" " />
				<div class="cut"></div>
				<label for="confirmpassword" class="placeholder"><i class="fas fa-lock icon"></i>Confirm Password</>
			</div>
			<button type="submit" class="submit">Register</button>
		</div>
	</form>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
</body>

</html>
