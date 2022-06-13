const modalCloseBtn = document.querySelectorAll('.modal-close');
const modalBackDrop = document.getElementById('modal-container');
const declineBtn = document.querySelectorAll('.decline-request-btn');
const rescheduleBtn = document.querySelectorAll('.reschedule-request-btn');
const rescheduleAppointmentBtn = document.querySelectorAll('.reschedule-appointment-btn');
const appointmentRows = document.querySelectorAll('.row-data');
const confirmDeclineBtn = document.getElementById('decline-appointment-btn');
const dateInputs = document.querySelectorAll('#rescehdule-modal input[type=\"date\"]');
const timeInputs = document.querySelectorAll('#rescehdule-modal input[type=\"time\"]');
const hiddenID = document.querySelector('#rescehdule-modal input[type=\"hidden\"]');
const details = document.querySelectorAll('#appointment-details-modal h2');
const appointmentCards = document.querySelectorAll('.appointment-card');


for (const btn of declineBtn) {
    btn.addEventListener('click', showModal);
}

for (const btn of rescheduleBtn) {
    btn.addEventListener('click', showModal);
}

for (const btn of modalCloseBtn) {
    btn.addEventListener('click', closeModal);
}

for (const row of appointmentRows) {
    row.addEventListener('click', showModal);
}

for (const btn of rescheduleAppointmentBtn) {
    btn.addEventListener('click', showModal);
}

for (const card of appointmentCards) {
    card.addEventListener('click', showModal);
}

modalBackDrop.addEventListener('click', closeModal);

function closeModal(event) {
    if (event.target.tagName === 'BUTTON') {
        event.target.closest('section').style.display = "none";
        document.getElementById('decline-modal').style.display = "none";
        document.getElementById('rescehdule-modal').style.display = "none";
        document.getElementById('appointment-details-modal').style.display = "none";
        timeInputs[1].value = "";
        dateInputs[1].value = "";
    }
    else if (event.target.tagName === 'SECTION') {
        event.target.style.display = "none";
        document.getElementById('decline-modal').style.display = "none";
        document.getElementById('rescehdule-modal').style.display = "none";
        document.getElementById('appointment-details-modal').style.display = "none";
        timeInputs[1].value = "";
        dateInputs[1].value = "";
    }
}

function showModal(event) {
    if(event.target.textContent !== 'Accept'){
        modalBackDrop.style.display = "flex";
    }
    
    if (event.target.className === 'decline-request-btn') {
        document.getElementById('decline-modal').style.display = "block";
        confirmDeclineBtn.onclick = function () {
            if (event.target.textContent === "Decline") {
                location.href = document.location.href + '/sendEmailDeclined/' + event.target.dataset.id;
            }
            else {
                location.href = document.location.href.split('/Admin')[0] + `/Admin/sendEmailCancelled/${event.target.dataset.id}?${location.href.split('?')[1]}`
            }
        }
    }
    else if (event.target.className === 'reschedule-request-btn') {
        document.getElementById('rescehdule-modal').style.display = "flex";
        const tmpHiddens = event.target.closest('tr').children[6];

        dateInputs[0].value = tmpHiddens.children[0].value;
        timeInputs[0].value = tmpHiddens.children[1].value;
        hiddenID.value = tmpHiddens.children[2].value;
    }
    else if (event.target.className === 'reschedule-appointment-btn') {
        document.getElementById('rescehdule-modal').style.display = "flex";
        const tmpHiddens = event.target.parentNode.nextElementSibling;

        dateInputs[0].value = tmpHiddens.children[0].value;
        timeInputs[0].value = tmpHiddens.children[1].value;
        hiddenID.value = tmpHiddens.children[2].value;
    }
    else if (event.target.parentNode.className === 'appointment-card' || event.target.tagName === "TD" || event.target.tagName === "H1") {
        document.getElementById('appointment-details-modal').style.display = "block";
        let tmpHiddens;
        if (event.target.parentNode.className === 'appointment-card') {
            tmpHiddens = this.lastElementChild;
        }
        else if(event.target.tagName === "TD") {
            tmpHiddens = event.target.closest('tr').children[6];
            
        }
        else{
            tmpHiddens = event.target.parentNode.parentNode.lastElementChild;
        }

        const badges = document.querySelectorAll('.badge');
        badges[0].children[1].textContent = tmpHiddens.children[9].value;
        badges[1].children[1].textContent = tmpHiddens.children[10].value;

        details[0].textContent = tmpHiddens.children[3].value;
        details[1].textContent = tmpHiddens.children[4].value;
        details[2].textContent = tmpHiddens.children[5].value;
        details[3].textContent = tmpHiddens.children[6].value;
        details[4].textContent = tmpHiddens.children[7].value;
        details[5].textContent = tmpHiddens.children[8].value;
    }
}
