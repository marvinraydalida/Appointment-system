
<section id="accounts">
	<div id="accounts-container">

		<div id="table-container">
			<table>
				<tr>
    
					<th>Date and Time</th>
					<th>Log</th>
					
				</tr>
                <?php foreach ($logs as $log) { ?>
                    <tr>
                        <td><?php echo $log->happenedAt?></td>
                        <td><?php echo $log->action?></td>
                    </tr>
                <?php } ?>
                
                
			</table>
		</div>
</section>
<script src="<?php echo base_url("assets/javascript/adminAccount.js") ?>" type="module"></script>
</body>
</html>
