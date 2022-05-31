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
                <h1 id="selected-appointments"><i class="fa-solid fa-calendar-check"></i> Appointments:</h1>
                <!-- <h1 id="request-appointments"><i class="fa-solid fa-bell"></i> Requests:</h1> -->
                <h1 id="cancel-appointments"><i class="fa-solid fa-calendar-xmark"></i> Cancelations:</h1>
            </div>
        </div>
        <div id="appointment-container">
            <form id="select-date" method="get">
                <input type="hidden" id="select-date-hidden" name="date" value="">
                <Label>Appointment status: </Label>
                <?php $request_uri = explode('status=', $_SERVER['REQUEST_URI'],2);?>
                <select name="status" id="status-drop-down">
                    <option value="accepted">Accepted</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </form>
            <div class="appointment-divider">
                <h1> 8:00 am</h1>
                <div class="line-divider"></div>
                <div class="appointment-card">
                <div class="appointment-card">
                    <?php if(strcasecmp($_GET['status'], "accepted") == 0): ?>
                    <div class="appointment-time accepted">
                    <?php elseif(strcasecmp($_GET['status'], "cancelled") == 0): ?>
                    <div class="appointment-time cancelled">
                    <?php endif; ?>
                        <h1>8:45 AM</h1>
                    </div>
                    <div class="appointment-detail">
                        <h1>Marvin Ray Dalida</h1>
                    </div>

                    <?php if(strcasecmp($_GET['status'], "accepted") == 0): ?>
                    <div class="appointment-action accepted">
                    <?php elseif(strcasecmp($_GET['status'], "cancelled") == 0): ?>
                    <div class="appointment-action cancelled">
                    <?php endif; ?>
                        <button class="reschedule-request-btn">Reschedule</button>
                        <button class="cancel-request-btn">Cancel</button>
                    </div>
                </div>
                </div>
            </div>
            <!-- Duplicate nalnag example lang to di ko pa kasi alam yung sched nila-->
            <div class="appointment-divider">
                <h1></i> 9:00 am</h1>
                <div class="line-divider"></div>
            </div>
            <div class="appointment-divider">
                <h1></i> 10:00 am</h1>
                <div class="line-divider"></div>
                <div class="appointment-card">
                    <?php if(strcasecmp($_GET['status'], "accepted") == 0): ?>
                    <div class="appointment-time accepted">
                    <?php elseif(strcasecmp($_GET['status'], "cancelled") == 0): ?>
                    <div class="appointment-time cancelled">
                    <?php endif; ?>
                        <h1>8:45 AM</h1>
                    </div>
                    <div class="appointment-detail">
                        <h1>Marvin Ray Dalida</h1>
                    </div>

                    <?php if(strcasecmp($_GET['status'], "accepted") == 0): ?>
                    <div class="appointment-action accepted">
                    <?php elseif(strcasecmp($_GET['status'], "cancelled") == 0): ?>
                    <div class="appointment-action cancelled">
                    <?php endif; ?>
                        <button class="reschedule-request-btn">Reschedule</button>
                        <button class="cancel-request-btn">Cancel</button>
                    </div>
                </div>
            </div>
            <div class="appointment-divider">
                <h1></i> 11:00 am</h1>
                <div class="line-divider"></div>
                <div class="appointment-card">
                    <?php if(strcasecmp($_GET['status'], "accepted") == 0): ?>
                    <div class="appointment-time accepted">
                    <?php elseif(strcasecmp($_GET['status'], "cancelled") == 0): ?>
                    <div class="appointment-time cancelled">
                    <?php endif; ?>
                        <h1>8:45 AM</h1>
                    </div>
                    <div class="appointment-detail">
                        <h1>Marvin Ray Dalida</h1>
                    </div>

                    <?php if(strcasecmp($_GET['status'], "accepted") == 0): ?>
                    <div class="appointment-action accepted">
                    <?php elseif(strcasecmp($_GET['status'], "cancelled") == 0): ?>
                    <div class="appointment-action cancelled">
                    <?php endif; ?>
                        <button class="reschedule-request-btn">Reschedule</button>
                        <button class="cancel-request-btn">Cancel</button>
                    </div>
                </div>
            </div>
            <div class="appointment-divider">
                <h1></i> 11:00 am</h1>
                <div class="line-divider"></div>
                <div class="appointment-card">
                    <?php if(strcasecmp($_GET['status'], "accepted") == 0): ?>
                    <div class="appointment-time accepted">
                    <?php elseif(strcasecmp($_GET['status'], "cancelled") == 0): ?>
                    <div class="appointment-time cancelled">
                    <?php endif; ?>
                        <h1>8:45 AM</h1>
                    </div>
                    <div class="appointment-detail">
                        <h1>Marvin Ray Dalida</h1>
                    </div>

                    <?php if(strcasecmp($_GET['status'], "accepted") == 0): ?>
                    <div class="appointment-action accepted">
                    <?php elseif(strcasecmp($_GET['status'], "cancelled") == 0): ?>
                    <div class="appointment-action cancelled">
                    <?php endif; ?>
                        <button class="reschedule-request-btn">Reschedule</button>
                        <button class="cancel-request-btn">Cancel</button>
                    </div>
                </div>
                <div class="appointment-card">
                    <?php if(strcasecmp($_GET['status'], "accepted") == 0): ?>
                    <div class="appointment-time accepted">
                    <?php elseif(strcasecmp($_GET['status'], "cancelled") == 0): ?>
                    <div class="appointment-time cancelled">
                    <?php endif; ?>
                        <h1>8:45 AM</h1>
                    </div>
                    <div class="appointment-detail">
                        <h1>Marvin Ray Dalida</h1>
                    </div>

                    <?php if(strcasecmp($_GET['status'], "accepted") == 0): ?>
                    <div class="appointment-action accepted">
                    <?php elseif(strcasecmp($_GET['status'], "cancelled") == 0): ?>
                    <div class="appointment-action cancelled">
                    <?php endif; ?>
                        <button class="reschedule-request-btn">Reschedule</button>
                        <button class="cancel-request-btn">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="<?php echo base_url("assets/javascript/adminAppointment.js") ?>" type="module"></script>
    <script src="<?php echo base_url("assets/javascript/calendar.js") ?>" type="module"></script>
    </body>

    </html>