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
            <!-- di ku pa na tetest yung form kaya commented muna -->
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
                <input type="hidden" name="id">

                <input type="submit" value="Send Response">
            </form>
        </div>
    </section>

    <section id="dashboard">
        <div id="analytics-container">
            <div id="weekly-graph-container"></div>
            <div id="request-graph-container"></div>
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
                            
                            <div id = "hidden-container">
                                <input type="hidden" value="<?php echo $appointment->date ?>">
                                <input type="hidden" value="<?php echo date('h:i', strtotime($appointment->time)) ?>">
                                <input type="hidden" value="<?php echo $appointment->appointmentID?>">
                            </div>

                        </tr>
                    <?php } ?>


                </table>
            </div>

        </div>
    </section>
    <script src="<?php echo base_url("assets/javascript/modal.js") ?>"></script>
    </body>

    </html>