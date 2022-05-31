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
                <h1 id="selected-appointments"><i class="fa-solid fa-calendar-check"></i> Appointments: <?php echo $accepted?></h1>
                <h1 id="request-appointments"><i class="fa-solid fa-bell"></i> Requests: <?php echo $pending?></h1>
                <h1 id="cancel-appointments"><i class="fa-solid fa-calendar-xmark"></i> Cancelations: <?php echo $cancelled?></h1>
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
                <?php foreach ($appointments as $appointment) {?>
                    <?php if(strtotime($appointment->time) >= strtotime('8:00') && strtotime($appointment->time) < strtotime('9:00')): ?>
                    <!-- ETO YUNG SAMPLE NG ISANG APPOINTMENT CARD -->
                    <div class="appointment-card">
                        <?php if(strcasecmp($_GET['status'], "accepted") == 0): ?>
                            <div class="appointment-time accepted">
                        <?php elseif(strcasecmp($_GET['status'], "cancelled") == 0): ?>
                            <div class="appointment-time cancelled">
                        <?php endif; ?>
                            <h1><?php echo date('h:i a', strtotime($appointment->time))?></h1>
                        </div>
                        <div class="appointment-detail">
                            <h1><?php echo $appointment->name?></h1>
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
                    <!-- END OF SAMPLE -->
                    <?php endif; ?>
                <?php } ?>                      
            </div>
            <!-- Appointment divider-->

            <div class="appointment-divider">
                <h1> 9:00 am</h1>
                <div class="line-divider"></div>
                <?php foreach ($appointments as $appointment) {?>
                    <?php if(strtotime($appointment->time) >= strtotime('9:00') && strtotime($appointment->time) < strtotime('10:00')): ?>
                    <!-- ETO YUNG SAMPLE NG ISANG APPOINTMENT CARD -->
                    <div class="appointment-card">
                        <?php if(strcasecmp($_GET['status'], "accepted") == 0): ?>
                            <div class="appointment-time accepted">
                        <?php elseif(strcasecmp($_GET['status'], "cancelled") == 0): ?>
                            <div class="appointment-time cancelled">
                        <?php endif; ?>
                            <h1><?php echo date('h:i a', strtotime($appointment->time))?></h1>
                        </div>
                        <div class="appointment-detail">
                            <h1><?php echo $appointment->name?></h1>
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
                    <!-- END OF SAMPLE -->
                    <?php endif; ?>
                <?php } ?>                      
            </div>
            <!-- Appointment divider-->
            
            <div class="appointment-divider">
                <h1> 10:00 am</h1>
                <div class="line-divider"></div>
                <?php foreach ($appointments as $appointment) {?>
                    <?php if(strtotime($appointment->time) >= strtotime('10:00') && strtotime($appointment->time) < strtotime('11:00')): ?>
                    <!-- ETO YUNG SAMPLE NG ISANG APPOINTMENT CARD -->
                    <div class="appointment-card">
                        <?php if(strcasecmp($_GET['status'], "accepted") == 0): ?>
                            <div class="appointment-time accepted">
                        <?php elseif(strcasecmp($_GET['status'], "cancelled") == 0): ?>
                            <div class="appointment-time cancelled">
                        <?php endif; ?>
                            <h1><?php echo date('h:i a', strtotime($appointment->time))?></h1>
                        </div>
                        <div class="appointment-detail">
                            <h1><?php echo $appointment->name?></h1>
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
                    <!-- END OF SAMPLE -->
                    <?php endif; ?>
                <?php } ?>                      
            </div>
            <!-- Appointment divider-->

            <div class="appointment-divider">
                <h1> 11:00 am</h1>
                <div class="line-divider"></div>
                <?php foreach ($appointments as $appointment) {?>
                    <?php if(strtotime($appointment->time) >= strtotime('11:00') && strtotime($appointment->time) < strtotime('12:00')): ?>
                    <!-- ETO YUNG SAMPLE NG ISANG APPOINTMENT CARD -->
                    <div class="appointment-card">
                        <?php if(strcasecmp($_GET['status'], "accepted") == 0): ?>
                            <div class="appointment-time accepted">
                        <?php elseif(strcasecmp($_GET['status'], "cancelled") == 0): ?>
                            <div class="appointment-time cancelled">
                        <?php endif; ?>
                            <h1><?php echo date('h:i a', strtotime($appointment->time))?></h1>
                        </div>
                        <div class="appointment-detail">
                            <h1><?php echo $appointment->name?></h1>
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
                    <!-- END OF SAMPLE -->
                    <?php endif; ?>
                <?php } ?>                      
            </div>
            <!-- Appointment divider-->

            <div class="appointment-divider">
                <h1> 1:00 pm</h1>
                <div class="line-divider"></div>
                <?php foreach ($appointments as $appointment) {?>
                    <?php if(strtotime($appointment->time) >= strtotime('13:00') && strtotime($appointment->time) < strtotime('14:00')): ?>
                    <!-- ETO YUNG SAMPLE NG ISANG APPOINTMENT CARD -->
                    <div class="appointment-card">
                        <?php if(strcasecmp($_GET['status'], "accepted") == 0): ?>
                            <div class="appointment-time accepted">
                        <?php elseif(strcasecmp($_GET['status'], "cancelled") == 0): ?>
                            <div class="appointment-time cancelled">
                        <?php endif; ?>
                            <h1><?php echo date('h:i a', strtotime($appointment->time))?></h1>
                        </div>
                        <div class="appointment-detail">
                            <h1><?php echo $appointment->name?></h1>
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
                    <!-- END OF SAMPLE -->
                    <?php endif; ?>
                <?php } ?>                      
            </div>
            <!-- Appointment divider-->
            <div class="appointment-divider">
                <h1> 2:00 pm</h1>
                <div class="line-divider"></div>
                <?php foreach ($appointments as $appointment) {?>
                    <?php if(strtotime($appointment->time) >= strtotime('14:00') && strtotime($appointment->time) < strtotime('15:00')): ?>
                    <!-- ETO YUNG SAMPLE NG ISANG APPOINTMENT CARD -->
                    <div class="appointment-card">
                        <?php if(strcasecmp($_GET['status'], "accepted") == 0): ?>
                            <div class="appointment-time accepted">
                        <?php elseif(strcasecmp($_GET['status'], "cancelled") == 0): ?>
                            <div class="appointment-time cancelled">
                        <?php endif; ?>
                            <h1><?php echo date('h:i a', strtotime($appointment->time))?></h1>
                        </div>
                        <div class="appointment-detail">
                            <h1><?php echo $appointment->name?></h1>
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
                    <!-- END OF SAMPLE -->
                    <?php endif; ?>
                <?php } ?>                      
            </div>
            <!-- Appointment divider-->
            <div class="appointment-divider">
                <h1> 3:00 pm</h1>
                <div class="line-divider"></div>
                <?php foreach ($appointments as $appointment) {?>
                    <?php if(strtotime($appointment->time) >= strtotime('15:00') && strtotime($appointment->time) < strtotime('16:00')): ?>
                    <!-- ETO YUNG SAMPLE NG ISANG APPOINTMENT CARD -->
                    <div class="appointment-card">
                        <?php if(strcasecmp($_GET['status'], "accepted") == 0): ?>
                            <div class="appointment-time accepted">
                        <?php elseif(strcasecmp($_GET['status'], "cancelled") == 0): ?>
                            <div class="appointment-time cancelled">
                        <?php endif; ?>
                            <h1><?php echo date('h:i a', strtotime($appointment->time))?></h1>
                        </div>
                        <div class="appointment-detail">
                            <h1><?php echo $appointment->name?></h1>
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
                    <!-- END OF SAMPLE -->
                    <?php endif; ?>
                <?php } ?>                      
            </div>
            <!-- Appointment divider-->                
            <div class="appointment-divider">
                <h1> 4:00 pm</h1>
                <div class="line-divider"></div>
                <?php foreach ($appointments as $appointment) {?>
                    <?php if(strtotime($appointment->time) >= strtotime('16:00') && strtotime($appointment->time) < strtotime('17:00')): ?>
                    <!-- ETO YUNG SAMPLE NG ISANG APPOINTMENT CARD -->
                    <div class="appointment-card">
                        <?php if(strcasecmp($_GET['status'], "accepted") == 0): ?>
                            <div class="appointment-time accepted">
                        <?php elseif(strcasecmp($_GET['status'], "cancelled") == 0): ?>
                            <div class="appointment-time cancelled">
                        <?php endif; ?>
                            <h1><?php echo date('h:i a', strtotime($appointment->time))?></h1>
                        </div>
                        <div class="appointment-detail">
                            <h1><?php echo $appointment->name?></h1>
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
                    <!-- END OF SAMPLE -->
                    <?php endif; ?>
                <?php } ?>                      
            </div>
            <!-- Appointment divider-->    
            
            <div class="appointment-divider">
                <h1> 5:00 pm</h1>
                <div class="line-divider"></div>
                <?php foreach ($appointments as $appointment) {?>
                    <?php if(strtotime($appointment->time) >= strtotime('17:00') && strtotime($appointment->time) < strtotime('18:00')): ?>
                    <!-- ETO YUNG SAMPLE NG ISANG APPOINTMENT CARD -->
                    <div class="appointment-card">
                        <?php if(strcasecmp($_GET['status'], "accepted") == 0): ?>
                            <div class="appointment-time accepted">
                        <?php elseif(strcasecmp($_GET['status'], "cancelled") == 0): ?>
                            <div class="appointment-time cancelled">
                        <?php endif; ?>
                            <h1><?php echo date('h:i a', strtotime($appointment->time))?></h1>
                        </div>
                        <div class="appointment-detail">
                            <h1><?php echo $appointment->name?></h1>
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
                    <!-- END OF SAMPLE -->
                    <?php endif; ?>
                <?php } ?>                      
            </div>
            <!-- Appointment divider-->
        </div>
        
    </section>
    <script src="<?php echo base_url("assets/javascript/adminAppointment.js") ?>" type="module"></script>
    <script src="<?php echo base_url("assets/javascript/calendar.js") ?>" type="module"></script>
    </body>

    </html>