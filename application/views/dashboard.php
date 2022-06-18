    <section id="modal-container">
        <div id="decline-modal">
            <button class="modal-close">X</button>

            <h1>Are you sure you want to decline the appointment?</h1>
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
            <form action="<?php echo site_url('Admin/sendEmailRescheduled') ?>" method="POST">
                <h2>Date</h2>
                <label>From</label>
                <input type="date" disabled>

                <label>To</label>
                <input type="date" name="date" required>

                <h2>Time</h2>
                <label>From</label>
                <input type="time" disabled>

                <label>To</label>
                <input type="time" name="time" min="08:00" max="17:00" required>
                <input type="hidden" name="appointmentID">

                <input type="submit" value="Send Response">
            </form>
        </div>

        <div id="appointment-details-modal">
            <button class="modal-close">X</button>
            <h1>Appointment Details</h1>
            <p class="ticket-number">Ticket no.: 707-12-2022</p>

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

    <section id="dashboard">
        <div id="analytics-container">
            <div id="weekly-graph-container">
                <canvas id="myChart"></canvas>
            </div>
            <div id="request-graph-container">
                <canvas id="doughnutChart"></canvas>
            </div>
        </div>

        <div id="request-container">
            <h1>Appointment request (<?php echo $rowcount ?>)</h1>

            <div id="table-container">
                <table>
                    <tr>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($appointments as $appointment) { ?>
                        <tr class="row-data">
                            <td style="font-weight: bold;"> <?php echo date('h:i a', strtotime($appointment->time)) ?></td>
                            <td><?php echo date("m/d/Y", strtotime($appointment->date)) ?></td>
                            <td><?php echo $appointment->name ?></td>
                            <td><?php echo $appointment->contactNum ?></td>
                            <td><?php echo $appointment->email ?></td>
                            <td>
                                <button onclick="location.href='<?php echo site_url('Admin/sendEmailAccepted') ?>/<?php echo $appointment->appointmentID; ?>'">Accept</button>
                                <button class="reschedule-request-btn" onclick="">Reschedule</button>
                                <button class="decline-request-btn" data-id="<?php echo $appointment->appointmentID; ?>">Decline</button>
                            </td>
                            <td id="hidden-container">
                                <input type="hidden" value="<?php echo $appointment->date ?>">
                                <input type="hidden" value="<?php echo date('h:i', strtotime($appointment->time)) ?>">
                                <input type="hidden" value="<?php echo $appointment->appointmentID ?>">

                                <input type="hidden" value="<?php echo $appointment->name ?>">
                                <input type="hidden" value="<?php echo $appointment->email ?>">
                                <input type="hidden" value="<?php echo $appointment->contactNum ?>">
                                <input type="hidden" value="<?php echo $appointment->age ?>">
                                <input type="hidden" value="<?php echo $appointment->gender ?>">
                                <input type="hidden" value="<?php echo $appointment->address ?>">
                                <input type="hidden" value="<?php echo date("M d, Y", strtotime($appointment->date)) ?>">
                                <input type="hidden" value="<?php echo date('h:i a', strtotime($appointment->time)) ?>">
                            </td>
                        </tr>
                    <?php } ?>


                </table>
            </div>

        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo base_url("assets/javascript/modal.js") ?>"></script>
    <script src="<?php echo base_url("assets/javascript/chart.js") ?>"></script>

    </body>

    </html>