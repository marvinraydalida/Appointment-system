    
    <section id = "modal-container">
        <div id = "decline-modal">
            <button class = "modal-close">X</button>

            <h1>Are you sure you want to decline the appointment?</h1>
            <div id = "decline-button-container">
                <!-- Wrap nalang sa form to para ma submit -->
                <button>Yes</button>
                <button>No</button>
                <!--  -->
            </div>
        </div>

        <div id = "rescehdule-modal">
            <button class = "modal-close">X</button>
            <h1>Reschedule Request</h1>
            <!-- di ku pa na tetest yung form kaya commented muna -->
            <!-- <form action=""> -->
            <h2>Date</h2>
            <label>From</label>
            <input type="date" disabled>

            <label>To</label>
            <input type="date" name="">

            <h2>Time</h2>
            <label>From</label>
            <input type="time" disabled>

            <label>To</label>
            <input type="time" name="">

            <input type="submit" value = "Send Response">
            <!-- </form> -->
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
                    <?php foreach ($appointments as $appointment) {?>
                        <tr class = "row-data">
                            
                            <td style="font-weight: bold;"> <?php echo date('h:i a', strtotime($appointment->time))?></td>
                            <td><?php echo date("m/d/Y",strtotime($appointment->date)) ?></td>
                            <td><?php echo $appointment->name ?></td>
                            <td><?php echo $appointment->contactNum ?></td>
                            <td><?php echo $appointment->email ?></td>
                            <td>
                                <button>Accept</button>
                                <button class = "reschedule-request-btn">Reschedule</button>
                                <button class = "decline-request-btn">Decline</button>
                            </td>
                            <input type="hidden" value = "<?php echo $appointment->date?>">
                        </tr>
                    <?php } ?>
               

                </table>
            </div>

        </div>
    </section>

    </body>

    </html>