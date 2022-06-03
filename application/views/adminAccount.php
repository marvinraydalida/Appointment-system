<section id="modal-container">
        <div id="addAccount-modal">
            <button class="modal-close">X</button>
            <h1>Create new admin account:</h1>
        
            <form id="create" action="<?php echo site_url('Admin/addAdminAccount')?>" method="POST">
                <h2></h2>
                <label>Full name</label>
                <input type="text" name="name" placeholder="Enter fullname" required>

                <label>Username</label>
                <input type="text" name="username" placeholder="Enter username" required>

                <label>Password</label>
                <input type="password" name="password" id="Password" required>

                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" id="ConfirmPassword" required>

                <input type="submit" id="submit" value="Create admin account" >
            </form>
        </div>

        <div id="editAccount-modal">
            <button class="modal-close">X</button>
            <h1>Edit account details:</h1>
        
            <form id="edit" action="<?php echo site_url('Admin/editAdminAccount')?>" method="POST">
                <h2>Personal Details:</h2>
                <label>Full name</label>
                <input type="text" name="name" placeholder="Enter fullname" required>

                <h2>Account Details:</h2>
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter username" required>

                <h2>Change Password:</h2>
                <label>Old Password</label>
                <input type="password" name="oldpassword" id="OldPassword" required>

                <label>New Password</label>
                <input type="password" name="newpassword" id="NewPassword" required>

                <label>Confirm New Password</label>
                <input type="password" name="confirmpassword" id="ConfirmEditPassword" required>
                <input type="hidden" id="userHiddenID" name="userID">
                <input type="submit" id="submitEdit" value="Edit admin account" >
            </form>
        </div>
</section>

<section id="accounts">
	<div id="accounts-container">

    <div class="button-container">
        <button class="addAdminBtn"> [+] Add admin</button>
    </div>
		<div id="table-container">
			<table>
				<tr>
                    <th></th>
					<th>Username</th>
					<th>Name</th>
					<th>Action</th>
				</tr>
                <?php foreach ($accounts as $account) { ?>
                    <tr class="row-data">
                        <td><?php echo $account->userID?></td>
                        <td style="font-weight: bold;"><?php echo $account->username?></td>
                        <td><?php echo $account->name?></td>
                        <td>
                            <?php if($account->status == 1): ?>
                                <button class="editAdminBtn" >Edit Details</button>
                            <?php else : ?>
                                <button class="editAdminBtn" disabled>Edit Details</button>
                            <?php endif ; ?>
                           
                            <?php if($account->status == 1): ?>
                                <button class="deactivate-btn" 
                                        onclick="location.href='<?php echo site_url('Admin/deactivateAccount')?>/<?php echo $account->userID; ?>'">
                                        Deactivate
                                </button>
                            <?php else : ?>
                                <button class="activate-btn"
                                        onclick="location.href='<?php echo site_url('Admin/activateAccount')?>/<?php echo $account->userID; ?>'">
                                        Activate
                                </button>
                            <?php endif ; ?>
                            <input type="hidden" id="userID" value="<?php echo $account->userID?>">
                        </td>
                    </tr>
                <?php } ?>
			</table>
		</div>
</section>
<script src="<?php echo base_url("assets/javascript/adminAccount.js") ?>" type="module"></script>
</body>
</html>
