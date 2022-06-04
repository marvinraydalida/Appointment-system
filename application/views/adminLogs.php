
<section id="accounts">
	<div id="accounts-container">

		<div id="table-container">
			<table>
				<tr>
    
					<th>Date and Time</th>
					<th>Log</th>
					
				</tr>
                <!-- <?php foreach ($accounts as $account) { ?>
                    <tr class="row-data">
                        <!-- <td><?php echo $account->userID?></td>
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
                        </td> -->
                    </tr>
                <?php } ?> -->
                <tr>
                    <td>Date</td>
                    <td>Admin Login</td>
                </tr>
			</table>
		</div>
</section>
<script src="<?php echo base_url("assets/javascript/adminAccount.js") ?>" type="module"></script>
</body>
</html>
