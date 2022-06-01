const modalCloseBtn = document.querySelectorAll('.modal-close');
const modalBackDrop = document.getElementById('modal-container');
const declineBtn = document.querySelectorAll('.decline-request-btn');
const rescheduleBtn = document.querySelectorAll('.reschedule-request-btn');
const confirmDeclineBtn = document.getElementById('decline-appointment-btn');
const dateInputs = document.querySelectorAll('#rescehdule-modal input[type=\"date\"]');
const timeInputs = document.querySelectorAll('#rescehdule-modal input[type=\"time\"]');
const hiddenID = document.querySelector('#rescehdule-modal input[type=\"hidden\"]');
const tmpHiddens = document.getElementById('hidden-container');


for (const btn of declineBtn) {
    btn.addEventListener('click', showModal);
}

for (const btn of rescheduleBtn) {
    btn.addEventListener('click', showModal);
}

for (const btn of modalCloseBtn) {
    btn.addEventListener('click', closeModal);
}

modalBackDrop.addEventListener('click', closeModal);

function closeModal(event) {
    if (event.target.tagName === 'BUTTON') {
        event.target.closest('section').style.display = "none";
        document.getElementById('decline-modal').style.display = "none";
        document.getElementById('rescehdule-modal').style.display = "none";
        timeInputs[1].value = "";
        dateInputs[1].value = "";
    }
    else if (event.target.tagName === 'SECTION') {
        event.target.style.display = "none";
        document.getElementById('decline-modal').style.display = "none";
        document.getElementById('rescehdule-modal').style.display = "none";
        timeInputs[1].value = "";
        dateInputs[1].value = "";
    }
}

function showModal(event) {
    modalBackDrop.style.display = "flex";
    if (event.target.className === 'decline-request-btn') {
        document.getElementById('decline-modal').style.display = "block";
        confirmDeclineBtn.onclick=function(){
            location.href=document.location.href +'/sendEmailDeclined/'+ event.target.dataset.id;
        }
       
    }
    else if (event.target.className === 'reschedule-request-btn') {
        document.getElementById('rescehdule-modal').style.display = "flex";

        // dateInputs[0].value = event.target.parentNode.nextElementSibling.value;
        // timeInputs[0].value = event.target.parentNode.parentNode.lastElementChild.value;
        dateInputs[0].value = tmpHiddens.children[0].value;
        timeInputs[0].value = tmpHiddens.children[1].value;
        hiddenID.value = tmpHiddens.children[2].value;
    }
}
