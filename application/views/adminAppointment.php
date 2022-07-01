<section id="modal-container">
    <div id="decline-modal">
        <button class="modal-close">X</button>

        <h1>Are you sure you want to cancel the appointment?</h1>
        <div id="decline-button-container">
            <!-- Wrap nalang sa form to para ma submit -->
            <button id="decline-appointment-btn">Yes</button>
            <button>No</button>
            <!--  -->
        </div>
    </div>

    <div id="rescehdule-modal">
        <button class="modal-close">X</button>
        <h1>Reschedule Request</h1>
        <form action="<?php echo site_url('Admin/sendEmailRescheduled?date=' . $_GET['date'] . '&status=' . $_GET['status']) ?>" method="POST">
            <h2>Date</h2>
            <label>From</label>
            <input type="date" disabled>

            <label>To</label>
            <input type="date" min="<?php echo date('Y-m-d', strtotime( date('Y-m-d')." +1 days"));?>" name="date" required>

            <h2>Time</h2>
            <label>From</label>
            <input type="text" disabled>

            <label>To</label>
            <input type="time" name="time" min="08:00" max="17:00" required>
            <input type="hidden" name="appointmentID">

            <input type="submit" value="Send Response">
        </form>
    </div>
    <div id="appointment-details-modal">
        <button class="modal-close">X</button>
        <h1>Appointment Details</h1>
        <p class="ticket-number"></p>

        <div class="badge-container">
            <div class="badge">
                <i class="fa-regular fa-calendar"></i>
                <p></p>
            </div>

            <div class="badge">
                <i class="fa-regular fa-clock"></i>
                <p></p>
            </div>
        </div>

        <label>Name</label>
        <h2></h2>
        <label>Email</label>
        <h2></h2>

        <div class="age-sex-container">
            <div>
                <label>Contact</label>
                <h2></h2>
            </div>
            <div>
                <label>Age</label>
                <h2></h2>
            </div>
            <div>
                <label>Sex</label>
                <h2></h2>
            </div>
        </div>

        <label>Address</label>
        <h2 class="address"></h2>
    </div>
</section>

<section id="appointment">
    <div id="appointment-components">
        <div id="calendar-container">
            <div id="month-picker">
                <button><i class="fa-solid fa-chevron-left"></i></button>
                <h1>month</h1>
                <button><i class="fa-solid fa-chevron-right"></i></button>
            </div>
            <table>
                <tr>
                    <th>Su</th>
                    <th>Mo</th>
                    <th>Tu</th>
                    <th>We</th>
                    <th>Th</th>
                    <th>Fr</th>
                    <th>Sa</th>
                </tr>
                <tr>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                </tr>
                <tr>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                </tr>
                <tr>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                </tr>
                <tr>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                </tr>
                <tr>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                </tr>
                <tr>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                    <td><button></button></td>
                </tr>
            </table>
        </div>
        <div class="appointment-status">
            <h1 id="selected-appointments"><i class="fa-solid fa-calendar-check"></i> Appointments: <?php echo $accepted ?></h1>
            <h1 id="request-appointments"><i class="fa-solid fa-bell"></i> Requests: <?php echo $pending ?></h1>
            <h1 id="cancel-appointments"><i class="fa-solid fa-calendar-xmark"></i> Cancelations: <?php echo $cancelled ?></h1>
        </div>
    </div>
    <div id="appointment-container">
        <form id="select-date" method="get">
            <input type="hidden" id="select-date-hidden" name="date" value="">
            <Label>Appointment status: </Label>
            <?php $request_uri = explode('status=', $_SERVER['REQUEST_URI'], 2); ?>
            <select name="status" id="status-drop-down">
                <option value="accepted">Accepted</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </form>
        <div class="appointment-divider">
            <h1> 8:00 am</h1>
            <div class="line-divider"></div>
            <?php foreach ($appointments as $appointment) { ?>
                <?php if (strtotime($appointment->time) >= strtotime('8:00') && strtotime($appointment->time) < strtotime('9:00')) : ?>
                    <!-- ETO YUNG SAMPLE NG ISANG APPOINTMENT CARD -->
                    <div class="appointment-card">
                        <?php if (strcasecmp($_GET['status'], "accepted") == 0) : ?>
                            <div class="appointment-time accepted">
                            <?php elseif (strcasecmp($_GET['status'], "cancelled") == 0) : ?>
                                <div class="appointment-time cancelled">
                                <?php endif; ?>
                                <h1><?php echo date('h:i a', strtotime($appointment->time)) ?></h1>
                                </div>
                                <div class="appointment-detail">
                                    <h1><?php echo $appointment->name ?></h1>
                                </div>

                                <div class="appointment-action">
                                    <button class="reschedule-appointment-btn">Reschedule</button>
                                    <button class="decline-request-btn" data-id="<?php echo $appointment->appointmentID; ?>" .>Cancel</button>
                                </div>
                                <div id="hidden-container">
                                    <input type="hidden" value="<?php echo $appointment->date ?>">
                                    <input type="hidden" value="<?php echo date('h:i A', strtotime($appointment->time)) ?>">
                                    <input type="hidden" value="<?php echo $appointment->appointmentID ?>">

                                    <input type="hidden" value="<?php echo $appointment->name ?>">
                                    <input type="hidden" value="<?php echo $appointment->email ?>">
                                    <input type="hidden" value="<?php echo $appointment->contactNum ?>">
                                    <input type="hidden" value="<?php echo $appointment->age ?>">
                                    <input type="hidden" value="<?php echo $appointment->gender ?>">
                                    <input type="hidden" value="<?php echo $appointment->address ?>">
                                    <input type="hidden" value="<?php echo date("M d, Y", strtotime($appointment->date)) ?>">
                                    
                                    <input type="hidden" value="<?php echo $appointment->appointmentTicket ?>">
                                </div>
                            </div>
                            <!-- END OF SAMPLE -->
                        <?php endif; ?>
                    <?php } ?>
                    </div>
                    <!-- Appointment divider-->

                    <div class="appointment-divider">
                        <h1> 9:00 am</h1>
                        <div class="line-divider"></div>
                        <?php foreach ($appointments as $appointment) { ?>
                            <?php if (strtotime($appointment->time) >= strtotime('9:00') && strtotime($appointment->time) < strtotime('10:00')) : ?>
                                <!-- ETO YUNG SAMPLE NG ISANG APPOINTMENT CARD -->
                                <div class="appointment-card">
                                    <div class="appointment-time">
                                        <h1><?php echo date('h:i a', strtotime($appointment->time)) ?></h1>
                                    </div>
                                    <div class="appointment-detail">
                                        <h1><?php echo $appointment->name ?></h1>
                                    </div>

                                    <div class="appointment-action">
                                        <button class="reschedule-appointment-btn">Reschedule</button>
                                        <button class="decline-request-btn" data-id="<?php echo $appointment->appointmentID; ?>" .>Cancel</button>
                                    </div>

                                    <div id="hidden-container">
                                        <input type="hidden" value="<?php echo $appointment->date ?>">
                                        <input type="hidden" value="<?php echo date('h:i A', strtotime($appointment->time)) ?>">
                                        <input type="hidden" value="<?php echo $appointment->appointmentID ?>">

                                        <input type="hidden" value="<?php echo $appointment->name ?>">
                                        <input type="hidden" value="<?php echo $appointment->email ?>">
                                        <input type="hidden" value="<?php echo $appointment->contactNum ?>">
                                        <input type="hidden" value="<?php echo $appointment->age ?>">
                                        <input type="hidden" value="<?php echo $appointment->gender ?>">
                                        <input type="hidden" value="<?php echo $appointment->address ?>">
                                        <input type="hidden" value="<?php echo date("M d, Y", strtotime($appointment->date)) ?>">
                                        
                                        <input type="hidden" value="<?php echo $appointment->appointmentTicket ?>">
                                    </div>
                                </div>
                                <!-- END OF SAMPLE -->
                            <?php endif; ?>
                        <?php } ?>
                    </div>
                    <!-- Appointment divider-->

                    <div class="appointment-divider">
                        <h1> 10:00 am</h1>
                        <div class="line-divider"></div>
                        <?php foreach ($appointments as $appointment) { ?>
                            <?php if (strtotime($appointment->time) >= strtotime('10:00') && strtotime($appointment->time) < strtotime('11:00')) : ?>
                                <!-- ETO YUNG SAMPLE NG ISANG APPOINTMENT CARD -->
                                <div class="appointment-card">
                                    <div class="appointment-time">
                                        <h1><?php echo date('h:i a', strtotime($appointment->time)) ?></h1>
                                    </div>
                                    <div class="appointment-detail">
                                        <h1><?php echo $appointment->name ?></h1>
                                    </div>

                                    <div class="appointment-action">
                                        <button class="reschedule-appointment-btn">Reschedule</button>
                                        <button class="decline-request-btn" data-id="<?php echo $appointment->appointmentID; ?>" .>Cancel</button>
                                    </div>

                                    <div id="hidden-container">
                                        <input type="hidden" value="<?php echo $appointment->date ?>">
                                        <input type="hidden" value="<?php echo date('h:i A', strtotime($appointment->time)) ?>">
                                        <input type="hidden" value="<?php echo $appointment->appointmentID ?>">

                                        <input type="hidden" value="<?php echo $appointment->name ?>">
                                        <input type="hidden" value="<?php echo $appointment->email ?>">
                                        <input type="hidden" value="<?php echo $appointment->contactNum ?>">
                                        <input type="hidden" value="<?php echo $appointment->age ?>">
                                        <input type="hidden" value="<?php echo $appointment->gender ?>">
                                        <input type="hidden" value="<?php echo $appointment->address ?>">
                                        <input type="hidden" value="<?php echo date("M d, Y", strtotime($appointment->date)) ?>">
                                        
                                        <input type="hidden" value="<?php echo $appointment->appointmentTicket ?>">
                                    </div>
                                </div>
                                <!-- END OF SAMPLE -->
                            <?php endif; ?>
                        <?php } ?>
                    </div>
                    <!-- Appointment divider-->

                    <div class="appointment-divider">
                        <h1> 11:00 am</h1>
                        <div class="line-divider"></div>
                        <?php foreach ($appointments as $appointment) { ?>
                            <?php if (strtotime($appointment->time) >= strtotime('11:00') && strtotime($appointment->time) < strtotime('12:00')) : ?>
                                <!-- ETO YUNG SAMPLE NG ISANG APPOINTMENT CARD -->
                                <div class="appointment-card">
                                    <div class="appointment-time">
                                        <h1><?php echo date('h:i a', strtotime($appointment->time)) ?></h1>
                                    </div>
                                    <div class="appointment-detail">
                                        <h1><?php echo $appointment->name ?></h1>
                                    </div>

                                    <div class="appointment-action">
                                        <button class="reschedule-appointment-btn">Reschedule</button>
                                        <button class="decline-request-btn" data-id="<?php echo $appointment->appointmentID; ?>" .>Cancel</button>
                                    </div>

                                    <div id="hidden-container">
                                        <input type="hidden" value="<?php echo $appointment->date ?>">
                                        <input type="hidden" value="<?php echo date('h:i A', strtotime($appointment->time)) ?>">
                                        <input type="hidden" value="<?php echo $appointment->appointmentID ?>">

                                        <input type="hidden" value="<?php echo $appointment->name ?>">
                                        <input type="hidden" value="<?php echo $appointment->email ?>">
                                        <input type="hidden" value="<?php echo $appointment->contactNum ?>">
                                        <input type="hidden" value="<?php echo $appointment->age ?>">
                                        <input type="hidden" value="<?php echo $appointment->gender ?>">
                                        <input type="hidden" value="<?php echo $appointment->address ?>">
                                        <input type="hidden" value="<?php echo date("M d, Y", strtotime($appointment->date)) ?>">
                                        
                                        <input type="hidden" value="<?php echo $appointment->appointmentTicket ?>">
                                    </div>
                                </div>
                                <!-- END OF SAMPLE -->
                            <?php endif; ?>
                        <?php } ?>
                    </div>
                    <!-- Appointment divider-->

                    <div class="appointment-divider">
                        <h1> 1:00 pm</h1>
                        <div class="line-divider"></div>
                        <?php foreach ($appointments as $appointment) { ?>
                            <?php if (strtotime($appointment->time) >= strtotime('13:00') && strtotime($appointment->time) < strtotime('14:00')) : ?>
                                <!-- ETO YUNG SAMPLE NG ISANG APPOINTMENT CARD -->
                                <div class="appointment-card">
                                    <div class="appointment-time">
                                        <h1><?php echo date('h:i a', strtotime($appointment->time)) ?></h1>
                                    </div>
                                    <div class="appointment-detail">
                                        <h1><?php echo $appointment->name ?></h1>
                                    </div>

                                    <div class="appointment-action">
                                        <button class="reschedule-appointment-btn">Reschedule</button>
                                        <button class="decline-request-btn" data-id="<?php echo $appointment->appointmentID; ?>" .>Cancel</button>
                                    </div>

                                    <div id="hidden-container">
                                        <input type="hidden" value="<?php echo $appointment->date ?>">
                                        <input type="hidden" value="<?php echo date('h:i A', strtotime($appointment->time)) ?>">
                                        <input type="hidden" value="<?php echo $appointment->appointmentID ?>">

                                        <input type="hidden" value="<?php echo $appointment->name ?>">
                                        <input type="hidden" value="<?php echo $appointment->email ?>">
                                        <input type="hidden" value="<?php echo $appointment->contactNum ?>">
                                        <input type="hidden" value="<?php echo $appointment->age ?>">
                                        <input type="hidden" value="<?php echo $appointment->gender ?>">
                                        <input type="hidden" value="<?php echo $appointment->address ?>">
                                        <input type="hidden" value="<?php echo date("M d, Y", strtotime($appointment->date)) ?>">
                                        
                                        <input type="hidden" value="<?php echo $appointment->appointmentTicket ?>">
                                    </div>
                                </div>
                                <!-- END OF SAMPLE -->
                            <?php endif; ?>
                        <?php } ?>
                    </div>
                    <!-- Appointment divider-->
                    <div class="appointment-divider">
                        <h1> 2:00 pm</h1>
                        <div class="line-divider"></div>
                        <?php foreach ($appointments as $appointment) { ?>
                            <?php if (strtotime($appointment->time) >= strtotime('14:00') && strtotime($appointment->time) < strtotime('15:00')) : ?>
                                <!-- ETO YUNG SAMPLE NG ISANG APPOINTMENT CARD -->
                                <div class="appointment-card">
                                    <div class="appointment-time">
                                        <h1><?php echo date('h:i a', strtotime($appointment->time)) ?></h1>
                                    </div>
                                    <div class="appointment-detail">
                                        <h1><?php echo $appointment->name ?></h1>
                                    </div>

                                    <div class="appointment-action">
                                        <button class="reschedule-appointment-btn">Reschedule</button>
                                        <button class="decline-request-btn" data-id="<?php echo $appointment->appointmentID; ?>" .>Cancel</button>
                                    </div>

                                    <div id="hidden-container">
                                        <input type="hidden" value="<?php echo $appointment->date ?>">
                                        <input type="hidden" value="<?php echo date('h:i A', strtotime($appointment->time)) ?>">
                                        <input type="hidden" value="<?php echo $appointment->appointmentID ?>">

                                        <input type="hidden" value="<?php echo $appointment->name ?>">
                                        <input type="hidden" value="<?php echo $appointment->email ?>">
                                        <input type="hidden" value="<?php echo $appointment->contactNum ?>">
                                        <input type="hidden" value="<?php echo $appointment->age ?>">
                                        <input type="hidden" value="<?php echo $appointment->gender ?>">
                                        <input type="hidden" value="<?php echo $appointment->address ?>">
                                        <input type="hidden" value="<?php echo date("M d, Y", strtotime($appointment->date)) ?>">
                                        
                                        <input type="hidden" value="<?php echo $appointment->appointmentTicket ?>">
                                    </div>
                                </div>
                                <!-- END OF SAMPLE -->
                            <?php endif; ?>
                        <?php } ?>
                    </div>
                    <!-- Appointment divider-->
                    <div class="appointment-divider">
                        <h1> 3:00 pm</h1>
                        <div class="line-divider"></div>
                        <?php foreach ($appointments as $appointment) { ?>
                            <?php if (strtotime($appointment->time) >= strtotime('15:00') && strtotime($appointment->time) < strtotime('16:00')) : ?>
                                <!-- ETO YUNG SAMPLE NG ISANG APPOINTMENT CARD -->
                                <div class="appointment-card">
                                    <div class="appointment-time">
                                        <h1><?php echo date('h:i a', strtotime($appointment->time)) ?></h1>
                                    </div>
                                    <div class="appointment-detail">
                                        <h1><?php echo $appointment->name ?></h1>
                                    </div>

                                    <div class="appointment-action">
                                        <button class="reschedule-appointment-btn">Reschedule</button>
                                        <button class="decline-request-btn" data-id="<?php echo $appointment->appointmentID; ?>" .>Cancel</button>
                                    </div>

                                    <div id="hidden-container">
                                        <input type="hidden" value="<?php echo $appointment->date ?>">
                                        <input type="hidden" value="<?php echo date('h:i A', strtotime($appointment->time)) ?>">
                                        <input type="hidden" value="<?php echo $appointment->appointmentID ?>">

                                        <input type="hidden" value="<?php echo $appointment->name ?>">
                                        <input type="hidden" value="<?php echo $appointment->email ?>">
                                        <input type="hidden" value="<?php echo $appointment->contactNum ?>">
                                        <input type="hidden" value="<?php echo $appointment->age ?>">
                                        <input type="hidden" value="<?php echo $appointment->gender ?>">
                                        <input type="hidden" value="<?php echo $appointment->address ?>">
                                        <input type="hidden" value="<?php echo date("M d, Y", strtotime($appointment->date)) ?>">
                                        
                                        <input type="hidden" value="<?php echo $appointment->appointmentTicket ?>">
                                    </div>
                                </div>
                                <!-- END OF SAMPLE -->
                            <?php endif; ?>
                        <?php } ?>
                    </div>
                    <!-- Appointment divider-->
                    <div class="appointment-divider">
                        <h1> 4:00 pm</h1>
                        <div class="line-divider"></div>
                        <?php foreach ($appointments as $appointment) { ?>
                            <?php if (strtotime($appointment->time) >= strtotime('16:00') && strtotime($appointment->time) < strtotime('17:00')) : ?>
                                <!-- ETO YUNG SAMPLE NG ISANG APPOINTMENT CARD -->
                                <div class="appointment-card">
                                    <div class="appointment-time">
                                        <h1><?php echo date('h:i a', strtotime($appointment->time)) ?></h1>
                                    </div>
                                    <div class="appointment-detail">
                                        <h1><?php echo $appointment->name ?></h1>
                                    </div>

                                    <div class="appointment-action">
                                        <button class="reschedule-appointment-btn">Reschedule</button>
                                        <button class="decline-request-btn" data-id="<?php echo $appointment->appointmentID; ?>" .>Cancel</button>
                                    </div>

                                    <div id="hidden-container">
                                        <input type="hidden" value="<?php echo $appointment->date ?>">
                                        <input type="hidden" value="<?php echo date('h:i A', strtotime($appointment->time)) ?>">
                                        <input type="hidden" value="<?php echo $appointment->appointmentID ?>">

                                        <input type="hidden" value="<?php echo $appointment->name ?>">
                                        <input type="hidden" value="<?php echo $appointment->email ?>">
                                        <input type="hidden" value="<?php echo $appointment->contactNum ?>">
                                        <input type="hidden" value="<?php echo $appointment->age ?>">
                                        <input type="hidden" value="<?php echo $appointment->gender ?>">
                                        <input type="hidden" value="<?php echo $appointment->address ?>">
                                        <input type="hidden" value="<?php echo date("M d, Y", strtotime($appointment->date)) ?>">
                                        
                                        <input type="hidden" value="<?php echo $appointment->appointmentTicket ?>">
                                    </div>
                                </div>
                                <!-- END OF SAMPLE -->
                            <?php endif; ?>
                        <?php } ?>
                    </div>
                    <!-- Appointment divider-->

                    <div class="appointment-divider">
                        <h1> 5:00 pm</h1>
                        <div class="line-divider"></div>
                        <?php foreach ($appointments as $appointment) { ?>
                            <?php if (strtotime($appointment->time) >= strtotime('17:00') && strtotime($appointment->time) < strtotime('18:00')) : ?>
                                <!-- ETO YUNG SAMPLE NG ISANG APPOINTMENT CARD -->
                                <div class="appointment-card">
                                    <div class="appointment-time">
                                        <h1><?php echo date('h:i a', strtotime($appointment->time)) ?></h1>
                                    </div>
                                    <div class="appointment-detail">
                                        <h1><?php echo $appointment->name ?></h1>
                                    </div>

                                    <div class="appointment-action">
                                        <button class="reschedule-appointment-btn">Reschedule</button>
                                        <button class="decline-request-btn" data-id="<?php echo $appointment->appointmentID; ?>" .>Cancel</button>
                                    </div>

                                    <div id="hidden-container">
                                        <input type="hidden" value="<?php echo $appointment->date ?>">
                                        <input type="hidden" value="<?php echo date('h:i A', strtotime($appointment->time)) ?>">
                                        <input type="hidden" value="<?php echo $appointment->appointmentID ?>">

                                        <input type="hidden" value="<?php echo $appointment->name ?>">
                                        <input type="hidden" value="<?php echo $appointment->email ?>">
                                        <input type="hidden" value="<?php echo $appointment->contactNum ?>">
                                        <input type="hidden" value="<?php echo $appointment->age ?>">
                                        <input type="hidden" value="<?php echo $appointment->gender ?>">
                                        <input type="hidden" value="<?php echo $appointment->address ?>">
                                        <input type="hidden" value="<?php echo date("M d, Y", strtotime($appointment->date)) ?>">
                                        
                                        <input type="hidden" value="<?php echo $appointment->appointmentTicket ?>">
                                    </div>
                                </div>
                                <!-- END OF SAMPLE -->
                            <?php endif; ?>
                        <?php } ?>
                    </div>
                    <!-- Appointment divider-->
        </div>

</section>
<script src="<?php echo base_url("assets/javascript/adminAppointment.js") ?>" type="module"></script>
<script src="<?php echo base_url("assets/javascript/modal.js") ?>"></script>
<script src="<?php echo base_url("assets/javascript/calendar.js") ?>" type="module"></script>
</body>

</html>