<section id="logs">
	<div id="logs-container">
		<form method="Get">
			<h1>Date:</h1>
			<input type="date" name="dateLog" id="inputDate">
			<h1>Action:</h1>
			<select id="action-selector" name="action">
				<option value="All">All</option>
				<option value="Log-out">Log-out</option>
				<option value="Log-in">Log-in</option>
				<option value="Accepted">Accepted</option>
				<option value="Rescheduled">Rescheduled</option>
				<option value="Cancelled">Cancelled</option>
				<option value="Declined">Declined</option>
			</select>
		</form>
		<div id="table-container">
			<table>
				<tr>

					<th>Time</th>
					<th>Action</th>
					<th>User</th>
				</tr>
				<?php foreach ($logs as $log) { ?>
					<tr>
						<td><?php echo date('h:i a', strtotime($log->time)) ?></td>
						<td><?php echo $log->details ?></td>
						<td><?php echo $log->name ?></td>
					</tr>
				<?php } ?>
			</table>
		</div>
</section>
<script src="<?php echo site_url("assets/javascript/adminLogs.js") ?>" type="module"></script>
</body>

</html>