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
                        <tr>
                            
                            <td style="font-weight: bold;"> <?php echo date('h:i a', strtotime($appointment->time))?></td>
                            <td><?php echo date("m/d/Y",strtotime($appointment->date)) ?></td>
                            <td><?php echo $appointment->name ?></td>
                            <td><?php echo $appointment->contactNum ?></td>
                            <td><?php echo $appointment->email ?></td>
                            <td>
                                <button>Accept</button>
                                <button>Reschedule</button>
                                <button>Decline</button>
                            </td>
                            
                        </tr>
                    <?php } ?>
               

                </table>
            </div>

        </div>
    </section>

    </body>

    </html>