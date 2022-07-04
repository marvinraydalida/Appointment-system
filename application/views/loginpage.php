<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href=<?php echo site_url("assets/css/stylesLogin.css")?> rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
	<form action="<?php echo site_url('Login/login') ?>" method="POST">
		<?php if($this->session->flashdata('loginerror')) : ?>
			<div class="alert alert-danger alert-dismissible fade show">
				<?= $this->session->flashdata('loginerror'); ?>
				<button type="button" class="btn-close close" data-bs-dismiss="alert"></button>
			</div>
			<?php $this->session->unset_userdata ('loginerror'); ?>
		<?php elseif($this->session->flashdata('login')) : ?>
			<div class="alert alert-danger alert-dismissible fade show">
				<?= $this->session->flashdata('login'); ?>
				<button type="button" class="btn-close close" data-bs-dismiss="alert"></button>
			</div>
			<?php $this->session->unset_userdata ('login'); ?>
		<?php endif; ?>
		
		<div class="form">
			
			<div class="title">Welcome, User</div>
			<div class="input-container ic2">
				<input id="username" name ="username" class="input" type="text" placeholder=" " />
				<div class="cut"></div>
				<label for="username" class="placeholder"><i class="fas fa-user icon"></i> Username</label>
			</div>
			<div class="input-container ic2">
				<input id="password"  name ="password"  class="input" type="password" placeholder=" " />
				<div class="cut"></div>
				<label for="password" class="placeholder"><i class="fas fa-lock icon"></i> Password</>
			</div>
			<button type="submit" class="submit">Login</button>
		</div>
	</form>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
</body>

</html>
