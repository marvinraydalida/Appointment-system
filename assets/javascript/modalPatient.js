const modalCloseBtn = document.getElementById('modal-close');
const modalBackDrop = document.getElementById('modal-container');
const cancelBtn = document.getElementById('cancel-request-btn');
const confirmCancelBtn = document.getElementById('cancel-appointment-btn');

modalBackDrop.addEventListener('click', closeModal);
modalCloseBtn.addEventListener('click', closeModal);
cancelBtn.addEventListener('click', showModal);

function closeModal(event) {
    if (event.target.tagName === 'BUTTON') {
        event.target.closest('section').style.display = "none";
        document.getElementById('cancel-modal').style.display = "none";

    }
    else if (event.target.tagName === 'SECTION') {
        event.target.style.display = "none";
        document.getElementById('cancel-modal').style.display = "none";
    }
}

function showModal(event) {
    if (event.target.className === 'cancel-request-btn') {
        document.getElementById('cancel-modal').style.display = "block";
        console.log('test');
    }
    
}
