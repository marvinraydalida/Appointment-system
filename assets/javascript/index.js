const modalCloseBtn = document.querySelectorAll('.modal-close');
const modalBackDrop = document.getElementById('modal-container');
const declineBtn = document.querySelectorAll('.decline-request-btn');
const rescheduleBtn = document.querySelectorAll('.reschedule-request-btn');




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
    }
    else if (event.target.tagName === 'SECTION') {
        event.target.style.display = "none";
        document.getElementById('decline-modal').style.display = "none";
        document.getElementById('rescehdule-modal').style.display = "none";
    }
}

function showModal(event) {
    modalBackDrop.style.display = "flex";
    if (event.target.className === 'decline-request-btn') {
        document.getElementById('decline-modal').style.display = "block";
    }
    else if (event.target.className === 'reschedule-request-btn') {
        document.getElementById('rescehdule-modal').style.display = "flex";
        document.querySelector('#rescehdule-modal input[type=\"date\"]:first-of-type').value = event.target.parentNode.nextElementSibling.value;
    }
}