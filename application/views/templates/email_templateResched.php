<!DOCTYPE html>

<head>
	<title></title>

	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
	<style>
		* {
			box-sizing: border-box;
		}

		body {
			margin: 0;
			padding: 0;
		}

		a[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: inherit !important;
		}

		#MessageViewBody a {
			color: inherit;
			text-decoration: none;
		}

		p {
			line-height: inherit
		}

		@media (max-width:610px) {
			.icons-inner {
				text-align: center;
			}

			.icons-inner td {
				margin: 0 auto;
			}

			.row-content {
				width: 100% !important;
			}

			.stack .column {
				width: 100%;
				display: block;
			}
		}

	</style>
</head>

<body style="background-color: #FFFFFF; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
	<table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation"
		style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;" width="100%">
		<tbody>
			<tr>
				<td>
					<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1"
						role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
						<tbody>
							<tr>
								<td>
									<table align="center" border="0" cellpadding="0" cellspacing="0"
										class="row-content stack" role="presentation"
										style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 590px;"
										width="590">
										<tbody style="background-color: #9DD8EA;">
											<tr>
												<td class="column"
													style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
													width="25%">
													<table border="0" cellpadding="0" cellspacing="0"
														class="image_block" role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
														width="100%">
														<tr>
															<td
																style="width:100%;padding-right:0px;padding-left:0px;padding-top:5px;padding-bottom:5px;">
																<div align="center" style="line-height:10px"><img
																		src="https://cdn.pixabay.com/photo/2018/03/22/05/52/dentist-3249382_1280.png"
																		style="display: block; height: auto; border: 0; width: 148px; max-width: 100%;"
																		width="148" /></div>
															</td>
														</tr>
													</table>
												</td>

											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2"
						role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
						<tbody>
							<tr>
								<td>
									<table align="center" border="0" cellpadding="0" cellspacing="0"
										class="row-content stack" role="presentation"
										style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 590px;"
										width="590">
										<tbody>
											<tr>
												<td class="column"
													style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
													width="100%">
													<table border="0" cellpadding="10" cellspacing="0"
														class="divider_block" role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
														width="100%">
														<tr>
															<td>
																<div align="center">
																	<table border="0" cellpadding="0" cellspacing="0"
																		role="presentation"
																		style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
																		width="100%">
																		<tr>
																			<td class="divider_inner"
																				style="font-size: 1px; line-height: 1px; border-top: 1px solid #BBBBBB;">
																				<span> </span></td>
																		</tr>
																	</table>
																</div>
															</td>
														</tr>
													</table>
		
											
													<table border="0" cellpadding="0" cellspacing="0"
														class="heading_block" role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; margin-bottom:10px"
														width="100%">
														<tr>
															<td style="width:100%;">
																
																<h1
																	style="margin: 0; color: #555555; font-size: 18px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; line-height: 120%; direction: ltr; font-weight: normal; letter-spacing: normal; margin-top: 0; margin-bottom: 0;">
																	<strong><p>Dear <?php echo $appointment->name?>, </p></strong>
																	
																	<p style="text-indent: 20px">We would like to inform you that your dental appointment request with ticket number <strong> <?php echo $appointment->appointmentTicket?></strong>
																	 have been rescheduled to <?php echo date("F d,Y", strtotime($date))?>, <?php echo date("l", strtotime($date))?> at <?php echo date('h:i a', strtotime($time))?>. To accept the said date, click the button below: </p>
							
																	<p style="margin-bottom:13px;text-align:center">
																		<form action="<?php echo site_url('Admin/acceptedEmailReschedule/')?><?php echo $appointment->appointmentID?>" method="POST">
																				<input type="hidden" value="<?php echo $date?>" name="date">
																				<input type="hidden" value="<?php echo $time?>" name="time">
																				<button type="submit"
																				style="background-color:#5CDC3C; font-size:20px; padding:10px; border-radius: 5px; color:#ffffff; border:0; cursor:pointer;">
																				Accept rescheduled date </button>
																			</form>
																			</p>

																	<p>If you wish to cancel the requested appointment and book a new request instead, click the button below: </p>
																	<p style="margin-bottom:13px;text-align:center">
																			<a href="<?php echo site_url('Appointment')?>"><button
																					style="background-color:#0080FF; font-size:20px; padding:10px; border-radius: 5px; color:#FFFFFF; border:0; cursor:pointer;">
																					Book new appointment request </button></a></p>
																	 <h1 style="margin: 0; color: #555555; font-size: 18px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; line-height: 120%; direction: ltr; font-weight: normal; letter-spacing: normal; margin-top: 0; margin-bottom: 0;">
																	<strong><p>Best Regards, </p></strong>
																	<p>Cerillo house of dental medicine</p>
																</h1>
																</h1>
															</td>
														</tr>
													</table>
													
									
												
													
													<table border="0" cellpadding="10" cellspacing="0"
														class="divider_block" role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
														width="100%">
														<tr>
															<td>
																<div align="center">
																	<table border="0" cellpadding="0" cellspacing="0"
																		role="presentation"
																		style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
																		width="100%">
																		<tr>
																			<td class="divider_inner"
																				style="font-size: 1px; line-height: 1px; border-top: 1px solid #BBBBBB;">
																				<span> </span></td>
																		</tr>
																	</table>
																</div>
															</td>
														</tr>
													</table>
													<table border="0" cellpadding="5" cellspacing="0" class="text_block"
														role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
														width="100%">
														<tr>
															<td>
																<div style="font-family: sans-serif">
																	<div
																		style="font-size: 14px; mso-line-height-alt: 16.8px; color: #555555; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
																		<p
																			style="margin: 0; font-size: 16px; text-align: center;">
																			<b>Cerillo house of dental medicine</b><br>
																			Address: Address Chuchu <br>
																			Contact Number: 0915647621 <br>
																			
																	</div>
																</div>
															</td>
														</tr>
													</table>
													<table border="0" cellpadding="10" cellspacing="0"
														class="divider_block" role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
														width="100%">
														<tr>
															<td>
																<div align="center">
																	<table border="0" cellpadding="0" cellspacing="0"
																		role="presentation"
																		style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
																		width="100%">
																		<tr>
																			<td class="divider_inner"
																				style="font-size: 1px; line-height: 1px; border-top: 1px solid #BBBBBB;">
																				<span> </span></td>
																		</tr>
																	</table>
																</div>
															</td>
														</tr>
													</table>
                                                    <table border="0" cellpadding="5" cellspacing="0" class="text_block"
														role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
														width="100%">
														<tr>
															<td>
																<div style="font-family: sans-serif">
																	<div
																		style="text-align:center; font-size: 14px; mso-line-height-alt: 16.8px; color: #555555; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
																		<i>*This is an automatically generated email* DO NOT REPLY</i>
																			
																			
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3"
						role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
						<tbody>
							<tr>
								<td>
									<table align="center" border="0" cellpadding="0" cellspacing="0"
										class="row-content stack" role="presentation"
										style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 590px;"
										width="590">
										<tbody>
											<tr>
												<td class="column"
													style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
													width="100%">
													<table border="0" cellpadding="0" cellspacing="0"
														class="icons_block" role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
														width="100%">
														<tr>
															<td
																style="color:#9d9d9d;font-family:inherit;font-size:15px;padding-bottom:5px;padding-top:5px;text-align:center;">
																<table cellpadding="0" cellspacing="0"
																	role="presentation"
																	style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
																	width="100%">
																	<tr>
																		<td style="text-align:center;">
																			<!--[if vml]><table align="left" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]-->
																			<!--[if !vml]><!-->
																			<table cellpadding="0" cellspacing="0"
																				class="icons-inner" role="presentation"
																				style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block; margin-right: -4px; padding-left: 0px; padding-right: 0px;">
																				<!--<![endif]-->
																				<tr>
																				</tr>
																			</table>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table><!-- End -->
</body>

</html>