    <section id="appointment">
        <div id="appointment-components">
            <div id="calendar-container">
                <div id="month-picker">
                    <button disabled><i class="fa-solid fa-chevron-left"></i></button>
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
            <div class ="appointment-status">
                <h1 id = "selected-appointments"><i class="fa-solid fa-calendar-check"></i> Appointments:</h1>
                <h1 id = "request-appointments"><i class="fa-solid fa-bell"></i> Requests:</h1>
                <h1 id = "cancel-appointments"><i class="fa-solid fa-calendar-xmark"></i> Cancelations:</h1>
            </div>
        </div>
        <div id="appointment-container">

        </div>
    </section>
    <script src="<?php echo base_url("assets/javascript/calendar.js") ?>"></script>
    </body>

    </html>