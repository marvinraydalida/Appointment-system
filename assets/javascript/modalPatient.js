const modalCloseBtn = document.getElementById('modal-close');
const modalBackDrop = document.getElementById('modal-container');
const cancelBtn = document.getElementById('cancel-request-btn');
const confirmCancelBtn = document.getElementById('cancel-appointment-btn');

modalBackDrop.addEventListener('click', closeModal);
modalCloseBtn.addEventListener('click', closeModal);
cancelBtn.addEventListener('click', showModal);

function closeModal(event) {
    document.getElementById('modal-container').style.display = "none";
}

function showModal(event) {
    if (event.target.id === 'cancel-request-btn') {
        document.getElementById('modal-container').style.display = "block";
    }
    
}
