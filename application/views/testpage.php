<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
	<?php if($this->session->flashdata('success')) : ?>
	<div class="alert alert-success alert-dismissible fade show">
		<?= $this->session->flashdata('success'); ?>
		<button type="button" class="btn-close close" data-bs-dismiss="alert"></button>
	</div>
	<?php $this->session->unset_userdata ('success'); ?>
	<?php endif; ?>
    
    <div class="container">
        <h1>User Details: </h1>
        <div>
            userID: <?= $this->session->userdata('auth_user')['userID']?>
        </div>
        <div>
            Firstname: <?= $this->session->userdata('auth_user')['firstname']?>
        </div>
        <div>
            Lastname: <?= $this->session->userdata('auth_user')['lastname']?>
        </div>
        <div>
            Username: <?= $this->session->userdata('auth_user')['username']?>
        </div>
        <div>
            Time Added: <?= $this->session->userdata('auth_user')['time_added']?>
        </div>
        <a href="<?php echo base_url('Logout'); ?>">
            <i class="fa fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </div>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
</body>

</html>
